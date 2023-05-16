#!/usr/bin/python3
 
class MyClass:
     #class variable
     cvar = "class variable"

     def __init__(self):
          #instance variable
          self.ivar = "intance variable"

     @classmethod
     def display_using_cls(cls):
          print(cls.cvar)
          #print(cls.ivar)  #raises AttributeError

     #instance method
     def display_using_self(self):
          print(self.cvar)
          print(self.ivar)







obj = MyClass()
obj.display_using_cls()
obj.display_using_self()






