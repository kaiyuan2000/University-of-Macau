from nltk.classify.maxent import MaxentClassifier
from sklearn.metrics import (accuracy_score, fbeta_score, precision_score,
                             recall_score)
import os
import pickle
import re
from nltk.tokenize import word_tokenize


class MEMM():
    def __init__(self):
        self.train_path = "../data/train"
        self.dev_path = "../data/dev"
        self.beta = 0
        self.max_iter = 0
        self.classifier = None

    def features(self, words, previous_label, position):
        """
        Note: The previous label of current word is the only visible label.

        :param words: a list of the words in the entire corpus
        :param previous_label: the label for position-1 (or O if it's the start
                of a new sentence)
        :param position: the word you are adding features for
        """

        features = {}
        """ Baseline Features """
        current_word = words[position]
        features['has_(%s)' % current_word] = 1
        features['prev_label'] = previous_label
        if current_word[0].isupper():
            features['Titlecase'] = 1

        #===== TODO: Add your features here =======#
        #  ALLCAP[0:-1].isupper()
        cap_flag = True
        for i in range(len(current_word)):
            if current_word[i].islower():
                cap_flag = False
                break
            else:
                continue
        if cap_flag==True:
            features['ALLCAP'] = 1
        
        #  all lowercase
        low_flag = True
        for i in range(len(current_word)):
            if current_word[i].isupper():
                low_flag = False
                break
            else:
                continue
        if low_flag==True:
            features['lowercase'] = 1
            
        #  after symbols
        symbol = ['.',',','"','\'','(',')']
        if words[position-1] in symbol:
            features['after_symbol'] = 1
        
        #  have number
        if re.match(r'[0-9]', current_word):
            features['number'] = 1
        
        #  prev word is mr. ms. mrs. Mister Mistress Miss President Minister
        pretitle = ['mr.','ms.','mrs.','mister','mistress','miss','president','minister']
        if words[position-1].lower() in pretitle:
            features['pretitle'] = 1
        
          
        #=============== TODO: Done ================#
        return features

    def load_data(self, filename):
        words = []
        labels = []
        for line in open(filename, "r", encoding="utf-8"):
            doublet = line.strip().split("\t")
            if len(doublet) < 2:     # remove emtpy lines
                continue
            words.append(doublet[0])
            labels.append(doublet[1])
        return words, labels

    def train(self):
        print('Training classifier...')
        words, labels = self.load_data(self.train_path)
        previous_labels = ["O"] + labels
        features = [self.features(words, previous_labels[i], i)
                    for i in range(len(words))]
        train_samples = [(f, l) for (f, l) in zip(features, labels)]
        classifier = MaxentClassifier.train(
            train_samples, max_iter=self.max_iter)
        self.classifier = classifier

    def test(self):
        print('Testing classifier...')
        words, labels = self.load_data(self.dev_path)
        previous_labels = ["O"] + labels
        features = [self.features(words, previous_labels[i], i)
                    for i in range(len(words))]
        results = [self.classifier.classify(n) for n in features]

        f_score = fbeta_score(labels, results, average='macro', beta=self.beta)
        precision = precision_score(labels, results, average='macro')
        recall = recall_score(labels, results, average='macro')
        accuracy = accuracy_score(labels, results)

        print("%-15s %.4f\n%-15s %.4f\n%-15s %.4f\n%-15s %.4f\n" %
              ("f_score=", f_score, "accuracy=", accuracy, "recall=", recall,
               "precision=", precision))

        return True

    def show_samples(self, bound):
        """Show some sample probability distributions.
        """
        words, labels = self.load_data(self.train_path)
        previous_labels = ["O"] + labels
        features = [self.features(words, previous_labels[i], i)
                    for i in range(len(words))]
        (m, n) = bound
        pdists = self.classifier.prob_classify_many(features[m:n])

        print('  Words          P(PERSON)  P(O)\n' + '-' * 40)
        for (word, label, pdist) in list(zip(words, labels, pdists))[m:n]:
            if label == 'PERSON':
                fmt = '  %-15s *%6.4f   %6.4f'
            else:
                fmt = '  %-15s  %6.4f  *%6.4f'
            print(fmt % (word, pdist.prob('PERSON'), pdist.prob('O')))

    def dump_model(self):
        with open('../model.pkl', 'wb') as f:
            pickle.dump(self.classifier, f)

    def load_model(self):
        with open('../model.pkl', 'rb') as f:
            self.classifier = pickle.load(f)

    def test_on_unseen(self, input_path):
        words = self.read_data(input_path)  # Ensure this method just reads words, modify if needed
        previous_label = "O"
        with open('group.1.out', 'w', encoding='utf-8') as file:
            for i, word in enumerate(words):
                features = self.features(words, previous_label, i)
                tag = self.classifier.classify(features)
                file.write(f"{word}\t{tag}\n")
                previous_label = tag  # Update label for next word

    def read_data(self, filename):
        words = []
        try:
            with open(filename, "r", encoding="utf-8") as file:
                for line in file:
                    word = line.strip()
                    if word:  # Ensure non-empty lines
                        words.append(word)
        except FileNotFoundError:
            print(f"File not found: {filename}")
        return words

    # ========= for web application, sentence input ================
    def predict_sentence(self, string):
        if string:
        # split sentence
            words = ['.'] + word_tokenize(string)
        # First word of the input sometimes not be predicted as person,
        #  adding '.' in front is to avoid this situation.
        # predict each word in sentence
            prev_label = ['O'] 
            for i in range(len(words)):
                prev_label.append('') #(unknown labels)
            features = [self.features(words, prev_label[i], i)
                        for i in range(len(words))]
            results = [self.classifier.classify(n) for n in features]
            #print(words[1:])
            #print(results[1:])
            result_list = []
            index = 0
            for i in range(1,(len(results))):
                result_list.append(words[i])
                result_list.append(results[i])
        else:
            result_list = []
        return result_list