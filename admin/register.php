<?php

session_start();


// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["adminLoggedIn"]) || $_SESSION["adminLoggedIn"] !== true){
  header("location: login.php");
  exit;
}

?>


<!DOCTYPE html>
<html lang="en" >
<head>
  <!--  

  Author - Yogesh Choudhary - choudharyyogsa17ite@student.mes.ac.in - yogeshchoudharys9s9@gmail.com

  -->
  <meta charset="UTF-8">
  <title>Admin Registration</title>
  <link rel="stylesheet" href="./css/login_style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="register-page">
  <div class="form">



    <form class="registration-form" name="registration_form" method = "post" action="registration_processor.php">
      <h1>Admin Registration</h1>
      <input type="text" name="reg_name" placeholder="Enter your Full Name" required />
      <input type="email" name="reg_email" placeholder="Enter your Email" required />
      <input type="password" name="reg_password_1" placeholder="Enter a Password of Min length 8" required />
      <input type="password" name="reg_password_2" placeholder="Confirm password" required />
      <button type="submit">Register</button>
    </form>



  </div>
</div>
<!-- partial -->
  <script src='./res/jquery-3.5.0.min.js'></script>

</body>
</html>
