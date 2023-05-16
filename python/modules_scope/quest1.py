
"""                         a                          """ 
print("\n\n-------------------          a             -------------------------")
def foo1(n):
     n = 4
     #print(type(n))
     print(n)


n = 3
foo1(n)
#print("\n\n",type(n))
print(n)

 




"""                        b                          """ 
print("\n\n-------------------          b             -------------------------")
def foo2(n):
     n[0] = 4
     print(n)


n = [3]
foo2(n)
print(n)





 


"""                        c                          """ 
""" 

print("\n\n-------------------          c             -------------------------")
def foo3(n):
     n[0] = 4
     print(n)


n = (3,)
foo3(n)
print(n)

""" 




"""             ???????????              d                             """ 
 
print("\n\n-------------------          d             -------------------------")
def foo4():
     if n == 2:
          print("x is 2")    
     else:
          print("x is  not 2")    
   
  

n = 2
foo4()








"""                            e                             """ 
 
print("\n\n-------------------          e             -------------------------")
def foo5(a = []):
     a.append(1)  
     print(a)    

   
foo5()
foo5()

 











