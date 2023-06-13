<?php include 'inc/config.php'; ?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>RC motor racing :: Organizer races</title>

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


<main class="container_fluid">

  <section class="h_banner_1 text_center section_padding ">
    <h1 class="main_tit"> My races</h1>



  </section>

<section class="full_row register_p ">
  <table  id="" class="" border="1">
                    <thead>
                        <tr class="thd"><th>#</th><th>Name</th><th>Location</th><th>Date</th><th>Description</th>
                        <!--  <th>Actions</th>-->
                          </tr>
                    </thead>
                    <tbody>
        <?php
      $user_id=  $_SESSION['user_id_thy'];
        try {
            $con = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB . "", DB_USER, DB_PASS);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        try {
            $query = $con->prepare("SELECT * FROM races where user_id='$user_id'  ORDER BY race_id DESC");
            $query->execute();
            if ($query->rowCount()) {
  while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
                    ?><tr>
<td><?=$data['race_id'];?></td>
<td><?=$data['race_tile'];?></td>
<td><?=$data['city'];?></td>
<td><?=$data['race_cat'];?></td>
<td><?=$data['race_des'];?></td>
<!--<td><A HREF="view-apps.php?i=<?=$data['race_id'];?>">View Races</td>-->

</tr>
    <?php
                                }
                            }
                        } catch (Exception $e) {
                            $die($e->getMessage());
                        }
                        ?></tbody></table>
                        <br>


  </section>


  </main>


  <?php include 'inc/footer.php'; ?>
  </div>
  <script src="assets/js.js"></script>
</body>
</html>
