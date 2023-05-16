#!/usr/bin/python3

 
"""
my_list = [i for i in range(100) if  i % 2 == 0]
print(my_list)
""" 



my_list = [i if  i % 2 == 0  else "odd" for i in range(100)]
print(my_list)
 



