def factorial(num):
     if num < 0:
          print("error input. negative number")
     elif num == 0:
          print("b is greater than a")
     elif num == 1:
          print("factorial number is: 1")
     else:
          i = 1
          factorial_number=1
          while i < (num+1):
               factorial_number *= i
               i += 1
     print(factorial_number)
     
 
number = 5  
factorial(number)
 












