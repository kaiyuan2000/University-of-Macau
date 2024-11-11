#include <stdio.h>
#include<pthread.h>
#include<stdlib.h>
#include<semaphore.h>
#include <unistd.h>

// Number of customers
int NUM_CUSTOMERS = 5;

sem_t s; // Semaphore variable

// Simulate the process of service
void *get_service(void *arg)
{
    int id = *((int*)arg);

    // Block on a semaphore count
    sem_wait(&s);

    // Enter critical region
    printf("Customer [%d] is getting service.\n", id);
    sleep(2);
    printf("Customer [%d] has left.\n", id);
    // Leave critical region

    // Increment a semaphore
    sem_post(&s);
    return 0;
}

int main()
{
    // Initialize the semaphore
    sem_init(&s, 0, 2);
    
    // Create threads
    pthread_t threads[NUM_CUSTOMERS];
    int thread_ids[NUM_CUSTOMERS];
    printf("Create %d threads.\n", NUM_CUSTOMERS);
    for (int i = 0; i < NUM_CUSTOMERS; i++) {
        thread_ids[i] = i + 1;
        pthread_create(&threads[i], NULL, get_service, &thread_ids[i]);
    }

    // Wait for threads to finish
    for (int i = 0; i < NUM_CUSTOMERS; i++) {
        pthread_join(threads[i], NULL);
    }

    // Destroy the semaphore
    sem_destroy(&s);

    return 0;
}