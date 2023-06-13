<?php include 'inc/config.php'; ?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>RC motor racing :: Login page</title>

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
try {
$db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB . "", DB_USER, DB_PASS);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
echo "Connection failed : " . $e->getMessage();
}
$msg = "";
if (isset($_POST['auth_login'])) {
if (isset($_SESSION['username_thy'])) {
$_SESSION = array();
if (ini_get("session.use_cookies")) {
$params = session_get_cookie_params();
setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]
);
}
session_destroy();
} else {
$username = data_clean($_POST['uname']);
$password = data_clean($_POST['password_rex']);
if ($username != "" && $password != "") {
try {
$query = "select * from `users` where `email`=:email";
$stmt = $db->prepare($query);
$stmt->bindParam('email', $username, PDO::PARAM_STR);
$stmt->execute();
$count = $stmt->rowCount();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ($row) {
if (password_verify($password, $row['password'])) {
if ($count == 1 && !empty($row)) {
$_SESSION['user_id_thy'] = $row['user_id'];
$_SESSION['username_thy'] = $row['username'];
echo $_SESSION['username_thy'] = $row['email'];
//$approved=$row['approved'];

$_SESSION['level'] = $row['level'];
if ($_SESSION['level'] == 'customer') {
echo("<script>location.href = 'cust-dash.php';</script>");
} elseif ($_SESSION['level'] == 'organizer') {
echo("<script>location.href = 'org-dash.php';</script>");
}
elseif ($_SESSION['level'] == '1497') {
echo("<script>location.href = 'admin-dash.php';</script>");
} else {

}

}
} else {
$msg = "Invalid Username and Password!";
}
} else {
$msg = "Invalid Username and Password!";
}
} catch (PDOException $e) {
echo "Error : " . $e->getMessage();
}
//}
} else {
$msg = "Both fields are required!";
}

}
}
?>
<?php if (!empty($msg)) { ?>
<div class="container">
<div class="alert alert-danger" role="alert">
<?php echo $msg; ?>
</div>

</div>
<?php }
?>

  <section class="h_banner_1 text_center section_padding container">
    <h1 class="main_tit">User Login</h1>

  </section>

<section class="full_row register_p container">
  <form action="" method="post">
    <div class="container">
      <label for="uname"><b>Email</b></label>
      <input type="email" placeholder="Enter Email" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password_rex" required>

      <button type="submit" name="auth_login">Login</button>
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
