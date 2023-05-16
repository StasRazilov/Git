
"""------------------------      option1   -   while       -----------------------------"""
 
def  func_option1(num):
     i=0
     while i*i <= 100:
          num.append(i*i)    
          i += 1



option1_list_numbers = [] 
 
func_option1(option1_list_numbers)
 
print("\n------      option1   -   while     ------\n",option1_list_numbers,"\n\n\n")












 





"""------------------------            option2   -   while       -----------------------------"""



def func_option2(num):
     if (num * num) <= 100 and (num * num) >= 0:
          option2_list_numbers.append(num)


option2_list_numbers = [] 
i = 0
while i < 101:
     func_option2(i)
     i += 1

print("\n------      option2   -   while     ------\n",option2_list_numbers,"\n\n\n")
 






















"""------------------------            option3  -   for       -----------------------------"""

 




def func_option4(num):
     if (num*num) <= 100:
          option4_list_numbers.append(num*num)


option4_list_numbers = []
for i in range(101):
     func_option4(i)
 
 
print("\n------      option3   -   for     ------\n",option4_list_numbers,"\n\n\n")

         


















"""------------------------            option4  -   for       -----------------------------"""
 
def func_option4(num):
     if (num * num) <= 100 and (num * num) >= 0:
          option4_list_numbers.append(num)


option4_list_numbers = []
for i in range(101):
     func_option4(i)

  
print("\n------      option4   -   for     ------\n",option4_list_numbers,"\n\n\n")
 











 
