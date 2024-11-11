#include <stdio.h>
#include <stdlib.h>

#define MAX_REQUESTS 12

int main_memory_size;
int page_size;
int num_page_frames;

int requests[MAX_REQUESTS] = {10, 11, 104, 170, 73, 309, 185, 245, 246, 434, 458, 364};

int fifo();
int lru();

int main() {
    // configure parameters
    main_memory_size = 200;
    page_size = 100;
    num_page_frames = main_memory_size / page_size;

    printf("FIFO Page Replacement Algorithm:\n");
    float hit_rate = (float)(MAX_REQUESTS - fifo()) / MAX_REQUESTS;
    printf("Hit rate: %.4f\n", hit_rate);

    printf("\nLRU Page Replacement Algorithm:\n");
    hit_rate = (float)(MAX_REQUESTS - lru()) / MAX_REQUESTS;
    printf("Hit rate: %.4f\n", hit_rate);

    // configure parameters for 2nd case
    main_memory_size = 200;
    page_size = 20;
    num_page_frames = main_memory_size / page_size;

    printf("\nFIFO Page Replacement Algorithm (case 2):\n");
    hit_rate = (float)(MAX_REQUESTS - fifo()) / MAX_REQUESTS;
    printf("Hit rate: %.4f\n", hit_rate);

    printf("\nLRU Page Replacement Algorithm (case 2):\n");
    hit_rate = (float)(MAX_REQUESTS - lru()) / MAX_REQUESTS;
    printf("Hit rate: %.4f\n", hit_rate);

    return 0;
}

int fifo() {
    int page_frames[num_page_frames];
    int page_faults = 0;
    int oldest = 0;

    for (int i = 0; i < num_page_frames; i++) {
        page_frames[i] = -1;
    }

    for (int i = 0; i < MAX_REQUESTS; i++) {
        int page = requests[i] / page_size;

        int found = 0;
        for (int j = 0; j < num_page_frames; j++) {
            if (page_frames[j] == page) {
                found = 1;
                break;
            }
        }

        if (!found) {
            page_frames[oldest] = page;
            oldest = (oldest + 1) % num_page_frames;
            page_faults++;
        }
    }

    printf("Page faults: %d\n", page_faults);

    return page_faults;
}

int lru() {
    int page_frames[num_page_frames];
    int page_faults = 0;
    int used[num_page_frames];

    for (int i = 0; i < num_page_frames; i++) {
        page_frames[i] = -1;
        used[i] = 0;
    }

    for (int i = 0; i < MAX_REQUESTS; i++) {
        int page = requests[i] / page_size;

        int found = 0;
        for (int j = 0; j < num_page_frames; j++) {
            if (page_frames[j] == page) {
                found = 1;
                used[j] = i;
                break;
            }
        }

        if (!found) {
            int oldest = 0;
            for (int j = 1; j < num_page_frames; j++) {
                if (used[j] < used[oldest]) {
                    oldest = j;
                }
            }
            page_frames[oldest] = page;
            used[oldest] = i;
            page_faults++;
        }
    }

    printf("Page faults: %d\n", page_faults);

    return page_faults;
}
