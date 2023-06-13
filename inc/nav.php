<div class="a_quarter_row nav_brand_div">
<h3 class="nav_brand"><a href="index.php">RC motor racing </a></h3>
  </div>
  <div class="a_3quarter_row">
    <div class="inner_top_bav text_right">

            <span>
          <a href="search.php" class="red_text">Search Race</a>
              </span>

              </div>

    <div class="topnav" id="myTopnav">

      <a href="index.php" class="">Home</a>
    <a href="booking.php" class="">Booking</a>
      <a href="events.php" class="">Events</a>
          <a href="contact-us.php">Contact Us</a>

          <?php
if(isset($_SESSION['username_thy'])){
          ?>
              <a href="?v=off" class="">Logout</a>
              <?php
              if($_SESSION['level']=='customer'){
              ?>

            <?php }elseif ($_SESSION['level']=='1497') {?>
    <a href="cust-dash.php" class="red_text">Dashboard</a>
          <?php  }else{?>
    <a href="org-dash.php">Dashboard</a>

          <?php  } ?>

        <?php }else{ ?>
          <a href="register.php">Register</a>
            <a href="login.php">Login</a>
        <?php } ?>


        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
      </a>
    </div>
    </div>
