#!/usr/bin/python3

"""------------------------------------"""
"""              with                  """
"""------------------------------------"""




"""            option 1                """
def option_1(file_path):
     file = open(file_path, 'r')
     try:
          print(file.read().upper())
     finally:
          file.close()





"""            option 2                """
def option_2(file_path):
     with open(file_path, 'r') as file:
          print(file.read().upper())








"""            option 2                """
def option_3(file_path):
     file = open(file_path, 'r')
     print(file.read().upper())
     file.close()

 







#  option_1("t1.txt")



#option_2("t1.txt")



  option_3("t1.txt")
 











 
