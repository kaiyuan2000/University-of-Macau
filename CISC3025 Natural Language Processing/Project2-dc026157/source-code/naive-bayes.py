import json
import re
import math
import nltk
from nltk.tokenize import word_tokenize
from nltk.stem import PorterStemmer
from nltk.corpus import stopwords
import string
import argparse

nltk.download('punkt')
nltk.download('stopwords')

def preprocess(inputfile, outputfile):
    porter = PorterStemmer()
    processed_data = []

    # Load the data
    with open(inputfile, 'r') as infile:
        data = json.load(infile)

    for document in data:
        # Each 'document' is now a list with [id, category, text]
        text = document[2].lower()  # Access the text part
        text = re.sub(r'\s+', ' ', text)  # Replace multiple spaces with single space
        text = re.sub(r'[^\w\s]', '', text)  # Remove punctuation
        tokens = word_tokenize(text)
        stemmed = [porter.stem(token) for token in tokens if token not in stopwords.words('english') and token not in string.punctuation]
        # Reconstruct the document with processed text
        processed_doc = [document[0], document[1], ' '.join(stemmed)]
        processed_data.append(processed_doc)

    # Write the processed data to the output file
    with open(outputfile, 'w') as outfile:
        json.dump(processed_data, outfile, indent=2)

def count_word(inputfile, outputfile):
    categories = ['crude', 'grain', 'money-fx', 'acq', 'earn']
    # Initialize counters for each category
    category_counts = {category: 0 for category in categories}
    word_counts = {category: {} for category in categories}

    # Load the preprocessed data
    with open(inputfile, 'r') as infile:
        data = json.load(infile)

    for document in data:
        category = document[1]  # The category of the current document
        if category in category_counts:
            category_counts[category] += 1  # Increment document count for the category
            words = set(document[2].split())  # Processed text as a set of unique words

            for word in words:
                if word not in word_counts[category]:
                    word_counts[category][word] = 1
                else:
                    word_counts[category][word] += 1

    # Aggregate word counts across all categories
    all_words = set(word for category in word_counts for word in word_counts[category])
    aggregated_word_counts = {word: [word_counts[category].get(word, 0) for category in categories] for word in
                              all_words}

    # Write the results to the output file
    with open(outputfile, 'w') as outfile:
        # Write the total document counts for each category
        outfile.write(' '.join(str(category_counts[cat]) for cat in categories) + '\n')

        # Write the word counts for each category
        for word, counts in aggregated_word_counts.items():
            outfile.write(f"{word} {' '.join(map(str, counts))}\n")

def feature_selection(inputfile, threshold, outputfile):
    # Read the word counts from the input file
    with open(inputfile, 'r') as f:
        lines = f.readlines()

    # Skip the first line which contains the total document counts for each category
    word_frequencies = [line.strip().split() for line in lines[1:]]

    # Aggregate total frequencies for each word across all categories to sort them
    aggregated_frequencies = [(word, sum(int(freq) for freq in frequencies)) for word, *frequencies in word_frequencies]

    # Sort words by their total frequency across all categories, descending
    sorted_words = sorted(aggregated_frequencies, key=lambda x: x[1], reverse=True)

    # Select the top N most frequent words
    top_words = sorted_words[:threshold]

    # Extract just the words for easier lookup
    top_word_set = set(word for word, _ in top_words)

    # Initialize counters for the total feature word frequency in each category
    feature_totals = [0] * 5  # Assuming the order is 'crude', 'grain', 'money-fx', 'acq', 'earn'

    # Filter the word frequencies to include only the top words, update feature_totals
    filtered_word_frequencies = []
    for word, *frequencies in word_frequencies:
        if word in top_word_set:
            filtered_word_frequencies.append([word] + frequencies)
            for i, freq in enumerate(frequencies):
                feature_totals[i] += int(freq)

    # Write the results to the output file
    with open(outputfile, 'w') as f:
        # Write the total feature word frequency for each class
        f.write(' '.join(map(str, feature_totals)) + '\n')

        # Write the word frequencies for each class, for the top words
        for word_data in filtered_word_frequencies:
            f.write(' '.join(word_data) + '\n')

def calculate_probability(word_count_file, word_dict_file, outputfile):
    # First, read the total document counts for each class from the word_count file
    with open(word_count_file, 'r') as f:
        class_totals = list(map(int, f.readline().strip().split()))

    # Calculate the total number of documents
    total_docs = sum(class_totals)

    # Calculate prior probabilities for each class
    priors = [count / total_docs for count in class_totals]

    # Now, read the word frequencies from the word_dict file
    with open(word_dict_file, 'r') as f:
        # Skip the first line which contains the total feature word frequencies
        next(f)
        # Read the rest of the file for the word frequencies
        word_data = [line.strip().split() for line in f]

    # Calculate the vocabulary size for Laplace smoothing
    vocab_size = len(word_data)

    # Initialize a dictionary to store the posterior probabilities for each word
    posteriors = {}

    for word, *freqs in word_data:
        freqs = list(map(int, freqs))
        # Apply Laplace smoothing and calculate posterior probability for each word in each class
        posteriors[word] = [(freq + 1) / (class_total + vocab_size) for freq, class_total in zip(freqs, class_totals)]

    # Write the prior and posterior probabilities to the output file
    with open(outputfile, 'w') as f:
        # Write the prior probabilities
        f.write(' '.join(map(str, priors)) + '\n')
        # Write the posterior probabilities for each word
        for word, probs in posteriors.items():
            f.write(f"{word} {' '.join(map(str, probs))}\n")

def classify(probability_file, testset_file, outputfile):
    # Load prior and posterior probabilities
    with open(probability_file, 'r') as f:
        lines = f.readlines()
    priors = list(map(float, lines[0].strip().split()))
    posteriors = {line.split()[0]: list(map(float, line.split()[1:])) for line in lines[1:]}

    # Load the test set
    with open(testset_file, 'r') as f:
        test_documents = json.load(f)

    # Initialize a list to store classification results
    classification_results = []

    for document in test_documents:
        # Extract the words from the document
        words = document[2].split()
        # Initialize log probabilities for each class
        log_probs = [math.log(prior) for prior in priors]

        for word in words:
            if word in posteriors:
                for i in range(len(priors)):
                    log_probs[i] += math.log(posteriors[word][i])

        # Find the class with the highest log probability
        max_log_prob = max(log_probs)
        assigned_class_index = log_probs.index(max_log_prob)
        assigned_class = ['crude', 'grain', 'money-fx', 'acq', 'earn'][assigned_class_index]

        # Append the result
        classification_results.append((document[0], assigned_class))

    # Write the classification results to the output file
    with open(outputfile, 'w') as f:
        for doc_id, assigned_class in classification_results:
            f.write(f"{doc_id} {assigned_class}\n")

def calculate_f1_scores(true_labels, predicted_labels, unique_labels):
    f1_scores = []
    for label in unique_labels:
        tp = sum(1 for true, pred in zip(true_labels, predicted_labels) if true == label and pred == label)
        fp = sum(1 for true, pred in zip(true_labels, predicted_labels) if true != label and pred == label)
        fn = sum(1 for true, pred in zip(true_labels, predicted_labels) if true == label and pred != label)

        precision = tp / (tp + fp) if tp + fp > 0 else 0
        recall = tp / (tp + fn) if tp + fn > 0 else 0
        f1 = 2 * precision * recall / (precision + recall) if precision + recall > 0 else 0

        f1_scores.append(f1)

    return sum(f1_scores) / len(f1_scores) if f1_scores else 0

def f1_score(testset_file, classification_result_file):
    with open(testset_file, 'r') as f:
        test_documents = json.load(f)
    true_labels = [doc[1] for doc in test_documents]

    with open(classification_result_file, 'r') as f:
        classification_results = f.readlines()
    predicted_labels = [line.strip().split()[1] for line in classification_results]

    unique_labels = set(true_labels)
    f1 = calculate_f1_scores(true_labels, predicted_labels, unique_labels)

    return f1

def main():
    ''' Main Function '''

    parser = argparse.ArgumentParser()
    parser.add_argument('-pps', '--preprocess',type=str,nargs=2,help='preprocess the dataset')
    parser.add_argument('-cw','--count_word',type=str,nargs=2,help='count the words from the corpus')
    parser.add_argument('-fs','--feature_selection',type=str,nargs=3,help='\select the features from the corpus')
    parser.add_argument('-cp','--calculate_probability',type=str,nargs=3,
                        help='calculate the posterior probability of each feature word, and the prior probability of the class')
    parser.add_argument('-cl','--classify',type=str,nargs=3,
                        help='classify the testset documents based on the probability calculated')
    parser.add_argument('-f1','--f1_score', type=str, nargs=2,
                        help='calculate the F-1 score based on the classification result.')
    opt=parser.parse_args()

    if(opt.preprocess):
        input_file = opt.preprocess[0]
        output_file = opt.preprocess[1]
        preprocess(input_file,output_file)
    elif(opt.count_word):
        input_file = opt.count_word[0]
        output_file = opt.count_word[1]
        count_word(input_file,output_file)
    elif(opt.feature_selection):
        input_file = opt.feature_selection[0]
        threshold = int(opt.feature_selection[1])
        outputfile = opt.feature_selection[2]
        feature_selection(input_file,threshold,outputfile)
    elif(opt.calculate_probability):
        word_count = opt.calculate_probability[0]
        word_dict = opt.calculate_probability[1]
        output_file = opt.calculate_probability[2]
        calculate_probability(word_count,word_dict,output_file)
    elif(opt.classify):
        probability = opt.classify[0]
        testset = opt.classify[1]
        outputfile = opt.classify[2]
        classify(probability,testset,outputfile)
    elif(opt.f1_score):
        testset = opt.f1_score[0]
        classification_result = opt.f1_score[1]
        f1 = f1_score(testset,classification_result)
        print('The F1 score of the classification result is: '+str(f1))

"""testing below"""
#preprocess("train.json","train.preprocessed.json")
#count_word('train.preprocessed.json', 'word_count.txt')
#feature_selection('word_count.txt', 10000, 'word_dict.txt')
#calculate_probability('word_count.txt', 'word_dict.txt', 'word_probability.txt')
#preprocess("test.json",'test.preprocessed.json')
#classify('word_probability.txt', 'test.preprocessed.json', 'classification_result.txt')
#f1 = f1_score('test.preprocessed.json', 'classification_result.txt')
#print('F1 Score:', f1)