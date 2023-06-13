<?php include 'inc/config.php'; ?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>RC motor racing :: Registration</title>

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
<?php include 'inc/nav.php'; ?>
  <!-- end menu -->


<main class="container">

  <section class="h_banner_1 text_center section_padding container">
    <h1 class="main_tit"> User Registration</h1>



  </section>

<section class="full_row register_p container">
  <?php
       if(isset($_POST['register'])){
  //send grid
 $username = data_clean($_POST['email']);
 $emaill = data_clean($_POST['email']);
 $password = data_clean($_POST['psw']);
  $level = data_clean($_POST['level']);

$email=$emaill;
 //new
 $staffno  = '';
 $idno = '';
 $lname=  '';
 $mname=  '';
 $fname=  '';
$timestamp =$YMDH;
 $approved=0;
 $logged_in=0;
 $link='';
 $com_code =md5(uniqid(rand()));
 $null = 'NULL';
$passwordHashed=hashPassword($password);
$phone = '';
 //end new
if(!empty(MailUserExists($emaill))){?>
                 <div class="alert" style="">
Email  In Use
</div>
<?php }

else{
$insertedUserid=insStudent($username, $email, $passwordHashed, $timestamp, $level, $approved, $phone, $link,$com_code,$fname,$mname,$lname,$idno,$staffno,"users");
insUserstate($insertedUserid,$user_state=0,$user_state_date=$YMDH,'user_state');
//update user link for comet chat
updateUserOnCreation($insertedUserid,'users');
//raw password
InsRawPass($insertedUserid,$_POST['psw'], "raw_pass");
//end new spider

     ?>
     <div class="aletr">
User registered...
</div>
<script>setTimeout(function () {
window.location.href = "index.php"   }, <?= $timeOut; ?>);</script>
             <?php }

             }

             ?>

  <form action="" style="" method="post">
    <div class="container">
      <h1>Sign Up</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>

      <label for="email"><b>Email</b></label>
      <input type="email" placeholder="Enter Email" name="email" required>
      <label for="cars">User Type</label>

    <select name="level" id="level">
      <option value="organizer">Organizer</option>
      <option value="customer">Customer</option>

    </select>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>

      <div class="clearfix">

        <button type="submit" class="signupbtn" name="register">Sign Up</button>
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
