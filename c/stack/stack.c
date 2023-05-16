#include <stdlib.h>
#include <assert.h>
#include <stdio.h>


typedef struct stack 	
{
     unsigned int capacity; 	       // place overall / maximum amount
     int size; 			       // current element in the struct
     unsigned int element_size;      // the size of a single element in bytes
     void **buffer;                  // dynamic allocation
}t_stack;
  


 
 





t_stack *Create(const unsigned int capacity,const unsigned int element_size)
{
     t_stack *stack; 
     stack=(t_stack *)calloc(1,sizeof(t_stack)); 
     
     stack->capacity=capacity;
     stack->size=0;
     stack->element_size=element_size;
  
     stack->buffer = calloc(capacity,stack->element_size); 

 
/*
     int num=2;

     *(stack->buffer + (stack->size * stack->element_size))=&num;
 
     printf("\n\n\nThe numbers entered are: ");
 
     printf("%p ",*(stack->buffer + (stack->size * stack->element_size)));
 
     printf("\n\n\n  ");
*/
 

     return stack;	 	 
}





 
void Push(t_stack *stack ,void * const ptr)
{
     assert(stack);

     if(stack->capacity==stack->size)
     {
          return;
     } 
     stack->buffer[stack->size]=ptr; 
     stack->size++;

 
     return; 
}

 

 
void *Peek(const t_stack *stack)
{ 
     assert(stack); 
     return stack->buffer[stack->size]; 
}



 
 //Pop the Element from Top
void *Pop(t_stack *stack)
{

     assert(stack); 
     if(stack->size==0)
     {
          return NULL;
     }

     void *var;
 
     var=stack->buffer[stack->size];
   
     stack->size--;
     return var;  
}



 

  
 


//Get stack Capacity
unsigned int Capacity(const t_stack *stack)
{
     assert(stack);  
     return stack->capacity;   
}




unsigned int Size(const t_stack *stack)
{
     assert(stack);  
     return stack->size;   
}







//Checks if Stack is Empty
int IsEmpty(const t_stack *stack)
{
     assert(stack);  

     if(stack->size!=0)
     {
          return stack->size;
     }
     else
     {
          return 0;
     }    

}







//Destroy The Stack
void Destroy(t_stack *stack)
{
     assert(stack);  
     free(stack->buffer);
     free(stack);
}
























 
