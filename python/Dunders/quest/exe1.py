#!/usr/bin/python3


class Point:
     def __init__(self,x,y):
          self.x = x
          self.y = y

     def __repr__(self): 
          return f"\n\n{float(self.x)} , {float(self.y)}"



 
p = Point(1, 2.5)

 


print(p)

print("\n\np.x:",p.x,"   p.y:",p.y)


































