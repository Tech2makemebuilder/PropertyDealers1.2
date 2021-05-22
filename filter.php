<?php
   require_once "pdo.php";
   //require_once "utilities.php";
   session_start();
   if(!isset($_POST['buysearch']) AND !isset($_POST['rentsearch'])){ ?>
     <!-- PROPERTY LISTING -->
    <div class="row text-center" style="dispaly:flex; flex-wrap: wrap; padding:40px;margin: 0px;">

        <div class="col-md-3 col-sm-12">
            <div class="thumbnail gallery">
                <img src="images/feature1.jpg">
                <div class="caption">
                    <h4>80 lacs onwards</h4>
                    <h4>Upper Road 3411,
                     no.34 CA</h4>
                </div>
                <p>
                    <a href="#" class="btn btn-primary">More Info</a>
                </p>
            </div>
        </div>

        <div class="col-md-3 col-sm-12">
            <div class="thumbnail gallery">
                <img src="images/feature2.jpg">
                <div class="caption">
                    <h4>80 lacs onwards</h4>
                    <h4>Delhi Housing Society, Dwarka</h4>
                </div>
                <p>
                    <a href="#" class="btn btn-primary">More Info</a>
                </p>
            </div>
        </div>

        <div class="col-md-3 col-sm-12">
            <div class="thumbnail gallery">
                <img src="images/feature3.jpg">
                <div class="caption">
                    <h4>80 lacs onwards</h4>
                    <h4>Block H, Vikaspuri, Delhi, 110018</h4>
                </div>
                <p>
                    <a href="#" class="btn btn-primary">More Info</a>
                </p>
            </div>
        </div>

        <div class="col-md-3 col-sm-12">
            <div class="thumbnail gallery">
                <img src="images/feature4.jpg">
                <div class="caption">
                    <h4>80 lacs onwards</h4>
                    <h4>kanhiya Nagar Tri Nagar ,Delhi,110035</h4>
                </div>
                <p>
                    <a href="#" class="btn btn-primary">More Info</a>
                </p>
            </div>
        </div>
    </div>
    <!-- PROPERTY LISTING END -->
  <?php }
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CleverDeals</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/slick-theme.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel ="stylesheet" href="css/style.css">


</head>
<body>
<header>
<nav id="header-nav" class="navbar navbar-default fixed-top">
<div class="container">
<div class="navbar-header">
<a href = " # " class=" visible-md visible-lg">
<div id="logo-img" alt="logo image"></div>
</a>
<div class="menu-btn">
<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>
<ul>


<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#"><span class="fa fa-smile-o"></span>  User Profile</a>
  <a href="BrokerModule/index.php"><span class="fa fa-bolt">  Be A Broker</span></a>
  <a href="#"><span class="fa fa-map-marker">  Nearby Properties</span></a>
  <a href="#"><span class="fa fa-phone">  Contact Us</span></a>
  <a href="#"><span class="fa fa-paper-plane-o">  Sell With Us</span></a>
  <a href="#"><span class="fa fa-sign-out"> Logout</span></a>
</div>


</ul>
</div> 
 
<button type="button" id="navbarToggle" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapsable-nav" aria-expanded="false">
  <span class="sr-only">Toggle navigation</span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
</button>
  
</div>
<div id="collapsable-nav" class="collapse navbar-collapse">
<ul id ="nav-list" class="nav navbar-nav navbar-right">
<li class = "search-icon">
<input type ="search" placeholder="Search Here..">
<label class= "icon">
<span class = "fa fa-search"></span>
</label>
</li>
<div class ="items">
<li>
<a href ="#">
<i class="fa fa-heart-o"></i></a>
</li>
<li>
<a href="#">
<i class="fa fa-shopping-cart"></i></a>
</li>
<li>
<a href="#">
<i class="fa fa-bell-o"></i></a>
</li>
<li>
<a href="#">
<i class="fa fa-smile-o"></i></a>
</li>

</ul>
</div>
</div>
</nav>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}

</script>
</header>
<!--form-->
<form action="filter.php" method="POST" id="advanceSearch">
                            <div class="form-group row">
                                <div class="col-12 col-md-4 col-lg-4">
                                        <select class="form-control" name="loc" id="catagories">
                                            <option>Select Location</option>
                                            <option>Delhi</option>
                                            <option>Gautam Buddh Nagar</option>
                                            <option>Gurgaon</option>
                                            <option>Noida</option>
                                        </select>
                                </div>

                                <div class="col-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <select class="form-control" name="cities" id="cities">
                                            <option>Property Type</option>
                                            <option>Type 1</option>
                                            <option>Type 2</option>
                                            <option>Type 3</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <select class="form-control" name="catagories" id="catagories">
                                            <option>Transaction Type</option>
                                            <option>First Sale</option>
                                            <option>Resale</option>
                                            <option>Rental</option>
                                        </select>
                                    </div>
                                </div>

                             </div>

                            <div class="form-group row">
                                 <div class="offset-md-10 col-md-2">
                                        <button type="submit" name="search" class="btn south-btn mr-auto"
                                            id="search">Search</button>
                                </div>
                            </div>
                           
 </form>
<!--End form-->
<!--database search-->
<?php
if(isset($_POST['buysearch'])){
   $sql="SELECT * FROM property WHERE proptype= :xyz AND transaction=:tr AND city=:ct AND type=:ty";
   $stmt=$pdo->prepare($sql);
   $stmt->execute(array(":xyz" =>$_POST['cities'],":tr"=>$_POST['catagories'],":ty"=>'Buy',":ct"=>$_POST['loc']));
}
elseif(isset($_POST['rentsearch']))
{
    $sql="SELECT * FROM property WHERE proptype= :xyz AND transaction=:tr AND city=:ct AND type=:ty";
    $stmt=$pdo->prepare($sql);
   $stmt->execute(array(":xyz" =>$_POST['cities'],":tr"=>$_POST['catagories'],":ty"=>'Rent',":ct"=>$_POST['loc'])); 
}
?>
<div class="row text-center" style="dispaly:flex; flex-wrap: wrap; padding:40px;margin: 0px;">
 <?php if($stmt->rowCount()>0)
    {  ?>
            <h1><?php echo 'PROPERTIES FOUND:' . "<br>" . "\n"; ?></h1>
         <?php   
           $prop_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
  $count=0;
  foreach ($prop_rows as $row){ 
           $count=$count+1;
     ?>
 
        <div class="col-md-3 col-sm-12" >
            <div class="thumbnail gallery ">
                <img src="upload/<?php echo $row['image']?>">
                <div class="caption">
                    <h4><?php echo htmlentities($row['city']); ?></h4>
                    <h4><?php echo htmlentities($row['address']); ?></h4>
                </div>
                <p>
                    <a href="#" class="btn btn-primary">More Info</a>
                </p>
            </div>
        </div>
<?php
     if($count%4==0){
          ?>
          <div class="clearfix visible-md-block visible-lg-block"></div>
          <?php
     }     
}
 }
 else{?>
     <h1><?php echo 'PROPERTIES NOT FOUND:' . "<br>" . "\n"; ?></h1>
 <?php
}
?>
</div>
<!-- End database search-->
<!--
  echo "<li>";
  echo htmlentities($row['proptype']).":".htmlentities($row['transaction']).":".htmlentities($row['type']).":".htmlentities($row['city']).":".htmlentities($row['address']);
  echo "</li>";
}
  -->

<!--About US-->
 <div class="aboutus">
        <center>
            <h1>ABOUT US</h1>
        </center>
        <p>Make Me Builder, aims to offer solutions in the construction market through partners including legal and
            financial experts, architecture and engineering consultants, construction materials, technology providers,
            and contractors.</p>
    </div>
<!--About US end-->

<!--  WHY US -->
    <section class="choice-section" style="background-image: url(images/Footer-Background-Image.png);">
        <div class="container">
            <link rel="stylesheet" href="css/whyus.css">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h3>What Makes Us <span>The Preferred Choice</span></h3>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 segment-three mb-30 mobile-footer">
                    <h4>Extensive Range of Properties:</h4>
                    <div class="h-line"></div>

                    <p>With extensive distribution
                        network, Cleverdeals
                        offer for properties is huge.</p>

                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 segment-three mb-30 mobile-footer">
                    <h4>Local Expert Brokers:</h4>
                    <div class="h-line"></div>
                    <p>We ensure that our brokers know
                        best how to fulfil our client needs
                        as the local expert in their
                        respective markets.</p>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 segment-three mb-30 mobile-footer">
                    <h4>Time Saving Services:</h4>
                    <div class="h-line"></div>
                    <p>Cleverdeals brokers conduct an
                        essential selection of those properties
                        that meet the client’s needs saving
                        the customer’s time.</p>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 segment-three mobile-footer">
                    <h4>Consolidate pool of Knowledge:</h4>
                    <div class="h-line"></div>
                    <p>Each broker is verified with knowlege in their respective markets.
                    </p>
                </div>
            </div>
        </div>
    </section>
<!--  WHY US -->


<!--footer-->
<footer id="footer">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

       <div class="container-fluid" style="background-image: url(images/footer.jpg);padding:30px" ;>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="footer-link mobile-footer-link">
                        <a href="#">
                            <img style="margin:0 0 20px 0" height="40" src="images/logo.jpg" class="footerlogo">
                        </a>
                    </div>
                </div>
                <!-- <div class="col-lg-8 col-md-8 col-sm-6 mb-30 mobile-footer"> -->
                <div class="col-lg-12 mb-30 mobile-footer">

                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12 mb-30 mr-30 mobile-footer">
                            <div class="footer-link mobile-footer-link">
                                <div class="section-title mobile-title">
                                    <h4 class="title">About</h4>
                                </div>
                                <ul class="list-mark">
                                    <li><a href="/">About Us</a></li>
                                    <li><a href="/">Career</a></li>
                                    <li><a href="/">Privacy</a></li>
                                    <li><a href="/">Contact</a></li>
                                    <li><a href="/">Site Map</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 mb-30 mr-30 mobile-footer">
                            <div class="footer-link mobile-footer-link">
                                <div class="section-title mobile-title">
                                    <h4 class="title">Join MMB</h4>
                                </div>
                                <ul class="list-mark">
                                    <li><a href="/">Join as Franchise</a></li>
                                    <li><a href="/">Become MMB Agent</a></li>
                                    <li><a href="/">Why Buy with MMB</a></li>
                                    <li><a href="/">Why Sell with MMB</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 mb-30 mr-30 mobile-footer">
                            <div class="footer-link mobile-footer-link">
                                <div class="section-title mobile-title">
                                    <h4 class="title">Agents and offices</h4>
                                </div>
                                <ul class="list-mark">
                                    <li><a href="/">Become an Agent</a></li>
                                    <li><a href="/">Find an Agent</a></li>
                                    <li><a href="/">Find an Office</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-12 mb-30 mobile-footer">
                    <section class="kw-widget" id="subscribe_forms">
                        <h4 class="kw-widget-title n-t"><span>Sign up</span> to our newsletter</h4>
                        <h5 style="color:rgb(95, 89, 89);">and get the latest deals, reviews and articles</h5>
                        <form class="kw-newsletter-form kw-inline-form" method="">
                            <div class="kw-input-wrapper">
                                <input type="email" id="subemail" name="subemail" autocomplete="off"
                                    placeholder="Enter your email address..." class="footermail" required>
                            </div>
                            <!--/ .kw-input-wrapper -->
                            <br><button type="submit" class="btn btn-primary" name="newsletter_submit"
                                id="newsletter_submit">Subscribe</button>
                            <span id="subbsribe_succ" class="error-tool-tip" style="display: none;"></span>
                        </form>

                    </section>
                </div>
              </div>
            </div>
        </div>
            <div class="row">
                <div class="col-lg-8 col-md-6 col-sm-12 mb-30 mobile-footer">
                    <div class="footer-link mobile-footer-link">
                        <p class="dc-p" style="color: rgb(95, 89, 89);"><span>Disclaimer:</span> </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-30 mobile-footer">
                    <h6 style="  color: rgb(95, 89, 89);">KEEP IN TOUCH</h6>
                    <div class="social-icons-color-hover">
                        <ul style="display: flex;">
                            <li class="social-facebook"><a href="https://www.facebook.com/makemebuilder"
                                   target="blank"><i class="fa fa-facebook"></i>  </a></li>
                            <li class="social-twitter"><a href="https://www.twitter.com/makemebuilder" target="blank"><i
                                        class="fa fa-twitter"></i></a></li>
                            <li class="social-linkedin"><a href="https://www.linkedin.com/company/make-me-builder"
                                    target="blank"><i class="fa fa-linkedin"></i></a></li>
                            <li class="social-instagram"><a href="https://www.instagram.com/makemebuilder"
                                    target="blank"><i class="fa fa-instagram"></i></a></li>
                            <li class="social-youtube"><a
                                    href="https://www.youtube.com/channel/UCgAT37ZKm9z8F7CgLdkuHkQ" target="blank"><i
                                        class="fa fa-youtube-play"></i></a></li>
                        </ul>
                    </div>
                </div>

            </div>

        </div>
    </footer>

<!--end footer-->
  </body>
</html>