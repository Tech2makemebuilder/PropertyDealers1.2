<?php
  // require_once "pdo.php";
   //session_start();
?>  

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="../CSS1/index.css" rel="stylesheet">
    <link href="../CSS1/Buyer.css" rel="stylesheet">

    <title>Buyer Module</title>

    <style>
        .cross:hover {
            color: red;
        }
    </style>
</head>

<body>
    <div>
        <div>
            <section>
                <div>
                    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="padding: 1px 0 1px 0; ">
                        <div class="container-fluid">
                            <div style="opacity: 1;">
                                <a href="../index.php">
                                    <img id="logo-img" src="../images/logo.png" alt="Clever Deals logo">
                                </a>
                            </div>

                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse Items" id="navbarSupportedContent">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <a class="nav-link active nav-hover" style="margin: 10px 0 10px 0;" aria-current="page" href="#">Find a Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" style="margin: 10px 0 10px 0;" aria-current="page" href="../test2.html">Sale a Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" style="margin: 10px 0 10px 0;" aria-current="page" href="../BrokerModule1.7/BrokerModule1.6/BrokerModule/index.php">Be a Broker</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" style="margin: 10px 0 10px 0;" aria-current="page" href="#">Join Franchaise</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" style="margin: 10px 0 10px 0;" aria-current="page" href="../Contact Page/contact.html">Contact US</a>
                                    </li>
                                    <!-- <li class="nav-item">
                                    <a class="nav-link" href="#">Link</a>
                                </li> -->
                                    <!-- <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Dropdown
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        </ul>
                                    </li> -->
                                    <!-- <li class="nav-item">
                                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                                </li> -->
                                </ul>
                                <form class="d-flex">
                                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                </form>
                                <!-- <form class="form-inline">
                                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                                </form> -->
                                <!-- <i class="fas fa-sign-in-alt"></i> -->
                            </div>
                        </div>
                    </nav>
                </div>
            </section>

            <section>
                <div>
                    <nav class="navbar navbar-expand-lg navbar-white" style="background-color: rgb(242,244,245);">
                        <div class="container">
                            <div class="collapse navbar-collapse Items" id="navbarSupportedContent" style="margin: 0;">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <div>
                                        <select class="form-control" style="background-color: rgb(248,249,250); width:200px; margin:0 10px 0 0;">
                                            <optgroup label="">
                                                <option selected>Prizes</option>
                                                <option value="1">under 50 lacs</option>
                                                <option value="2">under 60 lacs</option>
                                                <option value="3">under 70 lacs</option>
                                                <option value="4">under 80 lacs</option>
                                                <option value="5">under 90 lacs</option>
                                                <option value="6">under 1 Cr</option>
                                                <option value="7">under 5 Cr</option>
                                                <option value="8">under 10 Cr</option>
                                            </optgroup>
                                        </select>
                                    </div>

                                    <div>
                                        <select class="form-control" style="background-color: rgb(248,249,250); width:200px; margin:0 10px 0 0;">
                                            <optgroup label="">
                                                <option selected>Bedrooms</option>
                                                <option value="1">1 BHK</option>
                                                <option value="2">2 BHK</option>
                                                <option value="3">3 BHK</option>
                                                <option value="4">4 BHK</option>

                                            </optgroup>
                                        </select>
                                    </div>
                                    <div>
                                        <select class="form-control" style="background-color: rgb(248,249,250); width:200px; margin:0 10px 0 0;">
                                            <optgroup label="">
                                                <option selected>Bathrooms</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control" style="background-color: rgb(248,249,250); width:200px; margin:0 10px 0 0;">
                                            <optgroup label="">
                                                <option selected>Filters</option>
                                                
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div>
                                        <a href="#" class="btn btn-success float-right" style="width: 100px;"><span>Apply</span></a>
                                    </div>

                                    <div style="margin-left:10%;">
                                        <div>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                Wishlist
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Interested Properties</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 mt-4">
                                                                    <div class="card">
                                                                        <img class="card-img-top" src="../images/feature1.jpg">
                                                                        <div class="card-block" style="padding-bottom: 0;">

                                                                            <h4 class="card-title mt-3">Project Name</h4>
                                                                        </div>
                                                                        <div class="card-footer" style="padding-top: 6px;">
                                                                            <span>
                                                                                <button class="btn btn-primary float-right btn-sm">More Details</button>
                                                                            </span>
                                                                            <span style="margin-left:32%">
                                                                                <a href="#" class="btn btn-primary float-right btn-sm"><span>- Remove from Wishlist</span></a>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-12 mt-4">
                                                                    <div class="card">
                                                                        <img class="card-img-top" src="../images/feature1.jpg">
                                                                        <div class="card-block" style="padding-bottom: 0;">

                                                                            <h4 class="card-title mt-3">Project Name</h4>
                                                                        </div>
                                                                        <div class="card-footer" style="padding-top: 6px;">
                                                                            <span>
                                                                                <button class="btn btn-primary float-right btn-sm">More Details</button>
                                                                            </span>
                                                                            <span style="margin-left:32%">
                                                                                <a href="#" class="btn btn-primary float-right btn-sm"><span>- Remove from Wishlist</span></a>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-12 mt-4">
                                                                    <div class="card">
                                                                        <img class="card-img-top" src="../images/feature1.jpg">
                                                                        <div class="card-block" style="padding-bottom: 0;">

                                                                            <h4 class="card-title mt-3">Project Name</h4>
                                                                        </div>
                                                                        <div class="card-footer" style="padding-top: 6px;">
                                                                            <span>
                                                                                <button class="btn btn-primary float-right btn-sm">More Details</button>
                                                                            </span>
                                                                            <span style="margin-left:32%">
                                                                                <a href="#" class="btn btn-primary float-right btn-sm"><span>- Remove from Wishlist</span></a>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </section>

            <section>
                <div>
                    <nav class="navbar navbar-expand-lg navbar-white" style="background-color: rgb(242,244,245);">
                        <div class="container">
                            <div class="collapse navbar-collapse Items" id="navbarSupportedContent" style="margin: 0;">
                                <span style="padding: 0 5px 0 5px;">
                                    <button class="btn btn-outline-primary"><span>Prize</span></button>
                                </span>
                                <span style="padding: 0 5px 0 50px;">
                                    <button class="btn btn-outline-primary"><span>XX BHK</span></button>
                                </span>
                                <span style="padding: 0 5px 0 50px;">
                                    <button class="btn btn-outline-primary"><span>XX baths</span></button>
                                </span>
                                <span style="padding: 0 5px 0 50px;">
                                    <button class="btn btn-outline-primary"><span>More Filtered Boxes</span></button>
                                </span>


                            </div>
                        </div>

                    </nav>
                    <hr style="margin: 0 0 5px 0;">
                </div>
            </section>
        </div>

        <!-- PROPERTY LISTING -->
        <h2 class="container">Projects for Sale</h2>

        <section class="bg1-color" style="height: auto;">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-4 col-lg-4 mt-4">
                        <div class="card">
                            <img class="card-img-top" src="../images/feature1.jpg">
                            <div class="card-block" style="padding-bottom: 0;">
                                <h4 class="card-title mt-3">Project Name</h4>
                                <div class="meta">
                                    <h5>Sale/Rent/PG</h5>
                                </div>
                                <div class="card-text">
                                    <span style="margin: 0 30px 0 0;">xx-BHK</span>
                                    <span>XX-Baths</span>
                                    <h6>brief Details</h6>
                                </div>
                            </div>
                            <div class="card-footer" style="padding-top: 6px;">
                                <span>
                                    <button class="btn btn-primary float-right btn-sm">More Details</button>
                                </span>
                                <span style="margin-left:32%;">
                                    <a href="../Customer/Login/registration.php" class="btn btn-primary float-right btn-sm"><span>+ Add to Wish List</span></a>
                                </span>

                            </div>

                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-4 mt-4">
                        <div class="card">
                            <img class="card-img-top" src="../images/feature1.jpg">
                            <div class="card-block" style="padding-bottom: 0;">
                                <h4 class="card-title mt-3">Project Name</h4>
                                <div class="meta">
                                    <h5>Sale/Rent/PG</h5>
                                </div>
                                <div class="card-text">
                                    <span style="margin: 0 30px 0 0;">xx-BHK</span>
                                    <span>XX-Baths</span>
                                    <h6>brief Details</h6>
                                </div>
                            </div>
                            <div class="card-footer" style="padding-top: 6px;">
                                <span>
                                    <button class="btn btn-primary float-right btn-sm">More Details</button>
                                </span>
                                <span style="margin-left:32%;">
                                    <a href="../Customer/Login/registration.php" class="btn btn-primary float-right btn-sm"><span>+ Add to Wish List</span></a>
                                </span>

                            </div>

                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-4 mt-4">
                        <div class="card">
                            <img class="card-img-top" src="../images/feature1.jpg">
                            <div class="card-block" style="padding-bottom: 0;">
                                <h4 class="card-title mt-3">Project Name</h4>
                                <div class="meta">
                                    <h5>Sale/Rent/PG</h5>
                                </div>
                                <div class="card-text">
                                    <span style="margin: 0 30px 0 0;">xx-BHK</span>
                                    <span>XX-Baths</span>
                                    <h6>brief Details</h6>
                                </div>
                            </div>
                            <div class="card-footer" style="padding-top: 6px;">
                                <span>
                                    <button class="btn btn-primary float-right btn-sm">More Details</button>
                                </span>
                                <span style="margin-left:32%;">
                                    <a href="../Customer/Login/registration.php" class="btn btn-primary float-right btn-sm"><span>+ Add to Wish List</span></a>
                                </span>

                            </div>

                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-4 mt-4">
                        <div class="card">
                            <img class="card-img-top" src="../images/feature1.jpg">
                            <div class="card-block" style="padding-bottom: 0;">
                                <h4 class="card-title mt-3">Project Name</h4>
                                <div class="meta">
                                    <h5>Sale/Rent/PG</h5>
                                </div>
                                <div class="card-text">
                                    <span style="margin: 0 30px 0 0;">xx-BHK</span>
                                    <span>XX-Baths</span>
                                    <h6>brief Details</h6>
                                </div>
                            </div>
                            <div class="card-footer" style="padding-top: 6px;">
                                <span>
                                    <button class="btn btn-primary float-right btn-sm">More Details</button>
                                </span>
                                <span style="margin-left:32%;">
                                    <a href="../Customer/Login/registration.php" class="btn btn-primary float-right btn-sm"><span>+ Add to Wish List</span></a>
                                </span>

                            </div>

                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-4 mt-4">
                        <div class="card">
                            <img class="card-img-top" src="../images/feature1.jpg">
                            <div class="card-block" style="padding-bottom: 0;">
                                <h4 class="card-title mt-3">Project Name</h4>
                                <div class="meta">
                                    <h5>Sale/Rent/PG</h5>
                                </div>
                                <div class="card-text">
                                    <span style="margin: 0 30px 0 0;">xx-BHK</span>
                                    <span>XX-Baths</span>
                                    <h6>brief Details</h6>
                                </div>
                            </div>
                            <div class="card-footer" style="padding-top: 6px;">
                                <span>
                                    <button class="btn btn-primary float-right btn-sm">More Details</button>
                                </span>
                                <span style="margin-left:32%;">
                                    <a href="../Customer/Login/registration.php" class="btn btn-primary float-right btn-sm"><span>+ Add to Wish List</span></a>
                                </span>

                            </div>

                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-4 mt-4">
                        <div class="card">
                            <img class="card-img-top" src="../images/feature1.jpg">
                            <div class="card-block" style="padding-bottom: 0;">
                                <h4 class="card-title mt-3">Project Name</h4>
                                <div class="meta">
                                    <h5>Sale/Rent/PG</h5>
                                </div>
                                <div class="card-text">
                                    <span style="margin: 0 30px 0 0;">xx-BHK</span>
                                    <span>XX-Baths</span>
                                    <h6>brief Details</h6>
                                </div>
                            </div>
                            <div class="card-footer" style="padding-top: 6px;">
                                <span>
                                    <button class="btn btn-primary float-right btn-sm">More Details</button>
                                </span>
                                <span style="margin-left:32%;">
                                    <a href="../Customer/Login/registration.php" class="btn btn-primary float-right btn-sm"><span>+ Add to Wish List</span></a>
                                </span>

                            </div>

                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-4 mt-4">
                        <div class="card">
                            <img class="card-img-top" src="../images/feature1.jpg">
                            <div class="card-block" style="padding-bottom: 0;">
                                <h4 class="card-title mt-3">Project Name</h4>
                                <div class="meta">
                                    <h5>Sale/Rent/PG</h5>
                                </div>
                                <div class="card-text">
                                    <span style="margin: 0 30px 0 0;">xx-BHK</span>
                                    <span>XX-Baths</span>
                                    <h6>brief Details</h6>
                                </div>
                            </div>
                            <div class="card-footer" style="padding-top: 6px;">
                                <span>
                                    <button class="btn btn-primary float-right btn-sm">More Details</button>
                                </span>
                                <span style="margin-left:32%;">
                                    <a href="../Customer/Login/registration.php" class="btn btn-primary float-right btn-sm"><span>+ Add to Wish List</span></a>
                                </span>

                            </div>

                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-4 mt-4">
                        <div class="card">
                            <img class="card-img-top" src="../images/feature1.jpg">
                            <div class="card-block" style="padding-bottom: 0;">
                                <h4 class="card-title mt-3">Project Name</h4>
                                <div class="meta">
                                    <h5>Sale/Rent/PG</h5>
                                </div>
                                <div class="card-text">
                                    <span style="margin: 0 30px 0 0;">xx-BHK</span>
                                    <span>XX-Baths</span>
                                    <h6>brief Details</h6>
                                </div>
                            </div>
                            <div class="card-footer" style="padding-top: 6px;">
                                <span>
                                    <button class="btn btn-primary float-right btn-sm">More Details</button>
                                </span>
                                <span style="margin-left:32%;">
                                    <a href="../Customer/Login/registration.php" class="btn btn-primary float-right btn-sm"><span>+ Add to Wish List</span></a>
                                </span>

                            </div>

                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-4 mt-4">
                        <div class="card">
                            <img class="card-img-top" src="../images/feature1.jpg">
                            <div class="card-block" style="padding-bottom: 0;">
                                <h4 class="card-title mt-3">Project Name</h4>
                                <div class="meta">
                                    <h5>Sale/Rent/PG</h5>
                                </div>
                                <div class="card-text">
                                    <span style="margin: 0 30px 0 0;">xx-BHK</span>
                                    <span>XX-Baths</span>
                                    <h6>brief Details</h6>
                                </div>
                            </div>
                            <div class="card-footer" style="padding-top: 6px;">
                                <span>
                                    <button class="btn btn-primary float-right btn-sm">More Details</button>
                                </span>
                                <span style="margin-left:32%;">
                                    <a href="../Customer/Login/registration.php" class="btn btn-primary float-right btn-sm"><span>+ Add to Wish List</span></a>
                                </span>

                            </div>

                        </div>
                    </div>
                    <!--database search-->
                    <?php if (isset($_POST['bsearch']) || isset($_POST['rsearch']) || isset($_POST['psearch']) || isset($_POST['csearch']) || isset($_POST['dsearch'])) {

                        if (isset($_POST['bsearch'])) {
                            $lo = $_POST['keyword'];
                            if (!isset($_POST['cs'])) {
                                $xyz = NULL;
                            } else {
                                $xyz = $_POST['cs'];
                            }
                            if (!isset($_POST['budget'])) {
                                $tr = NULL;
                            } else {
                                $tr = $_POST['budget'];
                            }
                            if (!isset($_POST['bedr'])) {
                                $ct = NULL;
                            } else {
                                $ct = $_POST['bedr'];
                            }
                            $sql = "SELECT * FROM address 
   join project ON address.AddressId = project.AddressId 
   join floor_plan ON project.ProjectID = floor_plan.ProjectId
    WHERE 
    Status_of_Completion = IF(:xyz is NULL,Status_of_Completion,:xyz) 
    AND Sale_rate<=IF(:tr IS NULL,100, :tr) 
    AND bedroom=IF(:ct is NULL,bedroom,:ct) 
    AND (Location=:lo OR Street=:lo OR project.Property_Name=:lo OR project.Property_Type=:lo)";

                            $stmt = $pdo->prepare($sql);
                            $stmt->execute(array(":xyz" => $xyz, ":tr" => $tr, ":ct" => $ct, ":lo" => $lo));
                        } elseif (isset($_POST['rsearch'])) {
                            $lo = $_POST['keyword'];
                            if (!isset($_POST['budget'])) {
                                $tr = NULL;
                            } else {
                                $tr = $_POST['budget'];
                            }
                            if (!isset($_POST['bedr'])) {
                                $ct = NULL;
                            } else {
                                $ct = $_POST['bedr'];
                            }
                            $sql = "SELECT * FROM address join project ON address.AddressId = project.AddressId join floor_plan ON project.ProjectID = floor_plan.ProjectId
WHERE 
  Rental_rate=IF(:tr IS NULL,Rental_rate, :tr) AND 
 bedroom=IF(:ct IS NULL,bedroom, :ct) 
 AND (Location=:lo OR Street=:lo OR project.Property_Name=:lo OR project.Property_Type=:lo)";
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute(array(":tr" => $tr, ":ct" => $ct, ":lo" => $lo));
                        }

                        if (isset($_POST['psearch'])) {
                            $lo = $_POST['keyword'];
                            if (!isset($_POST['budget'])) {
                                $tr = NULL;
                            } else {
                                $tr = $_POST['budget'];
                            }
                            if (!isset($_POST['bedr'])) {
                                $ct = NULL;
                            } else {
                                $ct = $_POST['bedr'];
                            }
                            $sql = "SELECT * FROM address join project ON address.AddressId = project.AddressId join floor_plan ON project.ProjectID = floor_plan.ProjectId
WHERE 
   Sale_rate=IF(:tr IS NULL,Sale_rate, >=:tr) AND 
 bedroom=IF(:ct IS NULL,bedroom, :ct) 
 AND (Location=:lo OR Street=:lo OR project.Property_Name=:lo OR project.Property_Type=:lo)";
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute(array(":tr" => $tr, ":ct" => $ct, ":lo" => $lo));
                        }
                    ?>
                        <div class="row text-center" id="propsearch" style="display:flex; flex-wrap: wrap; padding:40px;margin: 0px;">
                            <?php if ($stmt->rowCount() > 0) {  ?>
                                <h1><?php echo 'PROPERTIES FOUND:' . "<br>" . "\n"; ?></h1>
                                <?php echo "<br>" . "\n"; ?>
                                <?php
                                $prop_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                $count = 0;
                                foreach ($prop_rows as $row) {
                                    $count = $count + 1;
                                    $pid = $row['ProjectId'];
                                ?>

                                    <div class="col-md-3 col-sm-12">
                                        <div class="thumbnail gallery ">
                                            <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '">' ?>
                                            <div class="caption">
                                                <h4><?php echo htmlentities($row['Location']); ?></h4>
                                                <h4><?php echo htmlentities($row['Property_Name']); ?></h4>
                                            </div>
                                            <p>
                                                <?php echo '<a href="details.php?pid=' . $pid . '" class="btn btn-primary" > More Info </a>'; ?>
                                            </p>
                                        </div>
                                    </div>

                                    <?php
                                    if ($count % 4 == 0) {
                                    ?>
                                        <div class="clearfix visible-md-block visible-lg-block"></div>
                                <?php
                                    }
                                }
                            } else { ?>
                                <h1><?php echo 'PROPERTIES NOT FOUND:' . "<br>" . "\n"; ?></h1>
                            <?php
                            }
                            ?>
                        </div>
                    <?php
                    }
                    ?>
                    <!-- End database search-->
                </div>
                <br><br>
            </div>


        </section>
    </div>


    <!-- FOOTER -->

    <section id="footer" style="padding-top: 60px;">
        <div class="container" style="height: 350px;">
            <div class="row text-left text-xs-left text-sm-left text-md-left">
                <div class="col-xs-12 col-sm-4 col-md-4" style="width: 224px; margin-left: 550px;">
                    <h5>About</h5>
                    <ul class="list-unstyled quick-links">
                        <li><a style="padding-left:6%;" href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>About us</a></li>
                        <li><a style="padding-left:6%;" href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Career</a></li>
                        <li><a style="padding-left:6%;" href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Privacy</a></li>
                        <li><a style="padding-left:6%;" href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Contact</a></li>
                        <li><a style="padding-left:6%;" style="padding-left:6%;" href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Site Map</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4" style="width: 224px;">
                    <h5>Join MMB</h5>
                    <ul class="list-unstyled quick-links">
                        <li><a style="padding-left:6%;" href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Join as Franchise</a></li>
                        <li><a style="padding-left:6%;" href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Become MMB Agent</a></li>
                        <li><a style="padding-left:6%;" href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Why Buy with MMB</a></li>
                        <li><a style="padding-left:6%;" href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Why Sell with MMB</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4" style="width: 224px;">
                    <h5>Agents and Offices</h5>
                    <ul class="list-unstyled quick-links">
                        <li><a style="padding-left:6%;" href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Become an Agent</a></li>
                        <li><a style="padding-left:6%;" href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Find an Agent</a></li>
                        <li><a style="padding-left:6%;" href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Find an Office</a></li>
                    </ul>
                </div>
            </div>


            <!-- icons -->

            <div class="row icon-pos">
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
                    <ul class="list-unstyled list-inline social text-center">
                        <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-instagram"></i></a></li>
                        <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-google-plus"></i></a></li>
                        <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02" target="_blank"><i class="fa fa-envelope"></i></a></li>
                    </ul>
                </div>
                <!-- <hr> -->
            </div>

            <div class="foot-logo" style="width: 500px;">
                <img src="../images/logo.jpg" style="width:500px;" alt="">
            </div>
            <!-- <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
                    <p><u><a href="https://www.nationaltransaction.com/">National Transaction Corporation</a></u> is a Registered MSP/ISO of Elavon, Inc. Georgia [a wholly owned subsidiary of U.S. Bancorp, Minneapolis, MN]</p>
                    <p class="h6">© All right Reversed.<a class="text-green ml-2" href="https://www.sunlimetech.com" target="_blank">Sunlimetech</a></p>
                </div>
                <hr>
            </div> -->
        </div>
    </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <script src="https://use.fontawesome.com/c40896fd08.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
</body>

</html>