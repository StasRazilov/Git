#!/usr/bin/python3

class Frob(object):
     def __getattribute__(self, name):
          print ("getting `{}`".format(str(name)))
          object.__getattribute__(self, name)



f = Frob()
f.bamf = 10
f.bamf

print(f.__dict__)


