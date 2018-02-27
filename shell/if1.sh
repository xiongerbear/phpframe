#!/bin/bash

test=$(env | grep USER | cut -d "=" -f 2)

if [ "$test" == "root" ];then

echo "this is root!!!!!"

fi
