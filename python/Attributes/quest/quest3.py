#!/usr/bin/python3


class Vehicle:
     kind= "car"


     def __init__(self, manufacture,model):
          self.manufacture = manufacture
          self.model = model


     def __repr__(self):
          return "<{namu}, {model}>".format(namu=self.manufacture,model=self.model)



car = Vehicle("toyota","corrola")
print("\n\n\ncar: ",car)
print("\n\n\n\n\n\nVehicle.__dict__\n",Vehicle.__dict__)
print("\n\n\n\n\n\ncar.__dict__\n",car.__dict__)

car.x = 3 


print("\n\ncar.x: ",car.x)

 
print(id(x)) 


















