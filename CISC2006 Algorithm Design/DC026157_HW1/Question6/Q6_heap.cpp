#include <iostream>
#include <vector>
#include <algorithm>
#include <stdexcept>
using namespace std;

// Data structure to store a min-heap node
class Heap{
private:
    // vector to store heap elements
    vector<int> A;

    // return parent of `A[i]`
    int PARENT(int i) {
        if (i == 0)
            return i;
        return (i - 1) / 2;
    }

    // return left child of `A[i]`
    int LEFT(int i) {
        return (2 * i + 1);
    }

    // return right child of `A[i]`
    int RIGHT(int i) {
        return (2 * i + 2);
    }
    
    void up_bubbling(int i){
        if (A[PARENT(i)]>A[i]){
            swap(A[PARENT(i)],A[i]);
            up_bubbling(PARENT(i));
        }
    }
    
    void down_bubbling(int i){ //logic is to use the index (because index never chg) to do bubbling
        int left = LEFT(i);
        int right = RIGHT(i);
        int smaller = i;
        
        if (A[left]<A[i] && left < size()){
            smaller = left;
        }
        
        if (A[right]<A[smaller]&& right < size()){
            smaller = right;
        }
        
        if (smaller != i){
            swap(A[i],A[smaller]);
            down_bubbling(smaller); //smaller is index position
        }
    }

public:
    // return size of the heap
    unsigned int size() {
        return A.size();
    }

    // function to check if the heap is empty or not
    bool isEmpty() {
        return (size() == 0);
    }

    // insert key into the heap
    void insert(int key) {
        A.push_back(key);
        int index = size() - 1;
        up_bubbling(index);
    }

    // Function to remove an element with the lowest priority (present at the root)
    void removeMin() {
        if (size() == 0) {
            cout << "It's Empty";}
        else {
            A[0] = A.back();
            A.pop_back();
            down_bubbling(0);}
    }

    // Function to return an element with the lowest priority (present at the root)
    int min(){
        if (size() == 0){
            cout << "It's Empty";
            return -1;}
        else{
            return A[0];}
        
    }

    void printPQ() {
        cout << "List of elements in the priority queue: ";
        int i = 0;
        while (i < size()) {
            cout << A[i] << ' ';
            i++;
        }
        cout << endl;
    }
};

int main() {
    Heap pq;
    pq.insert(5);
    pq.printPQ();

    pq.insert(9);
    pq.printPQ();

    pq.insert(2);
    pq.printPQ();

    pq.insert(7);
    pq.printPQ();

    cout << "The minimum element in priority queue is " << pq.min() << endl;
    pq.removeMin();
    pq.printPQ();

    cout << "The size of the priority queue is " << pq.size() << endl;
    pq.removeMin();
    pq.removeMin();
    pq.removeMin();
    pq.removeMin();

    cout << "The priority queue is empty: " << boolalpha << pq.isEmpty() << endl;
    
    // sorting using priority queue
    int A[10] = {12, 8, 40, 6, 25, 81, 30, 4, 15, 2 };     // given an arry A with 10 numbers
    int B[10]; // sort the numbers into another array B
    int i = 0;
    for (int i = 0; i < 10; i++) {
        pq.insert(A[i]);
        pq.printPQ();
    }
    for (int i = 0; i < 10; i++) {
        B[i] = pq.min();
        pq.removeMin();
        pq.printPQ();
    }
    for (int i = 0; i < 10; i++) { //print the array B
        cout << B[i] << " ";
    }
    
      return 0;
}
