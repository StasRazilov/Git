#!/usr/bin/python3

import numbers
 
 
class Point: 
 
     def __init__(self, x, y):  
          if isinstance(x, numbers.Number) and isinstance(y, numbers.Number):
               self.x = x
               self.y = y   
          else: 
               if type(x) == str:
                    print("x:",x,"  is not a number")
                    exit(0)
               elif type(y) == str:
                    print("y:",y,"  is not a number")
                    exit(0)
   
     def print_point(self):
          print ("\n\nObject.x : ", self.x,  ", Object.y: ", self.y,"\n\n")



 


p1 = Point(3,1)
  
p1.print_point()
 


