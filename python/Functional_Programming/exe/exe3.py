#!/usr/bin/python3


 
def seven_boom_for(num):
     new_list = []
     for i in range(1, num+1):
          if i % 7 == 0 or "7" in str(i):
               new_list.append("7 boom")
          else:
               new_list.append(i)
     return new_list






 
 






def seven_boom_map(num): 
     def add_to_list(n):
          if n % 7 == 0 or "7" in str(n):
               return "7 boom"
          else:
               return n

     some_map = map(add_to_list, range(1, num+1))
     return list(some_map)






 
def seven_boom_list_comprehension(num):
     return [num if not (num % 7 == 0 or "7" in str(num)) else "7 boom" for num in range(1, num+1)]










print("\n\n\nseven_boom_for\n",seven_boom_for(72))
print("\n\n\nseven_boom_list_comprehension\n",seven_boom_list_comprehension(72))
print("\n\n\nseven_boom_map\n",seven_boom_map(72))
















