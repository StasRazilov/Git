#!/usr/bin/python3

class Student:
  marks = 0

  def compute_marks(self, obtained_marks):
    marks = obtained_marks
    print('\n\n\nObtained Marks:', marks)



 
# convert compute_marks() to class method
Student.print_marks = classmethod(Student.compute_marks)
Student.print_marks(88)



