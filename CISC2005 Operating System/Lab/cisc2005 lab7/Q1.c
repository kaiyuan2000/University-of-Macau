#include <stdio.h>
#include <pthread.h>
#include <semaphore.h>
#include <unistd.h>

#define NUM_THREADS 5
#define N_ITERATIONS 100000 // number of iterations

// Global variables
static volatile long counter = 0;

sem_t s; // Semaphore variable

void *increment(void *arg) {

    // Enter critical region
    for (long i = 0; i < N_ITERATIONS; i++) {
        
        // Block on a semaphore count
        sem_wait(&s); // P(S);
        
        // Shared resource
        counter++;

        // Increment a semaphore
        sem_post(&s); // V(S)
    }
    // Leave critical region

    return NULL;
}

int main(int argc, char **argv) {
    
    // Initialize the semaphore
    sem_init(&s, 0, 1);

    // Create threads
    pthread_t threads[NUM_THREADS];
    for (int i = 0; i < NUM_THREADS; i++) {
        pthread_create(&threads[i], NULL, increment, NULL);
    }
    printf("Create %d threads.\n", NUM_THREADS);

    // Wait for threads to finish
    for (int i = 0; i < NUM_THREADS; i++) {
        pthread_join(threads[i], NULL);
    }

    printf("counter=%ld.\n", counter);

    // Destroy the semaphore
    sem_destroy(&s);

    return 0;
}
