// Stas Razilov
 
#include "stack.h"


 
 
int main()
{ 

     int max_size_stack;
     int push_num1=100; 
 
     int *p_peek;
 
     int selected_action; // user's select 
     int counf_select=0;  // how many times the user selected 





     printf("Enter a maximum number for your stack: ");
     scanf("%d",&max_size_stack);
  
     printf("\n\nSelect a type stack\n1. float or  int\n2. char\n3. double\n");
     do 
     { 
          if(counf_select==1)
          {
               printf("\nYou can only choose\n 1. float or  int\n2. char\n3. double\n");
          } 

          if(counf_select>1)
          {
               printf("\n.!.\n 1. float or int\n2. char\n3. double\n");
          } 
      
          scanf("%d",&selected_action);
          counf_select++;

 

     }
     while (selected_action<=0||3<selected_action); 

 





/********************      create stack   ***************************************************/
   
     t_stack *current_stack;
     current_stack = Create(max_size_stack,sizeof(void *));

 /*******************************************************************************************/
     
     printf("\e[1;1H\e[2J");   /*clear output screen*/

     selected_action=-1;
     printf("what would you like to do?\n ");
     printf("select\n1. Push\n2. Pop\n3. Peek\n4. Size\n5. IsEmpty\n6. Capacity\n0. Destroy\n\n\n");
     scanf("%d",&selected_action);
    
     do 
     {  
          if(selected_action==0)
          { 
               printf("\e[1;1H\e[2J");   /*clear output screen*/
               printf("\n\n\nby by\n\n\n");
               /********************        Destroy       ***************************************************/
                    Destroy(current_stack);
               /*********************************************************************************************/
               return 0; 
          }
          else
          {
               printf("select\n1. Push\n2. Pop\n3. Peek\n4. Size\n5. IsEmpty\n6. Capacity\n0. Destroy\n\n\n");
               scanf("%d",&selected_action);


               switch (selected_action)
               { 
                    case 1:
                         Push(current_stack,&push_num1);
                         break;
                 


                    case 2:
                         Pop(current_stack);
                         break;
                 


                    case 3:
                         p_peek=Peek(current_stack); 
                         break;
                 


                    case 4:
                         printf("\nsize =%d \n", Size(current_stack));
                         break;



                    case 5:
                         printf("\nIsEmpty =%d \n", IsEmpty(current_stack));
                         break;



                    case 6:
                         printf("\nCapacity =%d \n", Capacity(current_stack));
                         break;



                    default:
                         break;
               }
          } // ent if
 
     }
     while (!(selected_action<0||6<selected_action)); 

  





     printf("\e[1;1H\e[2J");   /*clear output screen*/
     return 0;


















/********************      Push    and  peek   ***************************************************/
/*   
     Push(current_stack,&push_num1);
     Push(current_stack,&push_num2);
     Push(current_stack,&push_num1);
     Push(current_stack,&push_num2);
     printf("\nsize =%d \n", Size(current_stack));


     p_peek=Peek(current_stack); 
     printf("\np_peek=%d \n",  *p_peek);
*/
/****************************************************************************************/




 


 


 
/********************      Pop       ***************************************************/
    /*
     p_peek=Peek(current_stack); 
     printf("\np_peek=%c \n",  *p_peek);
    
     Pop(current_stack);
 
     p_peek=Peek(current_stack); 
     printf("\np_peek=%d \n",  *p_peek);
*/
/****************************************************************************************/









/********************        Capacity       ***************************************************/
/*
     printf("\nCapacity =%d \n", Capacity(current_stack));
*/
/*********************************************************************************************/



 


/********************        size       ***************************************************/
/* 
     printf("\nsize =%d \n", Size(current_stack));
*/
/*********************************************************************************************/










/********************        IsEmpty       ***************************************************/
/* 
     Push(current_stack,&push_num2);
     Push(current_stack,&push_num2);
     Push(current_stack,&push_num2);
     printf("\nIsEmpty =%d \n", IsEmpty(current_stack));
*/
/*********************************************************************************************/



 
 
 




return 0;
}




 
 
