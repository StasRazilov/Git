#!/usr/bin/python3
 
class X:
     def __init__(self, a):
          self.a = a


     def __getattr__(self, item):
          return 'impossible to find an attribute named `{}`'.format(str(item))
  



print("\n\nX(1).a:  ",X(1).a)
print("\n\nX(1).b:  ",X(1).b,"\n\n")

 
