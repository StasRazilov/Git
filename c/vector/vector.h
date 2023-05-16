// Stas Razilov

#ifndef VECTOR_H
#define VECTOR_H

typedef struct vector t_vector;

//capacity = how much can the stack itself can hold
//elemnet_size = what is the actuall size of the element
t_vector *Create(const unsigned int capacity, const unsigned int element_size);    
 



// destroy the vector and free its memory allocation
void Destroy(t_vector *vect);   



// remove the last item in the vector
void *Pop(t_vector *vect);   					 


//add 1 item at the end of the vector
void Push(t_vector *vect , void*);			 


// allows to get an item from the vector at a given index
// same as peek
void *Get(t_vector *vect, int index);  



// size = how much elements are currently in the vector
unsigned int Size(const t_vector *vect);  



//status function - tells if the vector is empty or not
int IsEmpty(const t_vector *vect);        


//Get stack Capacity
unsigned int Capacity(const t_vector *vect);



// check var vect->buffer + vect->cur_size
void *Pop_v1(t_vector *vect);

#endif



 




