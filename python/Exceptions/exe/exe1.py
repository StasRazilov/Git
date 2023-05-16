#!/usr/bin/python3
 
 
def func_div(n1,n2):
     return n1 / n2





num1 = 10
num2 = 0



try:
     div = func_div(num1,num2)
except ZeroDivisionError as  print_div_error:
     print("\n\n--------------------------------------------------------------------------------------\nHandling run-time error:",               print_div_error,"\n--------------------------------------------------------------------------------------\n\n")
     num2 = 2
     div = func_div(num1,num2) 
 




print("\ndiv:", div)
 

 




