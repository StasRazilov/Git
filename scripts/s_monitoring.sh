#!/bin/sh 
#stas razilov
 
 
c=date --date '-1 min' 
grep  "$c" * "mount: Succeeded."   /var/log/syslog 
logger "process succeeded"
tail -1 /var/log/syslog

notify-send "Message" "process succeeded" 






# echo Entered Date is $x
# echo econd Date is $b
# echo
# date
# echo
# echo Entered Date is $a










#notify-send "Message" "Good Morning. Have a Nice day" 

 
# put current date as yyyy-mm-dd HH:MM:SS in $date
# date=$(date '+%Y-%m-%d %H:%M:%S')

# print current date directly
# echo $(date '%+H:%M:%S')



