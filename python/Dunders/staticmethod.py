#!/usr/bin/python3
 
class Mathematics: 
     def __init__(self, x, y):
          self.x = x
          self.y = y

     def addNumbers11(x, y):
          return x + y

     def print_obg(self):
          print("\n\nprint\n",self.x ,"\n", self.y,"\n\n")


p = Mathematics(20,30)
# create addNumbers static method
Mathematics.addNumbers = staticmethod(Mathematics.addNumbers11)



print('\n\n\nstaticmethod  -->   The sum is:', Mathematics.addNumbers(5, 10))



print('\n\n\nclassmethod  -->   The sum is:', Mathematics.addNumbers11(5, 10))



Mathematics.aaa = staticmethod(Mathematics.print_obg())

Mathematics.aaa()



p.print_obg()





