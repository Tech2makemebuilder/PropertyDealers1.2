<?php

/*

@author - Yogesh Choudhary - choudharyyogsa17ite@student.mes.ac.in

*/


        session_start();

        // Check if the user is logged in, if not then redirect him to login page
        if(!isset($_SESSION["adminLoggedIn"]) || $_SESSION["adminLoggedIn"] !== true){
            header("location: login.php");
            exit;
        }
  

        function addDataAndUpload(){

        //status variables initialised as false
        $_SESSION['event_form_submit_status'] = false;
        $_SESSION['event_form_upload_status'] = false;  
        
    
        // Set parameters
        $ename = trim($_REQUEST['name']);  //event name from form

        $edate = $_REQUEST['date']; //event date from form


        //Creating a unique directory for the particular event images using the event name, event date and current unix time stamp
        $relativeDirectory = '/'.$ename.'-'.trim($edate).'-'.strval(time()).'/';

        // Contains the path to events directory
        require "site_config.php";

        //creating the local directory path to upload images from site-config.php
        $uploadDirectory = $website_local_path.$events_images_directory.$relativeDirectory;  //directory to upload images

        //Creating upload directory
        if( is_dir($uploadDirectory) === false ){
            mkdir($uploadDirectory);
        }

        $errors = []; // Store all foreseen and unforseen errors here for multi-uploads
        $total = count($_FILES['list_of_files']['name']); //total images count except cover image


        //uploading all the images
        for( $i=0 ; $i < $total ; $i++ ) {
            $fileName = $_FILES['list_of_files']['name'][$i];
            $fileTmpName  = $_FILES['list_of_files']['tmp_name'][$i];
            // $fileSize = $_FILES['list_of_files']['size'][$i];
            // $fileType = $_FILES['list_of_files']['type'][$i];

            $uploadPath = $uploadDirectory . basename($fileName); 

            if (isset($_POST['submit'])) {
        
                if (empty($errors)) {
                    $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
        
                    if ($didUpload) {
                        echo "The file " . basename($fileName) . " has been uploaded<br>";
                        if ($i==($total-1)) {
                            echo "All the images successfully uploaded";
                            $_SESSION['event_form_upload_status'] = true;
                            break;
                        }
                    } else {
                        echo "An error occurred somewhere. Try again or contact the admin".$didUpload;
                    }
                } else {
                    foreach ($errors as $error) {
                        echo $error . "These are the errors" . "\n";
                    }
                }
            }
        }

        //Uploading cover image
        $cfileName = $_FILES['cover_image']['name'][0];
        $cfileTmpName  = $_FILES['cover_image']['tmp_name'][0];
        $uploadPath = $uploadDirectory . basename($cfileName);
        $coverUpload = move_uploaded_file($cfileTmpName, $uploadPath);

        if($coverUpload){
            echo "Cover image uploaded successfully";
        }
        else{
            echo "Error Occoured while uploading cover image";
        }

        $ecover = $relativeDirectory.$cfileName;  //relative path entry into the database

        

        $temp = ""; //temporary variable to store images for the event

        //constructing a string with with image paths seperated by a , to store in database
        for( $i=0 ; $i < $total ; $i++ ) {
            
            $fnm = $_FILES['list_of_files']['name'][$i];
            $temp = $temp.$relativeDirectory.$fnm.',';
        }

        //image path string seperated by , for datatabse
        $eimages = substr($temp, 0, -1); //removing the last comma

        $edescription = trim($_REQUEST['description']);  //event description


        // Attempt MySQL server connection.
        require_once "db_config.php";

        

        // Prepare an insert statement
        $sql = "INSERT INTO `csipce_events` (`event_datetime`, `event_name`, `event_description`, `event_directory`, `event_cover`, `event_images`, `event_image_count`) VALUES ( ?, ?, ?, ?, ?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){

            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssi", $edate, $ename, $edescription, $relativeDirectory, $ecover, $eimages,$total);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                echo "Records inserted successfully.";
                $_SESSION['event_form_submit_status'] = true; //set as true
                mysqli_stmt_close($stmt);
                mysqli_close($link);
                header("location: event_entry_form.php");
                exit;
            } else{
                echo "ERROR: Could not execute query: $sql. " . mysqli_error($link);
            }
        } else{
            echo "ERROR: Could not prepare query: $sql. " . mysqli_error($link);
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
         
        // Close connection
        mysqli_close($link);

        }

        addDataAndUpload();


    
        

?>
