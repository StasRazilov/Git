#!/usr/bin/python3


def foo(*args,**kwargs): 
     for name in kwargs:
          if name == 'name':
               print(kwargs[name])
               return
     print('No name was passed')
     return


  
foo(1,2,3,4,5,name='hello')    

#foo(1,2,3,4,5)    



