<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>RC motor racing :: Contact Us</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <!--add icons-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--end icons-->
  <link rel="stylesheet" href="assets/css.css?v=1">
  <script src="assets/jquery-1.11.3.min.js"></script>

<style>
#steps{
  width: 500px;
  margin: 0 auto;
  overflow: hidden;
}
#outer-container{
  width: 1045px;
  transition: all 400ms ease-in-out;
}
#signup, #card{
  width: 500px;
  display: inline-block;
  background: white;
  margin: 10px 10px;
  vertical-align: top;
  transition: all 400ms ease-in-out;
}
#inner-container{
  width: 380px;
  margin: 30px auto;
}
#inner-container h2{
  padding-bottom: 5px;
  margin-bottom: 10px;
  border-bottom: 5px solid #4183D7;
}
#usa, #pak{
  display: none;
}
#inner-container input, select{
  color: #666;
  width: 100%;
  height: 40px;
  text-indent: 10px;
  border: 1px solid #ccc;
  border-radius: 2px;
  margin: 8px 0;
}
input[type="date"]{
  margin: 0;
  padding: 0;
  text-indent: 0;
}
#inner-container input[type=submit]{
  width: 100%;
  color: white;
  background: #4183D7;
  border: 0;
  box-shadow: inset 0 0 0 0 transparent;
  transition: all 400ms ease-in-out;
}
#inner-container #signup-btn:hover{
  box-shadow: inset 380px 0 0 0 #16A085;
}
#card{
  opacity: 0;
  text-align: center;
  line-height: 3.1;
}
#card img{
  width: 80px;
  height: 80px;
}
#delete-account #delete-btn:hover{
  box-shadow: inset 380px 0 0 0 #CF000F;
}
</style>
</head>
<body>
  <!--start  menu -->
<div class="container">
  <div class="">
<?php include 'inc/nav.php'; ?>



  <!-- end menu -->


<main class="">
  <section class="h_banner_1 text_center section_padding container">
    <h1 class="main_tit">Contact Us</h1>
  </section>
<section class="full_row register_p container">
  <div id="steps">
    <div id="outer-container">
    <!-- SignUp Form -->
    <form id="signup" action="#">
      <div id="inner-container">
        <h2>Drop your contacts and message</h2>
        <input id="img-link" type="text" style="display:none;" placeholder="Your profile image link?" value="https://bit.ly/2q4cF7P"/><br />
        <input id="firstName" type="text" placeholder="Name" required/><br />
        <input id="lastName" type="text" placeholder="Phone Number" required/><br />
        <input id="select-country" type="number" placeholder="Age" required/><br />
       <input id="select-city" type="email" placeholder="Email" required/>
           <input id="select-date" type="text" placeholder="Enter Short Message Here"/>
       <input id="signup-btn" type="submit" />
    </div>
    </form>

    <!-- Profile Card -->
    <div id="card">
     <div id="inner-container">
          <h2 id="title">Hello, Thank you for your submission</h2>
          <!--<img src="#" alt="" />-->
          <h4 id="userName"></h4>
          <p><strong>Age:</strong> <span id="country">unknown</span></p>
          <p><strong>Email:</strong> <span id="city">unknown</span></p>
          <p><strong>Your Message:</strong> <span id="dob">238723</span></p>
            <p><strong>Phone:</strong> <span id="userName2">238723</span></p>
          <form id="delete-account" action="#">
             <input id="delete-btn" type="submit" value="Back to contact Us"/>
          </form>
     </div>
    </div>
   </div>
  </div>


  </section>







  </main>


<?php include 'inc/footer.php';?>
  </div>
  <script src="assets/js.js"></script>
 <script src="assets/localstorage.js"></script>




</body>
</html>
