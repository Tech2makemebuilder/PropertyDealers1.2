<?php

/*

@author - Yogesh Choudhary - choudharyyogsa17ite@student.mes.ac.in

*/


function deleteEntry(){

    session_start();

    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["adminLoggedIn"]) || $_SESSION["adminLoggedIn"] !== true){
        header("location: login.php");
        exit;
    }

    //database connection file
    require "db_config.php";


    if(isset($_SESSION['delete_verify'])){

        if($_SESSION['delete_verify']){

            // Contains the path to events directory
            require "site_config.php";

            echo "TRUE DETECTED";
            unset($_SESSION['delete_verify']);
            $did=$_GET["deleteEntry"];
            $event_directory=$_GET["eDir"];

            $sql = "DELETE FROM `csipce_events` WHERE `csipce_events`.`did` = ?";

            if($stmt = mysqli_prepare($link, $sql)){

                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "i", $did );
                
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    echo "Entry Deleted successfully.";
                    mysqli_stmt_close($stmt);
                    mysqli_close($link);

                    //deleting images folder
                    //directory to delete constructed from site_config.php and url parameters
                    $delDirectory= $website_local_path.$events_images_directory.$event_directory;  
                    echo $delDirectory;
                    array_map('unlink', glob("$delDirectory/*"));
                    rmdir($delDirectory);

                    //setting status flag
                    $_SESSION['entry_delete'] = true;

                    //redirecting
                    header("location: event_entry_form.php");
                    exit;
                } else{
                    echo "ERROR: Could not execute query: $sql. " . mysqli_error($link);
                    mysqli_stmt_close($stmt);
                    mysqli_close($link);
                }
            } else{
                echo "ERROR: Could not prepare query: $sql. " . mysqli_error($link);
                mysqli_stmt_close($stmt);
                mysqli_close($link);
            }

        
        }

    }
    else{

        echo "Unauthorized Access<br>Log In and try again.";
    }



}

function printTable(){

    //prints the current entries table from the database 
    require "db_config.php";  //db connection

    $sql = "SELECT `did`,`event_name`,`event_datetime`,`event_directory` FROM `csipce_events` ORDER BY event_datetime DESC";  //ordered from latest to last event

    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){

                //printing table with delete buutons

                echo "<tr>";
                    echo '<th scope="row">' . $row['did'] . '</th>';
                    echo '<td>' . $row['event_name'] .'</td>';
                    echo '<td>' . $row['event_datetime'] . '</td>';
                    echo '<td><a href="./event_entry_form_table_processor.php?deleteEntry='.$row['did'].'&eDir='.$row['event_directory'].'" onclick="return confirm(`Are you sure?`)" class="btn btn-danger">Delete</a></td>';
                echo "</tr>";
            }
            // Free result set
            mysqli_free_result($result);
        } else{
            echo "No records matching your query were found.";
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
     
    // Close connection
    mysqli_close($link);



}


if(isset($_GET['deleteEntry']))
{
    deleteEntry();
}



?>