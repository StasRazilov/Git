def reversed_num(number):  
     print("original number: " + str(number))     
     reversed_num = 0 
     while number != 0:
          digit = number % 10
          reversed_num = reversed_num * 10 + digit
          number //= 10
     number = reversed_num
     print("number after: " + str(number))
 


number = 1234
reversed_num(number)
 

 




