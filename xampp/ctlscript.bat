@echo off
rem START or STOP Services
rem ----------------------------------
rem Check if argument is STOP or START

if not ""%1"" == ""START"" goto stop

if exist D:\soften\sprint1st\Project_2-master\xampp\hypersonic\scripts\ctl.bat (start /MIN /B D:\soften\sprint1st\Project_2-master\xampp\server\hsql-sample-database\scripts\ctl.bat START)
if exist D:\soften\sprint1st\Project_2-master\xampp\ingres\scripts\ctl.bat (start /MIN /B D:\soften\sprint1st\Project_2-master\xampp\ingres\scripts\ctl.bat START)
if exist D:\soften\sprint1st\Project_2-master\xampp\mysql\scripts\ctl.bat (start /MIN /B D:\soften\sprint1st\Project_2-master\xampp\mysql\scripts\ctl.bat START)
if exist D:\soften\sprint1st\Project_2-master\xampp\postgresql\scripts\ctl.bat (start /MIN /B D:\soften\sprint1st\Project_2-master\xampp\postgresql\scripts\ctl.bat START)
if exist D:\soften\sprint1st\Project_2-master\xampp\apache\scripts\ctl.bat (start /MIN /B D:\soften\sprint1st\Project_2-master\xampp\apache\scripts\ctl.bat START)
if exist D:\soften\sprint1st\Project_2-master\xampp\openoffice\scripts\ctl.bat (start /MIN /B D:\soften\sprint1st\Project_2-master\xampp\openoffice\scripts\ctl.bat START)
if exist D:\soften\sprint1st\Project_2-master\xampp\apache-tomcat\scripts\ctl.bat (start /MIN /B D:\soften\sprint1st\Project_2-master\xampp\apache-tomcat\scripts\ctl.bat START)
if exist D:\soften\sprint1st\Project_2-master\xampp\resin\scripts\ctl.bat (start /MIN /B D:\soften\sprint1st\Project_2-master\xampp\resin\scripts\ctl.bat START)
if exist D:\soften\sprint1st\Project_2-master\xampp\jetty\scripts\ctl.bat (start /MIN /B D:\soften\sprint1st\Project_2-master\xampp\jetty\scripts\ctl.bat START)
if exist D:\soften\sprint1st\Project_2-master\xampp\subversion\scripts\ctl.bat (start /MIN /B D:\soften\sprint1st\Project_2-master\xampp\subversion\scripts\ctl.bat START)
rem RUBY_APPLICATION_START
if exist D:\soften\sprint1st\Project_2-master\xampp\lucene\scripts\ctl.bat (start /MIN /B D:\soften\sprint1st\Project_2-master\xampp\lucene\scripts\ctl.bat START)
if exist D:\soften\sprint1st\Project_2-master\xampp\third_application\scripts\ctl.bat (start /MIN /B D:\soften\sprint1st\Project_2-master\xampp\third_application\scripts\ctl.bat START)
goto end

:stop
echo "Stopping services ..."
if exist D:\soften\sprint1st\Project_2-master\xampp\third_application\scripts\ctl.bat (start /MIN /B D:\soften\sprint1st\Project_2-master\xampp\third_application\scripts\ctl.bat STOP)
if exist D:\soften\sprint1st\Project_2-master\xampp\lucene\scripts\ctl.bat (start /MIN /B D:\soften\sprint1st\Project_2-master\xampp\lucene\scripts\ctl.bat STOP)
rem RUBY_APPLICATION_STOP
if exist D:\soften\sprint1st\Project_2-master\xampp\subversion\scripts\ctl.bat (start /MIN /B D:\soften\sprint1st\Project_2-master\xampp\subversion\scripts\ctl.bat STOP)
if exist D:\soften\sprint1st\Project_2-master\xampp\jetty\scripts\ctl.bat (start /MIN /B D:\soften\sprint1st\Project_2-master\xampp\jetty\scripts\ctl.bat STOP)
if exist D:\soften\sprint1st\Project_2-master\xampp\hypersonic\scripts\ctl.bat (start /MIN /B D:\soften\sprint1st\Project_2-master\xampp\server\hsql-sample-database\scripts\ctl.bat STOP)
if exist D:\soften\sprint1st\Project_2-master\xampp\resin\scripts\ctl.bat (start /MIN /B D:\soften\sprint1st\Project_2-master\xampp\resin\scripts\ctl.bat STOP)
if exist D:\soften\sprint1st\Project_2-master\xampp\apache-tomcat\scripts\ctl.bat (start /MIN /B /WAIT D:\soften\sprint1st\Project_2-master\xampp\apache-tomcat\scripts\ctl.bat STOP)
if exist D:\soften\sprint1st\Project_2-master\xampp\openoffice\scripts\ctl.bat (start /MIN /B D:\soften\sprint1st\Project_2-master\xampp\openoffice\scripts\ctl.bat STOP)
if exist D:\soften\sprint1st\Project_2-master\xampp\apache\scripts\ctl.bat (start /MIN /B D:\soften\sprint1st\Project_2-master\xampp\apache\scripts\ctl.bat STOP)
if exist D:\soften\sprint1st\Project_2-master\xampp\ingres\scripts\ctl.bat (start /MIN /B D:\soften\sprint1st\Project_2-master\xampp\ingres\scripts\ctl.bat STOP)
if exist D:\soften\sprint1st\Project_2-master\xampp\mysql\scripts\ctl.bat (start /MIN /B D:\soften\sprint1st\Project_2-master\xampp\mysql\scripts\ctl.bat STOP)
if exist D:\soften\sprint1st\Project_2-master\xampp\postgresql\scripts\ctl.bat (start /MIN /B D:\soften\sprint1st\Project_2-master\xampp\postgresql\scripts\ctl.bat STOP)

:end

