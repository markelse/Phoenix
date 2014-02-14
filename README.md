# WELCOME TO PHOENIX

My name is Mark and I am the sole developer of Phoenix. I am new to PHP and this is my first attempt at a full PHP script.

I decided to build this script because I needed to make a script for a project of mine that allowed users to register for an account and then login to a members area. 

Since the initial release I have build on the foundation of the registration and login functions and Phoenix now has;

1. Ability to allow visitors to register.
2. Ability to login.
3. Dedicated section for members.
..1. Ability to change email address
4. Dedicated section for Admin members (currently must be set via the database) admin = user_level 5
5. Works with .htaccess & mod_rewrite to provide SEF urls.

Phoenix also separates template files from code so that it is easy to update the look and feel of the script without having to worry about deleting important functions/code.

## Please Note!!
Currently the Phoenix script run on PHP & MYSQL *and has currently only been tested locally on a development server*, the script may contain errors and may have security holes, you are advised to fully test this script before using it in a productive environment.

### Installation

1. Open up phpmyadmin (or command or similar database admin tool).
..1. Run the provided SQL.
2. Visit the inc/functions.inc.php & inc/variable.inc.php files and change install paths, site name etc
3. Register a new member.
4. Open up phpmyadmin again and find the user that you have just registered and change the user_level entry from 1 to 5, this will make you an admin.
5. Login to your account and check that it is working OK.

### TO DO

1. ~~Add an admin area.~~
..1. Allow for user control (Add, edit & Delete)
..2. Allow for site config items to be edited in the admin (Site title etc)
2 ~~Create a user dashboard.~~
..1. Allow for password resets by email.
..2. Allow logged-in users the ability to change their password.
..3. ~~Allow logged-in users the ability to change their email.~~
3. ~~Allow for user roles.~~
4. Support for back-end content creation (Like a CMS).
..1. Along with WYSIWYG editing.
..2. & content syndication.
5. Add a site search.
6. Improve the look of the default template.
7. Incorporate 3rd party login scripts such as Facebook Connect & openID.