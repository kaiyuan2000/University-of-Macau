#include <stdio.h>
#include <stdlib.h>
#include <pthread.h>

int num_count;              // number of integers to process
int *num_list;              // array of integers to process

double avg = 0.0;           // variable to store the average value
int max = -1, min = 1000;   // variables to store the maximum and minimum values

void *calculate_avg(void *arg) {
    int i;
    double sum = 0.0;

    for (i = 0; i < num_count; i++) {
        sum += num_list[i];
    }

    avg = (int)sum / num_count;
    return NULL;
}

void *calculate_max(void *arg) {
    int i;

    for (i = 0; i < num_count; i++) {
        if (num_list[i] > max) {
            max = num_list[i];
        }
    }
    return NULL;
}

void *calculate_min(void *arg) {
    int i;

    for (i = 0; i < num_count; i++) {
        if (num_list[i] < min) {
            min = num_list[i];
        }
    }
    return NULL;
}

int main(int argc, char *argv[]) {
    int i;
    printf("Enter the number of total integer :");
    scanf("%d", &num_count);
    num_list = (int*)malloc(num_count * sizeof(int));
    
    printf("please enter integers.：\n");
    
    for (i = 1; i <= num_count; i++) {
        scanf("%d",&num_list[i-1]);}
       
    // create threads
    pthread_t threads[3];

    pthread_create(&threads[0], NULL, calculate_avg, NULL);
    pthread_create(&threads[1], NULL, calculate_max, NULL);
    pthread_create(&threads[2], NULL, calculate_min, NULL);

    // wait for threads to finish
    for (i = 0; i < 3; i++) {
        pthread_join(threads[i], NULL);
    }

    // print results
    printf("The average value is %.2f\n", avg);
    printf("The minimum value is %d\n", min);
    printf("The maximum value is %d\n", max);

    // clean up and exit
    free(num_list);
}
