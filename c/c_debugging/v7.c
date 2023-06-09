// Stas Razilov

#include <stdio.h>
#include <stdlib.h>
 
int main()
{
 
	// This pointer will hold the
	// base address of the block created
	int* ptr;
	int i;

	// Get the number of elements for the array
	printf("\n\n\n\n\n");
	 
	// Dynamically allocate memory using malloc()
	ptr = (int*)malloc(10 * sizeof(int));

	// Check if the memory has been successfully
	// allocated by malloc or not
	if (ptr == NULL) 
	{
		printf("Memory not allocated.\n");
		exit(0);
	}
	else 
	{ 
		// Memory has been successfully allocated
		printf("Memory successfully allocated using malloc.\n");

		// Get the elements of the array
		for (i = 0; i < 10; ++i) 
		{
			ptr[i] = i + 1;
		}

		// Print the elements of the array
		printf("The elements of the array are: ");
		for (i = 0; i < 10; ++i) 
		{
			printf("%d, ", ptr[i]);
		}
	}
 	printf("\n\n\n\n\n");
 	free(ptr);
	
	return 0;
}

