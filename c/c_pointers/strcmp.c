#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <assert.h>


int Strlen(char *str)
{
    int count=0;
    for(;str[count]!='\0';count++);
    assert(count);
    return count; 
}
 
 
 
int Strcmp(char *str1,char *str2)
{
 
    int size_str1=Strlen(str1);
    int size_str2=Strlen(str2);
    
 
    if(size_str1>size_str2)
    { 
        return str1[--size_str1];
    }
    else if(size_str1<size_str2)
    {
        return (str2[--size_str2]*(-1)); 
    }
   
 
    int i=0;
    while(i<size_str1)
    {
        if(str1[i]>str2[i])
        {           
            return str1[i]-str2[i];  
        } 
        else if(str1[i]<str2[i])
        {       
            return str1[i]-str2[i];  
        } 
        i++;
    }
   
    return 0;
}
 

int main()
{ 
    char str1[] = "sss", str2[] = "sas";
  
    printf("Strcmp(str1, str2) = %d\n",strcmp(str1, str2));
    // printf("Strcmp(str1, str2) = %d\n",Strcmp(str1, str2));
    
    
    return 0;
}

