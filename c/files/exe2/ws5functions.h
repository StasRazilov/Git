// Stas Razilov

#ifndef WS5FUNCTIONS_H
#define WS5FUNCTIONS_H
 
 

//---------------------------Exercise 1----------------------------/

void Print(int); 
  
 
//---------------------------Exercise 2----------------------------/

//---- Where 1 char * holds file name & 2nd char * holds the literal string. ----//

int Compare(char *, char *); // Comparison function return int          

int AppStringToTop(char *, char *); // Appends a new string to the beginning of the file ( "<"      



int AppStringToBottom(char *, char *); // Append a new string to EOF (end of file)
int Remove(char *, char *); // Remove the file from your computer
int Count(char *, char *); // Count the amount of lines and prints localy from the function
int Exit(char *, char *); // Closes the file
 
#endif
