def func_left1(str_left):
     return str_left[1:(len(str_left))] + str_left[0:1]



def func_left2(str_left):
     return str_left[1:] + str_left[:1]




string_left = ["a","b","c","d"]
print(string_left,"\n\n")  
string_left = func_left1(string_left)
print("after: ", string_left) 








 
