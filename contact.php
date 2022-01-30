<?php
  session_start();
  require_once('pdo.php');

  if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['areacode']) && isset($_POST['telnum']) && isset($_POST['email']) && isset($_POST['branch']) && isset($_POST['message']))
  {
    if ((strlen($_POST['firstname']) < 1) || (strlen($_POST['lastname']) < 1) || (strlen($_POST['areacode'])< 1) || (strlen($_POST['telnum']) < 1)  || (strlen($_POST['branch']) < 1))
    {
      $_SESSION['failure'] ="All values are required";
      header("Location: contact.php");
      return;
    }
    if ((strlen($_POST['branch']) < 1) || (strlen($_POST['message']) < 1)) {
      $_SESSION['failure'] ="All values are required";
      header("Location: contact.php");
      return;
    }
    else
    {
      $firstname=htmlentities($_POST['firstname']);
      $lastname=htmlentities($_POST['lastname']);
      $areacode=htmlentities($_POST['areacode']);
      $telnum=htmlentities($_POST['telnum']);
      $email=htmlentities($_POST['email']);
      $branch=htmlentities($_POST['branch']);
      $message=htmlentities($_POST['message']);
      $stmt= $pdo->prepare('INSERT INTO feedback (firstname,lastname,areacode,tel_num,email,branch,message)VALUES(:fn,:sn,:ac,:tn,:em,:bn,:ms)');
      $stmt->execute(array(':fn'=>$firstname,':sn'=>$lastname,':ac'=>$areacode,':tn'=>$telnum,':em'=>$email,':bn'=>$branch,':ms'=>$message));
      $_SESSION['success']="Thanks for your feedback. We'll contact you soon.";
      $pdo = null;
      header("Location:contact.php");
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
  <body  style="background-color:black">
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
        <img src="img/contact.jpg" alt="" height="500px" width="100%">
        <span class="centered "><b style="font-size:70px; font-weight:1000;">Contact Us</b><p class="offset-1" style=font-size:15px>Have a Question? You're in the right place</p></span>
      </div>
      <div class="row row-content">
         <div class="offset-2"><img src="img/site-logo.png" height="30" width="41"></div>
            <div class="col-"><h3>Send us your Feedback</h3>
         </div><br></br>
          <div class="col-12 col-md-9">
              <form method="post">
                <?php
                  if(isset($_SESSION['failure']))
                  {
                    echo '<label class="offset-3 text-danger">'.htmlentities($_SESSION['failure']).'</label>';
                    unset($_SESSION['failure']);
                  }
                  if(isset($_SESSION['success']))
                  {
                    echo '<label class="offset-2 text-success">'.htmlentities($_SESSION['success']).'</label>';
                    unset($_SESSION['success']);
                  }
                ?>
                <div class="form-group row">
                  <label for="firstname" class="col-md-2 col-from-label">FirstName:</label>
                  <div class="col-md-10">
                    <input type="text" class="form-control" id="firstname" name="firstname"
                    placeholder="First Name">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="lastname" class="col-md-2 col-from-label">LastName:</label>
                  <div class="col-md-10">
                    <input type="text" class="form-control" id="lastname" name="lastname"
                    placeholder="Last Name">
                </div>
              </div>
                <div class="form-group row">
                  <label for="telnum" class="col-12 col-md-2 col-from-label">Contact:</label>
                  <div class="col-5 col-md-3">
                    <input type="tel" class="form-control" id="areacode" name="areacode"
                    placeholder="Areacode.">
                  </div>
                  <div class="col-7 col-md-7">
                    <input type="tel" class="form-control" id="telnum" name="telnum"
                    placeholder="Tel No.">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="email" class="col-md-2 col-from-label">Email:</label>
                  <div class="col-md-10">
                    <input type="email" class="form-control" id="email" name="email"
                    placeholder="Email">
                </div>
              </div>
              <div class="form-group row">
                  <label for="branches" class="col-md-2 col-from-label">Select Branch:</label>
                <div class="col-md-6">

                    <select class="form-control" name="branch">
                      <option>Jinnah Park.</option>
                      <option>Bahria Town.</option>
                      <option>DHA 1.</option>
                      <option>F-9 Park.</option>
                    </select>

                  </div>
          </div>
          <div class="form-group row">
            <label for="feedback" class="col-md-2 col-from-label">Your Message:</label>
            <div class="col-md-10">
              <textarea  class="form-control" id="feedback" name="message"
              rows="12"></textarea>
          </div>
        </div>
        <div class="form-group row">
          <div class="offset-md-2 col-md-10">
            <button type="submit" class="btn btn-danger">Submit Feedback</button>
          </div>
        </div>
      </form>
          </div>
           <div class="col-12 col-">
          </div>
     </div>
    <div class="row content">
      <div class="col-2 offset-1">
        <br><br><img src="img/site-logo.png" alt="" height="100px" width="120px"><br><br>
      </div>
      <div class="col-2">
          <h4>About Us</h4><br>
          <p><a href="#">Quality Assurance</a></p>
          <p><a href="#">Nutrition Guide</a></p>
          <p><a href="#">Mcdonald's Pakistan</a></p>
      </div>
        <div class="col-2">
          <h4>Careers</h4><br>
          <p><a href="#">Resturant Jobs</a></p>
          <p><a href="#">Office Jobs</a></p>
          <p><a href="#">Best People Practices</a></p>
          <p><a href="#">Mcvalues</a></p>
        </div>
        <div class="col-2">
          <h4>Open Door</h4><br>
          <p><a href="#">Book a Tour</a></p>
          <p><a href="#">Virtual Kitchen Tour</a></p>
        </div>
        <div class="col-3">
          <h4>McDonald’s Talkies</h4><br>
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
