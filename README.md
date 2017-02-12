# Interview Project: Contact Manager

This is a simple contact manager application that I wrote for a Senior PHP developer interview.

* I used a Bootstrap Material Design theme from [mdbootstrap](https://mdbootstrap.com/) for my styling.
* I used [Klein](https://github.com/klein/klein.php) as my router.
* I wrote my own crude ORM to handle the database related work.


## The Specification

Your objective is to create a contact manager application in PHP. 
* Create, Read, Update and Delete contacts
* Contacts needs to be stored in a MySQL database.
* Use jQuery and Bootstrap
* You are not allowed to use any PHP or JavaScript framework.
* You are not allowed to use an ORM.

If you have extra time try to add the following features
* Pictures for your contacts
* Favourites
* Searching


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


## TODO
* Implement validation on the forms
* Make search work as you type

## External packages used
* https://mdbootstrap.com/ - Material Design for Bootstrap
* https://github.com/klein/klein.php - a fast & flexible router for PHP 5.3+
* https://getcomposer.org/ - dependency manager for PHP
* 
