<?php
require 'inc/db.inc.php';

$site_name          = "";  // The name of your website.
$site_path          = "";  // The path to your root folder, usually something like /home/user/public_html/ (with trailing slash)
$site_url           = "";  // The URL of your website (with trailing slash)
$site_theme         = "default";  // Leave as default unless you have created a new theme and placed it inside the inc/themes/ folder

$admin_user         = "";
$admin_email        = "";
$admin_pass         = ""; // Must contain at least 1 lower-case, 1 upper-case, 1 numeric and 1 special character.

if(!preg_match('/^(?=(.*[a-z]){1,})(?=(.*[\d]){1,})(?=(.*[\W]){1,})(?!.*\s).{7,30}$/',$admin_pass))  {
        user_message("error message","Error","$msg_password_length");
} elseif($site_name == "" || $site_path == "" || $site_url == "") {
    user_message("error message","Error","$msg_empty_fields");
} elseif($admin_user == "" || $admin_email == "" || $admin_pass == "") {
   user_message("error message","Error","$msg_empty_fields");
} else {
    
$hash = hash('sha256', $admin_pass);
function createSalt() {
    $string = md5(uniqid(rand(), true));
    return substr($string, 0, 3);
}
$salt = createSalt();
$hash = hash('sha256', $salt . $hash);

$create_db = mysqli_query($con, "
CREATE TABLE IF NOT EXISTS `config` (
  `Name` varchar(30) NOT NULL COMMENT 'No spaces',
  `Value` varchar(30) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;") or die("1");

$create_db = mysqli_query($con, "INSERT INTO `config` (`Name`, `Value`, `Description`, `id`) VALUES
('site_name', '{$site_name}', 'What is the name of the site that you are running?', 1),
('site_path', '{$site_path}', 'The full path to the root of your installation, must have a trailing slash ''/'' on the end.', 2),
('site_url', '{$site_url}', 'The URL of the site, must contain a trailing slash ''/'' at the end.', 3),
('site_theme', '{$site_theme}', 'The name of the theme that you wish to use, must be a valid folder within the inc/themes/ directory.', 4);") or die("2");

$create_db = mysqli_query($con, "CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `excerpt` varchar(250) NOT NULL,
  `body` text NOT NULL,
  `category` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `title` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;") or die("3");

$create_db = mysqli_query($con, "INSERT INTO `pages` (`id`, `title`, `excerpt`, `body`, `category`) VALUES
(1, 'Home', '<p>My name is Mark and I am the sole developer of Phoenix.</p><p>I am new to PHP and this is my first attempt at a full PHP script.</p>', '<p>My name is Mark and I am the sole developer of Phoenix.</p>\r\n<p>I am new to PHP and this is my first attempt at a full PHP script.</p>\r\n<p>I decided to build this script because I needed to make a script for a project of mine that allowed users to register for an account and then login to a members area.</p>\r\n<p>Since the initial release I have build on the foundation of the registration and login functions and Phoenix now has;</p>\r\n<ul>\r\n<li>Ability to allow visitors to register.</li>\r\n<li>Ability to login/logout using sessions.</li>\r\n<li>Dedicated section for members.</li>\r\n<li>Ability to change email address&nbsp;once logged in.</li>\r\n<li>Ability to change passwords once logged in.</li>\r\n<li>Dedicated section for Admin members.&nbsp;</li>\r\n<li>Ability to edit users via admin area.</li>\r\n<li>Ability to update site config via admin area.</li>\r\n<li>Ability to add/edit pages via admin area.</li>\r\n<li>Works with .htaccess &amp; mod_rewrite to provide SEF urls. (domain.com/page_name/)</li>\r\n</ul>', 'Home'),
(2, 'About', '<p>This is the default about us page.</p>', '<p>This is the default about us page. It can be edited in the admin area.</p>', 'Home');") or die("4");

$create_db = mysqli_query($con, "CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` varchar(3) NOT NULL,
  `user_level` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2") or die("5");

$create_db = mysqli_query($con, "INSERT INTO `users` (`id`, `username`, `email`, `password`, `salt`, `user_level`) VALUES
(1, '{$admin_user}', '{$admin_email}', '{$hash}', '{$salt}', 5)") or die("6");

echo "Installed successfully, please <a href='{$site_url}login.php'>click here to login</a>. Please also delete this installation file now.";
}