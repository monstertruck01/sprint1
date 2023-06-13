<div class="a_quarter_row nav_brand_div">
<h3 class="nav_brand"><a href="index.php">RC motor racing</a></h3>
 </div>
<?php
if($_SESSION['level']=='customer'){
?>
  <div class="a_3quarter_row">
    <div class="inner_top_bav text_right">
      <span>
    <a  class="red_text">CUSTOMER</a>
        </span>

      <span>
    <a href="cust-dash.php" class="red_text">Search Race Event</a>
        </span>
      </div>

    <div class="topnav" id="myTopnav">

      <a href="#" class="">Hi, <?=$_SESSION['username_thy']?></a>
      <a href="?v=off" class="">Sign Out</a>
        <a href="cust-dash.php">Racing Events</a>

        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
      </a>
    </div>
    </div>

  <?php }
  elseif($_SESSION['level']=='1497'){
  ?>
  <div class="a_3quarter_row">
    <div class="inner_top_bav text_right">
      <span>
    <a  class="red_text">ADMIN</a>
        </span>

      </div>

    <div class="topnav" id="myTopnav">

      <a href="#" class="">Hi, <?=$_SESSION['username_thy']?></a>
      <a href="?v=off" class="">Sign Out</a>
        <a href="admin-dash.php">Posted Races</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
      </a>
    </div>
    </div>

<?php }else{ ?>
    <div class="a_3quarter_row">
      <div class="inner_top_bav text_right">
        <span>
      <a  class="red_text">ORGANIZER</a>
          </span>
        <span>
      <a href="org-dash.php" class="red_text">+ New race </a>
          </span>
        </div>

      <div class="topnav" id="myTopnav">

        <a href="#" class="">Hi, <?=$_SESSION['username_thy']?></a>

          <a href="races.php">My Races</a>
              <a href="org-dash.php">New Race</a>
                <a href="?v=off" class="">Logout</a>

          <a href="javascript:void(0);" class="icon" onclick="myFunction()">
          <i class="fa fa-bars"></i> Menu
        </a>
      </div>
      </div>
  <?php } ?>
