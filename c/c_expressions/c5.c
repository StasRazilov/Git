// Stas Razilov

#include <stdio.h>


int func_flip(int num)
{
  int num_reverse = 0;
  int flip_num; // holds last number
  int copy_number=num;  // holds copy number
 
  // reverse number loop
  while (copy_number != 0) 
  {
    flip_num = copy_number % 10; // last number
    num_reverse = num_reverse * 10 + flip_num;
    copy_number /= 10; // downloads last number
  }

// *num=num_reverse;
  return num_reverse;
    
}



int main() 
{
  int number=12340;

  printf("\n\n"); 
  printf("number=%d\n\n", number);

  number=func_flip(number);

  printf("reverse number=%d\n\n\n\n", number);

  return 0;
}
