<?php include 'inc/config.php'; ?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>RC motor racing :: Organizer Dashboard</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="RC motor racing page">
  <!--add icons-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--end icons-->
  <link rel="stylesheet" href="assets/css.css?v=1">
</head>
<body>
  <!--start  menu -->
<div class="container">
  <div class="">
<?php include 'inc/sys_nav.php'; ?>
  <!-- end menu -->


<main class="container">

  <section class="h_banner_1 text_center section_padding ">
    <h1 class="main_tit"> Organizer Dashboard</h1>



  </section>

<section class="full_row register_p container">
  <?php
       if(isset($_POST['register'])){
  //send grid
 $race_tile = data_clean($_POST['race_tile']);
 $city = data_clean($_POST['city']);
 $race_cat = data_clean($_POST['race_cat']);
$race_des = data_clean($_POST['race_des']);
$timestamp =$YMDH;
insRace($race_tile, $city, $race_cat,$race_des,$timestamp,$_SESSION['user_id_thy'],'Not Approved');
     ?>
     <div class="aletr">
Race Added....
</div>
<script>setTimeout(function () {
window.location.href = "races.php"   }, <?= $timeOut; ?>);</script>
             <?php }



             ?>

  <form action="" style="" method="post">
    <div class="">
      <h1>Please fill in this form to post a new race.</h1>

      <hr>

      <label for="email"><b>Race Name</b></label>
      <input type="text" placeholder="Race Name" name="race_tile" required>

      <label for="psw"><b>Location/s</b></label>
    <input type="text" placeholder="Enter the location" name="city" required>
<br>

<label for="psw"><b>Enter date</b></label>

  <input type="text" placeholder="Enter date" name="race_cat" required>
<br><br>
<label for="psw"><b>Race Description</b></label>
<textarea name="race_des" rows="5" class="full_input" required>

</textarea>

      <div class="clearfix">

        <button type="submit" class="signupbtn" name="register">Add Race Event</button>
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
