# WELCOME TO PHOENIX

My name is Mark and I am the sole developer of Phoenix. I am new to PHP and this is my first attempt at a full PHP script.

I decided to build this script because I needed to make a script for a project of mine that allowed users to register for an account and then login to a members area. 

Since the initial release I have build on the foundation of the registration and login functions and Phoenix now has;

1. Ability to allow visitors to register.
2. Ability to login/logout using sessions.
3. Dedicated section for members.
4. Ability to change email address and passwords once logged in.
5. Dedicated section for Admin members
6. Ability to edit users from the admin backend.
7. Ability to add pages and edit pages from the admin backend.
8. Ability to update site config from the admin backend.
7. Works with .htaccess & mod_rewrite to provide SEF urls. (domain.com/category/page_name/)

Phoenix CMS is also template based so that it is easy to update the look and feel of the script without having to worry about deleting important functions/code.

## Please Note!!
Currently the Phoenix script runs on PHP & MYSQL *and has only been tested locally on a development server and 1 live server running PHP 5.4 & MYSQL 5.5*, the script may contain errors and may have security holes, 
you are advised to fully test this script before using it in a productive environment. The script has also only been tested in the Chrome browser.

### Installation

1. Open /inc/db.inc.php and edit to match your database.
2. Open /install.php and edit to match your details.
3. Run /install.php in your web browser.
4. Edit .htaccess to match the path to your index.php file.