<?php
    session_start();
    if (isset($_POST['login']))
    {
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
      $email = $_POST['user'];
      $password = $_POST['pass'];
      //to prevent from pgsqli injection
      $email = pg_escape_string(stripcslashes($email));
      $password = pg_escape_string(stripcslashes($password));

      $sql = "select * from register where email = '$email' and password = '$password'";  
      $result = pg_query($conn, $sql);  
      $row = pg_fetch_assoc($result);  
      $count = pg_num_rows($result); 

      if($count == 1){
        $_SESSION['valid'] = true;
        $_SESSION['UserName'] = $row['username'];
        $_SESSION['Email'] = $row['email'];
        $_SESSION['FName'] = $row['fname'];
        $_SESSION['LName'] = $row['lname'];
        $_SESSION['Number'] = $row['number'];
        $_SESSION['Address1'] = $row['address1'];
        $_SESSION['Address2'] = $row['address2'];
        $_SESSION['City'] = $row['city'];
        $_SESSION['State'] = $row['state'];
        $_SESSION['Pincode'] = $row['pincode'];
        $_SESSION['Experience'] = $row['experience'];
        $_SESSION['ProfPic'] = $row['profpic'];
        $_SESSION['TurnOver'] = $row['turnover'];
        $_SESSION['RERA'] = $row['RERA'];
        header("Location: profile.php");
      }
      else{
        echo "<h1> Login failed. Invalid email or password.</h1>";
      }
    }
    

?>