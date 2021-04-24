<?php
//calls the functions in function.php
include 'functions.php';

$user = make_array_signin();
$verify = verify_user($user);

if ($verify == 1){
    $user = extract_data($user);

    print "Welcome to the Homepage, $user[1]";
        print "<br>";
        print "<br>";
        print "<br>";
        print "Your details are as follows:";
        print "<table>\n";

        print "<tr><td>Your Username:</td><td>$user[0]</td></tr>";
        print "<tr><td>Your First Name:</td><td>$user[1]</td></tr>";
        print "<tr><td>Your Last Name:</td><td>$user[2]</td></tr>";
        print "<tr><td>Your Email:</td><td>$user[3]</td></tr>";
        print "<tr><td><a href=\"reset.html\">Reset Password</a></td></tr>";
        print "</table>\n";
        print "<br>";
        print "<br>";

} elseif($verify == 2 || $verify == 3){
    print "Your email or password is incorrect";
    print "<br>";
    print "<br>"; 
    print "<a href=\"signin.html\">Click to return to Sign in page</a>";
} else{
    print "User does not exist!";
    print "<br>";
    print "<br>";
    print "<a href=\"signup.html\">Click to Sign up</a>";
}
?>