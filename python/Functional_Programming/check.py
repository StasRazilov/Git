#!/usr/bin/python3

"""              closure                   """
  
def make_multiplier_of(n):
     n+=100
     def multiplier(x):
          return x * n
     return multiplier





# Multiplier of 3
times3 = make_multiplier_of(3)

# Multiplier of 5
times2 = make_multiplier_of(2)

print("\n\nWorking with closure\n")  # Output: 30
print(times3(4))  # Output: 30

 
print(times2(5))   # Output: 30

 
print(times2(times3(6)))  # Output: 30




























































