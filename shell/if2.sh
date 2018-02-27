#!/bin/bash

#统计根分区的使用率 并赋值给test
test=$(df -h | grep xvda1 | awk '{print $5}' | cut -d "%" -f 1)

if [ "$test" -gt "5" ];then

echo "your hardisk is fulling !!!!"

fi 
