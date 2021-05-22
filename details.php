<?php
   require_once "pdo.php";
   //require_once "utilities.php";
   session_start();
   $pid= $_GET['pid'];
 ?> 
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Caveat&family=Nanum+Myeongjo&family=Pacifico&display=swap"
        rel="stylesheet">

    <title>Property Details</title>
    <style>
        .columndevide {
            float: left;
            width: 50%;
            font-family: 'Nanum Myeongjo', serif;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        #d1 {
            font-weight: solid;
            margin-top: 11px;
            margin-bottom: 11px;
            width: 500px;
            font-size: 0.9cm;
        }

        .pera {
            font-size: medium;
        }

        .bt1 {
            border: 2px solid #98988d;
            margin: 2px;
            background-color: #e2d36a;
            }
            .a1{
            font-size: 1cm;
            margin-left: 2cm;
            text-align: right;
            font-family: 'Nanum Myeongjo', serif;
            
    }
    .dis{
           font-size: 1cm;
            margin-left: 4cm;
            font-family: 'Nanum Myeongjo', serif;
    }
    .cs3{
        border: 2px solid rgb(29, 19, 19);
        padding: 1cm;
    }
    .cs4{
        border: 2px solid black;
    }
    </style>
</head>

<body>

    <!-- Navbar Start Here -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="images/logo.jpg" width="140" height="45" class="d-inline-block align-top" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Projects
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Buy</a></li>
                            <li><a class="dropdown-item" href="#">Rent</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>

    </nav>
    <!-- navbar end Here -->

    <!-- Database fetch-->
    <?php 
    $sql="SELECT * FROM project join address On project.AddressId= address.AddressId WHERE ProjectId= :xyz";
   
    $stmt=$pdo->prepare($sql);
    $stmt->execute(array(":xyz" => $_GET['pid']));
  while($row= $stmt->fetch(PDO::FETCH_ASSOC)){?>
     

  
    <!-- Database fetch ends-->

    <!-- carousel start Here -->
    <div class="row">
        <div class="columndevide">
            <div class="carouseldesign" style="margin: 1px; margin-top: 11px; height: 500px;">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                           <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'" class="d-block w-100" alt="...">'?> 
                        </div>
                        <div class="carousel-item">
                            <img src="images/feature2.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="images/feature3.jpg" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                </div>
            </div>
        </div>
        <!-- carousel End Here -->
   
        <!-- Details Section -->
        <div class="columndevide">
            <h1 id="d1"><b><?php echo htmlentities($row['Property_Name']); ?></b> </h1>
                <hr>
                <br>
                <h4 style="font-size: 0.5cm;">Address</h4>
                <pre class="pera">
                <b>Location</b>  <?php echo htmlentities($row['Location']);?><br>
                <b>Street</b>    <?php echo htmlentities($row['Street']);?><br>
                <b>Main Road</b> <?php echo htmlentities($row['Main_Road']);?><br>
                <b>City</b>      <?php echo htmlentities($row['City']);?><br>
                <b>State</b>      <?php echo htmlentities($row['State']);?><br>
                <b>Pincode</b>   <?php echo htmlentities($row['Pincode']);?><br>
                </pre>
                <hr>
                <br>
     <?php 
    $sql="SELECT * FROM project join floor_plan  On project.ProjectId= floor_plan.ProjectId WHERE FloorId= :abc";

    $stmt=$pdo->prepare($sql);
    $stmt->execute(array(":abc" => $_GET['pid']));
  while($row= $stmt->fetch(PDO::FETCH_ASSOC)){?>
            <div>
                <h4 style="font-size: 0.5cm;">Details</h4>
                <pre class="pera">
                <b>Property id</b>  2297 
                <b>Property Status</b> <?php echo htmlentities($row['Status_of_Completion']);?><br>
                <b>Carpet Area</b> <?php echo htmlentities($row['Carpet_Area']);?><br>
                <b>BHK</b> <?php echo htmlentities($row['bedroom']);?><br>
                </pre>
            </div>

            <button class="bt1">write a review</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button class="bt1">Location</button>
        </div>
    </div>
    </div>
    <!-- Details Section Ends Here -->
      <?php  }
  ?>
     <?php  }
  ?>
       

    <div>
        <h3 class="dis">Disclaimer</h3>
            <p class="cs3">
                Magicbricks has endeavoured to ascertain the requirement and the particulars of RERA registration. The
                advertiser has provided the details and the same can be verified from the website of the concerned RERA
                Authority. Users are cautioned accordingly.

                Magicbricks is a platform for advertisement and does not vouch for the project or the details provided in the
                advertisement. Users are required to verify the authenticity of the claims made therein.
            </p>


    </div>

    <!-- Feachers Section Start Here -->
    <section class="text-gray-600 body-font" class="cs4">
        <div class="container px-5 py-24 mx-auto">
          <div class="flex flex-wrap -m-4">
            <div class="p-4 lg:w-1/4 sm:w-1/2 w-full">
              <h1 class="a1" >Feature</h1>
              <nav class="flex flex-col sm:items-start sm:text-left text-center items-center -mb-1 space-y-2.5">
              </nav>
            </div>
            <div class="p-4 lg:w-1/4 sm:w-1/2 w-full">
              <h2 class="font-medium title-font tracking-widest text-gray-900 mb-4 text-sm text-center sm:text-left"></h2>
              <nav class="flex flex-col sm:items-start sm:text-left text-center items-center -mb-1 space-y-2.5">
                <a>
                  <span class="bg-indigo-100 text-indigo-500 w-4 h-4 mr-2 rounded-full inline-flex items-center justify-center">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="w-3 h-3" viewBox="0 0 24 24">
                      <path d="M20 6L9 17l-5-5"></path>
                    </svg>
                  </span>gym
                </a>
                <a>
                  <span class="bg-indigo-100 text-indigo-500 w-4 h-4 mr-2 rounded-full inline-flex items-center justify-center">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="w-3 h-3" viewBox="0 0 24 24">
                      <path d="M20 6L9 17l-5-5"></path>
                    </svg>
                  </span>lawn
                </a>
              </nav>
            </div>
            <div class="p-4 lg:w-1/4 sm:w-1/2 w-full">
              <h2 class="font-medium title-font tracking-widest text-gray-900 mb-4 text-sm text-center sm:text-left"></h2>
              <nav class="flex flex-col sm:items-start sm:text-left text-center items-center -mb-1 space-y-2.5">
                <a>
                  <span class="bg-indigo-100 text-indigo-500 w-4 h-4 mr-2 rounded-full inline-flex items-center justify-center">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="w-3 h-3" viewBox="0 0 24 24">
                      <path d="M20 6L9 17l-5-5"></path>
                    </svg>
                  </span>wifi
                </a>
                <a>
                  <span class="bg-indigo-100 text-indigo-500 w-4 h-4 mr-2 rounded-full inline-flex items-center justify-center">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="w-3 h-3" viewBox="0 0 24 24">
                      <path d="M20 6L9 17l-5-5"></path>
                    </svg>
                  </span>laundry
                </a>
              </nav>
            </div>
            <div class="p-4 lg:w-1/4 sm:w-1/2 w-full">
              <h2 class="font-medium title-font tracking-widest text-gray-900 mb-4 text-sm text-center sm:text-left"></h2>
              <nav class="flex flex-col sm:items-start sm:text-left text-center items-center -mb-1 space-y-2.5">
                <a>
                  <span class="bg-indigo-100 text-indigo-500 w-4 h-4 mr-2 rounded-full inline-flex items-center justify-center">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="w-3 h-3" viewBox="0 0 24 24">
                      <path d="M20 6L9 17l-5-5"></path>
                    </svg>
                  </span>washer
                </a>
                <a>
                  <span class="bg-indigo-100 text-indigo-500 w-4 h-4 mr-2 rounded-full inline-flex items-center justify-center">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="w-3 h-3" viewBox="0 0 24 24">
                      <path d="M20 6L9 17l-5-5"></path>
                    </svg>
                  </span>TV Cable
                </a>
                
              </nav>
            </div>
        
      </section>
    
    <!-- Feachers Section End Here -->
    <!-- Contact Us Start Here -->
    <br>
    <br>
  
    <hr>
  
    <section class="text-gray-600 body-font relative">
      <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-col text-center w-full mb-12">
          <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Contact Us</h1>
          <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Whatever cardigan tote bag tumblr hexagon brooklyn
            asymmetrical gentrify.</p>
        </div>
        <div class="lg:w-1/2 md:w-2/3 mx-auto">
          <div class="flex flex-wrap -m-2">
            <div class="p-2 w-1/2">
              <div class="relative">
                <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
                <input type="text" id="name" name="name"
                  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </div>
            </div>
            <div class="p-2 w-1/2">
              <div class="relative">
                <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
                <input type="email" id="email" name="email"
                  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </div>
            </div>
            <div class="p-2 w-full">
              <div class="relative">
                <label for="message" class="leading-7 text-sm text-gray-600">Message</label>
                <textarea id="message" name="message"
                  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
              </div>
            </div>
            <div class="p-2 w-full">
              <button
                class="flex mx-auto text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-700 rounded text-lg">submit</button>
            </div>
            </svg>
            </a>
            </span>
          </div>
        </div>
      </div>
      </div>
    </section>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>

</html>