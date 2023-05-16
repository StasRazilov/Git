// Stas Razilov
 

#include <stdio.h>
#include <stdlib.h>
#include <string.h>
int a;
  

int main()
{ 
     char *str2=(char*)malloc(sizeof(char)*20);
 

     str2[2]="a";
     if(str2==NULL)
     {
          printf(".!.\n");

     }    
     else
     {
          printf("ok\n");
     } 

     printf("\n *str2= %s \n\n\n", str2);
     printf("\n strlen(str2)= %ld \n\n\n",sizeof(str2));


 
     return 0; 
}

 
