package com.example.helloworld;

import java.io.*;
import java.util.Scanner;

public class Universe {

    public static void main(String[] args) {

        int[] count = new int[26];
        char[] alphabet = {'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'};
        for (int i=0; i<26; i++){
            count[i] = 0;
        }

        /*READ INPUT and output as a document
        try{
            BufferedWriter writer = new BufferedWriter(new FileWriter("output.txt"));
            writer.write("Writing to a File.");
            writer.write("\nHere is another line");
            writer.write("\nTesting Testing 123");
            writer.close();
        } catch (IOException e) {
            e.printStackTrace();
        }
        */

        //read document and print out//
        try {
            BufferedReader reader = new BufferedReader(new FileReader("output.txt"));
            String line;
            while ((line = reader.readLine()) != null) {
                //create array to store each alphabet//
                line = line.toLowerCase();
                char[] ch = line.toCharArray();
                //Record down the frequency //
                for (char c : ch) {
                    switch (c) {
                        case 'a':
                            count[0] = count[0] + 1;
                            break;
                        case 'b':
                            count[1] = count[1] + 1;
                            break;
                        case 'c':
                            count[2] = count[2] + 1;
                            break;
                        case 'd':
                            count[3] = count[3] + 1;
                            break;
                        case 'e':
                            count[4] = count[4] + 1;
                            break;
                        case 'f':
                            count[5] = count[5] + 1;
                            break;
                        case 'g':
                            count[6] = count[6] + 1;
                            break;
                        case 'h':
                            count[7] = count[7] + 1;
                            break;
                        case 'i':
                            count[8] = count[8] + 1;
                            break;
                        case 'j':
                            count[9] = count[9] + 1;
                            break;
                        case 'k':
                            count[10] = count[10] + 1;
                            break;
                        case 'l':
                            count[11] = count[11] + 1;
                            break;
                        case 'm':
                            count[12] = count[12] + 1;
                            break;
                        case 'n':
                            count[13] = count[13] + 1;
                            break;
                        case 'o':
                            count[14] = count[14] + 1;
                            break;
                        case 'p':
                            count[15] = count[15] + 1;
                            break;
                        case 'q':
                            count[16] = count[16] + 1;
                            break;
                        case 'r':
                            count[17] = count[17] + 1;
                            break;
                        case 's':
                            count[18] = count[18] + 1;
                            break;
                        case 't':
                            count[19] = count[19] + 1;
                            break;
                        case 'u':
                            count[20] = count[20] + 1;
                            break;
                        case 'v':
                            count[21] = count[21] + 1;
                            break;
                        case 'w':
                            count[22] = count[22] + 1;
                            break;
                        case 'x':
                            count[23] = count[23] + 1;
                            break;
                        case 'y':
                            count[24] = count[24] + 1;
                            break;
                        case 'z':
                            count[25] = count[25] + 1;
                            break;
                        default:
                            break;
                    }
                }
            } reader.close();
            } catch (IOException e){
            e.printStackTrace();
        }
        //print out frequency//
        System.out.println("The frequencies of each alphabet character that appears within document is : ");
        for (int i =0 ; i < 26 ; i++){
            System.out.println(alphabet[i] + " = " + count[i]);
        }
    }
}