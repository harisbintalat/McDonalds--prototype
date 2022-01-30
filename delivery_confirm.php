<?php
session_start();
require_once('pdo.php');
    $stmt= $pdo->prepare('SELECT * FROM users where user_id=:at');
    $stmt->execute(array(':at'=>$_SESSION['user_id']));
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
    $unn=htmlentities($row['username']);
    $em=htmlentities($row['email']);
    $cc=htmlentities($row['contact']);
    $add=htmlentities($row['address']);
if(isset($_POST["submit"]))
{
    $stmt1= $pdo->prepare('UPDATE users SET contact=:cn,address=:at where user_id=:id');
    $stmt1->execute(array('id'=>$_SESSION['user_id'],':at'=>$_POST['iaddress'],':cn'=>$_POST['itelnum']));
    $checkbox1=$_POST['order'];
    $chk="";
    foreach($checkbox1 as $chk1)
       {
          $chk .= $chk1.",";

       }
       $stmt= $pdo->prepare('INSERT INTO items (itemname,user_id)VALUES(:itn,:fn)');
       $stmt->execute(array(':itn'=>$chk , ':fn'=>$_SESSION['user_id']));

       $_SESSION['success']="Order Placed Successfully ";

       header("Location: delivery_confirm.php");
       return;
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
    <nav class="navbar navbar-dark navbar-expand fixed-top">
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
              <li class="nav-item"><a class="navbar-brand " href="delivery.php" style="padding-left:140px;"><i class="fa fa-sign-in" style="font-size:18px;"> Logout</i></a></li>
              <li class="nav-item"><a class="nav-link" href="#"><span class="fa fa-search fa-lg text-white"></span><i class="text-white"> SEARCH </i></a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="row" style="padding-top:60px; background-color:#FFFFF0">
         <div class="offset-5"><img src="img/site-logo.png" height="30" width="41"></div>
            <div class="col-" style="font-size:40px"><h3>.Place Your order</h3>
         </div><br></br>
         <br>

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
                 if(isset($_SESSION['error']))
                 {
                   echo '<label class="offset-3 text-danger">'.htmlentities($_SESSION['error']).'</label>';
                   unset($_SESSION['error']);
                 }
               ?>
               <div class="form-group row">
                 <label for="username" class="col-md-2 col-from-label">*Username:</label>
                 <div class="col-md-10">
                   <input type="text" class="form-control" id="username" name="iusername" value="<?=$unn?>"
                   placeholder="Username" disabled>
               </div>
             </div>
               <div class="form-group row">
                 <label for="email" class="col-md-2 col-from-label">*Email:</label>
                 <div class="col-md-10">
                   <input type="email" class="form-control" id="email" name="iemail" value="<?=$em?>"
                   placeholder="Email" disabled>
               </div>
             </div>
             <div class="form-group row">
               <label for="telnum" class="col-12 col-md-2 col-from-label">*Contact:</label>
               <div class="col-7 col-md-10">
                 <input type="tel" class="form-control" id="telnum" name="itelnum" value="<?=$cc?>"
                 placeholder="Tel No.">
               </div>
             </div>
         <div class="form-group row">
           <label for="Address" class="col-md-2 col-from-label">*Address:</label>
           <div class="col-md-10">
             <textarea  class="form-control" id="Address" name="iaddress"
             rows="3" placeholder="Address"><?=$add?></textarea>
         </div>
       </div>
  <div class=" row">
          <table class="table table-bordered" style="background-color:#FFF5EE;">
  <tr>

      <td><input type="checkbox" name="order[]" value="lunch deal for 2" ></td>
      <td style="font-size:20px">Lunch deal For 2</td>
      <td style="color:green;font-size:20px;">From Rs 605</td>
      <td><img src="img/lm2.png" alt=""  height=100 width=100></img></td>

   </tr>
   <tr>
     <td><input type="checkbox" name="order[]" value="2pcs spice chicken" ></td>
     <td style="font-size:20px">2pcs spicy Chicken with Drink</td>
     <td style="color:green;font-size:20px;">From Rs 460</td>
     <td><img src="img/lm3.png" alt=""  height=100 width=100></img></td>
   </tr>
   <tr>
     <td><input type="checkbox" name="order[]" value="9pcs Spicy Chicken Bucket Mealv" ></td>
     <td style="font-size:20px">9pcs Spicy Chicken Bucket Meal</td>
     <td style="color:green;font-size:20px;">From Rs 1,740</td>
     <td><img src="img/lm4.png" alt=""  height=100 width=100></img></td>
   </tr>
   <tr>
     <td><input type="checkbox" name="order[]" value="sharebox-Chiken Value" ></td>
     <td style="font-size:20px">Sharebox- CHICKEN VALUE</td>
     <td style="color:green;font-size:20px;">From Rs 1,647</td>
     <td><img src="img/lm5.png" alt=""  height=100 width=100></img></td>
   </tr>
   <tr>
     <td><input type="checkbox" name="order[]" value="Happy Meal Beef Burger" ></td>
     <td style="font-size:20px">Happy Meal Beef Burger</td>
     <td style="color:green;font-size:20px;">From Rs 335</td>
     <td><img src="img/lm6.png" alt=""  height=100 width=100></img></td>
   </tr>
   <tr>
     <td><input type="checkbox" name="order[]" value="Hot Fudge Sundae" ></td>
     <td style="font-size:20px">Hot Fudge Sundae</td>
     <td style="color:green;font-size:20px;">From Rs 270</td>
     <td><img src="img/lm7.png" alt=""  height=100 width=100></img></td>
   </tr>
   <tr>
     <td><input type="checkbox" name="order[]" value="Cappuccino" ></td>
     <td style="font-size:20px">Cappuccino</td>
     <td style="color:green;font-size:20px;">From Rs 344</td>
     <td><img src="img/lm8.png" alt=""  height=100 width=100></img></td>
   </tr>

</table>
   </div>
       <div class="form-group row">
         <div class="offset-5 col-10" >
           <input type="hidden" name="user_id" value="<?=$user_id?>">
           <button type="submit" value="submit" name="submit" class="btn btn-danger">Confirm Order</button>
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
