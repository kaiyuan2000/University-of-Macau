#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <sys/wait.h>

int main() {
    while (1) {
        char path[256];
        printf("Enter program path: ");
        scanf("%s", path);

        int pid = fork();
        if (pid == -1) {
            printf("Failed to fork.\n");
            exit(1);
        } else if (pid == 0) {
            execlp(path, path, NULL);
            printf("Failed to execute.\n");
            exit(1);
        } else {
            wait(NULL);
        }
    }
    return 0;
}
