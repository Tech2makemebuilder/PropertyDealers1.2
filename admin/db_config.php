<?php

/*

@author - Yogesh Choudhary - choudharyyogsa17ite@student.mes.ac.in

*/

/* Obtains database credentials from wordpress configuration files */
require_once '../wp-config.php';

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect to the database. Contact Website Admin for Help" . mysqli_connect_error());
}
?>