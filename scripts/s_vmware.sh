#!/bin/sh

#stas razilov


#   Get a listing of VMs on a host
vms=$(vim-cmd vmsvc/getallvms | awk '{print $1}' | awk '(NR>1)')


for i_vm in $vms
 do  #  checking the current state of the VM   -  if off enters
    if vim-cmd vmsvc/power.getstate $i_vm == "Powered off"; then
      echo "The Virtual Machine $i_vm is startup"
      vim-cmd vmsvc/power.on $i_vm  # play vm
    else
      echo "The Virtual Machine $i_vm is already On"
    fi
 done

#!/bin/bash


ls "$1" | wc -l
