#!/usr/bin/python3

from numbers import Number
from math import sqrt


class Point:
     counter = 0 

     def __init__(self, x=0.0, y=0.0, *args): 
          if isinstance(x, Number) and isinstance(y, Number):
               self.x = float(x)
               self.y = float(y)
               Point.counter += 1
               self.len = 2 + len(args)
          else:
               print("Incorrect input.")



     def distance_from_origin(self):
          return sqrt(pow(self.x, 2) + pow(self.y, 2))


     def __repr__(self): 
          return f"\n\n__repr__     --->       x:{self.x}, y:{self.y}"
  

     def __add__(self,other):
          return f"\n\n__add__      --->       x: {self.x + other.x} , y:{self.y + other.y}"
    
   
     def __sub__(self,other):
          return f"\n\n__sub__      --->       x: {self.x - other.x} , y:{self.y - other.y}"


     def __mul__(self,other):
          return f"\n\n__mul__      --->       x: {self.x * other.x} , y:{self.y * other.y}"
  

     def __truediv__(self,other):
          return f"\n\n__truediv__      --->       x: {self.x / other.x} , y:{self.y / other.y}"
 

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

     @classmethod
     def get_counter(cls):
          return cls.counter


     @staticmethod
     def __del__():
          Point.counter -= 1


     def __len__(self):
          return self.len


 




p1 = Point(100,200)
p2 = Point(10,20)

# p3 = Point(11,22)

  
print("\np1",p1)
print("\np2",p2)  
print("\nPoint.counter",Point.counter) # p3  -->      3   object

print(p1 + p2)
 

print(p1 - p2)
 

print(p1 * p2)
 

print(p1 / p2)
 

print("\n\n\n\n\n\n\n\n\n\n\n\n")
print("------------------------------------          (+ , - , * , /)        ---------------------------------------------\n")
 
p1 += 10
print("\n\n+: ",p1)
 
p1 -= 10
print("\n\n\n\n\n\n-: ",p1)
 
p1 *= 10
print("\n\n\n\n\n\n*: ",p1)
 
p1 /= 10
print("\n\n\n\n\n\n/: ",p1)
 
print("\n\n\n")

 



 



print("------------------------------------     quest 4   ---------------------------------------------\n")

print(len(p1))
print(len(p2))


