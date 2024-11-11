#include <cstdio>
#include <vector>
#include <iostream>
#include <algorithm>
#include <stdexcept>
#include <cstdlib>
#include <fstream>
#include <time.h>

using namespace std;

int BruteForce(string T, string P)   // T is text string, P is pattern string
{
    int length_T = T.size();
    int length_P = P.size();
    for(int i = 0; i <= length_T - length_P; i++){
        int flag = true;
        for(int j = 0; j < length_P; j++)
            if(T[i+j] != P[j]){
                flag = false;
                break;
            }
        if(flag) {
            return i;
        }
    }
    return -1;
}

void computeFailureFunction(string P, int* f)  // compute the failure function on P
{
    int length_P = P.length();
    int i = 1, j = 0;
    f[0] = 0;
    while(i < length_P){
        if(P[i] == P[j])
            f[i++] = ++j;
        else{
            if(j == 0)
                f[i++] = 0;
            else
                j = f[j - 1];
        }
    }
}

int KMP(string T, string P)
{
    int length_T = T.size(), length_P = P.size();
    int f[length_P];
    int i = 0, j = 0;
    computeFailureFunction(P, f);

    while(i < length_T){
        if(T[i] == P[j]){
            if(j == length_P - 1)
                return i - length_P + 1;
            else {
                i++;
                j++;
            }
        }
        else{
            if(j == 0)
                i++;
            else
                j = f[j - 1];
        }
    }
    return -1;
}

int main() {
    clock_t Start_time, End_time;
    const int n = 200000, t = 8;
    string str;
    string p[t] = {"AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABBBBBBCCCCCCCCCCCCCCC",
                   "FJZRVSAMACSRXNTGGVVKTFXBWYDTQJMJTF",
                   "CCCCCCCCCCCCCCCAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABBBBB",
                   "AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABBBBBBCCCCCCCCCZYOENZLXS",
                   "AAAAAAAAAAAAAAAAAAAAAAAAABC",
                   "NWYWCRGBGECHHROVBRHLJXHLHPPLAYOLJO",
                   "AAABBBBBBCCCCCCCCCCAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABBBBBBCCCCCCCCCCAAA",
                   "AAABBBBBBCCCCCCCCCCAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABBBBBBCCCCCCCCCCAAB"
    };

    ifstream arr;
    arr.open("string.txt");
    if (!arr) {
        cout << "Unable to open file !"<<endl;
        return -1;
    }

    char c;
    int k = 0, result;
    while (arr >> c) {  // load string from input file
        str += c;
        k++;
    }
    cout << "Reading of string T finished. Length = " << k << endl;

    for(int i = 0; i < t; i++){
        cout << "\n-------String Matching (Round-" << i+1 << ")-------" << endl;
        cout << "P = " << p[i] << endl << endl;

        cout << "using BruteForce algorithm" << endl;
        Start_time = clock();
        result = BruteForce(str, p[i]);
        if(result == -1)
            cout << " P is not a sub-string of T" << endl;
        else
            cout << " P = T[" << result << ", " << result+p[i].size()-1 << "]" << endl;
        End_time = clock();
        cout<<" running time: "<<static_cast<double>(End_time-Start_time)/CLOCKS_PER_SEC*1000<<" ms"<<endl;

        cout << "using KMP algorithm" << endl;
        Start_time = clock();
        result = KMP(str, p[i]);
        if(result == -1)
            cout << " P is not a sub-string of T" << endl;
        else
            cout << " P = T[" << result << ", " << result+p[i].size()-1 << "]" << endl;
        End_time = clock();
        cout<<" running time: "<<static_cast<double>(End_time-Start_time)/CLOCKS_PER_SEC*1000<<" ms"<<endl;
    }

    return 0;
}

