<?php
include "functions.php";
 if ($_POST['password'] == $_POST['password1']){
     $email = $_POST['email'];
     $password = $_POST['password'];

     $user = resetPassword($email, $password);

     $data = add_space($user);
     store_file($user, $data);

     if ($user != 0){
         print "Password reset Successful!";
         print "<br>";
         print "<br>";
         print "<a href=\"signin.html\">Click to Sign in with your new password</a>"; 
     }
 } else {
     print "Password does not match";
     print "<br>";
     print "<br>";
     print "<a href=\"reset.html\">Click to return to password reset page</a>";
 }





?>