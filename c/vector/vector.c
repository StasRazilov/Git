#include <stdlib.h>
#include <assert.h>
#include <stdio.h>
#include <string.h>  // for func memcpy
#include "vector.h"


struct vector 	
{
     int factor;                   //  int factor=2;               //the factor for reallocating the capacity of the vector
     unsigned int capacity;        // place overall / maximum amount
     unsigned int cur_size;        // current element in the struct
     unsigned int element_size;    // the size of a single element in bytes
     void *buffer;                 // dynamic allocation
};



/*
static void Increase (t_vector *vect);       //increasing the amount of elements in the vector
  
static void Decrease (t_vector *vect);//decreasing the amount of elements in the vector

*/




 			 


t_vector *Create(const unsigned int capacity, const unsigned int element_size)  
{
     t_vector *vector=NULL;
     vector=(t_vector *)calloc(1,sizeof(t_vector));
 
     if(vector==NULL)
     {
          return NULL;
     }

     vector->factor=2;
     vector->capacity=capacity;
     vector->cur_size=0; 
     vector->element_size=element_size; 
     vector->buffer=calloc(vector->capacity,vector->element_size);
  

     if(vector->buffer==NULL)
     {
          free(vector);
          return NULL;
     }


     return vector;


/*

     printf("vector->factor=%d\n\n",vector->factor);
     printf("vector->capacity=%d\n\n",vector->capacity);
     printf("vector->cur_size=%d\n\n",vector->cur_size);
 
     printf("vector->element_size=%d\n\n",vector->element_size);
 

  */ 
 
}

 

 









 
 //add 1 item at the end of the vector
void Push(t_vector *vect ,void * ptr)		 
{
/*
     printf("Push\n");
     printf("vect->capacity=%d\n",vect->capacity);
     printf("vect->cur_size=%d\n\n",vect->cur_size);
     printf("xxxxx=%d\n\n",vect->capacity);
*/

     assert(vect); 
  
     /* 
          vect->capacity=1
          vect->factor=2
          

          new vect->capacity=3
          new size = capacity = capacity + (capacity / factor) 
     */  
     if(vect->capacity == vect->cur_size) 
     { 
          vect->capacity = (vect->capacity) + ((vect->capacity) / (vect->factor));
          vect->buffer = realloc(vect->buffer, (vect->element_size) * (vect->capacity));
          
          if(vect->buffer==NULL)
          { 
               return;
          }

     } 
 
 
     memcpy(vect->buffer+vect->cur_size, ptr, vect->element_size);   

     // vect->buffer[vect->cur_size]=ptr; 
 
     vect->cur_size++;
 
     return; 
} 
/*
     int i= vect->cur_size; 
     vect->buffer[i] 
     vect->cur_size++





 
     vect->buffer + vect->cur_size

     int i= vect->cur_size;
     vect->buffer + i
 
*/





 
 


// allows to get an item from the vector at a given index
// same as peek 
void *Get(t_vector *vect, int index)
{
     assert(vect); 
     if(vect->cur_size == 0 ||  index   >  vect->cur_size /* ||  index   <=  -1*/ ) 
     {
          return NULL;
     } 

     //  printf("vect->buffer[index]=%d\n\n",*(int*)*(vect->buffer + index));
     return vect->buffer + index;

}
 
 
 



//Get stack Capacity
unsigned int Capacity(const t_vector *vect)
{
     assert(vect);  
     return vect->capacity;   
}





// size = how much elements are currently in the vector
unsigned int Size(const t_vector *vect)
{
     assert(vect);  
     return vect->cur_size;   
}









//status function - tells if the vector is empty or not
int IsEmpty(const t_vector *vect)
{
     assert(vect);  

     if(vect->cur_size!=0)
     {
          return vect->cur_size;
     }
     else
     {
          return 0;
     }     
}
  



 





 
// remove the last item in the vector
void *Pop(t_vector *vect)
{ 
     assert(vect);  
     if(vect->cur_size == 0  ) 
     {
          return NULL;
     } 


     void *var; 

     var=vect->buffer +  vect->cur_size; 
     vect->cur_size--;

     if(vect->cur_size < ( vect->capacity / vect->factor))
     { 
          vect->capacity  =  (vect->capacity) - ((vect->capacity) / (vect->factor));
          vect->buffer = realloc(vect->buffer,  (vect->element_size) * (vect->capacity));
     }


     // printf("vect->capacity=%d\n",vect->capacity);
     return var;  
}





 
// destroy the vector and free its memory allocation
void Destroy(t_vector *vect)
{
     assert(vect); 
  
     if(vect->buffer == NULL  ) 
     {
          free(vect->buffer);
     } 
     free(vect);
 
}










 






// check var vect->buffer + vect->cur_size
void *Pop_v1(t_vector *vect)	
{
     return (vect->buffer + vect->cur_size);
}





