<?php
  session_start();

  $_SESSION['valid'] = true;
  $_SESSION['FName'] = "Some";
  $_SESSION['LName'] = "Dude";
  $_SESSION['UserName'] = "SomeDude";
  $_SESSION['Email'] = "somedude@gmail.com";
  $_SESSION['Number'] = 1234567890;
  $_SESSION['Address1'] = "201, Some Flats, Near Building";
  $_SESSION['Address2'] = "Colony Y";
  $_SESSION['City'] = "City1";
  $_SESSION['State'] = "SomeState";
  $_SESSION['Pincode'] = 123456;
  $_SESSION['Experience'] = 3;
  $_SESSION['profile_image'] = '../images/profileimg.jfif';
  $_SESSION['Turnover'] = 3000000;
  $_SESSION['RERA'] = 1234567;
  $_SESSION['Temp'] = "Data here";

?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>User Profile Page</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.3.1/css/all.min.css'>
  <link rel="stylesheet" href="../css/profile_style.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="../js/profile.js"></script>
</head>

 <body>
 <!-- partial:index.partial.html -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

<body>
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="/BrokerModule/index.php" target="_blank">CleverDeals</a>
        
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
        <a href="logout.php" class="btn btn-primary btn-lg" role="button" aria-disabled="true">Logout</a>
          <!-- <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                 <span class="avatar avatar-sm rounded-circle">
                  <img alt="Profile Picture" src="<?php echo $_SESSION['profile_image']?>">
                </span> 
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold"><?php echo $_SESSION['FName']." ".$_SESSION['LName'] ?></span>
                </div> 
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>My profile</span>
              </a>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-settings-gear-65"></i>
                <span>Settings</span>
              </a>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-calendar-grid-58"></i>
                <span>Activity</span>
              </a>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-support-16"></i>
                <span>Support</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span onClick="logout(this)">Logout</span>
              </a>
            </div>
          </li> -->
        </ul>
      </div>
    </nav>
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(<?php echo $_SESSION['profile_image']?>); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Hello <?php echo $_SESSION['FName'] ?></h1>
            <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made with your work and manage your buy or sell requests.</p>

          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--14">
      <div class="row xl-mb-10">
        <div class="col-xl-12 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <!-- <div class="row align-items-center"> -->
              <!-- <div class="card-header border-0 pt-8 pt-md-4 pb-0 pb-md-4 mr-7"> -->
                <p><b>Looking to become a verified CleverDeals broker?</b></p>
                <p>Click below to fill the verified broker form<p>
                <a href="../php/verified-form.php" class="btn btn-primary">Verification Form</a>
                <!-- <hr class="my-4"> -->
              <!-- </div> -->
            </div>
          </div>
        </div>
      </div>  

      <div class="row mt-10">
        <div class="col-xl-12 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">My account</h3>
                </div>
                <div class="col-4 text-right">
                  <button id="edit-btn" value="edit" class="btn btn-sm btn-primary" onClick="edit_profile(this)">Edit Profile</button>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form>
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Username</label>
                        <input type="text" id="input-username" class="edit-data-username edit-data form-control form-control-alternative" placeholder="Username" value="<?php echo $_SESSION['UserName'] ?>">
                        <p class="display-data display-data-username ni mr-2 big-text"><?php echo $_SESSION['UserName'] ?></p>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" id="input-email" class="edit-data edit-data-email form-control form-control-alternative" placeholder="<?php echo $_SESSION['Email'] ?>">
                        <p class="display-data display-data-email ni mr-2 big-text"><?php echo $_SESSION['Email'] ?></p>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-first-name">First name</label>
                        <input type="text" id="input-first-name" class="edit-data edit-data-fname form-control form-control-alternative" placeholder="First name" value="<?php echo $_SESSION['FName'] ?>">
                        <p class="display-data display-data-fname ni mr-2 big-text"><?php echo $_SESSION['FName'] ?></p>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Last name</label>
                        <input type="text" id="input-last-name" class="edit-data edit-data-lname form-control form-control-alternative" placeholder="Last name" value="<?php echo $_SESSION['LName'] ?>">
                        <p class="display-data display-data-lname ni mr-2 big-text"><?php echo $_SESSION['LName'] ?></p>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-address-1">Address Line 1</label>
                        <input id="input-address-1" class="edit-data edit-data-address1 form-control form-control-alternative" placeholder="Home/Flat Number" value="<?php echo $_SESSION['Address1'] ?>" type="text">
                        <p class="display-data display-data-address1 ni mr-2 big-text"><?php echo $_SESSION['Address1'] ?></p>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-address-2">Address Line 2</label>
                        <input id="input-address-2" class="edit-data edit-data-address2 form-control form-control-alternative" placeholder="Landmarks/Locality" value="<?php echo $_SESSION['Address2'] ?>" type="text">
                        <p class="display-data display-data-address2 ni mr-2 big-text"><?php echo $_SESSION['Address2'] ?></p>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-city">City</label>
                        <input type="text" id="input-city" class="edit-data edit-data-city form-control form-control-alternative" placeholder="City" value="<?php echo $_SESSION['City'] ?>">
                        <p class="display-data display-data-city ni mr-2 big-text"><?php echo $_SESSION['City'] ?></p>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-state">State</label>
                        <input type="text" id="input-state" class="edit-data edit-data-state form-control form-control-alternative" placeholder="State" value="<?php echo $_SESSION['State'] ?>">
                        <p class="display-data display-data-state ni mr-2 big-text"><?php echo $_SESSION['State'] ?></p>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-postal-code">Postal code</label>
                        <input type="number" id="input-postal-code" class="edit-data edit-data-pincode form-control form-control-alternative" placeholder="Postal code" value="<?php echo $_SESSION['Pincode'] ?>">
                        <p class="display-data display-data-pincode ni mr-2 big-text"><?php echo $_SESSION['Pincode'] ?></p>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">About me</h6>
                <div class="pl-lg-4">
                  <div class="form-group focused">
                    <label>Experience</label>
                    <div class="row">
                    <span class="big-text">I have an experience of&nbsp</span>
                    <input type='number' class="edit-data edit-data-experience form-control form-control-alternative" style="width:10%; height:calc(2rem + 2px)" value="<?php echo $_SESSION['Experience'] ?>">
                    <span class="display-data display-data-experience ni mr-2 big-text"><?php echo $_SESSION['Experience'] ?></span>
                    <span class="big-text">years</span> </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<!-- partial -->
  <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
  // function logout(obj){
  //   <?php 
  //   session_unset(); 
  //   header("Location: ../index.php"); 
  //   ?> 
  // }
</script>
</body>
</html>
