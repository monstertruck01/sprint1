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


<main class="">

  <section class="h_banner_1 text_center section_padding ">
    <h1 class="main_tit">  Admin  Dashboard</h1>



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
  <h5>Position: <?=$data['race_tile'];?></h5>
  <h6>Date Posted: <?=$data['sys_date'];?></h6>
  <p>
  <?=$data['race_des'];

  //$getBookingData=getBookingData($data['race_id'],$data['user_id']);

?>
    </p>

    <?php   if($data['status']=='Approved'){?>

    <a href="#" class="race_btn_a" style="padding: 5px !important;font-size: 16px !important;background: purple !important;">Approved</a>
  <?php }elseif($data['status']=='Rejected'){
    ?>
    <a href="#" class="race_btn_a" style="padding: 5px !important;font-size: 16px !important;background: red !important;">Rejected</a>
  <?php }else{?>
    <?php
  if(isset($_POST['disApp'])){
  $cid = data_clean($_POST['xid']);
appAdminRace($cid,$status="Rejected");

  ?>
  <div class="aletr">
Race Rejected....
</div>
<script>setTimeout(function () {
  window.location.href = "admin-dash.php"    }, <?= $timeOut; ?>);</script>
  <?php     ?>
  <?php } ?>
    <?php
  if(isset($_POST['approve'])){
  $cid = data_clean($_POST['xid']);
appAdminRace($cid,$status="Approved");

  ?>
  <div class="aletr">
Race Approved....
</div>
<script>setTimeout(function () {
  window.location.href = "admin-dash.php"    }, <?= $timeOut; ?>);</script>
  <?php     ?>
  <?php } ?>
  <div class="full_row">
    <div class="half_row">
      <form action="" method="post" onSubmit="if(!confirm('You are about to approve this race, proceed ?')){return false;}" style="display:inline !important;">
      <input type="hidden" name="xid" class="form-control-sm"  value="<?=$data['race_id'];?>" >
      <button name="approve" type="submit" class="race_btn_a" style="padding: 5px !important;font-size: 16px !important;background: blue !important;"  >Approve  </button>
      </form>
    </div>
      <div class="half_row">
        <!--decline -->
        <form action="" method="post" onSubmit="if(!confirm('You are about to reject this race, proceed ?')){return false;}" style="display:inline !important;">
        <input type="hidden" name="xid" class="form-control-sm"  value="<?=$data['race_id'];?>" >
        <button name="disApp" type="submit" class="race_btn_a" style="padding: 5px !important;font-size: 16px !important;background: red !important;"  >Reject  </button>
        </form>

        <!--end decine  form-->

      </div>
  </div>


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
