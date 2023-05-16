#!/usr/bin/python3
 
class point:
     def __init__(self,x,y):
          self._x = x
          self._y = y


     def get_x(self):
          return self._x


     def set_x(self, new_x): 
          self._x = new_x



     def get_y(self):
          return self._y 


     def set_y(self, new_y): 
          self._x = new_y
 

     def del_x(self):
          del self._x

     def del_y(self):
          del self._x


     def __repr__(self): 
          return f"\n\n__repr__   ---->        {(self._x)} the king of DO5!!!"


     methods_property_x = property(get_x, set_x, del_x) 


     methods_property_y = property(del_y, get_y, set_y) 









pp1 = point(10,20)
   
pp1.methods_property
 
pp1.methods_property = 200
 
pp1.methods_property = "stas"
  
print(pp1.__repr__())


 
 



