#include<stdio.h>
#include<stdlib.h>

#define NUM_PARTITIONS 4
#define NUM_PROCESSES 7
#define MEMORY_SIZE 100

// Define a structure for each process
struct Process {
    int id;
    int size;
};

// Define a structure for each memory partition
struct MemoryPartition {
    int start_address;
    int size;
    int process_id; // -1 for unallocated
};

// Define an array of memory partitions
struct MemoryPartition memory_partitions[NUM_PARTITIONS] = {
    {0, 15, -1},
    {15, 20, -1},
    {35, 30, -1},
    {65, 35, -1}
};

// Define an array of processes
struct Process processes[NUM_PROCESSES] = {
    {0, 20},
    {1, 30},
    {2, 10},
    {3, 40},
    {4, 15},
    {5, 35},
    {6, 25}
};

// Find the best-fit memory partition for a given process size
int find_best_fit(int process_size) {
    int best_fit_index = -1;
    for (int i = 0; i < NUM_PARTITIONS; i++) {
        if (memory_partitions[i].process_id == -1 && memory_partitions[i].size >= process_size) {
                best_fit_index = i;
                break;
            }
        }
    return best_fit_index;
}

// Allocate memory for a given process in the best-fit partition
void allocate_memory(struct Process process, int partition_index) {
    memory_partitions[partition_index].process_id = process.id;
    printf("Process %d allocated %d KB of memory in partition %d starting at address %d.\n",
           process.id, process.size, partition_index, memory_partitions[partition_index].start_address);
}

// Release memory occupied by a given process
void release_memory(int process_id) {
    for (int i = 0; i < NUM_PARTITIONS; i++) {
        if (memory_partitions[i].process_id == process_id) {
            memory_partitions[i].process_id = -1;
            printf("Memory in partition %d previously allocated to process %d is released.\n",
                   i, process_id);
            return;
        }
    }
}





int main() {
    printf("Memory allocation simulation using fixed partition algorithm.\n");
    
    // Print initial memory layout
    printf("\nInitial memory layout:\n");
    for (int i = 0; i < NUM_PARTITIONS; i++) {
        printf("Partition %d: [%d, %d) - %s with process %d \n", i, memory_partitions[i].start_address,
               memory_partitions[i].start_address + memory_partitions[i].size,
               memory_partitions[i].process_id == -1 ? "unallocated" : "allocated",
               memory_partitions[i].process_id);
    }
    printf("\n");
    
    // Simulate process arrival and memory allocation
    for (int i = 0; i < NUM_PROCESSES; i++) {
        
        struct Process current_process = processes[i];
        printf("Process %d with size %d KB arrived.\n", current_process.id, current_process.size);
        
        int partition_index = find_best_fit(current_process.size);
        
        if (partition_index == -1) { //all partition are full
            //check whether current process can be fit within partition

            if (current_process.size <= 35){
                printf("No available memory partition for process %d with size %d KB. Releasing memory of other process.\n",
                       current_process.id, current_process.size);
                
                int partition_index_to_remove = -1;
                for (int j = 0; j < NUM_PARTITIONS; j++) {
                    if (memory_partitions[j].process_id != -1 && memory_partitions[j].size >= current_process.size) {
                        partition_index_to_remove = j;
                        break;
                    }
                }
                release_memory(memory_partitions[partition_index_to_remove].process_id);
                allocate_memory(current_process, partition_index_to_remove);}
            else {
                printf("Process size is larger than all partition, unable to process, so we skip. \n");
            }
        } else {
            allocate_memory(current_process, partition_index);
        }
        
        // Print current memory layout
        printf("\nCurrent memory layout:\n");
        for (int j = 0; j < NUM_PARTITIONS; j++) {
            printf("Partition %d: [%d, %d) - %s with process %d \n", i, memory_partitions[j].start_address,
                   memory_partitions[j].start_address + memory_partitions[j].size,
                   memory_partitions[j].process_id == -1 ? "unallocated" : "allocated",
                   memory_partitions[j].process_id);
        }
        printf("\n");
    }
    
    // Print final memory layout
    printf("Final memory layout:\n");
    for (int i = 0; i < NUM_PARTITIONS; i++) {
        printf("Partition %d: [%d, %d) - %s with process %d \n", i, memory_partitions[i].start_address,
               memory_partitions[i].start_address + memory_partitions[i].size,
               memory_partitions[i].process_id == -1 ? "unallocated" : "allocated",
               memory_partitions[i].process_id);
    }
    
    // Print final memory free space
    int free_space = 0;
    for (int i = 0; i < NUM_PARTITIONS; i++) {
        if (memory_partitions[i].process_id != -1) {
            int id = memory_partitions[i].process_id;
            free_space += (memory_partitions[i].size - processes[id].size);
        }
    }
    printf("\nFinal memory free space: %d KB\n", free_space);
    
    return 0;
}
