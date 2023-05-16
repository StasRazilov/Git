#!/usr/bin/python3
 
 
def func_div(n1,n2):
     return n1 / n2




"""
num1 = "bbb"
num2 = "aaa"
"""
num1 = 10
num2 = 0



try:
     div = func_div(num1,num2)
except ZeroDivisionError as  print_div_error:
     print("\n\n--------------------------------------------------------------------------------------\nHandling run-time error:",               print_div_error,"\n--------------------------------------------------------------------------------------\n\n")
     num2 = 2
     div = func_div(num1,num2)  
except TypeError as  print_type_error:
     if type(num1) is str: 
          print("\n\n--------------------------------------------\nnum1: %s  is not a number\n--------------------------------------------\n\n"% num1)
     if type(num2) is str: 
          print("\n\n--------------------------------------------\nnum2: %s  is not a number\n--------------------------------------------\n\n"% num2) 




print("\ndiv:", div)
 

 




