#!/usr/bin/python3


class Point:
     def __init__(self,x,y):
          self.x = x
          self.y = y


     def __repr__(self): 
          return f"\n\n__repr__     --->       x:{self.x}, y:{self.y}"
  

     def __add__(self,other):
          return f"\n\n__add__      --->       x: {self.x + other.x} , y:{self.y + other.y}"
    
   
     def __sub__(self,other):
          return f"\n\n__sub__      --->       x: {self.x - other.x} , y:{self.y - other.y}"


     def __mul__(self,other):
          return f"\n\n__mul__      --->       x: {self.x * other.x} , y:{self.y * other.y}"
  

     def __truediv__(self,other): 
          try:  
               return f"\n\n__truediv__      --->       x: {self.x / other.x} , y:{self.y / other.y}"
          except ZeroDivisionError as  print_div_error:
               return "\n\n--------------------------------------------------------------------------------------\nHandling run-time error: %s\n--------------------------------------------------------------------------------------\n\n"% print_div_error
 


 
 

     def __iadd__(self, other):
          self.x += other
          self.y += other
          return self


     def __isub__(self, other):
          self.x -= other
          self.y -= other
          return self


     def __imul__(self, other):
          self.x *= other
          self.y *= other
          return self


     def __itruediv__(self, other):
          self.x /= other
          self.y /= other
          return self

 








p1 = Point(100,200)
p2 = Point(10,0)

  
print("\np1",p1)
print("\np2",p2) 
print("\n\n\n")









print(p1 / p2)


 

 

"""
print(p1 + p2)
 

print(p1 - p2)
 

print(p1 * p2)
 

print(p1 / p2)
"""














 
 
 





