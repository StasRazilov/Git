#include <stdlib.h>
#include <stdio.h>

 
int main(void)
{
	int arr[10];
	for(int i=0;i<10;i++)
	{
		arr[i]=i+10;
		printf("%d",arr[i]);
	}
	 
	printf("%d",arr[1]);
	return 0;
}			
