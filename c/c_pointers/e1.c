// Stas Razilov

#include <stdio.h>
#include <string.h>
 
 
 
void fonc_swap(int *n1,int *n2)
{
    *n1+=*n2;
    *n2=*n1-*n2;
    *n1-=*n2;
    return;
}


int main()
{  
    int num1=1,num2=2;
    
    printf("num1=%d   num2=%d\n\n\n",num1,num2);
   
    fonc_swap(&num1,&num2);
   
    printf("num1=%d   num2=%d\n\n\n",num1,num2);
   
    return (0);
}
