<?php

/*

Author - Yogesh Choudhary - choudharyyogsa17ite@student.mes.ac.in - yogeshchoudharys9s9@gmail.com

*/

session_start();

if(!isset($_SESSION["adminLoggedIn"]) || $_SESSION["adminLoggedIn"] !== true){
    header("location: login.php");
    exit;
}

//Database connection file
require_once "db_config.php"; 

//Initializing variables to store data from form
$name = "";
$email = "";
$password_1 = "";
$password_2 = "";

//To store errors
$errors = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    //Take Values from form
    $name= trim($_POST["reg_name"]);
    $email= trim($_POST["reg_email"]);
    $password_1 = trim($_POST["reg_password_1"]);
    $password_2 = trim($_POST["reg_password_2"]);

    //Check if name is empty
    if (empty($name)) {
        $errors .= "\r\nPlease Enter Your Full Name.";
    }


    //Check if Email id is valid and if already present in the database
    if (empty(trim($email))) {
        $errors .= "\r\nEmail Empty";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors .= "\r\nInvalid Email Id. Try Again.";
    } else {
        $sql = "SELECT `aid` FROM `csipce_admins` WHERE `email` = ?";
        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            $param_email = trim($email);
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $errors .= "\r\nThis Email is already registered. Please try again with different Email.";
                }
                //mysqli_stmt_close($stmt);
                //mysqli_close($link);
            } else {
                $errors .= "\nSomething went wrong. Please try again later";
            }
        }
    }

    //Check password
    if (empty(trim($password_1))){
        $errors .= "\r\nPlease enter password";
    }
    elseif (strlen($password_1)<8) {
        $errors .= "\r\nPassword should be minimum 8 characters";
    }

    elseif (empty(trim($password_2)) || $password_2 != $password_1) {
        $errors .= "\r\nPassword doesnt match.Please try again";
    }


    if(empty($errors)){

        //Proceeding with no errors

        

        $password = password_hash($password_1, PASSWORD_DEFAULT); //storing the hashed password

        //statement to insert data into database
        $sql = "INSERT INTO `csipce_admins` (`name`, `email`, `password`) VALUES (?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)){

            //Binding session variables
            mysqli_stmt_bind_param($stmt, "sss", $name, $email, $password );

            if(mysqli_stmt_execute($stmt)){

                echo "\r\rSUCCESSFULLY REGISTERED.";
                echo '<a href="./login.php">Login from Here.</a> ';
                
            } else{
                echo "\r\nSomething went wrong. Please try again later";
            }

            mysqli_stmt_close($stmt);
            mysqli_close($link);

        }

        session_destroy();
        

    }
    else{

        //Print all the errors
        echo "\r\nThe Following errors were encountered, Please go back and resolve these errors and try again : <br>";
        echo nl2br($errors);
        mysqli_stmt_close($stmt);
        mysqli_close($link);
        session_destroy();
    }


}

?>