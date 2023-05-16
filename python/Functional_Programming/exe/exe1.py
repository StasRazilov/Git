#!/usr/bin/python3
from functools import reduce


def sum_in_for(my_list1):
     my_sum = 0
     for i in my_list1:
          my_sum += i
     return my_sum




 

def sum_in_sun(my_list2):
    return sum(my_list2)






def sum_in_reduce(my_list3):
     return reduce(lambda a, b: a + b , my_list3)









 
my_list = [i for i in range(10)]
my_dict = {num: num*num for num in range(10)}  # ????????????????????????

print(my_list) 
print(my_dict)












print("\n\n-------------------------------------            for             --------------------------------")
print("\nsum list: ",sum_in_for(my_list),"\n\n")
print("\nsum dict: ",sum_in_for(my_dict),"\n\n")

 



print("\n\n-------------------------------------            sum             --------------------------------")
print("\nsum list: ",sum_in_sun(my_list),"\n\n") 
print("\nsum dict: ",sum_in_sun(my_dict),"\n\n")





print("\n\n-------------------------------------            reduce             --------------------------------")
print("\nsum list: ",sum_in_reduce(my_list),"\n\n") 
print("\nsum dict: ",sum_in_reduce(my_dict),"\n\n")

 



