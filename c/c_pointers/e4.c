#include <stdio.h>
#include <string.h>
 
 
 
void fonc_swap(size_t *n1,size_t *n2)
{
    *n1+=*n2;
    *n2=*n1-*n2;
    *n1-=*n2;
    return;
}


int main()
{  
    size_t num1=1,num2=2;
    
    printf("num1=%ld   num2=%ld\n\n\n",num1,num2);
   
    fonc_swap(&num1,&num2);
   
    printf("num1=%ld   num2=%ld\n\n\n",num1,num2);
   
    return (0);
}
