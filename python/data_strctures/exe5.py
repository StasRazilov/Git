"""------------------------          way  1             ------------------------"""


def option1_duplicates(list1,list2): 
     set1 , set2 = set(list1) , set(list2)  
     return list(set1.intersection(set2)) 
  



list11 = ["a", "b", "c","d"] 
list22 = ["a", "b"] 

print("\n\n----------------    way  1     ----------------\n")
print(option1_duplicates(list11,list22))
 


 
 





"""------------------------          way  2             ------------------------"""


def option2_duplicates(list1,list2): 
     new_list = []  
     if len(list1) < len(list2):
          for i in list1:     
               if i in list2:
                    new_list.append(i)
     else:
          for i in list2:     
               if i in list2:
                    new_list.append(i) 
     return new_list

 



list11 = ["a", "b", "c","d"] 
list22 = ["a", "b"] 
print("\n\n----------------    way  2     ----------------\n")
print(option2_duplicates(list11,list22))
 



 
 















 
"""

option 1



x = {"apple", "banana", "cherry"}
y = {"google", "microsoft", "apple", "cherry"}

print(dir(x),"\n\n\n\n\n")   
z = x.intersection(y) 

print(z)
 
"""
 
 


 













  
