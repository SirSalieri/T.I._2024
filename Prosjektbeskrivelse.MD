MIKE'S TERMINOPPGAVE:
  __NordPublica__
  

## Description

NordPublica is supposed to be online portal for Newsfeed, weather checking, calendar overview and planning events via user's default calendar-interface.
Newsfeed is supposed to be parted in three:
- BreakingNews,
- Local Newsfeed &
- Sportsnews.

  The goal was basically offering some typical infoservices for public domain of users - those who wish to be updated with daily info. 

###TO BE QUITE HONEST
  Due to lack of time, so many problems in the installation and, somewhat complicated conditions for project, the final product is quite imperfect and not fully done. Main Frontend is still kind of messy because of changes in the work-progress with backend, while backend-system itself is full of empty unfinished documents.
  
This repository contains code for:

1) Mainpage - index.php;
2) all website's pages:

   - about.html [for describing the NordPublica - their services and history],
   - avatars.html [for logging in / signing up to the portal]
   - calMAP.html [main calendar page; with calendar map with live tracking of the time],
   - calEVENTS.html [calendar-oriented element for making and remembering the events user makes on this page; ALSO WAS SUPPOSED to work, but due to lack of the time, does not have finished backend],
   - contact.html [includes simple form for inputting contact info of the user and redirects him to the default mail-interface for further communication],
   - sports.php [for loking into sports articles],
   - weather.html [for weather overview]

  Every of these have their own role in the service of this page. They are 'here or there' incomplete, unfunctional or have bare frontend elements.
  Anyway, the movement between the pages, responsitivity of the website and UI is more or less done, what is resulted with this - medium-quality standard interface.

## Installation

Installation tutorial will be provided lively, during the project's premiere-presentation!
UPDATE:
The system runs on a LAMP stack (Linux, Apache, MySQL, PHP). Follow the installation guide on `ndla.no` for setting up a virtual machine and installing the necessary components. Here are the necessary steps to set up and work with the project from this repository.

*IMPORTANT NOTE!
Before you begin, ensure you have met the following requirements:
* You have a `Linux` machine, preferably [Ubuntu](https://ubuntu.com/), to set up the LAMP stack.
* You have installed the latest versions of [PHP](https://www.php.net/), [Apache](https://httpd.apache.org/), and [MariaDB](https://mariadb.org/) (or [MySQL](https://www.mysql.com/)) on your machine.
* You have installed [Composer](https://getcomposer.org/) to manage PHP dependencies.

## Detailed LAMP Stack Setup on Ubuntu

1. **Update Package Repository**
   ```bash
   $ sudo apt update

2. **Install Apache2**
Install the Apache web server:

$ sudo apt install apache2

3. **Install MariaDB (MySQL Alternative)**
Install MariaDB which is a drop-in replacement for MySQL:

$ sudo apt install mariadb-server mariadb-client

4. **Secure MariaDB Installation**
Run the security script to set the root password, remove anonymous users, disallow remote root access, and remove the test databases:

$ sudo mysql_secure_installation

5. **Install PHP**
Install PHP along with common extensions:

$ sudo apt install php libapache2-mod-php php-mysql php-cli

6. **Start/Restart Apache2 and MariaDB**
To ensure both services are up and running, use the following commands:

$ sudo systemctl start apache2
$ sudo systemctl start mariadb

...Or if they were already running and you need to restart them:

$ sudo systemctl restart apache2
$ sudo systemctl restart mariadb


7. **Enable Services to Start on Boot**
Enable both Apache and MariaDB to start automatically upon system boot:

$ sudo systemctl enable apache2
$ sudo systemctl enable mariadb


8. **Adjust Firewall Settings**
  If you have UFW firewall running, allow traffic to Apache:

$ sudo ufw allow in "Apache Full"


9. **Test Your Installation**
To test your Apache installation, open your web browser and navigate to http://localhost/. You should see the Apache Ubuntu default page.
To test PHP processing, create a test PHP file in the web root directory:

$ echo "<?php phpinfo(); ?>" | sudo tee /var/www/html/phpinfo.php

Now navigate to http://localhost/phpinfo.php in your web browser. You should see a page displaying information about your PHP configuration.

10. **Configure Apache to Prioritize PHP Files**
Configure Apache to look for .php files first when searching for directory index files by editing the dir.conf file:

$ sudo nano /etc/apache2/mods-enabled/dir.conf

Move the index.php entry to the first position in the list, then save and exit the file. After all this restart Apache to apply changes by typing:

$ sudo systemctl restart apache2

11. **Accessing MariaDB**
To log into MariaDB, use the following command:

$ sudo mysql -u root -p

    You will be prompted for the root password that you set up during the mysql_secure_installation step.

Now that your LAMP stack is installed and configured, you can proceed to create databases, set up web applications, or host websites.

---

Once you are sure you have all necessary components installed in your Linux machine, you can continue to the next chapter - INSTALLING OF THE SYSTEM 'TICKETS' self;

## Installing "NordPublica"

To get the "NordPublica" system up and running on your Apache server, follow the steps below:

1. **Clone the Repository into the Web Directory**

 First, you need to navigate to the Apache server's root directory where websites are served from. Typically, this is the `htdocs` directory in XAMPP or the `var/www/html` directory in a standard Apache setup on Linux.

  For XAMPP on Windows:
   you would navigate to the following file directory by typing this command in command terminal:
   
   $ cd c:\xampp\htdocs\

... and for standard Apache on Linux:

  $ cd /var/www/html/

Once in the appropriate directory, use the following command to clone the repository:

$ git clone https://github.com/SirSalieri/T.I._2024 (with ~ 'sudo' in addition in the case of installation on ubuntu machine)

This will create a NordPublica directory inside your web server's root directory. If you're using a virtual host or an alias, ensure that the NordPublica directory is within the path specified for the virtual host or alias.

At the end:

Enter the newly cloned repository to begin setting up the application. Type the command:

$ cd NordPublica

...Or you can simply open this folder in Virtual Studio Code program where you can work on this project and develop it in your own way.


After you have cloned the repository to your server/local environment on your device, you can start installing necessary components in terminal prompt in VSC to input them in project.

2. First component you have to install is Composer. You install Composer by running this command in terminal:

$ composer install (add 'sudo' if installing on ubuntu)

3. After installing Composer, you have to make sure you have imported a database to your project. You do this in several steps:
1.1 First, log in to the MySQL/MariaDB console by typing this in your terminal:
   $ mysql -u root -p (add 'sudo' if installing on ubuntu)
1.2 Afterwards, create a new database, and name it 'nordpublica!!:
   CREATE DATABASE nordpublica;
   EXIT;
1.3 For the last, import the provided database schema and data that is found in this repository by typing this command:
   $ mysql -u root -p your_database_name < DATABASE/MIKES_OPPDRAG_db.sql
4. After all these installation steps, there might be necessary to check configuration settings that are located at the in the [includes] directory. Mainly, check if connect.php is configured to connect to right database with correct credentials. This is VERY IMPORTANT step since if you dont have correct connection-info, all the pages that are trying to fetch that info for transfering data to database and recieveing it back, WILL NOT BE ABLE TO WORK PROPERLY!

5. At the end, you should restart Apache to make the `.htaccess` and other configurations take effect. You do that by typing this command in you command prompt:
       $ sudo service apache2 restart
Once you are done with all this steps, you will hopefully be ready to move on - start testing and using this project.

## Usage

To use this project's content, you should access the system through the web server's configured domain or IP. Log in with the provided demo user credentials, or register a new account to begin.

## Usage

The website's final purpose could be parted in two possible usages:
1) One usage type can be explained as Admin's control over users (logging history, all registered users, data managment and 'publishing-backend' system interface / frontend for publishing and editing);
2) Complete Public-user fascilities -
   - Reading articles
      * Local Newsfeed,
      * Sportsnews &
      * Breaking newsfeed;
    - Checking wether;
    - Checking calendar;
    - Logging in and registering as a public user &
    - Contacting Administration.
    - potentially more in future :)

## License

All licences i have been using are added as separate files in the main repository. 
Those are:
-IUGENDA license for Usage of Private Data (Privacy Policy),
-W3schools' license about author rights on the content on the website.

For all additional info, please contact me - the Administrator SirSalieri.
