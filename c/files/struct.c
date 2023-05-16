// Stas Razilov

#include <stdio.h>
#include <string.h>
#define N 10
 
  

struct my_struct
{
	int num;  
	char* str;
};



struct point
{
	int x, y;
} first_point = { 5, 10 };





struct point2
{
	int x, y;
};



/*************      struct to struct          ***********/
struct point3
{
	int x, y;
};

struct rectangle
{
	struct point3 block_left, block_right;
};
/*******************************************************/




int main(int argc,char **argv,char **envp)
{ 
	printf("\n\n");
	
	
	struct my_struct p1 = { 1 ,"aaaa"};
 
	printf("struct my_struct\n");
	printf("int num %d\n", p1.num);
	printf("char* str %s\n", p1.str);
	printf("\n\n--------------------------------------------------\n\n");


	struct   first_point;
	
	printf("struct point first_point = { 5, 10 };\n");
	printf("x=%d\n", first_point.x);
	printf("y=%d\n", first_point.y);
	printf("\n\n--------------------------------------------------\n\n\n");
	
	
	struct   point p2;
	
	printf("struct point\n");
	printf("x=%d\n", p2.x);
	printf("y=%d\n", p2.y);
	printf("\n\n--------------------------------------------------\n\n\n");
	
	 
	struct point2 p3 = { 20, 30 }; 
	
	printf("struct p3\n");
	printf("x=%d\n", p3.x);
	printf("y=%d\n", p3.y);
	printf("\n\n--------------------------------------------------\n\n\n");
	 
	
	struct point2 p4 = { .y = 50, .x = 60 };

	printf("struct p4\n");
	printf("x=%d\n", p4.x);
	printf("y=%d\n", p4.y);
	printf("\n\n--------------------------------------------------\n\n\n");
	
	  
	struct rectangle my_rectangle = { {111, 222}, {333, 444} };
	
	printf("struct to struct\n");
	printf("struct rectangle my_rectangle\nand struct point3 block_left, block_right\n");
	printf("my_rectangle.block_left.x=%d\n", my_rectangle.block_left.x);
	printf("my_rectangle.block_left.y=%d\n\n", my_rectangle.block_left.y);
	
	printf("my_rectangle.block_right.x=%d\n", my_rectangle.block_right.x);
	printf("my_rectangle.block_right.y=%d\n", my_rectangle.block_right.y);
	printf("\n\n--------------------------------------------------\n\n\n");
	
	
	
	
	
	
	
	
	
	
	
	
	
	return 0;
}

