#include <stdio.h>

void func_swap(int *num1, int *num2)
{
	int num_swap;
	num_swap=*num1;
	*num1=*num2;
	*num2=num_swap;
	return;
}




int main()
{
	int number1=1,number2=2;
	printf("number1=%d\nnumber2=%d\n\n\n",number1,number2);

	func_swap(&number1,&number2);

        printf("number1=%d\nnumber2=%d\n\n\n",number1,number2);


	return 0;
}
