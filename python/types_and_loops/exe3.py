def is_leap_year(num):
    if num % 100 != 0 and num % 4 == 0 or num % 400 == 0:
        print("It's a leap year.")
    else:
        print("It's not a leap year.")

is_leap_year(100)
 
