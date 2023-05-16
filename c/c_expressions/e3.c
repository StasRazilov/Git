// Stas Razilov

#include <stdio.h>
#include <string.h>

int main()
{
    char str[]="Hello world!";
    
    int size_str=strlen(str);
    printf("size_str=%d\n\n\n",size_str);
    
    for(int i=0;i<size_str;i++)
    {
        printf("%x ",str[i]);
    }
    
    return 0;
}
