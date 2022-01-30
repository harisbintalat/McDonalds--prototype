<?php
  session_start();
  require_once('pdo.php');

  if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['areacode']) && isset($_POST['telnum']) && isset($_POST['email']) && isset($_POST['branch']) && isset($_POST['time']) && isset($_POST['gender']) )
  {
    if ((strlen($_POST['firstname']) < 1) || (strlen($_POST['lastname']) < 1) || (strlen($_POST['areacode'])< 1) || (strlen($_POST['telnum']) < 1)  || (strlen($_POST['branch']) < 1))
    {
      $_SESSION['failure'] ="All values are required";
      header("Location: opendoor.php");
      return;
    }
    if ((strlen($_POST['branch']) < 1) || (strlen($_POST['time']) < 1) || (strlen($_POST['gender']) < 1)) {
      $_SESSION['failure'] ="All values are required";
      header("Location: opendoor.php");
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
      $time=htmlentities($_POST['time']);
      $gender=htmlentities($_POST['gender']);
      $stmt= $pdo->prepare('INSERT INTO opendoor (firstname,lastname,areacode,telnum,email,branch,time,gender)VALUES(:fn,:sn,:ac,:tn,:em,:bn,:tm,:gn)');
      $stmt->execute(array(':fn'=>$firstname,':sn'=>$lastname,':ac'=>$areacode,':tn'=>$telnum,':em'=>$email,':bn'=>$branch,':tm'=>$time,':gn'=>$gender));
      $_SESSION['success']="You will be contacted to confirm the date and time of your tour.";
      $pdo = null;
      header("Location: opendoor.php");
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
    <div class="container-fluid text-white" style="background-color:black;">
      <div class="row">
        <img src="img/kitchen.jpg" alt="" height="500px" width="100%">
        <div class="centered"><b style="font-size:50px; font-weight:900;">Open Door Program 2019</b>
          <div style="font-size:18px;">
          Our Kitchen, Your Kitchen
          With pride and transparency, we open our doors and welcome you to tour our kitchen and take a close look at the quality
          of our products. The Open Door Program is a chance for you to be assured that we are committed to serve the best
          quality products, prepared with compliance to the highest standards of safety and cleanliness by a qualified team.
          High quality is our standard.
          </div>
        </div>
      </div>
      <div class=" col-12" style="padding-top:50px;">
        <div class="card card-body bg-dark">
        <h1  style="color:	#E6E6FA; font-weight:900;font-size:50px;">Tour Information</h1>

      <div>
        <label style="font-size:20px; color:#FFE4C4;">We welcome you to tour our kitchen and learn more about our food quality</label>
      </div>

        <br>
        <h1 style="color:	#E6E6FA; font-weight:1000;font-size:50px;">Terms & Conditions</h1>

      <div style="padding-bottom:50px;font-size:20px;">

        <ul>
          <li>Children must be accompanied by their Parents/Guardians</li>
          <li>Customers are not allowed to eat, drink or smoke during the tour.</li>
          <li>Please be on time.</li>
          <li>Maximum group of 10 people at a time on first come first serve basis.</li>
          <li>Customers are not allowed to take pictures/videos in the premises of McDonald’s kitchen.</li>
          <li>For your own safety, avoid high heels and slippery shoes inside the kitchen premises.</li>
          <li>McDonald’s will not accept personal belongings for safekeeping</li>
          <li>Tours will be conducted at all Nationwide McDonald’s restaurants apart from Mall restaurants.</li>
          <li>Tours will be confirmed upon signing waiver liability form.</li>
          <li>McDonald’s Pakistan reserves the right to reject any form without assigning any reason.</li>
        </ul>
      </div>
    </div>
      </div>

      <div class="row row-content" style="padding-top:100px; color:#E6E6FA; ">

         <?php
           if(isset($_SESSION['failure']))
           {
             echo '<label class=" offset-4 text-danger">'.htmlentities($_SESSION['failure']).'</label>';
             unset($_SESSION['failure']);
           }
           elseif(isset($_SESSION['success']))
           {
             echo '<label class="offset-2 text-success">'.htmlentities($_SESSION['success']).'</label>';
             unset($_SESSION['success']);
           }
         ?>
         <div role="button" class="col-7 offset-1">
           <h2 class="offset-4 pt-5 pb-4" style="color:	#E6E6FA; font-weight:900;">Visit our Kitchen</h2>
           <a class="btn btn-block btn btn-lg btn-info" id='#reserveButton' data-toggle="modal"
            data-target="#restable">BOOK NOW</a>
         </div>
         <div id="restable" class="modal fade" role="dialog">
           <div class="modal-dialog modal-lg" role="content">
             <div class="modal-content">
               <div class="modal-header bg-info">
                   <h3 class="modal-title text-white offset-4"><b>Enter your details</b></h3>
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <div class="model-body pt-3 bg-primary" >
                 <form method="post">
                   <div class="form-group row">
                     <label for="firstname" class="col-md-2 col-from-label offset-1">FirstName:</label>
                     <div class="col-md-8">
                       <input type="text" class="form-control" id="firstname" name="firstname"
                       placeholder="First Name">
                     </div>
                   </div>
                   <div class="form-group row">
                     <label for="lastname" class="col-md-2 col-from-label offset-1">LastName:</label>
                     <div class="col-md-8">
                       <input type="text" class="form-control" id="lastname" name="lastname"
                       placeholder="Last Name">
                   </div>
                 </div>
                   <div class="form-group row">
                     <label for="telnum" class="col-12 col-md-2 col-from-label offset-1">Contact:</label>
                     <div class="col-5 col-md-3">
                       <input type="tel" class="form-control" id="areacode" name="areacode"
                       placeholder="Areacode.">
                     </div>
                     <div class="col-7 col-md-5">
                       <input type="tel" class="form-control" id="telnum" name="telnum"
                       placeholder="Tel No.">
                     </div>
                   </div>
                   <div class="form-group row">
                     <label for="email" class="col-md-2 col-from-label offset-1">Email:</label>
                     <div class="col-md-8">
                       <input type="email" class="form-control" id="email" name="email"
                       placeholder="Email">
                   </div>
                 </div>
                 <div class="form-group row">
                     <label for="branches" class="col-2 col-from-label offset-1">Select Branch:</label>
                   <div class="col-8">
                       <select class="form-control" name="branch">
                         <option>Jinnah Park.</option>
                         <option>Bahria Town.</option>
                         <option>DHA 1.</option>
                         <option>F-9 Park.</option>
                       </select>
                     </div>
                 </div>
                 <div class="form-group row">
                 <div class="col-4 offset-3">
                 <select class="form-control" name="time">
                   <option>---Select time---</option>
                   <option>Sunday(4pm-6pm)</option>
                   <option>Wednesday(4pm-6pm)</option>
                 </select>
                 </div>
                 <div class="col-4">
                 <select class="form-control" name="gender">
                   <option>---Select Gender---</option>
                   <option>MALE</option>
                   <option>FEMALE</option>
                 </select>
                 </div>
                 </div>
                 <div class="form-group row">
                 <div class="offset-5 col-12">
                 <button type="submit" class="btn btn-danger">Submit Details</button>
                 </div>
                 </div>
                 </form>
               </div>
             </div>
           </div>
         </div>

     </div>
      <div class="mb-4" style="border-bottom: 1px dotted grey;"></div>
     <div>
     <center class="" style="color:	#E6E6FA; font-weight:900;font-size:50px;">Virtual Kitchen Tour</center>
    <center style="padding-top:50px; ">
	<iframe width="425" height="190" src="https://www.youtube.com/embed/-RuhG1ru5UA" frameborder="2"
	allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	<iframe width="425" height="190" src="https://www.youtube.com/embed/gicIlbnQLhQ" frameborder="2"
	allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	<iframe width="425" height="190" src="https://www.youtube.com/embed/XUwTW-gdWHA" frameborder="2"
	allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	</center>
	<center style=" padding-bottom:50px;">
		<iframe width="425" height="190" src="https://www.youtube.com/embed/53mYudZYPWc" frameborder="2"
		allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		<iframe width="425" height="190" src="https://www.youtube.com/embed/l-8c8PGejaU" frameborder="2"
		allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		<iframe width="425" height="190" src="https://www.youtube.com/embed/WnrxO1eqGKU" frameborder="2"
		allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	</center>
</div>
   <div class="row content">
     <div class="col-2 offset-1">
       <br><br><img src="img/site-logo.png" alt="" height="100px" width="120"><br><br>
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
   <script>
     $(document).ready(function(){
       $('#reserveButton').click(function() {
         $('#restable').modal('show');
       });
        });
   </script>
 </body>
</html>
