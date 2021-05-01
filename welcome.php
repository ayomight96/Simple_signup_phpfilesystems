<?php
//calls the functions in function.php
    include 'functions.php';
    //converst all of user inputs into an array and assigns it to $user
    $user = make_array_signup();
    //print_r($user);
    print "<br>";
    //print_r($_POST);
    //here the password array element is crosschecked with the password actually entered by the user
    if ($_POST['password1'] == $_POST['password']){
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
        print "<tr><td></td></tr>";
        print "<tr><td></td></tr>";
        print "<tr><td><a href=\"reset.html\">Reset Password</a></td></tr>";

        print "</table>\n";
        print "<br>";
        print "<br>";

        $user2 = add_space($user);

        $confirm = store_file($user, $user2);
        
        if ($confirm == 1){
            print "You have been successfully registered!";
        } else {
            print "Your registration was not successful!";
        }

    } else {
        print "Your password does not match<br>";
        print "<a href=\"signup.html\">kindly click here to return to the sign up page </a>";

    }
 
//Here a link is created to redirect user to page where password can be changed
?>
