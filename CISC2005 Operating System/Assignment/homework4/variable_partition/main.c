#include <stdio.h>
#include <stdlib.h>

typedef struct process {
    int pid;
    int size;
    int start;
    int end;
} process;

process* allocate_process(int pid, int size) {
    process* p = malloc(sizeof(process));
    p->pid = pid;
    p->size = size;
    p->start = -1;
    p->end = -1;
    return p;
}

void deallocate_process(process* p) {
    free(p);
}

int main() {
    int mem_size = 100; // 100KB
    int num_processes = 7;
    int process_sizes[] = {20, 30, 10, 40, 15, 35, 25};

    process* processes[num_processes];
    int num_allocated = 0;
    int free_space = mem_size;

    // allocate processes
    for (int i = 0; i < num_processes; i++) {
        process* p = allocate_process(i+1, process_sizes[i]);
        printf("Process %d is incoming. \n", p->pid);

        if (p->size > free_space) {
            // find process with smallest available size to deallocate
            int min_size = mem_size;
            int min_index = -1;
            for (int j = 0; j < num_allocated ; j++) {
                if (processes[j]->end != -1) {
                    if (processes[j]->size >= p->size){
                        if (processes[j]->size < min_size) {
                            min_size = processes[j]->size;
                            min_index = j;
                            printf("Free space not enough, releasing process %d. ",min_index+1);
                        }}
                }
            }

            // deallocate selected process
            process* dp = processes[min_index];
            printf("The process will release %dKB. \n",dp->size);
            free_space += dp->size;
            dp->end = -1;

            // allocate new process
            p->start = dp->start;
            p->end = p->start + p->size - 1;
            dp = p;
            free_space -= p->size;
        } else {
            // allocate new process
            int start = mem_size - free_space;
            p->start = start;
            p->end = start + p->size - 1;
            processes[num_allocated] = p;
            num_allocated++;
            free_space -= p->size;
        }

        // print allocation status
        printf("Process %d (size %dKB) allocated from %d to %d\n", p->pid, p->size, p->start, p->end);
    }

    // print final free space
    printf("Final free space: %dKB\n", free_space);

    // deallocate processes
    for (int i = 0; i < num_allocated; i++) {
        deallocate_process(processes[i]);
    }

    return 0;
}
