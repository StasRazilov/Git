#!/usr/bin/python3
import numbers
 

class Point: 
     def __init__(self, x, y):  
          if isinstance(x, numbers.Number) and isinstance(y, numbers.Number):
               self.__x = x
               self.__y = y 
          else: 
               if type(x) == str:
                    print("x:",x,"  is not a number")
                    exit(0)
               elif type(y) == str:
                    print("y:",y,"  is not a number")
                    exit(0)
 

     def display(self):
          print(self.__x)
          print(self.__y)


     def set_y(self, y):
          self.__y = y


     def get_y(self):
          return self.__y 


     def set_x(self, x):
          self.__x = x


     def get_x(self):
          return self.__x 


     def __repr__(self): 
          return f"\n\n__repr__   ---->     {self.__x} , {self.__y}"

 
# p = Point(1, "1")   #  isinstance rerutn  --->      y: 1   is not a number


p = Point(1, 2)

  


print("\n\nbefore   p:")
p.display()
print("\n\n")


 
p.set_x(10)
p.set_y(20)
 
 
print("\n\nafter   p:")
p.display() 
print("\n\n")



print("\n\nprint get_y and get_x:")
p.get_x()
p.get_y() 
 






print("\n\n__repr__   ----->          ",p)
print("\n\n\n\n\n\n\n")














