//Implement a prioprity queue using a sorted doubly linked list
#include <cstdio>
#include <vector>
#include <iostream>
#include <algorithm>
#include <stdexcept>
using namespace std;

struct Node {     // node of a doubly linked list
    int val;    // value stored at the node
    struct Node* next; // link to the next node
    struct Node* prev; // link to the previous node
    Node(int x) // initialize a new node
    {
        val = x;
        next = NULL;
        prev = NULL;
    }
};

class SortedPQ {

private:
    Node* head;
    Node* tail;
    int length;     // store the size of priority queue

public:
    SortedPQ() {    // initialize an empty priority queue with a head and a tail of an empty doubly linked list
        head = new Node(NULL);
        tail = new Node(NULL);
        head->next = tail; //link between head and tail
        tail->prev = head;
        length = 0;
    }

    void insert(int val)
    {
        Node* newNode = new Node(val);
        if (head->next == tail || head->next->val >= newNode->val) {
            newNode->prev = head;
            newNode->next = head->next;
            head->next->prev = newNode;
            head->next = newNode;
        }
        else
        {
            Node* now;
            now = head;
            while (now->next != tail and now->next->val < newNode->val) {
                now = now->next;
            }
           
            newNode->prev = now;
            newNode->next = now->next;
            now->next->prev = newNode;
            now->next = newNode;
        }
        length++;
    }

    Node* min()
    {
        if (length == 0){
            cout << "It's empty";
            return head;
        }
        return head->next;
    }

    void removeMin()
    {
        if (length == 0){
            cout << "It's Empty.";
            return;
        }
        
        head->next = head->next->next;
        head->next->prev = head;
        length--;
    }

    int size() {
        return length;
    }

    bool isEmpty() {
        return (length == 0);
    }

    void printPQ() {
        cout << "List of elements in the priority queue: ";
        Node* temp = head->next;
        while (temp != tail) {         // print the value of each element one-by-one
            cout << temp->val << " ";
            temp = temp->next;
        }
        cout << endl;     // end the line
    }
};


int main() {
    SortedPQ pq;
    pq.insert(5);
    pq.printPQ();

    pq.insert(9);
    pq.printPQ();

    pq.insert(2);
    pq.printPQ();

    pq.insert(7);
    pq.printPQ();

    cout << "The minimum element in the priority queue is: " << pq.min()->val << endl;
    pq.removeMin();
    pq.printPQ();

    cout << "The size of the priority queue is: " << pq.size() << endl;
    pq.removeMin();
    pq.removeMin();
    pq.removeMin();
    pq.removeMin();

    cout << "The priority queue is empty: "<< boolalpha << pq.isEmpty() << endl;
    
    // sorting using priority queue
    int A[10] = {12, 8, 40, 6, 25, 81, 30, 4, 15, 2 };     // given an arry A with 10 numbers
    int B[10]; // sort the numbers into another array B
    int i = 0;
    for (int i = 0; i < 10; i++) {
        pq.insert(A[i]);
        pq.printPQ();
    }
    for (int i = 0; i < 10; i++) {
        B[i] = pq.min()->val;
        pq.removeMin();
        pq.printPQ();
    }
    for (int i = 0; i < 10; i++) { //print the array B
        cout << B[i] << " ";
    }
    
      return 0;
}

