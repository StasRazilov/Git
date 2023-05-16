// Stas Razilov

#include <stdio.h>
#include <stdlib.h>
#include "ws5functions.c"

#define N 10

 
 
struct print_me
{
    int x;
    void (*Print)(int x);
};
    

int main()
{

    struct print_me my_prints[N];
    size_t i = 0;
    int num=10;
    
    for (i = 0; i < N; ++i)
    {
		my_prints[i].x = num+i;
		my_prints[i].Print = Print;
		my_prints[i].Print(my_prints[i].x);
    }
    return 0;
}

 
