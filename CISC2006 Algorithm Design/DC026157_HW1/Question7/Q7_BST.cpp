// ONLY DO BST, no do AVL

#include <cstdio>
#include <iostream>
#include <fstream>
#include <algorithm>
using namespace std;

//Implement a BST without height balance property
class BST
{
private:
    struct Node { //node of a BST tree
        int key; //key stored in the node
        Node* left; //link to the left child
        Node* right;  //link to the right child
        Node(int x) //initialize a new node
        {
            key = x;
            left = NULL;
            right = NULL;
        }
    };

public:
    Node* root; //store the root of BST
    int size_of_tree;
    BST() { //initialize an empty BST with a null root
        root = NULL;
        size_of_tree = 0;
    }

    void insert(int k)
    {
        Node* newNode = new Node(k);
        if (root == NULL) {
            root = newNode;
        }
        else {
            Node* prev = NULL;
            Node* temp = root;
            while (temp != NULL) {
                if (temp->key > k) {
                    prev = temp;
                    temp = temp->left;
                }
                else if (temp->key < k) {
                    prev = temp;
                    temp = temp->right;
                }
            }
            if (prev->key > k) {
                prev->left = newNode;
            }
            else if (prev->key < k) {
                prev->right = newNode;
            }
        }
        size_of_tree++;
    }

    Node* find(Node* node, int k)
    {
        if (node) {
            if (k == node->key)
                return node;
            else if ((k > node->key))
                return find(node->right, k);
            else
                return find(node->left, k);
        }
        else {
            cout << "Searching failed: no element is found!" << endl;
            return NULL;
        }
    }

    Node* find(int k)
    {
        return find(root, k);
    }

    Node* minNode(Node* node)
    {
        Node* now = node;
        if (node == NULL) {
            cout << "Min value node not found: empty BST!" << endl;
        }
        /* loop down to find the leftmost leaf */
        while (now && now->left != NULL)
            now = now->left;
        return now;
    }

    Node* deleteNode(Node* root, int k)
    {
        // Base case
        if (root == NULL)
            return root;

        if (root->key > k) {
            root->left = deleteNode(root->left, k);
            return root;
        }
        else if (root->key < k) {
            root->right = deleteNode(root->right, k);
            return root;
        }

        //  root has at most only one child
        if (root->left == NULL) {
            Node* temp = root->right;
            delete root;
            return temp;
        }
        else if (root->right == NULL) {
            Node* temp = root->left;
            delete root;
            return temp;
        }

        //  root has two children
        else {
            Node* sParent = root;

            Node* successor = root->right;
            while (successor->left != NULL) {
                sParent = successor;
                successor = successor->left;
            }

            if (sParent != root)
                sParent->left = successor->right;
            else
                sParent->right = successor->right;

            // Copy successor Data to root
            root->key = successor->key;

            // Delete Successor and return root
            delete successor;
            return root;
        }
    }

    void remove(int k)
    {
        if (find(k) != NULL)
        {
            root = deleteNode(root, k);
            size_of_tree--;
        }
        else
            cout << "Deletion failed: no such element is found!" << endl;
    }

    void remove(Node* p)
    {
        if (p != NULL)
        {
            root = deleteNode(root, p->key);
            size_of_tree--;
        }
        else
            cout << "Deletion failed: empty pointer!" << endl;
    }

    int size()
    {
        return size_of_tree;
    }

    bool isEmpty()
    {
        return (root == NULL);
    }

    void printTree(string prefix, Node* node, bool isRight)
    {
        if (node != NULL) {
            cout << prefix; //print the blank space before the node
            cout << (isRight ? "---" : "|__"); //depend on whether the node is a right child, print different labels
            cout << node->key << endl; // print the value of the node
            // enter the next tree level - left and right branch
            printTree(prefix + (isRight ? "|   " : "    "), node->right, true);
            printTree(prefix + (isRight ? "|   " : "    "), node->left, false);
        }
    }

    void printTree()
    { //print the tree from the root
        printTree("", root, false);
    }
};

int main() {
    BST bstree; //build an empty BST
    cout << "The BST tree is empty: " << boolalpha << bstree.isEmpty() << endl; //check if the three is empty

    int a; //insert elements in A to the BST and the AVL tree
    ifstream arrA;
    arrA.open("testA.txt");
    if (!arrA) {
        cout << "Unable to open file!" << endl;
    }
    while (arrA >> a) {
        bstree.insert(a);
    }
    cout << "The insertions of elements are done!" << endl;

    cout << "The BST is printed as follows:" << endl; //print BST tree
    bstree.printTree();

    int b; //remove all the elements in array B from the BST and the AVL tree
    ifstream arrB;
    arrB.open("testB.txt");
    if (!arrB) {
        cout << "Unable to open file!" << endl;
    }
    while (arrB >> b) {
        bstree.remove(b);
    }
    cout << "The removals of elements are done!" << endl;

    cout << "The BST is printed as follows:" << endl; //print BST after removals
    bstree.printTree();

    cout << "Next we find the element with key=6 in both trees, and remove it:" << endl;
    bstree.remove(bstree.find(6)); //removal of element by pointer

    cout << "The BST is printed as follows:" << endl; //print BST after the removal
    bstree.printTree();

    cout << "The size of the BST is " << bstree.size() << endl;
    cout << "The BST tree is empty: " << boolalpha << bstree.isEmpty() << endl;
}
