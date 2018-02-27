#!/bin/bash
resettem=$(tput sgr0)
Nginxserver="http://139.129.19.75"
Check_Nginx_Server()
{
	Status_code=$(curl -m 5 -s -w %{http_code} ${Nginxserver} -o /dev/null)
	if [ $Status_code -eq 000 -o $Status_code -ge 500 ]; then
		echo -e "\E[32em" "chenck http server Error! Response Status_code:" $resettem $Status_code
	else
		Http_content=$(curl -s ${Nginxserver})
		echo -e "\E[32em" "chenck http server Success! \n" $resettem $Http_content
	fi
}
Check_Nginx_Server