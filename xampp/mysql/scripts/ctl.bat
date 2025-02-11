@echo off
rem START or STOP Services
rem ----------------------------------
rem Check if argument is STOP or START

if not ""%1"" == ""START"" goto stop


"D:\soften\sprint1st\Project_2-master\xampp\mysql\bin\mysqld" --defaults-file="D:\soften\sprint1st\Project_2-master\xampp\mysql\bin\my.ini" --standalone
if errorlevel 1 goto error
goto finish

:stop
cmd.exe /C start "" /MIN call "D:\soften\sprint1st\Project_2-master\xampp\killprocess.bat" "mysqld.exe"

if not exist "D:\soften\sprint1st\Project_2-master\xampp\mysql\data\%computername%.pid" goto finish
echo Delete %computername%.pid ...
del "D:\soften\sprint1st\Project_2-master\xampp\mysql\data\%computername%.pid"
goto finish


:error
echo MySQL could not be started

:finish
exit
