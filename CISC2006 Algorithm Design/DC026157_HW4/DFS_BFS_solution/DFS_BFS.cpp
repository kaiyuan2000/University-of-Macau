
#include <cstdio>
#include <vector>
#include <iostream>
#include <algorithm>
#include <stdexcept>
#include <cstdlib>
#include <fstream>
#include <queue>

using namespace std;

struct Edge{
    int endpoint1;
    int endpoint2;
    int weight;
    struct Edge* next;
    Edge(int u, int v)
    {
        endpoint1 = u;
        endpoint2 = v;
        weight = 1;
        next = NULL;
    }
    int opposite(int u){
        if (endpoint1 == u){
            return endpoint2;
        }
        else{
            return endpoint1;
        }
    }
};

int visited_dfs[100], visited_bfs[100];
Edge* incidentEdges[100];
queue<int> q;

void DFS(int u){        //Depth First Search
    cout << u << " ";
    visited_dfs[u] = 1;
    Edge* current = incidentEdges[u];
    while(current != NULL){
        int v = current->opposite(u);
        if(visited_dfs[v] == 0){
            DFS(v);
        }
        current = current->next;
    }
}

void BFS(int u){        //Breadth First Search
    q.push(u);
    visited_bfs[u] = 1;
    while(q.size()){
        u = q.front();
        cout << u << " ";
        q.pop();
        Edge* current = incidentEdges[u];
        while(current != NULL){
            int v = current->opposite(u);
            if(visited_bfs[v] == 0){
                q.push(v);
                visited_bfs[v] = 1;
            }
            current = current->next;
        }
    }
}

int main(){
    ifstream read;
    string input[] = {"input1.txt","input2.txt","input3.txt","input4.txt","input5.txt","input6.txt"};

    for(int i=0; i<6; i++){    //6 test cases
        cout << "Test Case: " << i+1 << "\n------------------\n";
        read.open(input[i].c_str());
        if (!read) {
            cout << "Unable to open file !" << endl;
            return -1;
        }

        int n, u, v;
        read >> n;    // input the number of nodes

        for(u=0; u<100; u++){        // initialization: set visited to be false and empty the adjacency lists for all nodes
            visited_dfs[u] = 0;
            visited_bfs[u] = 0;
            incidentEdges[u] = NULL;
        }

        Edge* curr = NULL;
        while(read >> u >> v){
            Edge* newedge1 = new Edge(u, v);
            Edge* newedge2 = new Edge(u, v);

            if (incidentEdges[u] == NULL){
                incidentEdges[u] = newedge1;
            }
            else{
                curr = incidentEdges[u];
                while(curr->next != NULL){
                    curr = curr->next;
                }
                curr->next = newedge1;
            }

            if (incidentEdges[v] == NULL){
                incidentEdges[v] = newedge2;
            }
            else{
                curr = incidentEdges[v];
                while(curr->next != NULL){
                    curr = curr->next;
                }
                curr->next = newedge2;
            }
        }

        cout << "Adjacency List: " << endl;
        for(u=1; u<=n; u++){
            cout << "Neighbors of node " << u << ": ";
            curr = incidentEdges[u];
            while(curr != NULL){
                cout << curr->opposite(u) << " ";
                curr = curr->next;
            }
            cout << endl;
        }
        cout << "------------------\n";

        int start_node = 1;
        cout << "DFS: " << endl;
        DFS(start_node);
        cout << endl;
        cout << "BFS: " << endl;
        BFS(start_node);
        cout << endl << endl;
        read.close();
    }
    return 0;
}
