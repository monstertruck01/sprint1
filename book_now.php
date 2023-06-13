<?php include 'inc/config.php';
 $getId = isset($_GET['i']) ? $_GET['i'] : ''; ?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>RC motor racing :: Book Now</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="RC motor racing page">

  <link rel="stylesheet" href="assets/css.css?v=1">
</head>
<body>
  <!--start  menu -->
<div class="container">
  <div class="">
<?php include 'inc/sys_nav.php'; ?>
  <!-- end menu -->


<main class="container">

  <section class="h_banner_1 text_center section_padding container">
    <h1 class="main_tit"> Apply for this race</h1>

  

  </section>

<section class="full_row register_p">
  <?php
       if(isset($_POST['apply'])){
  //send grid
 $cover = data_clean($_POST['cover']);
  $insRaceApp=insRaceApp($cover, $cv='',$YMDH,$status=0,$getId,$_SESSION['user_id_thy']);



     ?>
     <div class="aletr">
Successful...
</div>
<script>setTimeout(function () {
window.location.href = "cust-dash.php"   }, <?= $timeOut; ?>);</script>
             <?php }



             ?>

  <form action="" style="" method="post" enctype="multipart/form-data">
    <div class="container">

      <label for="psw"><b>Message</b></label>
      <textarea name="cover" rows="5" class="full_input" required>

      </textarea>

      <div class="clearfix">
        <button type="submit" class="signupbtn" name="apply">Submit Booking</button>
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
