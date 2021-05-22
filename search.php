<?php
   include('db_conn.php');
 

    
     $price = (isset($_POST['price']) ? $_POST['price'] :'') or die("could not fetch data");

  
     echo $price;
      $sql = "SELECT * FROM `property` where `price` <=$price";
      $query  = mysqli_query($conn,$sql);
 


 ?>
 <!DOCTYPE html>
     <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Clever Deal</title>
    <link rel="icon" href="img/core-img/LOGO.jpg">
    <link rel="stylesheet" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div class="container">
          <div class="row">
                <div class="col-12">
                    <div class="section-heading wow fadeInUp">
                        <h2>Featured Properties</h2>
                        <p>Suspendisse dictum enim sit amet libero malesuada feugiat.</p>
                    </div>
                </div>
            </div>
         <div class="row">
              <?php
                 while($row = mysqli_fetch_assoc($query)){
                   
                    ?>
                    <div class="col-sm-4">
                        <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="100ms">
                               
                        <!-- Property Thumbnail -->
                        <div class="property-thumb">
                            <img src="image/<?php   echo $row['image']; ?>" alt="">

                            <div class="tag">
                                <span>For <?php  echo $row['for']; ?></span>
                            </div>
                            <div class="list-price">
                                <p>Rs.<?php  echo $row['price']; ?></p>
                            </div>
                        </div>
                        <!-- Property Content -->
                        <div class="property-content">
                            <h5><?php echo $row['city'];  ?></h5>
                            <p class="location"><img src="img/icons/location.png" alt=""><?php  echo $row['address']; ?></p>
                            <p><?php  echo $row['some_details'] ;?></p>
                            <div class="property-meta-data d-flex align-items-end justify-content-between">
                                <div class="new-tag">
                                    <img src="img/icons/new.png" alt="">
                                </div>
                                <div class="bathroom">
                                    <img src="img/icons/bathtub.png" alt="">
                                    <span><?php echo $row['bathroom'];  ?></span>
                                </div>
                                <div class="garage">
                                    <img src="img/icons/garage.png" alt="">
                                    <span> <?php  echo $row['bedroom']; ?></span>
                                </div>
                                <div class="space">
                                    <img src="img/icons/space.png" alt="">
                                    <span><?php echo $row['space']; ?> sqr ft</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                    <?php
                   }
                ?>

         </div>
    </div>
    
  
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/classy-nav.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/active.js"></script>

</body>

</html>