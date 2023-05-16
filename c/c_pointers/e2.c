// Stas Razilov

#include <stdio.h>
#include <string.h>
#include <stdlib.h>
#define N 10
 
 
void copy_array(int *arr,int *c_arr)
{
    
    for(int i=0;i<N;i++)
    {
        c_arr[i]=arr[i]; 
    }
 
    return;
}


int main()
{  
    int arr[N]={0}, c_arr[N]={0};
     
    printf("arr="); 
    for(int i=0;i<N;i++)
    {
        arr[i]=rand() % 11; // random number 0-10 
        printf("%d ",arr[i]);
    }
 
    copy_array(arr,c_arr);
    
    printf("\n\n\nc_arr="); 
    for(int i=0;i<N;i++)
    {
         printf("%d ",c_arr[i]);
    }
    printf("\n\n\n");
 
 
 
    return 0;
}



