#!/usr/bin/python3
import numbers
 

class X: 
     def __init__(self, x):  
               self.__x = x
 

     @property
     def x(self):
          return self.__x 


     @x.setter
     def x(self, new_x): 
          self.__x = new_x


     @x.deleter
     def x(self): 
          del self.__x



     def __repr__(self): 
          return f"\n\n__repr__   ---->     {self.__x}"

 






a = X(0)
 
a.x

a.x = 100
 
a.x

print(a.__dict__)
 
del(a.x)


print(a.__dict__)
 
#print(X(0).x())





 
































