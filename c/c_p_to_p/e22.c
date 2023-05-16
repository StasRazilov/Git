#include <stdio.h>
#include <string.h>
#define N 6
 
 
 
 int Josephusproblem(int n,int m)

{

	if (n ==1)
	{ 
		return 1; 
	}

	return (Josephusproblem( n-1, m)+m-1) % (n)+1; 
}


 
int main(int argc,char **argv,char **envp)
{	
 
	int arr[N];
	int flag=1;
 	int i=0;

	for(int i=0;i<N;i++)
	{
		arr[i]=1;
	}

	for(int i=0;i<N;i++)
	{
		printf("%d ",arr[i]);
	}
	printf("\n\n\n");
	 
	 
	 
	 Josephusproblem(7,2);
 
	 
	 
	 
	 
	 
	for(int i=0;i<N;i++)
	{
		printf("%d ",arr[i]);
	}
	printf("\n\n\n");
	return 0;
}

