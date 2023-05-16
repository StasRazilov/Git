#include <stdio.h>
#include <stdlib.h>
 
int main()
{
 
    // This pointer will hold the
    // base address of the block created
    int* ptr_i;
    char* ptr_c;	
    int n;
 
    // Get the number of elements for the array
    printf("Enter number of elements:");
    scanf("%d",&n);
    printf("Entered number of elements: %d\n", n);
 
    // Dynamically allocate memory using malloc()
    ptr_i = (int*)malloc(n * sizeof(int));
    ptr_c = (char*)malloc(n * sizeof(char));
 
 
 
 
    return 0;
}

