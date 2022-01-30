<?php
  session_start();
  require_once('pdo.php');

  $stmt=$pdo->prepare("SELECT * FROM jobs WHERE job_id=:ew");
  $stmt->execute(array(':ew'=>$_REQUEST['id']));
  $row=$stmt->fetch(PDO::FETCH_ASSOC);
  $title=$row['job_title'];
  $date= $row['post_date'];
  $city=$row['location'];
  if (isset($_POST['appliedfor']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['qualification']) && isset($_POST['age']) && isset($_POST['City']) && isset($_POST['email']) && isset($_POST['Conno']) )
  {
    if ((strlen($_POST['appliedfor']) < 1) || (strlen($_POST['firstname']) < 1) || (strlen($_POST['lastname'])< 1) || (strlen($_POST['qualification']) < 1)  || (strlen($_POST['age']) < 1))
    {
      $_SESSION['failure'] ="All values are required";
      header("Location: career2.php?id=".$row['job_id']);
      return;
    }
    if ((strlen($_POST['City']) < 1) || (strlen($_POST['email']) < 1) || (strlen($_POST['Conno']) < 1)) {
      $_SESSION['failure'] ="All values are required";
      header("Location: career2.php?id=".$row['job_id']);
      return;
    }
    else
    {
      $appliedfor=htmlentities($_POST['appliedfor']);
      $firstname=htmlentities($_POST['firstname']);
      $lastname=htmlentities($_POST['lastname']);
      $qualification=htmlentities($_POST['qualification']);
      $age=htmlentities($_POST['age']);
      $City=htmlentities($_POST['City']);
      $email=htmlentities($_POST['email']);
      $Conno=htmlentities($_POST['Conno']);
      $stmt= $pdo->prepare('INSERT INTO career2 (appliedfor,firstname,lastname,qualification,age,City,email,Conno)VALUES(:af,:fn,:sn,:qq,:ag,:ct,:em,:cn)');
      $stmt->execute(array(':af'=>$appliedfor, ':fn'=>$firstname,':sn'=>$lastname,':qq'=>$qualification,':ag'=>$age,':ct'=>$City,':em'=>$email,':cn'=>$Conno));
      $_SESSION['success']="Registereation completed. You will be contacted to confirm about your interview.";
      $pdo = null;
      header("Location: career2.php?id=".$row['job_id']);
      return;
    }
  }
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Apply</title>
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
      <span class="centered" style="padding-top:70px;"><h2 style="font-size:40px; font-weight:1000;">Application for <?php  echo $title; ?> </h2></span>
    </div>
    <br>
    <br>

      <div class="row"  >
        <br>
        <br><span class="offset-1"><b style=font-size:40px; class="text-muted";><?php  echo $title; ?> </b></span>
        </div>
        <br>
        <div class="row" class="offset-1" >

          <br><p class="offset-1" class="text-mutes col-12" style="color:grey; font-size:30px" >
            Restaurant Jobs
          </p>
          </div>

          <div class="row">
          <br><p class="offset-1" class="text-mutes col-12" style="color:grey; font-size:30px" >
            Published: <?php echo $date; ?>
          </p>
          </div>

          <hr class="offset-1" style="border:0.5px solid grey">
          <div class="row">
           <div class="col padding-0">
            <p class="offset-3" class="text-mutes col-6" style="color:white; font-size:20px" >
               City
             </p>
             <p class="offset-3" class="text-mutes col-6" style="color:white; font-size:20px" >
               Job Type
             </p>

             </div>
                 <div class="col padding-0">
                 <p class="offset-3" class="text-mutes col-6" style="color:white; font-size:20px" >
                  <?php echo $city; ?>
                  </p>
                  <p class="offset-3" class="text-mutes col-6" style="color:white; font-size:20px" >
                   Full-Time
                      </p>

                   </div>
                      </div>
                      <hr class="offset-1" style="border:0.5px solid grey">

                  <div class="row" >
                    <span class="offset-1" class="left"><b style=font-size:40px; class="text-muted";>Discription </b></span>
                    </div>
                    <br>

                  <div class="row">
                    <?php
                    $stmt= $pdo->prepare("SELECT * FROM discription where job_id=:ew");
                    $stmt->execute(array(':ew'=>$_REQUEST['id']));
                    while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                    {
                    echo '<label class="col-12 offset-1" style="padding-bottom:20px;">⚪ ';
                    echo $row['discriptions'];
                    echo '</label>';
                    }

                    ?>
                    </div>

                       <div class="row">
                      <span class="offset-1" class="left"><b style=font-size:30px; class="text-muted";>Job Specification </b></span>
                       <br>
                     </div>
                     <br>

                     <div class="row">
                       <?php
                       $stmt= $pdo->prepare("SELECT * FROM specification where job_id=:ew");
                       $stmt->execute(array(':ew'=>$_REQUEST['id']));
                       while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                       {
                       echo '<label class="col-12 offset-1" style="padding-bottom:20px;">⚪ ';
                       echo $row['specifications'];
                       echo '</label>';
                       }

                       ?>
                     </div>

                       <div class="row">
                         <br><span class="offset-5" class="left"><b style=font-size:30px; class="text-muted";>Apply Now </b></span>
                          <br>
                        </div><br>
                        <div class="row" >
                          <div class="col-12 col-md-9">
                              <form class="offset-2" method ="post">

                                <?php
                                  if(isset($_SESSION['failure']))
                                  {
                                    echo '<label class="offset-5 text-danger">'.htmlentities($_SESSION['failure']).'</label>';
                                    unset($_SESSION['failure']);
                                  }
                                  if(isset($_SESSION['success']))
                                  {
                                    echo '<label class="offset-2 text-success">'.htmlentities($_SESSION['success']).'</label>';
                                    unset($_SESSION['success']);
                                  }
                                ?>
                                <div class="form-group row">
                                  <label for="appliedfor" class="col-md-2 col-from-label">Applied For</label>
                                  <div class="col-md-10">
                                    <input type="text" class="form-control " id="appliedfor" name="appliedfor" value="<?php  echo $title; ?>"
                                     >
                                  </div>
                                </div>

                                <div class="form-group row">
                                  <label for="firstname" class="col-md-2 col-from-label">First Name:</label>
                                  <div class="col-md-10">
                                    <input type="text" class="form-control" id="firstname" name="firstname"
                                  >
                                </div>
                              </div>

                                <div class="form-group row">
                                  <label for="lastname" class="col-md-2 col-from-label">LastName:</label>
                                  <div class="col-md-10">
                                    <input type="text" class="form-control" id="lastname" name="lastname"
                                  >
                                </div>
                              </div>

                              <div class="form-group row">
                                  <label for="qualification" class="col-md-2 col-from-label">Qualification:</label>
                                <div class="col-md-10">

                                    <select class="form-control" id="qualification" name ="qualification" >
                                      <option>Matric/O-level</option>
                                      <option>Intermediate</option>
                                      <option>BSSE</option>
                                      <option>BBA</option>
                                      <option>MSSE</option>
                                      <option>MBA</option>
                                    </select>
                                  </div>
                          </div>

                          <div class="form-group row">
                            <label for="age" class="col-md-2 col-from-label">Age:</label>
                            <div class="col-md-10">
                              <input type="text" class="form-control" id="age" name="age"
                              >
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="City" class="col-md-2 col-from-label">City:</label>
                          <div class="col-md-10">
                            <input type="text" class="form-control" id="City" name="City"
                            >
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="email" class="col-md-2 col-from-label">Email:</label>
                        <div class="col-md-10">
                          <input type="email" class="form-control" id="email" name="email"
                          >
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="Conno" class="col-md-2 col-from-label">Contact-No.:</label>
                      <div class="col-md-10">
                        <input type="tel" class="form-control" id="Conno" name="Conno"
                      >
                    </div>
                  </div>
                        <div class="form-group row">
                          <div class="offset-md-6 col-md-10">
                            <button type="submit" class="btn btn-danger">Submit </button>
                          </div>
                        </div>
                      </form>
                          </div>


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
