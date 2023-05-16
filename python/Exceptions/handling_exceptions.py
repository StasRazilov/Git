#!/usr/bin/python3


"""
print("\n----------------------------------       try and  except        -----------------------------------------------\n")
def this_fails(n1,n2):
     return n1 / n2





num1 = 10
num2 = 0



try:
     div = this_fails(num1,num2)
except ZeroDivisionError as  print_div_error:
     print("\n\n--------------------------------------------------------------------------------------\nHandling run-time error:",               print_div_error,"\n--------------------------------------------------------------------------------------\n\n")
     num2 = 2
     div = this_fails(num1,num2) 
 




print('\n\ndiv:', div)
"""




print("\n----------------------------------       try, except and  finally      -----------------------------------------------\n")
def this_fails(n1,n2):
     return n1 / n2





num1 = 10
num2 = 0



try:
     div = this_fails(num1,num2)
except ZeroDivisionError: 
     num2 = 2
     div = this_fails(num1,num2) 
finally:
     print("\n\n------------------------------------------------------------------------\nHandling run-time error: division by zero  \n------------------------------------------------------------------------\n\n")



print('\n\ndiv:', div)



 




