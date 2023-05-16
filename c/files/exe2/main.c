// Stas Razilov

#include <stdlib.h>
#include <string.h>
#include <stdio.h>
#include "ws5functions.h"

 
#define MAX_CHARS_IN_LINE  255
#define SIZE_ARR_STRUCT  5
 
 

struct my_struct 
{
	char *command;
	int (*compare)(char*,char*);
	int (*execute)(char*,char*);
};
typedef struct my_struct emp;	 
 
 




int main(int argc, char *argv[])
{
     // create  struct
     emp array[SIZE_ARR_STRUCT] = 
          {
               {"-remove\n",&Compare,&Remove},
               {"-count\n",&Compare,&Count},
               {"-exit\n",&Compare,&Exit},
               {"<",&Compare,&AppStringToTop},
               {">",&Compare,&AppStringToBottom}
          };
 

 
 

     int flag=1;  // flag exit 
     //   FILE *fp = NULL;  //  open file
     char *file_name = argv[1];  //  file name parameter 
     int selected_command; // user's command 


 
     char user_str[MAX_CHARS_IN_LINE]; //user's string

 
     while(flag)
     {  
  
          printf("select your command \n1. -remove\n2. -count\n3. -exit\n4. <\n5. >\n\n");
          scanf("%d",&selected_command);
 


          switch (selected_command)
          { 
               case 1:    //   . -remove
                    // array[0].execute(file_name, file_name);
                    flag=array[0].execute(file_name, file_name);
                    break;
            
 

               case 2:  //   . -count
                    //  printf("numbers lines: %d  \n",  Count(file_name, file_name));
                    printf("numbers lines: %d  \n",  array[1].execute(file_name, file_name));
                    break;
            


               case 3: //   . -exit
                    flag=array[2].execute(file_name, file_name); 
                    printf("\nbye bye\n\n\n");
                    exit(0);
                    break;
            
 

               case 4:  //   Appends a new string to the beginning of the file ( "<"      
                    printf("enter your string:\n" ); 
                    fgets(user_str, MAX_CHARS_IN_LINE, stdin);
                    fgets(user_str, MAX_CHARS_IN_LINE, stdin);
                    printf("\natrint user: %s\n",user_str ); 
                    flag=array[3].execute(file_name, user_str); 
                    break;                  
                    break;




               case 5: // Append a new string to EOF (end of file)
                    printf("enter your string:\n" ); 
                    fgets(user_str, MAX_CHARS_IN_LINE, stdin);
                    fgets(user_str, MAX_CHARS_IN_LINE, stdin);
                    printf("\natrint user: %s\n",user_str ); 
                    flag=array[4].execute(file_name, user_str); 
                    break;                  
                    break;

 
               default:
                    printf("%d invalid command\n if you want to finish selected 3 (-exit)\n\n" ,selected_command);
                    break;
          }

 
     }
 
 
     printf("\n");

     return 0;
 
}













 
