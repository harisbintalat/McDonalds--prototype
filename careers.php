<?php
  session_start();
  require_once('pdo.php');
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Supper Offer-McDonald's</title>
      <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="faviconIcon" href="img/site-logo.png" type="image/x-icon">
    <link rel="shortcut" href="img/site-logo-png" type="image/x-icon">
  </head>
  <body style="background-color:black">
    <nav class="navbar navbar-dark sticky-top navbar-expand fixed-top">
  <div class="container">
        <a class="navbar-brand" href="index.php"><img src="img/site-logo.png" height="30" width="41"></a>
        <div class="w-100 order-1">
          <ul class="navbar-nav mr-auto">
              <li class="nav-item "><a class="nav-link" href="./aboutus.html"> <span class="text-white">ABOUT</span> </a></li>
              <li class="nav-item"><a class="nav-link" href="./menu.html"><span class="text-white"> OUR MENU </span></a></li>
              <li class="nav-item"><a class="nav-link" href="./opendoor.php"><span class="text-white"> OPEN DOOR</span> </a></li>
              <li class="nav-item"><a class="nav-link" href="./locate.html"><span class="text-white"> LOCATE US </span></a></li>
              <li class="nav-item"><a class="nav-link" href="./promotions.html"><span class="text-white"> PROMOTIONS </span></a></li>
              <li class="nav-item" ><a class="nav-link" href="./careers.php"><span class="text-white"> CAREERS</span>  </a></li>
              <li class="nav-item"><a class="nav-link" href="./contact.php"><span class="text-white"> FEEDBACK</span> </a></li>
              <li class="nav-item"><a class="navbar-brand " href="delivery.php" style="padding-left:140px;"><img src="img/mcdelivery.svg" height="30" width="41"><i style="font-size:13px;">mcdelivery</i></a></li>
              <li class="nav-item"><a class="nav-link" href="#"><span class="fa fa-search fa-lg text-white"></span><i class="text-white"> SEARCH </i></a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container-fluid text-white " style="background-color:black;">
      <div class="row">
        <img src="img/job-banner.jpg" alt="" height="500px" width="100%">
        <span class="centered text-white"><b style=font-size:80px;>JOBS</b><p class="offset-0" style=font-size:20px>Take your carrers to new height.</p></span>
      </div>

<br>
<br>
      <div class="row">
        <br>
        <br><span class=" offset-4"  ><b style=font-size:30px; class="text-white";>Most Recent Jobs in </b><b style=font-size:30px; class="text-danger";>Pakistan</b></span>
        <br>
      </div>
      <div class="row">
        <?php
        $stmt= $pdo->query("SELECT * FROM jobs");
        echo '<div class="offset-2" style="padding:20px;">'."\n";
        echo '<label style="border-bottom:1px solid grey;" class="col-3 text-danger ">JOB ID</label>';
        echo '<label style="border-bottom:1px solid grey;" class="col-3 text-danger">JOB TITLE</label>';
        echo '<label style="border-bottom:1px solid grey;" class="col-3 text-danger">LOCATION</label>';
        echo '<label style="border-bottom:1px solid grey;" class="col-3 text-danger">DATE / TIME</label>';
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
        echo '<label class="col-3">';
        echo $row['job_id'];
        echo '</label>';
        echo '<label class="col-3 font-weight-bold" style="padding-top:20px;">';
        echo "<a  href='career2.php?id=".$row['job_id']."'>".$row['job_title']."</a>";
        echo '</label>';
        echo '<label class="col-3">';
        echo $row['location'];
        echo '</label>';
        echo '<label class="col-3">';
        echo $row['post_date'];
        echo '</label>';
        echo '<div style="border-top:1px solid grey;padding-bottom:20px;"></div>';
        }
        echo '</div>';
        ?>
      </div>
        <br>
        <div class="row content">

          <div class="col-2 offset-1">
            <br><br><img src="img/site-logo.png" alt="" height="100px" width="120"><br><br>
          </div>
          <div class="col-2">
              <h4 class="text-white">About Us</h4><br>
              <p><a href="#">Quality Assurance</a></p>
              <p><a href="#">Nutrition Guide</a></p>
              <p><a href="#">Mcdonald's Pakistan</a></p>
          </div>
          <div class="col-2">
              <h4 class="text-white">Careers</h4><br>
              <p><a href="#">Resturant Jobs</a></p>
              <p><a href="#">Office Jobs</a></p>
              <p><a href="#">Best People Practices</a></p>
              <p><a href="#">Mcvalues</a></p>
          </div>
          <div class="col-2">
              <h4 class="text-white">Open Door</h4><br>
              <p><a href="#">Book a Tour</a></p>
              <p><a href="#">Virtual Kitchen Tour</a></p>
          </div>
          <div class="col-3">
              <h4 class="text-white">McDonald’s Talkies</h4><br>
              <p><a href="#">Hot out of Oven</a></p>
              <p><a href="#">What The food</a></p>
              <p><a href="#">unique Mcdonald's</a></p>
              <p><a href="#">Behind The Scenes</a></p>
              <p><a href="#">Spreading Smiles</a></p>
              <p><a href="#">Meet the Mcdonald's Team</a></p>
              <p><a href="#">Lets Play</a></p>
          </div>
        </div>
        </div>
        <footer class="footer footer-dark">
        <div class="container">
          <div class="row">
            <div class="col-7">
              <label>Stay Connected </label>
              <a class="btn btn-social-icon btn-facebook" href="http://www.facebook.com"><i class="fa fa-facebook fa-lg"></i></a>
                <a class="btn btn-social-icon btn-twitter" href="http://twitter.com/"><i class="fa fa-twitter fa-lg"></i></a>
              <a class="btn btn-social-icon btn-linkedin" href="http://www.linkedin.com/in/"><i class="fa fa-linkedin fa-lg"></i></a>
              <a class="btn btn-social-icon btn-instagram" href="http://www.instagram.com"><i class="fa fa-instagram fa-lg bg-danger"></i></a>
              <a class="btn btn-social-icon btn-youtube" href="http://www.youtube.com"><i class="fa fa-youtube fa-lg bg-danger"></i></a>
                <div><br></br>
                  <a href="#">Contact</a> | <a href="#">Privacy</a> | <a href="#">Terms & conditions</a>
                </div>

            </div>
            <div class="col">
              <label>Get McDonald's App </label>
              <button class="btn btn-outline-dark">
                <i class="fa fa-android fa-2x text-success"></i> <span class="d-inline-block text-left"> <small class="d-block">Get it on the</small> Google Play </span>
               </button>
                <button class="btn btn-outline-dark "> <i class="fa fa-apple fa-2x text-secondary"></i>
                <span class="d-inline-block text-left"> <small class="d-block" >Available on the</small> App Store </span> </button>
                  <br></br>
              </div>
          </div>
         <div class="row justify-content-center">
              <div class="col-auto">
                  <p>© Copyright 2020 Haris Bin Talat & Alishba Abrar</p>
              </div>
         </div>
        </div>
        </footer>
        </body>
        </html>
