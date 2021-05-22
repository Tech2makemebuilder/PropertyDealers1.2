<!DOCTYPE html>
<html lang="en" >
<head>

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



?>

<meta charset="UTF-8">
<title>Events Form</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" 
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" 
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" 
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" 
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

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


<!-- Title -->
<div class="container">

  <h1 style="text-align: center; padding: 30px; "><strong>Change Events Page</strong></h1>

</div>


<!-- Instructions -->
<div class="container">

  <div class="accordion" id="accordionExample">
    <div class="card">
      <div class="card-header" id="headingOne">
        <h2 class="mb-0">
          <button class="btn btn-link btn-block text-center" style="color:red;" type="button" data-toggle="collapse"
            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Please read Instructions before use
          </button>
        </h2>
      </div>
      <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body">
          1. Here you can Add/Remove Events which appear on the Events Page of the Website.<br>
          2. Please don't Use QUOTES(' " `) and SPECIAL CHARACTERS for the Event Name and for the FILE NAMES of Images which are to be Uploaded.<br>
          3. File Names should be preferably cover.jpg or .png for the cover image and 1.jpg,2.jpg, or png , and So on.<br>
          4. All the Images should preferably be of Same Dimensions.<br>
          5. Optimize and compress images before upload as larger images would lead to greater load times of the website.<br>
          6. In case of any mistakes while entering data, Delete the Event entry from the below table (Using the delete button) and Fill the Event again with corrected details.<br>
          7. The Events will be shown in the descending order of the Event Date, both on the website and in the below table. There is no way of altering the order of events except changing the Event Date<br>
          8. For Any Other Doubts, Please Check the source code of the admin panel and website to find the corresponding details.
        </div>
      </div>
    </div>
  </div>

</div>




<!-- Form -->
<div class="container" style="margin-top: 20px; margin-bottom: 20px; padding: 20px; background-color: rgba(0,0,0,0.05);">

  <form action="event_entry_form_data_processor.php" method="post" enctype="multipart/form-data" id="form">

      <!-- Alert Message -->
      <div id="message">
        <?php
        if (isset($_SESSION['event_form_submit_status']) OR isset($_SESSION['event_form_upload_status'])) {
            if ($_SESSION['event_form_submit_status'] OR $_SESSION['event_form_upload_status']) {
                echo '<div class="alert alert-success" role="alert" id="success_message">Successful! All the details added and all the images uploaded.</div>';
                unset($_SESSION['event_form_submit_status']);
                unset($_SESSION['event_form_upload_status']);
            } else {
                echo '<div class="alert alert-danger" role="alert" id="success_message">Failed! There is something wrong.</div>';
                unset($_SESSION['event_form_submit_status']);
                unset($_SESSION['event_form_upload_status']);
            }
        }
        ?>
      </div>

      <!-- Form Name -->
      <legend style="text-align: center;"><strong>Add New Events</strong></legend>

      <!-- Text input-->
      <div class="form-group">
        <label for="form_name">Event Name</label>
        <input id="form_name" name="name" placeholder="Enter the name of the Event" class="form-control" type="text" aria-describedby="name_help" required>
        <small id="name_help" class="form-text text-muted">Please DON'T use Quotes and special characters.</small>
      </div>

      <!-- Text area -->
      <div class="form-group">
        <label for="form_description">Event Description</label>
        <textarea id="form_description" class="form-control" name="description" rows="12" placeholder="Enter the Description for the Event" required></textarea>
      </div>

      <!-- Date input-->
      <div class="form-group">
        <label for="form_date">Event Date</label>
        <input id="form_date" class="form-control" type="date" name="date" required>
      </div>



      <!-- Image input-->
      <div class="form-group">
        <label for="coverToUpload">Choose Cover Image</label>
        <input name="cover_image[]" placeholder="Cover Image" class="form-control-file" id="coverToUpload" type="file" aria-describedby="cover_help" required>
        <small id="cover_help" class="form-text text-muted">Please rename the image as cover.jpg before uploading.</small>
      </div>

      <!-- Multiple Image input-->
      <div class="form-group custom-file">
        <input type="file" class="custom-file-input" name="list_of_files[]" id="fileToUpload" aria-describedby="image_help" multiple required>
        <label class="custom-file-label" for="fileToUpload">Choose Event Images to Upload</label>
        <small id="image_help" class="form-text text-muted">Please rename the images as 1.jpg,2.jpg,.. before uploading.</small>
      </div>

      <!-- Submit Button -->
      <div class="form-group">
        <button type="submit" name="submit" class="btn btn-primary" id="trigger">
          <span class="spinner-border spinner-border-sm" id="loader" style="display: none;"></span>Add Event</button>
      </div>

  </form>
</div>


<script>
  $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });
  document.querySelector("#form").onsubmit = function() {
      document.querySelector("#loader").style.display = "block";
  }
</script>

<!-- Current Entries Table -->

<div class="container" style="margin-top: 20px; margin-bottom: 20px; padding: 20px;">

<!-- Success message -->
<div id="message">
        <?php
        if (isset($_SESSION['entry_delete'])) {
            if ($_SESSION['entry_delete']) {
                echo '<div class="alert alert-success" role="alert" id="success_message">Successful! Selected Entry has been successfully deleted.</div>';
                unset($_SESSION['entry_delete']);
            } else {
                echo '<div class="alert alert-danger" role="alert" id="success_message">Failed! There is something wrong.</div>';
                unset($_SESSION['entry_delete']);
            }
        }
        ?>
</div>

<!-- Table Name -->
<legend style="text-align: center;"><strong>Existing Events</strong></legend>

<div class="table-responsive">

<table class="table table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Event id</th>
      <th scope="col">Event Name</th>
      <th scope="col">Event Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

  <!--Sample Entry

    <tr>
      <th scope="row">1</th>
      <td>Yogesh</td>
      <td>Choudhary</td>
      <td>Hey</td>
    </tr>

  -->

   <?php

   $_SESSION['delete_verify'] = true;  //to verify that the delete request came from this page
   require "event_entry_form_table_processor.php";
   printTable();  // printing table from the database

   ?>
</tbody>
</table>

</div>

</div>




</body>
</html>
