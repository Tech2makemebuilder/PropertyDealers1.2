<?php
if(isset($_POST['submit'])){

$FName = $_POST["FName"];
$LName = $_POST["LName"];
$Number=$_POST["Number"];
$Address1=$_POST["Address1"];
$Address2=$_POST["Address2"];
$City=$_POST["City"];
$State=$_POST["State"];
$Pincode=$_POST["Pincode"];
$Experience=$_POST["Experience"];


$Email=$_POST["Email"];
$UserName=$_POST["UserName"];
$Password=$_POST["Password"];


$target_id_dir = "images/idproof/";
$target_profpic_dir = "images/profpic/";
$profPicName=time() . '_' . $UserName . "_profilePic.png";
$idProofName=time() . '_' . $UserName . "_idProof.png";
$targetid = $target_id_dir . $idProofName;
$targetprof = $target_profpic_dir . $profPicName;

if (move_uploaded_file($_FILES["profPic"]["tmp_name"], $targetprof) && move_uploaded_file($_FILES["idProof"]["tmp_name"], $targetid) && !empty($FName) || !empty($LName) || !empty($Number) || !empty($Address1) || !empty($Address2) || !empty($City) || !empty($State) || !empty($Pincode) || !empty($Experience) || !empty($UserName) || !empty($email) || !empty($Password)) {
    try{
        $host = "localhost";
        $port = "5432";
        $dbUsername = "postgres";
        $dbPassword = "password";
        $dbname = "broker";
        //create connection
        $conn = pg_connect("host={$host} port={$port} dbname={$dbname} user={$dbUsername} password={$dbPassword}");
    } catch (PDOException $e) {
        echo "Error : " . $e->getMessage() . "<br/>";
        die();
    }
     $SELECT = "SELECT email,username From public.register Where email = '".pg_escape_string($Email)."' or username = '".pg_escape_string($UserName)."' Limit 1";
     $INSERT = "INSERT Into register values('$FName', '$LName', '$Number', '$Address1', '$Address2', '$City', '$State', '$Pincode', '$Experience', '$targetid', '$targetprof', '$Email', '$UserName', '$Password')";
     //Prepare statement
     $login_check = pg_num_rows(pg_query($conn, $SELECT));
     if ($login_check==0) {
        if(pg_query($conn, $INSERT)){
            echo "<h1><center>Thank you for registering.<br>We will get back to you shorty after reviewing</center></h1>";
      }
      else{
          echo "<h1><center>Error ". $conn->error ." </h1></center>";
      }
     } else {
      echo "Someone already has this email/username";
     }
    }
} else {
 echo "All field are required";
 die();
}
?>