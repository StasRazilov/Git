// Stas Razilov
  
#include <stdio.h>
#include <time.h>
#include <string.h>
  
 
int main()
{
      int arr[100]; 
      int *end=arr+100;
      int *ptr=&arr[0]; 
      int i=0; 



       while( ptr++ != end)
      {
		i++;
		*ptr=0; 
		printf("%d ",*ptr); 
      } 
      
      printf("\n%d\n\n\n",i);

      
      return 0;
} 
