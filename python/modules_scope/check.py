 
print("--------------------------------------------------------------------------------------------\n")
print("--------------------------------------------------------------------------------------------\n")
print("--------------------------            start   link 1                -------------------------------------")
print("\n--------------------------------------------------------------------------------------------\n")
print("--------------------------------------------------------------------------------------------\n") 





glob = 10

def foo():
     loc = 1
     loc += 1  
     print('foo() - glob:', glob )
     print('foo() - loc:', loc ,'\n\n')




foo()
glob += 100  
foo()
print('loc in global:', 'loc' in globals())    
print('loc in locals:', 'loc' in locals())
print('glob in foo:', 'foo' in globals()) 
print('loc in locals:', glob )













print("\n\n-----------------------          1.1         --------------------------------\n\n")

 

a_var = 'global variable'

def a_func():
    print(a_var, '[ a_var inside a_func() ]')
 

a_func()
print(a_var, '[ a_var outside a_func() ]')












print("\n\n-----------------------          1.2         --------------------------------\n\n")
a_var = 'global value'

def a_func():
    a_var = 'local value'
    print(a_var, '[ a_var inside a_func() ]')



a_func()
print(a_var, '[ a_var outside a_func() ]')












print("\n\n-----------------------          1.3         --------------------------------\n\n")
a_var = 'global value'

def a_func():
    global a_var
    a_var = 'local value'
    print(a_var, '[ a_var inside a_func() ]')




print(a_var, '[ a_var outside a_func() ]')
a_func()
print(a_var, '[ a_var outside a_func() ]')


 







"""
print("\n\n-----------------------          1.4         --------------------------------\n\n")
a_var = 1

def a_func():
    a_var = a_var + 1
    print(a_var, '[ a_var inside a_func() ]')

print(a_var, '[ a_var outside a_func() ]')
a_func()

"""










print("\n\n-----------------------          2.1         --------------------------------\n\n")

a_var = '1global value'

def outer():
     a_var = '2enclosed value'
     print(a_var,"\n")
    
     def inner():
          a_var = '3local value'
          print(a_var,"\n")

     inner()

     print(a_var,"\n")


print(a_var,"\n")
outer() 
print(a_var,"\n")














print("\n\n-----------------------          2.2         --------------------------------\n\n")
a_var = '1global value'

def outer():
     a_var = '2local value'
     print('\n', a_var)
     
     def inner():
          nonlocal a_var
          a_var = '3inner value'
          print('\n', a_var)

     inner()
     print('\n', a_var)




print('\n', a_var)
outer()
print('\n', a_var)










print("\n\n-----------------     ???????     working.    why    ???????                3      --------------------------------\n\n")
 
 
def len(in_var):
    print('called my len() function')
    l = 0
    for i in in_var:
        l += 1
    return l

def a_func(in_var):
    len_in_var = len(in_var)
    print('Input variable is of length', len_in_var)

a_func('aaa')













print("\n\n-----------------                       4                     --------------------------------\n\n")
"""  ????????????????     why go inside      func -> def len(in_var):     ???????????????"""

a = '1'

def outer():

    def len(in_var): 
        print('called my len() function: ', end="") 
        l = 110
        for i in in_var:
            l += 1
        return l

    a = '22'

    def inner():
        global len
        nonlocal a
        a += ' 333'
    inner()
    print('a is', a)
    print("zzzzzz",len(a))


outer()

print(len(a))
print('a is', a)






 

print("\n\n-----------------                       5                     --------------------------------\n\n")


var = 2

def func(copy_var):
    return copy_var*20


print(var,"\n\n")
var = func(var)
print(var,"\n\n")


print("\n--------------------------------------------------------------------------------------------\n")
print("--------------------------------------------------------------------------------------------\n")
print("--------------------------------------------------------------------------------------------\n")
print("--------------------------            end   link 1                -------------------------------------")
print("\n--------------------------------------------------------------------------------------------\n")
print("--------------------------------------------------------------------------------------------\n")
print("--------------------------------------------------------------------------------------------\n")



print("\n\n\n\n\n\n\n\n\n") 

 
print("--------------------------------------------------------------------------------------------\n")
print("--------------------------------------------------------------------------------------------\n")
print("--------------------------            start   link 2                -------------------------------------")
print("\n--------------------------------------------------------------------------------------------\n")
print("--------------------------------------------------------------------------------------------\n") 





print("\n\n-----------------             ?????     why      1                     --------------------------------\n\n")
def scope_test():
    def do_local():
        spam = "2"

    def do_nonlocal():
        nonlocal spam
        spam = "3"

    def do_global():
        global spam
        spam = "4"

    spam = "1"
    do_local()
    print("After local assignment:", spam)
    do_nonlocal()
    print("After nonlocal assignment:", spam)
    do_global()
    print("After global assignment:", spam)




scope_test()
print("In global scope:", spam)
















print("\n\n-----------------                    2                    --------------------------------\n\n")


class Dog:

    def __init__(self, name):
        self.name = name
        self.tricks = []    # creates a new empty list for each dog

    def add_trick(self, trick):
        self.tricks.append(trick)



d = Dog('Fido')
e = Dog('Buddy')
d.add_trick('roll over')
e.add_trick('play dead')
d.tricks

print(d.name) 
print(d.tricks[0])
print("\n\n\n") 
print(e.name) 
print(e.tricks[0])





print("\n\n--------------------              3                   --------------------------------\n\n")

class Warehouse:
     purpose = 'storage'
     region = 'west'



w1 = Warehouse()
print(w1.purpose, w1.region)
 



w2 = Warehouse()
w2.region = 'aaaaaaaa'
print(w2.purpose, w2.region)









print("\n\n--------------------          ??????????????     4                    --------------------------------\n\n")

def f1(self, x, y):
    return min(x, x+y)

class C1:
    f = f1

    def g(self):
        return 'hello world'

    h = g


a = C1()
# a.f = "aaa"

print(a.f)







print("\n\n--------------------      ?????????        5                    --------------------------------\n\n")
class Bag:
    def __init__(self):
        self.data = []

    def add(self, x=2):
        self.data.append(x)

    def addtwice(self, x):
        self.add(x)
        self.add(x)


b = Bag()
# a.f = "aaa"

print(b.data)












 






print("\n\n\n\n")


