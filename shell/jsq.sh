#!/bin/bash

#字符界面加减乘除计算器

read -t 30 -p "please input num1:" num1
read -t 30 -p "please input num2:" num2

#通过read命令接收计算的数值，并赋值给变量num1，num2

read -t 30 -p "please input a operator:" ope
#同样的方法将运算符赋值给ope

if [ -n "$num1" -a -n "$num2" -a -n "$ope" ]
#第一层判断是否存在 -a 表示多个条件
	then
	test1=$(echo $num1 | sed 's/[0-9]//g')
	test2=$(echo $num2 | sed 's/[0-9]//g')
	
	if [ -z "$test1" -a -z "$test2" ]
		then
			if [ "$ope" == '+' ]
				then
				sum=$(( $num1 + $num2))
				#加法运算
			elif [ "$ope" == "-" ]
				then
				sum=$(( $num1 - $num2 ))
			elif [ "$ope" == "*" ]
				then
				sum=$(( $num1 * $num2 ))
			elif [ "$ope" == "/" ]
				then
				sum=$(( $num1 / $num2 ))
			else
				echo "please enter a valid  symbol:"
				#如果运算符不匹配，提示输入有效的运算符
				exit 10
			fi
	else
		#如果test1 和test2 值不为空 说明输入不是数值
		echo "please enter valid value:"
		exit 11
	fi
else
	echo "please input value:"
	exit 12
fi

echo "$num1 $ope $num2 : $sum"
exit 13
