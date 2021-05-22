<?php

session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["adminLoggedIn"]) || $_SESSION["adminLoggedIn"] !== true){
    header("location: login.php");
    exit;
}

?>

<!doctype html>
<html lang="en">

<head>
  <!--  

    Author - Yogesh Choudhary - choudharyyogsa17ite@student.mes.ac.in - yogeshchoudharys9s9@gmail.com

     -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" 
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" 
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" 
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" 
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

  <title>Admin Home</title>

  <style>
    h1 {
      color: black;
      text-align: center;
    }

    div.one {
      margin-top: 20px;
      text-align: center;
    }
  </style>

</head>

<body>

  <!-- Nav Bar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="./index.php">CSI-PCE Admin Panel</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
      aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link" href="./index.php">Go Back</a>
        <a class="nav-item nav-link" href="./logout.php">Logout</a>
      </div>
    </div>
  </nav>


  <div class="container" style="margin-top: 30px;">
    <h1>Welcome to the Admin Portal of CSI-PCE Website</h1>

    <div class="accordion" id="accordionExample" style="margin-top: 20px ;">
      <div class="card">
        <div class="card-header" id="headingOne">
          <h2 class="mb-0">
            <button class="btn btn-link btn-block text-center" style="color:red;" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              Please read Instructions before use
            </button>
          </h2>
        </div>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
          <div class="card-body">
            1. This is the Admin Panel for CSI-PCE Website. Here you can change the Events and Committee Page of the website.<br>
            2. Use 'Go Back' button in the Header from any of the pages to return to this home page.<br>
            3. To Add/Remove Events, Committee and Sub-Committee, Use the respective Blue Buttons Below.<br>
            4. To Register Another Admin for this admin panel use the Yellow Button Below.<br>
            5. Please Logout After Use from the 'Logout' buttton in the Header or at the bottom of this page.<br>
            6. For any other changes to the website except those mentioned here, Login to the wordpress panel and make the necessary changes.<br>
            7. For Any Other Doubts, Please Check the source code of the admin panel and website to find the corresponding details.
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap Buttons -->
    <div class="one">

      <a href="./event_entry_form.php" style="margin: 20px 0px 10px 0px;"
        class="btn btn-primary btn-lg" role="button">
        Change Events</a>

      <a href="./committee_form.php" style="margin: 20px 0px 10px 0px;"
        class="btn btn-primary btn-lg" role="button">
        Change Committee</a>
      
      <a href="./subcommittee_form.php" style="margin: 20px 0px 10px 0px;"
        class="btn btn-primary btn-lg" role="button">
        Change Sub-Committee</a>

        <br>
        <br>

      <a href="./register.php" style="margin: 20px 20px 5px 20px;"
        class="btn btn-warning btn-lg" role="button">
        Register Another Administrator</a>
        <br>

      <a href="./logout.php" style="margin: 5px 20px 0px 20px;"
        class="btn btn-danger btn-lg" role="button">
        Logout</a>

    </div>

  </div>



</body>

</html>