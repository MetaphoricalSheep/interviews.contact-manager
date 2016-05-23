# Contact Manager

This is a simple contact manager application that I had to do for an interview.

## Prerequisites

You will need the following things properly installed on your computer.

* [Git](http://git-scm.com/)
* [PHP](http://php.net/downloads.php)
* [MySQL](http://dev.mysql.com/downloads/)

## Installation

* `git clone git@github.com:PieterUysFourie/contact_manager.git`
* `cd contact_manager` cd into the new directory
* `php composer.phar install` install the dependencies
* `vim Database.php` open the Database.php file and update it with your DB configs
* `mysql -u <username> -p<password> < database.sql` Run the database.sql file to create the db

## Running

* `cd path/to/project/contact_manager` cd into the project directory
* `php -S [ip]:8000` start up the php development server. Ip can either be localhost or your public facing ip
*  Open Chrome and point it to [ip]:8000
