#!/bin/bash  
#监控系统cpu的情况脚本程序  
 
#提取本服务器的IP地址信息  
IP=`ifconfig eth1 | grep "inet addr" | cut -f 2 -d ":" | cut -f 1 -d " "`  
 
#取当前空闲cpu百份比值（只取整数部分）  
cpu_idle=`top -b -n 1 | grep Cpu | awk '{print $5}' | cut -f 1 -d "."`  
 
#设置空闲cpu的告警值为20%，如果当前cpu使用超过80%（即剩余小于20%），立即发邮件告警  
if (($cpu_idle < 20)); then  
    echo "$IP服务器cpu剩余$cpu_idle%，使用率已经超过80%，请及时处理。"
else
	echo "$IP服务器cpu剩余$cpu_idle%，运行正常。"
fi
