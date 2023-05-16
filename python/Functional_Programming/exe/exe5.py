#!/usr/bin/python3



def count_args(*args):
     count = 0
     for i in args:
          count += 1
     return count






print("number of arguments is: ",count_args(1,2,3,4,5555))
 




