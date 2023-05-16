#!/usr/bin/python3


def myfunc(a):
     return len(a)




x = map(myfunc, ('apple', 'banana', 'cherry', 'aaaaaaaa'))

print(x)
 
print(list(x))
print(type(x))

mylist=list(x)

print(type(mylist))




