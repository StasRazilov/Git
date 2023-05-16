GD=gcc -ansi -pedantic-errors -Wall -Wextra -g -o
CPPFLAGS = -DNDEBUG
FOOBER= fooer.out
FILES = main.o foo.o  

 
fooer.out: main.o foo.o
	@$(GD) $(FOOBER) $(FILES)



main.o: main.c
	@gcc -g -O -c main.c



foo.o: foo.c
	@gcc -g -O -c foo.c
	
	
	
debug: 
	@$(GD)$(FOOBER) $(CPPFLAGS) $(FILES)



all: fooer.out



clean: foo.o main.o
	@echo "clean all files obj"
	@rm *.o



libfoo.ar: main.o foo.o
	@ar -r libfoo.ar $(FILES)
 


hello:
	@echo "hhheeeelllllllppppppppp!!!!!!"

 
 
cread_files_txt: 
	@echo "aaa" >> t1.txt; 
	@echo "aaa" >> t2.txt; 
	@echo "aaa" >> t3.txt;
	
	