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

1. Open up phpmyadmin (or command or similar database admin tool).
2. Run the provided SQL.
3. Open phpmyadmin (or similar database tool) and fill out the default site info in the config table.
3. Register a new member.
4. Open up phpmyadmin again and find the user that you have just registered and change the user_level entry from 1 to 5, this will make you an admin.
5. Edit .htaccess and change your site path to match what you have entered in config.
6. Login to your account and check that it is working OK.