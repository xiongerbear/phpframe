#!/bin/bash
filepath=/usr/share/nginx/html/phpframe/shell/tmp/
# vim /scripts/free-mem.sh
#抓取Swap分区free值（以追加的方式写入文件>>） 
echo "检测时间": `date` >> ${filepath}date-time.txt 
echo "内存剩余空间": `free -m | grep Mem | awk '{print $4}'`M  >> ${filepath}mem-free.txt  
echo "Buffer-内存剩余空间": ` free -m | grep - | awk '{print $4}'`M  >> ${filepath}buffers-free.txt  
echo "Swap-内存剩余空间": `free -m | grep Swap | awk '{print $4}'`M  >> ${filepath}swap-free.txt    
#逐行连接上面的时间和内存相关行数据（每次重新写入文件>）  
paste  ${filepath}date-time.txt ${filepath}mem-free.txt  ${filepath}buffers-free.txt   ${filepath}swap-free.txt   > ${filepath}freemem.txt