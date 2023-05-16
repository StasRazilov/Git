#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <assert.h>
#define N 20
int Strlen(char *str)
{
    int count=0;
    for(;str[count]!='\0';count++);
    assert(count);
    return count; 
}
 
int main()
{
    char string1[N];
  
    printf("enter string: ");
    //fgets(string1,N,stdin); // with spaces
    scanf("%s",string1);
    int size_str=Strlen(string1);
    printf("strlen is: %d \n", size_str);
    return 0;
}
