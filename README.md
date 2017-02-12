# Interview Project: Contact Manager

This is a simple contact manager application that I had to do for an interview while applying for a Senior PHP Developer role.

## The Specification

Your objective is to create a contact manager application in PHP. 
* Create, Read, Update and Delete contacts
* Contacts needs to be stored in a MySQL database.
* Use jQuery and Bootstrap
* You are not allowed to use any PHP or JavaScript framework.

## Prerequisites

You will need the following things properly installed on your computer.

* [Git](http://git-scm.com/)
* [PHP](http://php.net/downloads.php)
* [MySQL](http://dev.mysql.com/downloads/)

## Installation

* `$ git clone https://github.com/MetaphoricalSheep/interviews.contact-manager.git`
* `$ cd interviews.contact-manager`                 - cd into the new directory
* `$ php composer.phar install`                       - install the dependencies
* `$ vim Database.php`                                - open the Database.php file and update it with your DB configs
* `$ mysql -u <username> -p<password> < database.sql` - Run the database.sql file to create the db

## Running

* `$ cd path/to/project/interviews.contact-manager` - cd into the project directory
* `$ php -S [ip]:8000`                              - start up the php development server. Ip can either be localhost or your public facing ip
*  Open Chrome and point it to [ip]:8000
