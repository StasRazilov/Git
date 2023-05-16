 
#include <stdio.h>

int func_pow(int num,int pow_num)
{
    int num1=num;
    if(0<num)
    { 
        if(num==1)
        {
            return 1;
        }
        for (int i = 1; i < pow_num; ++i)  
        {  
            num *=num1;  
        }
    }
    else if(0>num)
    { 
        for (int i = 1; i <= pow_num; ++i)  
        {  
            num *= num;  
        }
        
         printf("%d",num);
   
        return num*=-1;
    
    }
    else // num=0
    {
        return 0;
    }
  
    return num;
}



int main()
{
    
    int number,power_num;
    
    printf("enter a integer: ");
    scanf("%d", &number);  
  
    printf("enter a power_num: ");
    scanf("%d", &power_num);  
    
    printf("%d\n\n\n",func_pow(number,power_num));

    return 0;
}
