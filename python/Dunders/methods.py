#!/usr/bin/python3
 
 


"""                    __doc__               """



'''
class MyClass:
     """print DOC method """
     x = 0
     y = "" 
     def __init__(self, anyNumber, anyString):
          self.x = anyNumber
          self.y = anyString
    
     def __repr__ (self):
          return '1111MyClass(x=' + str(self.x) + ' ,y=' + self.y + ')'



myObject = MyClass(12345, "Hello")
 
#print(myObject)
#print(str(myObject))


print("\n\nMyClass.__doc__\n",MyClass.__doc__,"\n\n\n")
 
 
print(myObject.__str__())


print("\n\nmyObject.__repr__\n",myObject.__repr__())


''' 
  













"""       __str__   and     __repr__     ??????????????/ """

  
class Person:

    def __init__(self, person_name, person_age):
        self.name = person_name
        self.age = person_age

    def __str__(self):
        return f'__str__-Person(name={self.name}, age={self.age})'
  
    def __repr__(self):
        return f'__repr__-Person name is {self.name} and age is {self.age}'


p = Person('stas', 34)



print(p)
  



















"""                       __dict__                            """
 
 
''' 
class MyClass(object):
     class_var = 1

     def __init__(self, i_var):
          self.i_var = i_var
     
     def print1111111111111111(self, ):
          print("\n\n\n\n\ndef print1111(self, ):",self.i_var,"\n\n")

     def print2222222222222222(self, ):
          print("\n\n\n\n\ndef print1111(self, ):",self.i_var,"\n\n")



foo = MyClass(2)
bar = MyClass(3)

print ("\n\nMyClass.__dict__\n",MyClass.__dict__)
print ("\n\n\n\nfoo.__dict__\n",foo.__dict__)
print ("\n\n\n\nbar.__dict__\n",bar.__dict__,"\n\n\n")

'''

 

 
 







 
 







 
 







 
 







 
 







 
 







 
 







 
 







 
 


