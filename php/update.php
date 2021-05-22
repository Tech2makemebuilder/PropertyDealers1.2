<?php
    session_start();
    if (true) {
        print_r( $_POST );
        header("Location: http://localhost/BrokerModule1.8/BrokerModule/index.php");

        update();
    }
    function update() {
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

        $email = $_SESSION['Email'];
        //to prevent from pgsqli injection
        $email = pg_escape_string(stripcslashes($email));

        $address1=$_POST['address1'];
        $address2=$_POST['address2'];
        $city=$_POST['city'];
        $state=$_POST['state'];
        $pincode=$_POST['pin'];
        $experience=$_POST['exp'];

        $sql = $conn->prepare("update register set address1=?, address2=?, city=?, state=?, pincode=?, experience=? where email = ?");  
        $sql->execute([
            $address1,
            $address2,
            $city,
            $state,
            $pincode,
            $experience,
            $email,
        ]);
    }

?>