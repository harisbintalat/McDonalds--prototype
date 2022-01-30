<?php
  session_start();
  require_once('pdo.php');

  if (isset($_POST['name']) && isset($_POST['email']))
  {
    if (strlen($_POST['name']) < 1)
    {
      $_SESSION['failure'] ="All values are required";
      header("Location: index.php");
      return;
    }
    if (strlen($_POST['email']) < 1)
    {
      $_SESSION['failure'] ="All values are required.";

      header("Location: index.php");
      return;
    }

    else
    {
      $name=htmlentities($_POST['name']);
      $email=htmlentities($_POST['email']);
      $stmt= $pdo->prepare('INSERT INTO newsletter (name,email)VALUES(:nm,:em)');
      $stmt->execute(array(':nm'=>$name,':em'=>$email));
      $_SESSION['success']="You have successfully subscribed to the newsletter. You'll receive a confirmation email in a few minutes.";
      $pdo = null;
      header("Location: index.php");
      return;
    }
  }
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>McDonald's</title>
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
    <nav class="navbar  sticky-top navbar-dark navbar-expand  fixed-top" >
  <div class="container">
        <a class="navbar-brand" href="#"><img src="img/site-logo.png" height="30" width="41"></a>
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

      <div class="container-fluid text-white">
        <div class="row">
        <div id="carouselExampleIndicators"  class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="img/car7.jpg"  alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="img/car6.png" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="img/car5.png" alt="Third slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="img/car4.png" alt="Third slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="img/car3.png" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
        <div class="row">
          <img src="img/banner.jpg" alt="not available" height="20px" width="100%";>
        </div>
        <div class="row">
          <div class="col padding-0" style="background-color:#B22222">

            <form method="post">
            <br><h2 style="text-align:Center" >JOIN OUR EMAIL LIST</h2>
            <p style="text-align:Center" >For news, promotions, and more delivered right to your inbox</p>
            <?php
              if(isset($_SESSION['failure']))
              {
                echo '<label class="offset-4 text-warning">'.htmlentities($_SESSION['failure']).'</label>';
                unset($_SESSION['failure']);
              }
              if(isset($_SESSION['success']))
              {
                echo '<label class="offset-1 text-success">'.htmlentities($_SESSION['success']).'</label>';
                unset($_SESSION['success']);
              }
            ?>

            <input type="text" name="name" class="col-10 form-control form-rounded offset-1 text-white"  placeholder="Name" style="background-color:#B22222">
            <br/>
            <input type="text" name="email" class="col-10 form-control form-rounded offset-1 text-white" placeholder="Email" style="background-color:#B22222">
            <br/>
              <input type="submit" name="Add" class="col-10 form-control form-rounded  offset-1 text-white" value="Subscribe" style="background-color:#A52A2A" >
              <br><center>
                 By clicking ”Subscribe” you agree to receive emails,
                       promotions, and general messages from McDonald’s.
                     </center>
              </form>


          </div>
          <div class="col padding-0">
            <img src="img/tour.jpg" alt="" height="100%" width="100%">
            <span class="centered "><b style=font-size:40px;>Kitchen Tour</b><p class="offset-2" style=font-size:15px>at restaurants or online</p></span>
            <a type="submit" href="opendoor.php" class="btns">Register now</a>
          </div>
        </div>
        <div class="row">
          <div class="col padding-0"><img src="img/saftey.png" alt="" height="100%" width="100%"></div>
          <div class="col padding-0"><img src="img/nutrition.jpg" alt="" height="100%" width="100%">
            <span class="centered "><p class="offset-2" style=font-size:30px>Explore our</p><b style=font-size:40px;>nutrition Facts</b></span>
            <a type="submit" href="aboutus.html" class="btns">See Nutritional Details</a></div>
        </div>
        <div class="row">
          <img src="img/banner.jpg" alt="" height="120px" width="100%">
            <span class="center "><b style=font-size:40px;>Follow. Post. Connect</b></span>
        </div>
            <div class="row content">
              <div class="col-2 offset-1">
                <br><br><img src="img/site-logo.png" alt="" height="100px" width="120"><br><br>
              </div>
              <div class="col-2">
                  <h4>About Us</h4><br>
                  <p><a href="aboutus.html">Quality Assurance</a></p>
                  <p><a href="aboutus.html">Nutrition Guide</a></p>
                  <p><a href="aboutus.html">Mcdonald's Pakistan</a></p>
              </div>
              <div class="col-2">
                  <h4>Careers</h4><br>
                  <p><a href="careers.html">Resturant Jobs</a></p>
                  <p><a href="careers.html">Office Jobs</a></p>
                  <p><a href="careers.html">Best People Practices</a></p>
                  <p><a href="careers.html">Mcvalues</a></p>
              </div>
              <div class="col-2">
                  <h4>Open Door</h4><br>
                  <p><a href="#">Book a Tour</a></p>
                  <p><a href="#">Virtual Kitchen Tour</a></p>
              </div>
              <div class="col-3">
                  <h4 >McDonald’s Talkies</h4><br>
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
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  </body>
</html>
