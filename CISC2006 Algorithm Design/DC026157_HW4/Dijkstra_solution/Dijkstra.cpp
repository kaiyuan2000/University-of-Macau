
#include <cstdio>
#include <vector>
#include <iostream>
#include <algorithm>
#include <stdexcept>
#include <cstdlib>
#include <fstream>
#include <queue>
#include <vector>
#include <cstring>
#include <iomanip>

using namespace std;

struct Edge{
    int endpoint1;
    int endpoint2;
    int weight;
    struct Edge* next;
    Edge(int u, int v, int w)
    {
        endpoint1 = u;
        endpoint2 = v;
        weight = w;
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

int visited[100];
Edge* incidentEdges[100];

#define INF 0x3f3f3f3f
int dist[100];

void dijkstra(int s)
{
    priority_queue< pair<int,int>, vector< pair<int,int> >,greater< pair<int,int> > > q;    //each element in the priority queue is (d'(s,u), u)
    memset(dist, INF, sizeof dist);    //let d'(s,u) = infinity

    q.push({0,s});    //d(s,s) = 0
    dist[s] = 0;
    while (!q.empty())
    {
        pair<int,int> temporary = q.top();
        q.pop();
        int u = temporary.second;
        if (visited[u])
            continue;
        visited[u] = true;
        Edge* current = incidentEdges[u];
        while (current != NULL){
            int v = current->opposite(u);
            if (dist[v] > dist[u] + current->weight){
                dist[v] = dist[u] + current->weight;
                q.push({dist[v],v});
            }
            current = current->next;
        }
    }
}

int main(){
    ifstream read;
    string input[] = {"input7.txt","input8.txt","input9.txt","input10.txt"};

    for(int i=0; i<4; i++){    //4 test cases
        cout << "Test Case: " << i+1 << "\n------------------\n";
        read.open(input[i].c_str());
        if (!read) {
            cout << "Unable to open file !" << endl;
            return -1;
        }

        int n, u, v, w;
        read >> n;    // input the number of nodes

        for(u=0; u<100; u++){    // initialization: set visited to be false and empty the adjacency lists for all nodes
            visited[u] = 0;
            incidentEdges[u] = NULL;
        }
        Edge* curr = NULL;
        while(read >> u >> v >> w){
            Edge* newedge1 = new Edge(u, v, w);
            Edge* newedge2 = new Edge(u, v, w);

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
        dijkstra(start_node);

        /* print the distances */
        cout<<"Nodes: ";
        for(int i=1; i<=n; i++){
            cout << setw(2) << i << " ";
        }
        cout<<"\n        ----------------------------------------------------\n";
        cout<<"Dist:  ";
        for(int i=1; i<=n; i++){
            cout << setw(2) << dist[i] << " ";
        }
        cout << endl;

        read.close();
    }

    return 0;
}
