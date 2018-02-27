#!/bin/bash
#批量添加用户

read -t 30 -p "please input user name:" name
read -t 30 -p "please input the number of user:" num
read -t 30 -p "please input the default pass:" pass

if [ ! -z "$name" -a ! -z "$num" -a ! -z "$pass" ]
	then
	y=$(echo $num | sed 's/[0-9]//g')
		if [ -z "$y" ]
			then
			for (( i=1;i<=$num;i=i+1 ))
				do
					/usr/sbin/useradd $name$i &>/dev/null
					echo $pass | /usr/bin/passwd --stdin $name$i &>/dev/null
				done
		fi
fi
