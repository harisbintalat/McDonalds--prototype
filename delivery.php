<?php
  session_start();
  require_once('pdo.php');

  if (isset($_POST['inemail']) && isset($_POST['inpswd']))
  {
    if ((strlen($_POST['inemail']) < 1) || (strlen($_POST['inpswd']) < 1))
    {
      $_SESSION['error'] ="All values are required";
      header("Location:delivery.php");
      return;
    }
    else
    {
      $inemail=$_POST['inemail'];
      $inpswd=md5($_POST['inpswd']);
      $stmt=$pdo->prepare("SELECT user_id,email,username,password FROM users WHERE email=:ew AND password=:pw");
      $stmt->execute(array(':ew'=>$inemail,':pw'=>$inpswd));
       $row=$stmt->fetch(PDO::FETCH_ASSOC);
       {
      if ($row['email'] !== $inemail || $row['password'] !==$inpswd)
      {
        $_SESSION['error']="Invalid Email or password";
        header("location:delivery.php");
        return;
      }
      if($row['email'] ===$inemail && $row['password'] === $inpswd)
      {
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['username']=$row['username'];
        header("Location: delivery_confirm.php?name=".urlencode($_SESSION['user_id']));
        return;
      }
    }
  }
}
  if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['telnum']) && isset($_POST['password']) && isset($_POST['address']))
  {
    if ((strlen($_POST['username']) < 1) || (strlen($_POST['email']) < 1) || (strlen($_POST['telnum'])< 1) || (strlen($_POST['password']) < 1)  || (strlen($_POST['address']) < 1))
    {
      $_SESSION['failure'] ="All values are required";
      header("Location:delivery.php");
      return;
    }
    else
    {
      $username=htmlentities($_POST['username']);
      $email=htmlentities($_POST['email']);
      $telnum=htmlentities($_POST['telnum']);
      $password=md5($_POST['password']);
      $address=htmlentities($_POST['address']);

      $stmt1=$pdo->prepare("SELECT email FROM users WHERE email=:ew");
      $stmt1->execute(array(':ew'=>$_POST['email']));
      $row1=$stmt1->fetch(PDO::FETCH_ASSOC);
      {
        if ($email===$row1['email'])
        {
          $_SESSION['failure'] ="Email already Registered.";
          header("Location:delivery.php");
          return;
        }
      }
     {
       $stmt= $pdo->prepare('INSERT INTO users (username,email,contact,password,address)VALUES(:fn,:sn,:ac,:tn,:em)');
       $stmt->execute(array(':fn'=>$username,':sn'=>$email,':ac'=>$telnum,':tn'=>$password,':em'=>$address));
       $_SESSION['success']="Registered successfully. Sign-up to order.";
       $pdo = null;
       header("Location:delivery.php");
       return;
    }

    }
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>McDelivery Pakistan</title>
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
  <body>
    <nav  class="navbar navbar-dark  navbar-expand fixed-top">
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
<div class="container-fluid">
           <div class="row">
             <div class="col-8 padding-0">
               <img  src="img/car1.png" alt="" height="100%" width="100%">
             </div>
             <div class="col-4 padding-0 " style="background-color:#FFFFF0">
               <form method="post">
               <br><h2 style="color:#000000" class="text-grey offset-3" >Start Ordering</h2>
               <?php
                 if(isset($_SESSION['error']))
                 {
                   echo '<label class="offset-3 text-danger">'.htmlentities($_SESSION['error']).'</label>';
                   unset($_SESSION['error']);
                 }
               ?>
               <input type="text" class="col-9 form-control form-rounded offset-1" class="text-white" placeholder="Email" name="inemail">
               <br/>
               <input  type="password" class="col-9 form-control form-rounded offset-1" class="text-white" placeholder="Password" name="inpswd">
               <br/>
                 <input type="checkbox" class=" offset-1" name="terms" style="color:grey">
                 <lable  style="color:black"> Remember Me.</lable>
			           <a href="#" style="color:blue" >Forgot Password?</a>
                 <br>
              <br><input type="submit" class="col-5 form-control form-rounded text-white offset-3 btn-lg bg-danger" value="Sign In" >
            </form>
              </div>
            </div>
            <br>
            <div class="row"  style="background-color:#FFFFFF">
              <div class="col padding-0">
                <img  src="img/c1.jpg" alt="" height="100%" width="100%">
              </div>
              <div class="col pading-0">
                <img  src="img/c2.jpg" alt="" height="100%" width="100%">
              </div>
                <div class="col pading-0">
                  <img  src="img/c3.jpg" alt="" height="100%" width="100%">
                </div>
            </div>
          <div class="row" style="padding:50px 0px 20px 50px; background-color:#FFFFF0">
               <div class="offset-5"><img src="img/site-logo.png" height="30" width="41"></div>
                  <div class="col-"><h3>Sign Up</h3>
               </div><br></br>
            <div class="col-7 offset-2">
                <form method="post">
                  <?php
                    if(isset($_SESSION['failure']))
                    {
                      echo '<label class="offset-5 text-danger">'.htmlentities($_SESSION['failure']).'</label>';
                      unset($_SESSION['failure']);
                    }
                    if(isset($_SESSION['success']))
                    {
                      echo '<label class="offset-4 text-success">'.htmlentities($_SESSION['success']).'</label>';
                      unset($_SESSION['success']);
                    }
                  ?>
                  <div class="form-group row">
                    <label for="username" class="col-md-2 col-from-label">*Username:</label>
                    <div class="col-md-10">
                      <input type="text" class="form-control" id="username" name="username"
                      placeholder="Username">
                  </div>
                </div>
                  <div class="form-group row">
                    <label for="email" class="col-md-2 col-from-label">*Email:</label>
                    <div class="col-md-10">
                      <input type="email" class="form-control" id="email" name="email"
                      placeholder="Email">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="telnum" class="col-12 col-md-2 col-from-label">*Contact:</label>
                  <div class="col-7 col-md-10">
                    <input type="tel" class="form-control" id="telnum" name="telnum"
                    placeholder="Tel No.">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="password" class="col-md-2 col-from-label">*Password:</label>
                  <div class="col-md-10">
                    <input type="password" class="form-control" id="password" name="password"
                    placeholder="password">
                </div>
              </div>
            <div class="form-group row">
              <label for="Address" class="col-md-2 col-from-label">*Address:</label>
              <div class="col-md-10">
                <textarea  class="form-control" id="Address" name="address"
                rows="3" placeholder="Address"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <div class="offset-6 col-10">
              <button type="submit" class="btn btn-danger">Register</button>
            </div>
          </div>
        </form>

          </div>
        </div>
            <div class="row">
              <img  class="of" src="img/c5.png" alt="" height="100%" width="100%">
            </div>
          </div>
        <div class="container-fluid">
            <div class="row content">
              <div class="col-2 offset-1">
                <br><br><img src="img/site-logo.png" alt="" height="100px" width="120px"><br><br>
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
