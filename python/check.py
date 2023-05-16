 
myl = "aaaaaa"
x = len(myl)

print(x)

"""       reversed        """
 
seq_tuple = ('P', 'y', 't', 'h', 'o', 'n')
print(reversed(seq_tuple))

seq_list = [1, 2, 4, 3, 5]
print(list(reversed(seq_list)))

num = "123"
print(list(reversed(num)))




"""       reverse         """
# create a list of prime numbers
prime_numbers = [2, 3, 5, 7]
 

print('prime_numbers: ', prime_numbers)

# reverse the order of list elements
prime_numbers.reverse()
print('Reversed List:', prime_numbers)

 



"""       sorted         """
a = ("b", "g", "a", "d", "f", "c", "h", "e")

x = sorted(a)

print(x)



strirg1 = "bceaf"
print(strirg1)
strirg1 = sorted(strirg1) 
print(strirg1)



"""       sort         """
cars = ['Ford', 'BMW', 'Volvo']

cars.sort(reverse=True)
print(cars)


cars.sort(reverse=False)
print(cars)





"""       max   and    min       """
num = [1, 3, 2]
max_num = max(num) 
print("max: %d" % max_num)
 
min_num = min(num) 
print("min: %d" % min_num)


"""     quest  1     """

a = 10
b = 20
c = 30
print("\nBefore swap a = %d and b = %d and c = %d" %(a, b, c))
a, b, c = c, a, b
print("\nBefore swap a = %d and b = %d and c = %d" %(a, b, c))



"""     quest  2      """
print("\n\n\n\n")
print("aaa".upper(), "\n\n")
 
print(dir("aaa"), "\n\n")
 
print(dir(str)) 
print("\n\n")
"""     quest  3     """

x = [1,2,3]
y=x
y[0] = 8
print(x, "\n\n")




"""     quest  4    """


x = 1
y=x
y = 2
print(x, "\n\n")



"""     quest  5         """

a_num = [1,2,3]
print(a_num, "\n\n")
del a_num[1]
print(a_num, "\n\n")


"""     quest  6   and  7       """

def foo1(n):
     n += 1 
     print(n)


def foo2(n):
     n += [1] 
 
 
a = 555
foo1(a)
print(a)

b = [4,3,2]
foo2(b)
print(b)



"""     quest  8       """


id_a = id(a)
print("\n\n\n", type(id_a))
print("\n\n\n", id_a)
id_a = id(a)+1
print("\n\n\n", id_a)
id_a += 1

print("\n\n\n", id_a)
id_a = id(a)
print("\n\n\n", id_a)





"""       quest   11   and   12          """
   
data = [["name1", "aaaa", 1, 2, 3],
        {"name" : "bbbb", "age" :  70},
        ["name2", "cccc", 11, 22, 33]]

print("\n\n+++++++++++++++++++++++++++++++++++++++++")
print("\n\n+++++++++++++++++++++++++++++++++++++++++\n", data)
print("\n\n\n", type(data))
print("\n", data[1]["name"])
print("\n", data[1]["age"])
print("\n", data[0][0])
print("\n", data[0][1])
print("\n", data[0][2])
print("\n", data[2][0])
print("\n", data[2][1])
print("\n", data[2][2]) 
print("\n\n\n")

data = ["name1", "aaaa", 1, 2, 3]

for i in data: 
     print(i)
 

print("\n\n\n")
 
"""       quest   15          """
print("\n===========================================n")




print("\n--------------   1    ------------------\n")
a = 1 
b = 1

print(id(a))
print(id(b))
print(a == b , a is b ,"\n")





print("\n--------------   2    ------------------\n")

a = 5555
b = 5555

print(id(a))
print(id(b))
print(a == b , a is b ,"\n")





print("\n--------------   3    ------------------\n")

a = ()
b = ()

print(id(a))
print(id(b))
print(a == b , a is b ,"\n")







print("\n--------------   4    ------------------\n")
a = (1,2,3)
b = (1,2,3)

print(id(a))
print(id(b))
print(a == b , a is b ,"\n")








print("\n--------------   5    ------------------\n")
a = []
b = []
print(type(a))  
print(a == b , a is b ,"\n")











print("\n--------------   6    ------------------\n")
a = [1,2,3]
b = [1,2,3]
print(type(a))
print(type(b))
print(a == b , a is b ,"\n")










print("\n--------------   7    ------------------\n")
 
a = [1,2,3]
b = a[:]
print(type(a))
print(type(b))
print(a == b , a is b ,"\n")

print("\n===========================================n")
 

































