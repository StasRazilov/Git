#!/usr/bin/python3
import numbers
  



class X: 
     my_slots = ["a","b"]
     def __init__(self, a,b):
          self.a = a
          self.b = b


     def __str__(self):
          return "__str__   --->    <{a},{b}>".format(a=self.a,b=self.b)


     def __getattr__(self, item):
          return "The {} Is Not in X Class".format(item)




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
   



     def __setattr__(self, key, value):
          if isinstance(value, numbers.Number):
               if key in self.my_slots:
                    self.__dict__[key] = value
               else:
                    raise Exception("Impossible to add a new attribute") 
          else: 
               if type(value) == str:
                    print(value,":  is not a number")










"""
     def __setattr__(self, key, value):
          if key in self.my_slots:
               self.__dict__[key] = value
          else:
               raise Exception("Impossible to add a new attribute")

"""




x = X(1,2)
print(x) 
print(x.a)
print(x.b)



x.a = 1000
print(x.a)




x.a = "stas the king"
print(x.a)

#print(x.c)




 
 
