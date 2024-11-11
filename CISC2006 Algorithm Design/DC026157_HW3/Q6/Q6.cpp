#include <cstdio>
#include <vector>
#include <iostream>
#include <algorithm>
#include <stdexcept>
#include <cstdlib>
#include <fstream>
#include <time.h>

using namespace std;

struct Item
{
    int id;
    int val;
    int size;
};

void Knapsack_DP(Item items[], int n, int C)
{
    int i, j, dp[n + 1][C + 1];
    bool t[n + 1][C + 1]; // direction of recursion, True means selecting the item
    int solution[n + 1]; // the collection of items in the solution

    for(i = 0; i <= n; i++)
        for(j = 0; j <= C; j++) {
            dp[i][j] = 0;
            t[i][j] = false;
        }

    for(i = 1; i <= n; i++)
        for(j = 0; j <= C; j++){
            if(j >= items[i-1].size && dp[i-1][j-items[i-1].size] + items[i-1].val >= dp[i-1][j]){
                dp[i][j] = dp[i-1][j-items[i-1].size] + items[i-1].val;
                t[i][j] = true;
            }
            else
                dp[i][j] = dp[i-1][j];
        }

    int m = C, k = 0;
    j = n;
    while(m > 0 && j > 0){
        if(t[j][m]){
            solution[k++] = items[j-1].id;
            m -= items[j-1].size;
        }
        j--;
    }
    sort(solution, solution + k);
    cout << "The optimal solution is: ";

    for(i = 0; i < k; i++){
        cout << solution[i] << " ";
    }
    cout << endl;
    cout << "The optimal objective is: " << dp[n][C] << endl;
}

bool cmp_value(Item a, Item b){
    if(a.val != b.val)
        return a.val > b.val;
    return a.size < b.size;
}

bool cmp_size(Item a, Item b){
    if(a.size != b.size)
        return b.size > a.size;
    return b.val < a.val;
}

bool cmp_density(Item a, Item b){
    return b.val/b.size < a.val/a.size;
}

void GreedyMaxValue(Item items[], int n, int C){
    int i, j = 0;
    int c = C, k = 0, total_val = 0;
    int solution[n];

    sort(items, items + n, cmp_value);

    while(j < n){
        if(c >= items[j].size){
            solution[k++] = items[j].id;
            total_val += items[j].val;
            c -= items[j].size;
        }
        j++;
    }
    cout << "The solution is: ";

    sort(solution, solution + k);
    for(i = 0; i < k; i++){
        cout << solution[i] << " ";
    }
    cout << endl;
    cout << "The objective is: " << total_val << endl;
}

void GreedyMinSize(Item items[], int n, int C){
    int i, j = 0;
    int c = C, k = 0, total_val = 0;
    int solution[n];

    sort(items, items + n, cmp_size);

    while(j < n){
        if(c >= items[j].size){
            solution[k++] = items[j].id;
            total_val += items[j].val;
            c -= items[j].size;
        }
        j++;
    }
    cout << "The solution is: ";
    sort(solution, solution + k);
    for(i = 0; i < k; i++){
        cout << solution[i] << " ";
    }
    cout << endl;
    cout << "The objective is: " << total_val << endl;
}

void GreedyMaxDensity(Item items[], int n, int C){
    int i, j = 0;
    int c = C, k = 0, total_val = 0;
    int solution[n];

    sort(items, items + n, cmp_density);

    while(j < n){
        if(c >= items[j].size){
            solution[k++] = items[j].id;
            total_val += items[j].val;
            c -= items[j].size;
        }
        j++;
    }
    cout << "The solution is: ";
    sort(solution, solution + k);
    for(i = 0; i < k; i++){
        cout << solution[i] << " ";
    }
    cout << endl;
    cout << "The objective is: " << total_val << endl;
}


int main() {
    clock_t Start_time, End_time;
    const int n = 100; // n items, capacity = 300
    int length, C = 300;

    int total = 2, i = 1;
    while(i <= total) {
        string filename = "input" + to_string(i) + ".txt";
        cout << endl << "-------------------The result for " + filename + "-------------------" << endl << endl;

        ifstream arr;
        arr.open(filename);
        i++;

        if (!arr) {
            cout << "Unable to open file !" << endl;
            return -1;
        }
        int id, value, size;
        struct Item items[n];
        int k = 0;
        while (arr >> id >> value >> size) {
            items[k].id = id;
            items[k].val = value;
            items[k].size = size;
            k++;
        }

        length = k;
        cout << "Reading of array finished, " << length << " items found." << endl;

        cout << "\n-------Knapsack using Dynamic Programming-------" << endl;
        Start_time = clock();
        Knapsack_DP(items, length, C);
        End_time = clock();
        cout << "The running time is: " << static_cast<double>(End_time - Start_time) / CLOCKS_PER_SEC * 1000 << " ms"
             << endl;

        cout << "\n-------Knapsack using Greedy with maximum value first------" << endl;
        Start_time = clock();
        GreedyMaxValue(items, length, C);
        End_time = clock();
        cout << "The running time is: " << static_cast<double>(End_time - Start_time) / CLOCKS_PER_SEC * 1000 << " ms"
             << endl;

        cout << "\n-------Knapsack using Greedy with minimum size first------" << endl;
        Start_time = clock();
        GreedyMinSize(items, length, C);
        End_time = clock();
        cout << "The running time is: " << static_cast<double>(End_time - Start_time) / CLOCKS_PER_SEC * 1000 << " ms"
             << endl;

        cout << "\n-------Knapsack using Greedy with maximum density first------" << endl;
        Start_time = clock();
        GreedyMaxDensity(items, length, C);
        End_time = clock();
        cout << "The running time is: " << static_cast<double>(End_time - Start_time) / CLOCKS_PER_SEC * 1000 << " ms"
             << endl;
    }
    return 0;
}
