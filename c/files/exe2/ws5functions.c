// Stas Razilov
 
#include <stdio.h>
#include <stdlib.h>
#include <assert.h>
#include <string.h>
#include "ws5functions.h"
#define MAX_CHARS_IN_LINE  255
  
 
 
 


 
// Appends a new string to the beginning of the file    -   <
int AppStringToTop(char *name_file, char *str)
{   
     FILE *fp = NULL;
     fp = fopen (name_file,  "r+");
	fseek(fp, 0, SEEK_SET);
  
 
	if (fp==NULL)
	{
		printf("\nnot opening\nby by\n\n\n");
		return 0;
	}
  
	int res = fputs(str,fp);
	fclose(fp);
   
	return 1; 
}
 






// Count the amount of lines and prints localy from the function
int Count(char *name_file, char *str)
{  
	FILE *fp;
	fp= fopen (name_file, "r");
  
	if (fp==NULL)
	{
		printf("\nnot opening\nby by\n\n\n");
		return 11; //   
	}
  
  
	char str1[MAX_CHARS_IN_LINE]; 
	int count = 0; // count num lines
 
	while(fgets(str1, MAX_CHARS_IN_LINE, fp)!=NULL) 
	{ 
		count++;
	}
 

	fclose(fp); 

	return count; 
}
 
 






//  Comparison function return int        
int Compare(char *command, char *str)
{   
	assert(command);
	assert(str);
	 
     printf("\n\n-----------------------------\nfunc[0].str=%d\n\n--------------------\n\n",strncmp(command, str, 1) == 0 ? 1 : 2);
     return 1;
}
 
 
 











 
 
// Remove the file from your computer
int Remove(char *name_file, char *str)
{  
     if (remove(name_file) == 0)
	{
		return 0;
	}
	else
	{
		return 1;
	}  
}
 
 
 
 









// exit the program
int Exit(char *name_file, char *str)
{
	return 0;
}
 
 
 



 
 
// Append a new string to EOF (end of file)   -   >
int AppStringToBottom(char *name_file, char *str) 
{
 	FILE *fp;
	fp = fopen (name_file, "r+");
  
	if (fp==NULL)
	{
		printf("\nnot opening\nby by\n\n\n");
		return 0;
	}
 
  
	fputs(str, fp);

	fclose(fp); 
	return 1;
	 
}
 



