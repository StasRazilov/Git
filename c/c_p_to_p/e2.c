#include <stdio.h>
#include <string.h>
#define N 6
 
 
 
 
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
	
	
	int count=0;
	while(flag) 
	{ 
		if(i==(N-1))
		{ 
			if(arr[i]==1)
			{
				if(arr[0]==1)
				{
				 	arr[0]=0;
				 	i=0; 
				} 
			}  
		}
		 		
		if(arr[i+1]==1)
		{ 
			arr[i+1]=0;
			 
			i++; 
			while(arr[i]==0)
			{
				if(i==(N-1))
				{ 
					i=0;
					break; //  break to while
				}
				i++;
				if(i==(N-1))
				{ 
					if(arr[i]==1)
					{
						if(arr[0]==1)
						{
						 	arr[0]=0;
						 	i=0; 
						} 
					}  
					 
				}
				if(arr[i]==1)
				{
					break; //  break to while
				}
			}  
		} 
		else
		{
			i++;
		}
 
		count=0;
		for(int j=0;j<N;j++)
		{
			if(arr[j]==1)
			{
				count++;	
			} 
		} 
		if(count==1)
		{
			break;
		}
		 
	} 

	for(int i=0;i<N;i++)
	{
		printf("%d ",arr[i]);
	}
	printf("\n\n\n");
	return 0;
}

