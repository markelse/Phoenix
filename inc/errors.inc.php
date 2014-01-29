<?php
/* 
 * Phoenix PHP was designed by Mark Else and is Copyrighted.
 * If you wish to use this script then please contact me at djtheropy@gmail.com.
 */

// Error Messages
// User errors
$errNoUser = "<span class='error'>Incorrect username or password entered, try again or <a href='index.php?page=register'>register a new account</a>.</span>";
$errUserLength  = "<span class='error'>Your username cannot be longer than 30 characters.</span>";
$errUserLengthACC  = "Your username cannot be longer than 30 characters.";
$errUserTaken   = "<span class='error'>Sorry, but the username that you selected is already taken. Please try again.</span>";

// Form field errors
$errFieldsEmpty = "<span class='error'>All form fields must be filled out.</span>";

// Password errors
$errWrongPass = "<span class='error'>Incorrect username or password entered, try again or <a href='index.php?page=register'>register a new account</a>.</span>";
$errPWMatch     = "<span class='error'>The passwords that you entered do not match, please check them and try again.</span>";
$errPWLength   = "<span class='error'>Your password must be at least 6 characters in length and contain at least 1 Upper-case, 1 numeric aand 1 non-alphabet character, something like yourN@m3 is OK.</span>";
$errPWLengthACC  = "Your password must be at least 6 characters in length and contain at least 1 Upper-case, 1 numeric aand 1 non-alphabet character, something like yourN@m3 is OK.";

// Email errors
$errEmailInvalid = "<span class='error'>Invalid email provided, the email must be in valid email format (such as name@domain.tld).</span>";