#include <cstdio>
#include <vector>
#include <iostream>
#include <algorithm>
#include <stdexcept>
#include <cstdlib>
#include <fstream>
#include <time.h>
#include <random>

using namespace std;

void swap(int* a, int* b)
{
    int temp;
    temp = *a;
    *a = *b;
    *b = temp;
}

void InsertionSort(int* num, int n)
{
    int i, j, temp;
    for(i = 1; i < n; i++){
        temp = num[i];
        j = i - 1;
        while(j >= 0 && num[j] > temp){
            num[j + 1] = num[j];
            j--;
        }
        num[j+1] = temp;
    }
}

void BubbleSort(int* num, int n)
{
    int i, j, temp;
    for(i = 0; i < n-1; i++){
        for(j = 0; j < n-i-1; j++){
            if(num[j] > num[j+1]){
                swap(&num[j], &num[j+1]);
            }
        }
    }
}

void SelectionSort(int* num, int n)
{
    int i, j;
    for(i = 0; i < n; i++){
        for(j = i+1; j < n; j++){
            if(num[j] < num[i]){
                swap(&num[j], &num[i]);
            }
        }
    }
}

void Heap_build(int a[], int root, int length)  
{
    int lchild = root*2+1;
    if (lchild < length)
    {
        int max_val = lchild;
        int rchild = lchild+1;
        if (rchild < length)
        {
            if (a[rchild] > a[max_val])  // find the larger value of the two children
            {
                max_val = rchild;
            }
        }
        if (a[root] < a[max_val])  // put the larger value to the parent node
        {
            swap(a[root],a[max_val]);
            Heap_build(a,max_val,length); // recursive fix of the heap-order property
        }
    }
}

void HeapSort(int* a,int len)
{
    for (int i = (len-1)/2; i >= 0; --i) // create heap from the last internal node
    {
        Heap_build(a,i,len);
    }

    for (int j = len-1; j > 0; --j) // j is the length of array (need to reconstruct)
    {
        swap(a[0],a[j]); // put the larger value to the last position of the array
        Heap_build(a,0,j); // remove the element at the last position and rebuild the heap
    }
}

void Merge(int* num, int* L, int lenL, int* R, int lenR)
{
    int i = 0, j = 0, k = 0;
    while(i < lenL && j < lenR){
        if(L[i] < R[j]){
            num[k++] = L[i++];
        }
        else{
            num[k++] = R[j++];
        }
    }
    while(i < lenL){
        num[k++] = L[i++];
    }
    while(j < lenR){
        num[k++] = R[j++];
    }
}

void MergeSort(int* num, int n)
{
    int i, j;
    if(n > 1){
        int middle = n / 2;
        int *right_sub = new int [n-middle];
        int *left_sub = new int [middle];
        for(i = 0; i < middle; i++){
            left_sub[i] = num[i];
        }
        for(i = middle; i < n; i++){
            right_sub[i - middle] = num[i];
        }
        MergeSort(left_sub, middle);
        MergeSort(right_sub, n - middle);
        Merge(num, left_sub, middle, right_sub, n-middle);
    }
}

int PickPivot(int* num, int low, int high)  // Pick 3 numbers at random and take the medium value
{
    if(high - low < 30){
        return low;
    }
    int a[3], index[3];
    int length = high - low + 1;
    for(int i = 0; i < 3; i++){
        index[i] = low + rand() % length;
        a[i] = num[index[i]];
    }
    InsertionSort(a, 3);
    for(int i = 0; i < 3; i++){
        if (num[index[i]] == a[1]){
            return index[i];
        }
    }
    return 0 ;
}

void QuickSort(int* num, int low, int high)
{
    if(low >= high){
        return ;
    }
    int pivotIndex = PickPivot(num, low, high);
    int pivot = num[pivotIndex];
    int changeIndex = pivotIndex;
    int i = low, j = high;

    while(i < j){
        while(i < j && num[j] > pivot) j--;
        if(i < j){
            num[changeIndex] = num[j];
            changeIndex = j;
        }
        while(i < j && num[i] <= pivot) i++;
        if(i < j){
            num[changeIndex] = num[i];
            changeIndex = i;
        }
    }
    num[i] = pivot;
    QuickSort(num, low, i - 1);
    QuickSort(num, i + 1, high);
}

void print(int* num, int length)
{
    for(int i = 0; i < length; i++)
        cout << num[i] << " ";
    cout<<endl;
}

int main()
{
    clock_t Start_time, End_time;
    const int Len = 100000;
    int num[Len], k = 0, new_num, a[Len], length;

    ifstream arr;
    arr.open("input.txt");

    if (!arr) {
        cout << "Unable to open file !"<<endl;
        return -1;
    }

    while (arr >> new_num) {
        a[k++] = new_num;
    }
    length = k;
    cout<<"Reading of array finished, "<<length<<" elements found."<<endl;


    cout<<"\n-------Sorting using InsertionSort-------"<<endl;
    for(int i = 0; i < length; i++){
        num[i] = a[i];
    }
    Start_time = clock();
    InsertionSort(num, length);
    End_time = clock();
    cout<<"The running time of InsertionSort is: "<<static_cast<double>(End_time-Start_time)/CLOCKS_PER_SEC*1000<<" ms"<<endl;
    cout<<"The first 20 elements are : ";
    print(num, min(20, length));


    cout<<"\n-------Sorting using BubbleSort-------"<<endl;
    for(int i = 0; i < length; i++){
        num[i] = a[i];
    }
    Start_time = clock();
    BubbleSort(num, length);
    End_time = clock();
    cout<<"The running time of BubbleSort is: "<<static_cast<double>(End_time-Start_time)/CLOCKS_PER_SEC*1000<<" ms"<<endl;
    cout<<"The first 20 elements are : ";
    print(num, min(20, length));


    cout<<"\n-------Sorting using SelectionSort-------"<<endl;
    for(int i = 0; i < length; i++){
        num[i] = a[i];
    }
    Start_time = clock();
    SelectionSort(num, length);
    End_time = clock();
    cout<<"Total running time SelectionSort is: "<<static_cast<double>(End_time-Start_time)/CLOCKS_PER_SEC*1000<<" ms"<<endl;
    cout<<"The first 20 elements are : ";
    print(num, min(20, length));


    cout<<"\n-------Sorting using HeapSort-------"<<endl;
    for(int i = 0; i < length; i++){
        num[i] = a[i];
    }
    Start_time = clock();
    HeapSort(num, length);
    End_time = clock();
    cout<<"Total running time HeapSort is: "<<static_cast<double>(End_time-Start_time)/CLOCKS_PER_SEC*1000<<" ms"<<endl;
    cout<<"The first 20 elements are : ";
    print(num, min(20, length));


    cout<<"\n-------Sorting using MergeSort-------"<<endl;
    for(int i = 0; i < length; i++){
        num[i] = a[i];
    }
    Start_time = clock();
    MergeSort(num, length);
    End_time = clock();
    cout<<"Total running time MergeSort is: "<<static_cast<double>(End_time-Start_time)/CLOCKS_PER_SEC*1000<<" ms"<<endl;
    cout<<"The first 20 elements are : ";
    print(num, min(20, length));


    cout<<"\n-------Sorting using QuickSort-------"<<endl;
    for(int i = 0; i < length; i++){
        num[i] = a[i];
    }
    Start_time = clock();
    QuickSort(num, 0, length - 1);
    End_time = clock();
    cout<<"Total running time QuickSort is: "<<static_cast<double>(End_time-Start_time)/CLOCKS_PER_SEC*1000<<" ms"<<endl;
    cout<<"The first 20 elements are : ";
    print(num, min(20, length));

    return 0;
}
