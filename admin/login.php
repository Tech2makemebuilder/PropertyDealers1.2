<?php

session_start();

if(isset($_SESSION["adminLoggedIn"]) && $_SESSION["adminLoggedIn"] === true){
  header("location: index.php");
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
  <title>Admin Login</title>
  <link rel="stylesheet" href="./css/login_style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="register-page">
  <div class="form">


    <form class="login-form" name="login_form" method = "post" action="login_processor.php">

      <h1>Admin Login</h1>
      <input type="email" name="log_email" placeholder="Enter registered Email address" required />
      <input type="password" name="log_password" placeholder="Enter your Password" required />
      <button type="submit">Login</button>
    </form>



  </div>
</div>
<!-- partial -->
  <script src='./res/jquery-3.5.0.min.js'></script>

</body>
</html>
