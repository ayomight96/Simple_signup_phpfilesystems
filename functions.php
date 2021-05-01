<?php
//This functions stores the user data into a txt file and uses the 
//users email as the file name. It takes in two arrays the first is
//the array containing the raw user data, the second is th array containing
//the user data with each element concatenated with a space
function store_file($input, $data){
    
    //stores the user content into the file
    file_put_contents('files/'. $input[3].".txt", $data);
    
    //checks if the file has been succesffully stored ad returns 1
    if (file_exists('files/'. $input[3].".txt")){
        return 1;
    } else {
        return 0;
    }
}

//this function turns all the info enetred during signup into an array
function make_array_signup(){
    //this makes sure that the user actually made an input
    if ($_POST['username'] && $_POST['first_name'] &&$_POST['last_name'] && $_POST['email'] && $_POST['password']){
        //this assigns user inputs to an array
        $user = [$_POST['username'], $_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['password']];
        //this returns the array
        return $user;
    }
}
//this function turns all info entered during sign in into an array
function make_array_signin(){
    //this checks that the user actually makes an input
        if ($_POST['email'] && $_POST['password']){
            //asigns the input into an array
            $user = [$_POST['email'], $_POST['password']];
            //returns the array
            return $user;
        }
    
}
//this function adds comma to all the element in the array and then returns the modified array
function add_space($input){
    //creates a comma variable
        $space = ",";
        $username = $input[0].$space;
        $first_name = $input[1].$space;
        $last_name = $input[2].$space;
        $email = $input[3].$space; 
        $password = $input[4];
        //assigns the modified variables to the array
        $input = [$username, $first_name, $last_name, $email, $password];
        //returns the array
        return $input;
}

//this function helps the user rest his password
function reset_password(){
    print <<<_HTML_
    <html>
    <body>
    <form id = "reset_password" method="post" action="$_SERVER[PHP_SELF]">
            <label>Enter new password (minimum of 3 Characters): </label><br><input name = "new_password" type = "password" placeholder = "Password" pattern = ".{3,}" required><br><br>
            <label>Re-enter Password: </label><br><input name = "new_password1" type = "password" placeholder = "Re-enter Password" pattern = ".{3,}" required><br><br>
            <button type = "submit" class = "submit" name = "reset_password">Reset</button>
    </form>
    </body>
    </html>
    _HTML_;

    return $new_password = [$_POST['new_password'], $_POST['new_password1']];
}

//this function here extracts user data from an existing file and returns an array containing all the user data
function extract_data($input){
    
    //this checks if the user exists
    if (file_exists('files/'. $input[0].".txt")){
        //if the file exists it extracts the file
        $user = file_get_contents('files/'. $input[0].".txt"); 
        
        //the data exctracted is converted to an array
        $user = explode (",", $user);
        //the array is returned
        return $user;        
    } else {
        return 0;
    } 
}
//This function resets the user password  
function resetPassword ($email, $password){
    //checks if the user files  exists
    if (file_exists('files/'. $email.".txt")){
        //gets all the file contents
        $user = file_get_contents('files/'. $email.".txt"); 
        //converts all the user contents into an array
        $user = explode (",", $user);
        //Updates the user's password
        $user[4] = $password;
        //returns the updated array file
        return $user;
} else {
    return 0;
} 
}
// This function verify if the user exists
function verify_user($input){
//this assigns the $input to a variable
    $user = extract_data($input);
    
    //this checks whether the input is an array
    if ($user != 0){
        //this verifies that the user email and password are correct
        if ($user[3] == $input[0] && $user[4] == $input[1]){
            return 1;
        } elseif ($user[3] == $input[0] && $user[4] != $input[1]){ /*This verifies if only the password is wrong*/
            return 2;
        } elseif($user[3] != $input[0] && $user[4] == $input[1]){ /* This verifies whether only the email is wrong*/
            return 3;
        } else { /* This verifies whether both the email and password is wrong*/
            return 4;
        }
    } else { /* This runs if the input is not an array*/
        return 0;
    }
 
}


?>
