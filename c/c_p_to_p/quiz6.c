#include <stdio.h>
#include <string.h>
#define N 10
 
 
 
int main(int argc,char **argv,char **envp)
{
	int size_arr=5;
	int arr[size_arr]={2,4,7,12,14};
	int sum =21;
	
	
	
	for(int j=0;i=size_arr-1;i<size_arr;j++,i--)
	{
		if((arr[j]+arr[j+1])==sum)
		{
			printf("1 %d %d",j,j+1);
			return 0;
		}
		else if((arr[i]+arr[i-1])==sum)
		{
			printf("1 %d %d",i,i+1);
			return 0;
		}
 
	}
	printf("0");
	return 0;
}

