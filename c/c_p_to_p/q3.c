// Stas Razilov

#include <stdio.h>
#include <string.h>
 
int main(int argc,char **argv,char **envp)
{
     
     
     
     char* p="lalala";
     char arr[10]="lalala";
     
     ++p;
     //++arr;
     *p="s";
     p[0]="s";
     arr[1]="s";
     
     
     
     
     
     
	/* 
	int np=5;

	int *p1=&np;
	int arr[3]={1,2,3};

	++*p1;
	++arr[0];

	printf("%d\n",*p1);
	printf("%d\n",arr[0]); 

	*/


/*
	char str[]="aaa";
	char *p="lalala";
	//  char arr[10]="lalala";
	printf("%s\n",p);
	char s[]="abc"; 

/*
	p=&s;
	++p;
	*p='s';

	p[0]='s';
	arr[1]='s';
	*(arr+1)='s';
	1[arr]='s';
	*/ 
	printf("%s\n",p);
	//  printf("%s\n",arr);

      
      return 0;
}

