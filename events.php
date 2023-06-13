<?php include 'inc/config.php'; ?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Events</title>

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


<main>
  <header class="banner_section ">
    <!--cTA butttons-->
    <div class="full_row text_center banner_section_cta">
<h1 class="text_white">
  Our Racing Events
</h1>


      </div>


  </header>


  <section class="h_banner_1 text_center ">
    <br>
    <h1 class="main_tit">Find the latest race events</h1>

  </section>
  <section>
    <?php
    try {
        $con = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB . "", DB_USER, DB_PASS);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die($e->getMessage());
    }
    try {
        $query = $con->prepare("SELECT * FROM races ORDER BY race_id DESC");
        $query->execute();
        if ($query->rowCount()) {
  while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
                ?>
  <div class="full_row race_row">
    <div class=" race_des">
    <h3>Title Name: <?=$data['race_tile'];?></h3>
    <h4>Location: <?=$data['city'];?></h4>

    <h5>Race date: <?=$data['race_cat'];?></h5>

    <p>
  <?=$data['race_des'];?>
      </p>
      <p>
        <?php
  if(!isset($_SESSION['username_thy'])){
        ?>

  <a href="login.php" class="race_btn_a" style="padding: 5px !important;font-size: 16px !important;background: purple !important;">Book Now</a>
  <?php }else{
  $loggedUser=$_SESSION['user_id_thy'];
   ?>
  <!--<a href="book_now.php?i=<?=$data['race_id'];?>" class="race_btn_a" style="padding: 5px !important;font-size: 16px !important;background: purple !important;">Book Now</a>-->
  <?php
  $getBookingData=getBookingData($data['race_id'],$loggedUser);
  if(empty($getBookingData)){?>
  <a href="book_now.php?i=<?=$data['race_id'];?>" class="race_btn_a" style="padding: 5px !important;font-size: 16px !important;background: purple !important;">Book Race</a>
  <?php }else{?>
  <a href="#" class="race_btn_a" style="padding: 5px !important;font-size: 16px !important;background: blue !important;">Booked</a>
  <?php } ?>

  <?php }?>
      </p>
      </div>
  </div>

  <?php
                              }
                          }
                      } catch (Exception $e) {
                          $die($e->getMessage());
                      }
                      ?>


    </section>


  </main>


<?php include 'inc/footer.php';?>
  </div>
  <script src="assets/js.js"></script>
</body>
</html>
