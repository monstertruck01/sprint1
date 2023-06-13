<?php include 'inc/config.php'; ?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>RC motor racing :: Forgot Password</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Contact US">
<link rel="stylesheet" href="assets/css.css?v=1">
</head>
<body>
<!--start  menu -->
<div class="container">
<div class="">

<?php include 'inc/nav.php'; ?>  <!-- end menu -->

<main class="container">
<?php
if(isset($_POST['reset_pass'])){
$email=$_POST['email'];
$date =date('Y-m-d H:i:s');
$profile = $mysqli->query("SELECT * from users WHERE email='$email'") or
   die('Error : (' . $mysqli->errno . ') ' . $mysqli->error);

while ($obj_ona = $profile->fetch_object()) {
$emailadd = $obj_ona->email;
$user_id=$obj_ona->user_id;
}
if(!isset($emailadd)){
// echo '<script>window.alert("")</script>'; ?> <div class="full_row">
<div class="aletr">
That email is not registered !
</div></div>
<?php

}
else{
$password=generateRandomString();
$encryptedPassword = hashPassword($password);
$pass = $encryptedPassword;
$update_rec = $mysqli->query("UPDATE users set password='$pass' where email='$emailadd'") or die('Error : (' . $mysqli->errno . ') ' . $mysqli->error);

#into dba_close
$ins_rec = $mysqli->query("insert into forgot_password values('','$user_id','$date','$password')") or die('Error : (' . $mysqli->errno . ') ' . $mysqli->error);
?>
<div class="col-md-12"> <div class="aletr ">

Password reset success. New password is :: <b><?=$password?></b>
</div></div>

<?php
}?>
<!--<script>setTimeout(function () {
window.location.href = "forgot.php"
}, <?=$timeOut;?>);</script>-->
<?php
}

?>

<section class="h_banner_1 text_center section_padding container">
<h1 class="main_tit">Forgot Password</h1>

</section>

<section class="full_row register_p container">
<form action="" method="post">
<div class="container">
<label for="uname"><b>Email</b></label>
<input type="email" placeholder="Enter Email" name="email" required>

<button type="submit" name="reset_pass">Reset Now</button>
</div>
<div class="container">

<div class="full_row">
<div class="half_row">
<a href="register.php">Register Now</a>
</div>
<div class="half_row">
<a href="forgot.php">Forgot Password</a>
</div>

</div>

</div>
</form>

</section>







</main>


<?php include 'inc/footer.php';?>
</div>
<script src="assets/js.js"></script>
</body>
</html>
