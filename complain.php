<?php include 'inc/config.php'; ?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>RC motor racing :: Registration</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="RC motor racing page">
  <link rel="stylesheet" href="assets/css.css?v=1">
</head>
<body>
  <!--start  menu -->
<div class="container">
  <div class="">
<?php include 'inc/nav.php'; ?>
  <!-- end menu -->


<main class="container">

  <section class="h_banner_1 text_center section_padding container">
    <h1 class="main_tit"> Complain</h1>

  </section>

<section class="full_row register_p container">
  <?php
       if(isset($_POST['comp'])){
  //send grid
 $email = data_clean($_POST['email']);
 $des = data_clean($_POST['des']);
//raw password
insComp($email, $des, $YMDH, "complain")
     ?>
     <div class="aletr">
Complain Posted
</div>
<!--<script>setTimeout(function () {
window.location.href = "complain.php"   }, <?= $timeOut; ?>);</script>-->
             <?php }


             ?>

  <form action="" style="" method="post">
    <div class="container">
      <h1>Sign Up</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>

      <label for="email"><b>Your Email</b></label>
      <input type="email" placeholder="Enter Email" name="email" required>


      <label for="psw"><b>Complain description</b></label>
      <textarea name="des" rows="5" class="full_input" required>

      </textarea>

      <div class="clearfix">

        <button type="submit" class="signupbtn" name="comp">Sign Up</button>
      </div>
    </div>
  </form>
  </section>
  </main>


  <?php include 'inc/footer.php'; ?>
  </div>
  <script src="assets/js.js"></script>
</body>
</html>
