/***********************Question 2***************************************
* 2.1 Please complete the following code for the alternation algorithm. *
* 2.2 Why does it satisfy the mutual exclusion?                         *
* 2.3 What are the drawbacks of the alternation algorithm?              *
************************************************************************/
#include <stdio.h>
#include <stdlib.h>
#include <pthread.h>

#define TRUE 1
#define NUM_THREADS 2
#define N_ITERATIONS 100000000

// Global variables
static volatile long counter = 0;
static volatile int turn = 1;


// Thread 1
void *thread_1(void *arg) {

    while (TRUE) {
        while (turn != 1) {
            // Wait
        }

        // Enter critical region
        for (long i = 0; i < N_ITERATIONS; i++)
            counter++;

        // Leave critical region
        turn = 0;

        break;
    }

    pthread_exit(NULL);
}


// Thread 2
void *thread_2(void *arg) {

    while (TRUE) {
        while (turn != 0) {
            // Wait
        }

        // Enter critical region
        for (long i = 0; i < N_ITERATIONS; i++)
            counter++;
        turn = 1;
        // Leave critical region

        break;
    }

    return NULL;
}

int main() {
    pthread_t tid1, tid2;

    pthread_create(&tid1, NULL, thread_1, NULL);
    pthread_create(&tid2, NULL, thread_2, NULL);
    pthread_join(tid1, NULL);
    pthread_join(tid2, NULL);

    printf("counter=%ld.\n", counter);

    return 0;
}
