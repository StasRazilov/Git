#!/usr/bin/python3

class Count:
     def __init__(self,mymin,mymax):
          self.mymin=mymin
          self.mymax=mymax    

     def __getattr__(self, item):
          self.__dict__[item]=item
          print("sssssss")


obj1 = Count(1,10)
print(obj1.mymin)
print(obj1.mymax)

print(obj1.__dict__)

 
obj1.mycurrent1 = 100
print(obj1.mycurrent1)

print(obj1.__dict__)





