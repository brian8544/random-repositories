echo off
cls

if exist C:\Windows\Microsoft.NET\Framework\v4.0.303199\ (

rd /s /q bin\
rd /s /q obj\
C:\Windows\Microsoft.NET\Framework\v4.0.30319\MSBuild.exe Project.sln

bin\Debug\FILE_NAME_HERE.exe
bin\Release\FILE_NAME_HERE_.exe

cls
pause

)else (

echo No MSBuild found!
echo Launching download...
start https://download.microsoft.com/download/1/B/E/1BE39E79-7E39-46A3-96FF-047F95396215/dotNetFx40_Full_setup.exe
echo Start this batch file again, when installation is complete.
pause
)