#!/usr/bin/python3



class GFG():
      def __init__(self):
                self.a = 1
                self.b = 2
  





class GFG_slots():
     __slots__=['a', 'b']
     def __init__(self):
          self.a = 1
          self.b = 2




p = GFG()

p_slots = GFG_slots()

#print(GFG_slots.__dict__)




 
print("\nobject p:",dir(p)) 
print("\n\n__dict__\n",p.__dict__) 
print("\n\n\n\n\n\n\n\n\n\n")





print("object GFG_slots:",dir(GFG_slots))
print("\n\n__dict__\n",GFG_slots.__dict__)
print("\n\n__slots__\n",GFG_slots.__slots__)
print("\n\n\n\n\n")
