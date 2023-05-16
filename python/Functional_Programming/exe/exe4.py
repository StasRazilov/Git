#!/usr/bin/python3


def list_to_dict(my_list1):
     my_dict ={}
     num = 0
     for i in my_list1:
          my_dict[num] = i
          num += 1
     return my_dict





mylist = ['aa' , 'bb', 'cc']
 
new_dict = list_to_dict(mylist)
print(new_dict) 
print(type(new_dict))












