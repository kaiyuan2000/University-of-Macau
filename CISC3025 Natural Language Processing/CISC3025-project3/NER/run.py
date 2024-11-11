#!/usr/bin/env python3
# -*- coding:utf-8 -*-
# --------------------------------------------------
# Description:
# --------------------------------------------------
# Author: Du-Haihua <mb75481@um.edu.mo>
# Created Date : April 3rd 2020, 12:05:49
# Last Modified: April 4th 2020, 10:59:35
# --------------------------------------------------

import argparse
from MEM import MEMM

def main():

    classifier = MEMM()

    if arg.train:
        classifier.max_iter = MAX_ITER
        classifier.train()
        classifier.dump_model()
    if arg.dev:
        try:
            classifier.load_model()
            classifier.beta = BETA
            classifier.test()
        except Exception as e:
            print(e)
    if arg.show:
        try:
            classifier.load_model()
            classifier.show_samples(BOUND)
        except Exception as e:
            print(e)
    if arg.test:
        try:
            classifier.load_model()
            classifier.test_on_unseen(arg.test)  # Add the method to run on the Meta-Test.txt
        except Exception as e:
            print(e)


if __name__ == '__main__':

    parser = argparse.ArgumentParser()
    parser.add_argument('-t', '--train', nargs='?', const=True, default=False)
    parser.add_argument('-d', '--dev', nargs='?', const=True, default=False)
    parser.add_argument('-s', '--show', nargs='?', const=True, default=False)
    parser.add_argument('-u', '--test', help="Run on test data", default=None)
    arg = parser.parse_args()

    #====== Customization ======
    BETA = 0.5
    MAX_ITER = 20
    BOUND = (0, 20)
    #==========================

    main()
