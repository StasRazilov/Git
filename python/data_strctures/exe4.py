def print_format_dict(list_string):
     enumerates = enumerate(list_string)
     print(list(enumerates),"\n\n\n")

     for key, element in enumerate(list_string, 0):
          print("key: ", key,"     element: ",element)
          #  print(list_string[key])  """option 2""" 
          #  print("(",key ,", ",element,")")    """option 3""" 



list_str = ("a1","b2","c3")

print_format_dict(list_str)


