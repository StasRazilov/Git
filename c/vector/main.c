// Stas Razilov
 
#include <stdio.h>
#include "vector.h"
 



int main()
{ 

     int max_size_vector;
     int flag=0; // do while for push

     int push_num1=100; 
     int push_num2=200; 
 
     void *p_var;  // for print var

     int selected_action; // user's select 
     int counf_select=0;  // how many times the user selected 




     printf("Enter a maximum number for your vector: ");
     scanf("%d",&max_size_vector);
 


     int type_vector=0;
     int numbers=0;
     printf("\n\nSelect a type vector\n1. float or  int\n2. char\n3. double\n");
  

     do 
     { 
          if(numbers==1)
          {
               printf("\nYou can only choose\n 1. float or  int\n2. char\n3. double\n");
          } 

          if(numbers>1)
          {
               printf("\n.!.\n 1. float or int\n2. char\n3. double\n");
          } 
      
          scanf("%d",&type_vector);
          numbers++;
     }
     while (type_vector<0||3<type_vector); 







/********************      create stack   ***************************************************/
   
     t_vector *vector;
     vector = Create(max_size_vector,sizeof(void *));

/********************************************************************************************/
   
 




  
     printf("\e[1;1H\e[2J");   /*clear output screen*/

     selected_action=-1;
     printf("what would you like to do?\n ");
     printf("select\n1. Push\n2. Pop\n3. Get\n4. Size\n5. IsEmpty\n6. Capacity\n0. Destroy\n\n\n");
     scanf("%d",&selected_action);
    
     do 
     {  
          if(selected_action==0)
          { 
               printf("\e[1;1H\e[2J");   /*clear output screen*/
               printf("\n\n\nby by\n\n\n");
               /********************        Destroy       ***************************************************/
                    Destroy(vector);
               /*********************************************************************************************/
               return 0; 
          }
          else
          {
               printf("select\n1. Push\n2. Pop\n3. Get\n4. Size\n5. IsEmpty\n6. Capacity\n0. Destroy\n\n\n");
               scanf("%d",&selected_action);


               switch (selected_action)
               { 
                    case 1:
                         Push(vector,&push_num1);
                         break;
                 


                    case 2:
                         Pop(vector);
                         break;
                 


                    case 3:
                         p_var=Get(vector,1); 
                         break;
                 


                    case 4:
                         printf("\nsize =%d \n", Size(vector));
                         break;



                    case 5:
                         printf("\nIsEmpty =%d \n", IsEmpty(vector));
                         break;



                    case 6:
                         printf("\nCapacity =%d \n", Capacity(vector));
                         break;



                    default:
                         break;
               }
          } // ent if
 
     }
     while (!(selected_action<0||6<selected_action)); 

  





     printf("\e[1;1H\e[2J");   /*clear output screen*/
     return 0;






















 

/********************      Push       ***************************************************/

     //   vect->capacity=2
     //   vect->cur_size=



     Push(vector,&push_num1); 
     Push(vector,&push_num1);
     Push(vector,&push_num2);
     Push(vector,&push_num2);
     Push(vector,&push_num2);

     //    vect->capacity=4
     //    vect->cur_size=4

/****************************************************************************************/




 


 


 
/********************      get       ***************************************************/

     int push_num3=300;
     Push(vector,&push_num3);

     //   vect->cur_size=5

     p_var=Get(vector, 5);
 
/*
     printf("get\n");
     printf("&push_num3=%p\n",&push_num3);
     printf("vect->buffer[index]=%p\n\n",p_var);
*/
/****************************************************************************************/









/********************        Capacity       ***************************************************/
 
     printf("\nvector->capacity =%d \n", Capacity(vector));
   
/*********************************************************************************************/


      


/********************        size       ***************************************************/
    
     printf("\nvector->cur_size =%d \n", Size(vector));
   
/*********************************************************************************************/







  


/********************        IsEmpty       ***************************************************/
     // checks if the vector is empty or not
     // empty = 0
     // not= vect->cur_size
     unsigned int Is_empty;
     Is_empty=IsEmpty(vector);
     if(Is_empty==0)
     {
          printf("\nthe vector is empty\n");
     }
     else
     { 
          printf("\nvector->IsEmpty =%d \n", Is_empty);
     }

/*********************************************************************************************/









/********************        Pop       ***************************************************/
  

     p_var=Pop(vector);
     p_var=Pop(vector);
     p_var=Pop(vector);
     p_var=Pop(vector);
     p_var=Pop(vector);


/*********************************************************************************************/










/********************        Destroy       ***************************************************/
  
     Destroy(vector);
  
/*********************************************************************************************/







 



return 0;
}




 
 
