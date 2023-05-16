 
#include "foo.h"
#include <stdio.h>

int main()
{
     int g_s=0;
     printf("%d\n",g_s);
     foo(&g_s);
     printf("%d\n",g_s);


     return 1;
}

