#!/usr/bin/python3

ages = [5, 12, 17, 18, 24, 32]

def myFunc(x):
     if x < 18:
          return False
     else:
          return True



adults = filter(myFunc, (10,22,33,44,1,55))


for x in adults:
     print(x)




print(type(adults))

mylist = list(adults)

print(type(mylist))
print(type(adults))

 
 








