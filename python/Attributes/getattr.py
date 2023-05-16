#!/usr/bin/python3


class Frob:
     the_king= "stas"

     def __init__(self, bamf):
          self.bamf = bamf

     def __getattr__(self, name):
          return 'Frob does not have `{}` attribute.'.format(str(name))

f = Frob("razilov")
  


print(f.bamf)
 
print(f.stas_razilov)
 

print("\n\n\n\n\n\nf.__dict__\n",f.__dict__)

print("\n\n\n\n\n\nFrob.__dict__\n",Frob.__dict__)
 




