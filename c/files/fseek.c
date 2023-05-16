// Stas Razilov

#include <stdio.h>
#include <string.h>
#define N 10
 

int main () 
{
	FILE *fp;

	fp = fopen("t1.txt","w+");
	fputs("aaaaaaaaaaaa\n", fp);
/*
	fseek( fp, 7, SEEK_SET );

	fputs("\nC Programming Languagea", fp);


	int len;

	len = ftell(fp);
 	printf("Total size of file.txt = %d bytes\n", len);
*/	fclose(fp);

	return(0);
}
 
