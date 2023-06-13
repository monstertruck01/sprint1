<?php include 'inc/config.php'; ?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>RC motor racing :: Organizer Dashboard</title>

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


<main class="">

  <section class="h_banner_1 text_center section_padding ">
    <h1 class="main_tit">  Customer  Dashboard</h1>



  </section>

<section class="container ">
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
    <?php
$loggedUser=$_SESSION['user_id_thy'];
     ?>
    <h3><?//=$loggedUser=$_SESSION['user_id_thy'];?></h3>
    <?//=$data['user_id'];?>
    <h3>Title Name: <?=$data['race_tile'];?></h3>
    <h4>Location: <?=$data['city'];?></h4>

    <h5>Race date: <?=$data['race_cat'];?></h5>
  <p>
  <?=$data['race_des'];


  //$getBookingData=ifBooked($data['race_id'],$loggedUser);
  //print_r($getBookingData);

?>
    </p>

    <?php
  $getBookingData=getBookingData($data['race_id'],$loggedUser);
     if(empty($getBookingData)){?>
    <a href="book_now.php?i=<?=$data['race_id'];?>" class="race_btn_a" style="padding: 5px !important;font-size: 16px !important;background: purple !important;">Book Race</a>
  <?php }else{?>
<a href="#" class="race_btn_a" style="padding: 5px !important;font-size: 16px !important;background: blue !important;">Booked</a>
  <?php } ?>
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


  <?php include 'inc/footer.php'; ?>
  </div>
  <script src="assets/js.js"></script>
</body>
</html>
