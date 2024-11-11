/***********************Question 3**************************************
* 3.1 Please complete the following code for the Peterson’s algorithm. *
* 3.2 Why does it satisfy the mutual exclusion?                        *
***********************************************************************/
#include <stdio.h>
#include <stdlib.h>
#include <pthread.h>

#define ENTER 1
#define LEAVE 0
#define NUM_THREADS 2
#define N_ITERATIONS 10000000

// Global variables
static volatile long counter = 0;
static volatile int turn = 0;
static volatile int flag[NUM_THREADS] = {0, 0};

// Increment function
void *increment(void *arg) {
    int thread_id = *(int*)arg;

    flag[thread_id] = ENTER;
    turn = thread_id;
    while (flag[1-thread_id] && turn == thread_id) {
        // Wait
    }

    // Enter critical region
    for (long i = 0; i < N_ITERATIONS; i++) {
        counter++;
    }

    // Leave critical section
    flag[thread_id] = LEAVE;

    return NULL;
}

int main() {
    pthread_t threads[NUM_THREADS];
    int thread_ids[NUM_THREADS];

    // Create threads
    for (int i = 0; i < NUM_THREADS; i++) {
        thread_ids[i] = i;
        pthread_create(&threads[i], NULL, increment, &thread_ids[i]);
    }

    // Wait for threads to finish
    for (int i = 0; i < NUM_THREADS; i++) {
        pthread_join(threads[i], NULL);
    }

    printf("counter=%ld.\n", counter);

    return 0;
}
