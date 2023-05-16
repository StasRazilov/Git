"""------------------------            for    and    range   -----------------------------"""
 
def func_for(num):
     if (num % 2) == 0:
          list_numbers1.append(num)


list_numbers1 = []
for i in range(101):
     func_for(i)


print(list_numbers1,"\n")

 




"""------------------------     while          ----------------------------"""
 

def func_while(num):
     if (num % 2) == 0:
          list_numbers2.append(num)


list_numbers2 = [] 
i = 0
while i < 101:
     func_while(i)
     i += 1


print(list_numbers2)






 







