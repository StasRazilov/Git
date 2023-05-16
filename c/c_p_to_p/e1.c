// Stas Razilov

#include <stdio.h>
#include <string.h>
#include <stdlib.h>
#define N 10

 
void f1(int arr[][N])
{
      return;
}


void f2(int arr[N][N])
{
      return;
}

 
void f3(int *arr[N])
{
      return;
}


void f4(int **arr)
{
      return;
}


 
 
 
 
int main(int argc,char **argv,char **envp)
{
      int **p_arr;
 
      if(p_arr=NULL)
      {
            printf("p_arr!=NULL\n\n\n BY BY!!");
            exit(1);
      }
      
      p_arr=(int**)malloc(10 * sizeof(int*));
      
      for(int i=0;i<N;i++)
      {
            for(int j=0;j<N;j++)
            {
                  p_arr[i]=(int*)malloc(10 * sizeof(int));
            }
      }
      
      for(int i=0;i<N;i++)
      {
            for(int j=0;j<N;j++)
            { 
                  p_arr[i][j]=i+10;
                  printf("%d ",p_arr[i][j]);  // e1 b
            }
            printf("\n");
      }
      
      int *p_arr2;  
      int arr[N][N];
      
      printf("sizeof(p_arr)=%ld\n\n",sizeof(p_arr));
      printf("sizeof(p_arr2)=%ld\n\n",sizeof(p_arr2));
      printf("sizeof(arr)=%ld\n\n\n",sizeof(arr));
      
      
      /*********************          e1    extra    *********************/
      
      int arr_sum[N]={0}; 
      
      for(int i=0;i<N;i++)
      {
            for(int j=0;j<N;j++)
            { 
                  arr_sum[i]+=p_arr[i][j];
            }

            printf("arr_sum[%d]= %d \n",i,arr_sum[i]);    
       }
       
      /********************************************************************/
      
   
      for(int i=0;i<N;i++)
      {
            free(p_arr[i]);
      }
      
      free(p_arr);

      
      return 0;
}
