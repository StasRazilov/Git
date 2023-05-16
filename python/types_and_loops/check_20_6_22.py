def Quest9_A(var):
     print(var)
     pass


def Quest9_B(var):
    print("%d " % (var))
    pass


def Quest9_C(var):
    print(f'{var:d}')
    pass


'''   option 1   quest 12 
def add():
   x = 'Print X'
   print(x)


def add(x):
   print(x)
'''

'''   option 2   quest 12 '''


def myfun(myarg=None):
    if myarg is None:
        myarg = 'default'
    print(myarg)


def wrapper(func, args):
    func(args)


def func1(x):
    print(x)


def func2(x, y, z):
    return x+y+z


'''   option 2   quest 12 '''
number = 1000000000000000000000000000000000
print(type(number))
print(number)

number1 = 2.5
print(type(number1))
print(number1)

a_true_alias = True
print(type(a_true_alias))
print(a_true_alias)

print("\n\n\n")

test = []
print(test, 'is', bool(test))  # False

test = [0]
print(test, 'is', bool(test))  # True

test = 0.0
print(test, 'is', bool(test))  # False

test = None
print(test, 'is', bool(test))  # False

test = True
print(test, 'is', bool(test))  # True

test = 'Easy string'
print(test, 'is', bool(test))  # True

print("""\n\n\n STR""")

grade = "b"
marks = 90
print("aaaaaa %s aaa %d ." % (grade, marks))

grade = "d"
marks = 10
print("ccccc " + grade + " cccc " + str(marks))

print("""\n\n\n None""")

print(type(None))
date = None
print(date == True)

if date is None:
    print("if = None")
else:
    print("if = not None")

print("""\n\n\n if else elif python""")
num = 3

if num > 0:
    print("Positive number" + str(num))
elif num == 0:
    print("Zero")
else:
    print("Negative number")

print("""\n\n\n while break continue python""")

for val in "abcde":
    if val == "c":
        continue
    if val == "e":
        break
    print(val)
print("""\n""")

i = 0
while i < 5:
    print(i)
    i += 1

print("""\n\n help AND type AND QUESTIONS""")
help(print)
print(type(number))
number = str(number)
print(type(number))

print("\n\nQUEST 4")

range_1 = range(1, 10, 1)
number = 2.5

if number in range_1:
    print('1')
else:
    print('0')

print("\n\nQUEST 7")

txt1 = 'name= {fname}, age= {age}'.format(fname="John", age=36)
print(txt1)
txt2 = 'name= {0}, age= {1}'.format("John", 36)
print(txt1)
txt3 = 'name= {}, age= {}'.format("John", 36)
print(txt1)

print("\n\nQUEST 9")
var1 = 1
Quest9_A(var1)
Quest9_B(var1)
Quest9_C(var1)

print("\n\nQUEST 10")

#  del var1
#  Quest9_C(var1)

print("\n\nQUEST 12")
'''   option 1
x = 10
add(x)
'''
'''   option 2   quest 12 '''

myfun()
myfun('aaa')
myfun('aaa aaa aaa')

print("\n\nQUEST 13")
"""
x = 1
y = 2
z = 3
wrapper(func1, [x])
wrapper(func2, [x, y, z])
"""

print("\n\nQUEST 14")
num = "0"
print("The ASCII value of '" + num + "' is", ord(num))

