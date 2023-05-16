// Stas Razilov

#include <stdio.h>
#include <stdlib.h>
 
int main()
{
 
	// This pointer will hold the
	// base address of the block created
	int *ptr;
	 
	 
	// Dynamically allocate memory using malloc()
	ptr = (int *)malloc(10 * sizeof(int));
 
 
	printf("%d",ptr[10]);
	 
 	free(ptr);
	
	return 0;
}

