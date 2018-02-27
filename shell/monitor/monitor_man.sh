#!/bin/bash
resettem=$(tput sgr0)
declare -A ssharray
i=0
numbers=""
for script_file in `ls -I "monitor_man.sh" /usr/share/nginx/html/phpframe/shell/monitor/`
	do
		echo -e "\e[1;30m" "the script:" ${i} '===>' ${resettem} ${script_file}
		ssharray[$i]=${script_file}
		numbers="${numbers} | ${i}"
		i=$((i+1))
	done
while true
do
	read -p "please input a number [ ${numbers} ]:" execshell
	if [[ ! ${execshell} =~ ^[0-9]+ ]]; then
		exit 1
	fi
	/bin/sh ./${ssharray[$execshell]}
done
