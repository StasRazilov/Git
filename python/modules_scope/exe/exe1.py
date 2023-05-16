
glob = 10

def foo(var): 
     print('\n------------------\nfoo() - var:', var )
     print('\nvar in global:', 'var' in globals())     # by value
     print('\nglob in global:', 'glob' in globals())    
     print('\n-------------------------\n')




print('\n\nglob in global:', 'glob' in globals(),'\n\n')    

foo(glob)
print(glob,'\n\n')

glob = 20 
print(glob,'\n\n')
 
 
