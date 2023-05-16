#!/usr/bin/python3


class Employee: 
 
     def __init__(self, name, salary): #  same as constructor in PHP
          self.name = name
          self.salary = salary 
          self.empCount = 10 

     def displayCount(self):
          print ("Total Employee %d" % self.empCount)

     def displayEmployee(self):
          print ("Name : ", self.name,  ", Salary: ", self.salary)




p1 = Employee("aaa","bbbb")


p1.displayCount()

p1.displayEmployee()
print("\n\ntype p1:",type(p1))

print("\n\n\n")

print ("\n\n\nEmployee.__doc__:", Employee.__doc__)
print ("\n\n\nEmployee.__name__:", Employee.__name__)
print ("\n\n\nEmployee.__module__:", Employee.__module__)
print ("\n\n\nEmployee.__bases__:", Employee.__bases__)
print ("\n\n\nEmployee.__dict__:", Employee.__dict__)
print("\n\n\n")




