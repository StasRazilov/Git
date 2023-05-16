#!/usr/bin/python3


 
def make_adder(n): 
     def adder(x):
          return x + n
     return adder



 
times3 = make_adder(3)
 
times2 = make_adder(2)
 
print(times3(4)) 

 
print(times2(5))    

 
print(times2(times3(6)))  





