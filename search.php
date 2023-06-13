<?php include 'inc/config.php'; ?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>RC motor racing :: Search page</title>

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


  <section class="h_banner_1 text_center section_padding container">
    <h1 class="main_tit"> Search page</h1>

  </section>

<section class="full_row register_p container">
  <form action="" method="post">
    <div class="container">
      <label for="uname"><b>Enter Search Term</b></label>
      <input type="text" placeholder="Enter Search Term" name="term" required>
      <button type="submit" name="sea">Search Now</button>
    </div>
  </form>
  <br>

  <?php
       if(isset($_POST['sea'])){
  //send query
 $sea = data_clean($_POST['term']);
 //print_r($_POST);
       try {
         $con = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB . "", DB_USER, DB_PASS);
         $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     } catch (PDOException $e) {
         die($e->getMessage());
     }
     try {
     $query = $con->prepare("SELECT * FROM  races WHERE race_tile ='$sea' OR race_des='$sea' ORDER BY race_id DESC");
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
                    else{
                      echo '<h2 style="text-align:center;color:red;">No Results !!</h2>';
                    }
                } catch (Exception $e) {
                    $die($e->getMessage());
                }
                ?>
 <?php } ?>




  </section>







  </main>


<?php include 'inc/footer.php';?>
  </div>
  <script src="assets/js.js"></script>
</body>
</html>
