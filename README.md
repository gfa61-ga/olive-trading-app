
# Olive Olive trading app (In Greek language)
[Live demo](http://elies-app.000webhostapp.com)

## Installation and run

1. Download and install uniformserver from http://www.uniformserver.com/
2. Clone this repo's content inside www folder of UniServer installation folder
3. Run UniController.exe to start the UniServer
4. Go to MySql/Change Musql password, set MySql password for root user (http://wiki.uniformserver.com/index.php/MySQL_Security#Root_User) and update $db_password variable in loginelies.php file
5. Press "Start Apache" and "start MySQL" buttons
6. Download and install MySQL Administrator version 1.1.9 for windows from https://downloads.mysql.com/archives/administrator/
7. Run MySQL Administrator and connect to localhost Mysql, as root user with the MySql password you set above
8. Select Restore/Open BackUp File and select setdatabase.sql file and Start Restore
9. Open the application at http://localhost/
10. Open http://localhost/phpMyAdmin/ when you need to admin the database content (connect as root user with your MySql password)