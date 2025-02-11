@echo off
cd /D %~dp0
cmd.exe /C start "" /MIN call "D:\soften\sprint1st\Project_2-master\xampp\killprocess.bat" "httpd.exe"
if not exist apache\logs\httpd.pid GOTO exit
del apache\logs\httpd.pid

:exit
