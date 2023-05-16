#include <stdio.h>
#include <string.h>
#define N 10
 
 
 void WordLowerCase(char *str)
{
        char *variable = str;
        while(*variable)
        {
                if(*variable >= 'A' && *variable <= 'Z')
                {
                        *variable = *variable + 32;
                }
                else
                {
                        *variable = *variable ;
                }
                variable++;
        }
        *variable = '\0';
}



int main(int argc, char **argv, char **envp)
{
	for (char **env = envp; *env != 0; env++)
	{
		char *thisEnv = *env;
		WordLowerCase(thisEnv);
		printf("%s\n", thisEnv);    
	}
  return 0;
}
