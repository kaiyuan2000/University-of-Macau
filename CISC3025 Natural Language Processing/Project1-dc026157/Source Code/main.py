#!/usr/bin/env python3
# -*- coding:utf-8 -*-
# --------------------------------------------------
# Description:  A starter code
# --------------------------------------------------
# Author: Wang-SongSheng <wang.songsheng@connect.um.edu.mo>
# Created Date : March 4th 2021, 12:00:00
# --------------------------------------------------

import argparse, re

def word_edit_distance(x, y):
    def delete(a):
        return 1

    def insertion(a):
        return 1

    def substitute(a, b):
        if a == b:
            return 0
        else:
            return 2
    m, n = len(x), len(y)
    table = [[0] * (n + 1) for _ in range(m + 1)]
    backtrace = [[None] * (n + 1) for _ in range(m + 1)]

    for j in range(1, n + 1):
        table[0][j] = j * insertion(y[j - 1])  # Initialize first row with insertion cost
        backtrace[0][j] = 'I'
    for i in range(1, m + 1):
        table[i][0] = i * delete(x[i - 1])  # Initialize first column with deletion cost
        backtrace[i][0] = 'D'
        for j in range(1, n + 1):
            del_cost = table[i - 1][j] + delete(x[i - 1])
            ins_cost = table[i][j - 1] + insertion(y[j - 1])
            sub_cost = table[i - 1][j - 1] + substitute(x[i - 1], y[j - 1])
            if sub_cost <= del_cost and sub_cost <= ins_cost:  # Prefer substitution
                table[i][j] = sub_cost
                backtrace[i][j] = 'S'
            elif del_cost < ins_cost:
                table[i][j] = del_cost
                backtrace[i][j] = 'D'
            else:
                table[i][j] = ins_cost
                backtrace[i][j] = 'I'

    # Reconstruct alignment
    alignX, alignY = [], []
    i, j = m, n
    while i > 0 or j > 0:
        if backtrace[i][j] == 'S':
            alignX.append(x[i - 1])
            alignY.append(y[j - 1])
            i -= 1
            j -= 1
        elif backtrace[i][j] == 'D':
            alignX.append(x[i - 1])
            alignY.append('-')
            i -= 1
        else:  # 'I'
            alignX.append('-')
            alignY.append(y[j - 1])
            j -= 1

    alignX.reverse()
    alignY.reverse()

    edit_distance = table[m][n]
    alignment = [alignX,
                 alignY
                 ]

    return edit_distance, alignment

def sentence_edit_distance(x, y):
    def word_delete(word):
        return 1  # Cost of deleting a word

    def word_insert(word):
        return 1  # Cost of inserting a word

    def word_substitute(word1, word2):
        if word1 == word2:
            return 0
        else:
            return 2

    # Assume x and y are already tokenized lists of words from sentence_preprocess
    x_words = x
    y_words = y

    m, n = len(x_words), len(y_words)
    table = [[0] * (n + 1) for _ in range(m + 1)]
    backtrace = [[None] * (n + 1) for _ in range(m + 1)]

    for j in range(1, n + 1):
        table[0][j] = j * word_insert(y_words[j - 1])
        backtrace[0][j] = 'I'  # I for Insertion
    for i in range(1, m + 1):
        table[i][0] = i * word_delete(x_words[i - 1])
        backtrace[i][0] = 'D'  # D for Deletion
        for j in range(1, n + 1):
            del_cost = table[i - 1][j] + word_delete(x_words[i - 1])
            ins_cost = table[i][j - 1] + word_insert(y_words[j - 1])
            sub_cost = table[i - 1][j - 1] + word_substitute(x_words[i - 1], y_words[j - 1])
            if sub_cost <= del_cost and sub_cost <= ins_cost:
                table[i][j] = sub_cost
                backtrace[i][j] = 'S'  # S for Substitution
            elif del_cost < ins_cost:
                table[i][j] = del_cost
                backtrace[i][j] = 'D'
            else:
                table[i][j] = ins_cost
                backtrace[i][j] = 'I'

    # Reconstruct alignment
    alignX, alignY = [], []
    i, j = m, n
    while i > 0 or j > 0:
        if backtrace[i][j] == 'S':
            alignX.append(x_words[i - 1])
            alignY.append(y_words[j - 1])
            i -= 1
            j -= 1
        elif backtrace[i][j] == 'D':
            alignX.append(x_words[i - 1])
            alignY.append('-')
            i -= 1
        else:  # 'I'
            alignX.append('-')
            alignY.append(y_words[j - 1])
            j -= 1

    alignX.reverse()
    alignY.reverse()

    alignment = [alignX, alignY]

    return table[m][n], alignment

def sentence_preprocess(sentence):
    # Tokenize the sentence into words and punctuation
    tokens = re.findall(r'\w+|[^\w\s]', sentence, re.UNICODE)
    return tokens

def output_alignment(alignment):
    #output the alignment in the format required
    if len(alignment[0]) != len(alignment[1]):
        print('ERROR: WRONG ALIGNMENT FORMAT')
        input()
        exit(0)
    print('An possible alignment is:')
    merged_matrix = alignment[0] + alignment[1]
    max_len = 0
    for item in merged_matrix:
        if len(item) > max_len:
            max_len = len(item)
    for i in range(len(alignment[0])):
        print (alignment[0][i].rjust(max_len)+' ',end=''),
    print('')
    for i in range(len(alignment[0])):
        print (('|').rjust(max_len) + ' ',end=''),
    print('')
    for i in range(len(alignment[1])):
        print (alignment[1][i].rjust(max_len)+' ',end='')
    print('')
    return

def batch_word(inputfile, outputfile):
    reference = None
    with open(inputfile, 'r') as infile, open(outputfile, 'w') as outfile:
        for line in infile:
            label, word = line.strip().split()
            if label == 'R':
                reference = word
                outfile.write(f'R {word}\n')
            elif label == 'H' and reference is not None:
                distance,alignment = word_edit_distance(reference, word)
                outfile.write(f'H {word} {distance}\n')
    return

def batch_sentence(inputfile, outputfile):
    reference = None
    with open(inputfile, 'r') as infile, open(outputfile, 'w') as outfile:
        for line in infile:
            line = line.strip()
            if not line:
                continue  # Skip empty lines
            label, sentence = line.split(maxsplit=1)

            if label == 'R':
                reference = sentence
                outfile.write(f'R {sentence}\n')
            elif label == 'H' and reference is not None:
                distance,alignment = sentence_edit_distance(sentence_preprocess(reference), sentence_preprocess(sentence))
                outfile.write(f'H {sentence} {distance}\n')
    return

def main():
    ''' Main Function '''

    parser = argparse.ArgumentParser()
    parser.add_argument('-w', '--word',type=str,nargs=2,help='word comparson')
    parser.add_argument('-s','--sentence',type=str,nargs=2,help='sentence comparison')
    parser.add_argument('-bw','--batch_word',type=str,nargs=2,help='batch word comparison,input the filename')
    parser.add_argument('-bs','--batch_sentence',type=str,nargs=2,help='batch word comparison,input the filename')

    opt=parser.parse_args()

    if(opt.word):
        edit_distance,alignment = word_edit_distance(opt.word[0],opt.word[1])
        print('The cost is: '+str(edit_distance))
        output_alignment(alignment)
    elif(opt.sentence):
        edit_distance,alignment = sentence_edit_distance(sentence_preprocess(opt.sentence[0]),sentence_preprocess(opt.sentence[1]))
        print('The cost is: '+str(edit_distance))
        output_alignment(alignment)
    elif(opt.batch_word):
        batch_word(opt.batch_word[0],opt.batch_word[1])
    elif(opt.batch_sentence):
        batch_sentence(opt.batch_sentence[0],opt.batch_sentence[1])

# if __name__ == '__main__':
#     import os
#     main()

#=====testing=====
x = "I LOVE NATURAL LANGUAGE PROCESSING."
y = "I ENJOY NATURAL LANGUAGE PROCESSING ALSO."
distance, alignment = sentence_edit_distance(sentence_preprocess(x),sentence_preprocess(y))
print(f"Cost between {x} & {y} is {distance}.")
output_alignment(alignment)