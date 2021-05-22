<?php

/*

Author - Yogesh Choudhary - choudharyyogsa17ite@student.mes.ac.in - yogeshchoudharys9s9@gmail.com

*/

//Database connection file
require_once "db_config.php"; 

$email = "";
$password = "";

//To store errors
$errors = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    //Take Values from form
    $email= trim($_POST["log_email"]);
    $password = trim($_POST["log_password"]);


    //Check if Mobile Number is 10 digit and correct format
    if (empty(trim($email))) {
        $errors .= "\r\nEmail Id Empty";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors .= "\r\nInvalid Email Id. Try Again.";
    }

    //Check password
    if (empty(trim($password))){
        $errors .= "\r\nPassword Empty";
    }
    elseif (strlen($password)<8) {
        $errors .= "\r\nPassword should be minimum 8 characters";
    }

    if(empty($errors)){
        $sql = 'SELECT `email`,`password` FROM `csipce_admins` WHERE `email` = ? ';


            if ($stmt = mysqli_prepare($link, $sql)) {
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $email);
                
                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    // Store result
                    mysqli_stmt_store_result($stmt);
                    
                    // Check if username exists, if yes then verify password
                    if (mysqli_stmt_num_rows($stmt) == 1) {
                        // Bind result variables
                        mysqli_stmt_bind_result($stmt, $username, $hashed_password);
                        if (mysqli_stmt_fetch($stmt)) {
                            if (password_verify($password, $hashed_password)) {
                                // Password is correct, so start a new session
                                session_start();
                                
                                // Store data in session variables
                                $_SESSION["adminLoggedIn"] = true;
                                $_SESSION["adminEmail"] = strval($username);
                                
                                // Redirect user to home page
                                header("location: index.php");
                            } else {
                                // Display an error message if password is not valid
                                echo "The password you entered was incorrect.";
                            }
                        }
                    } else {
                        // Display an error message if Email doesn't exist
                        echo "No account found with that Email.";
                    }
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }
                
                // Close statement
                mysqli_stmt_close($stmt);
            }
        
        
        // Close connection
        mysqli_close($link);



    }else{
        //Print all the errors
        echo "\r\nThe Following errors were encountered, Please go back and resolve these errors and try again : <br>";
        echo nl2br($errors);

    }



}


?>