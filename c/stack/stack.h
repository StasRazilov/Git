#ifndef STACK_H
#define STACK_H
#include <stdio.h>
 



typedef struct stack t_stack;

//Creates A New Stack
t_stack *Create(const unsigned int, const unsigned int);

//Destroy The Stack
void Destroy(t_stack *);

//Push an Element to the Top of Stack
void Push(t_stack *, void * const);

//Pop the Element from Top
void *Pop(t_stack *);

//Peek on the top Element
void *Peek(const t_stack *);

//Current Location in Stack
unsigned int Size(const t_stack *);

//Checks if Stack is Empty
int IsEmpty(const t_stack *);

//Get stack Capacity
unsigned int Capacity(const t_stack *);

 
#endif

