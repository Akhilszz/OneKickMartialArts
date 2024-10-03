<?php
session_start();
if(!isset($_SESSION["username"])){
  header("location:../login.php");
}

$usertype= $_SESSION['usertype'];
$username= $_SESSION['username'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title></title>

  <!-- Bootstrap CSS -->
  <link href="../asset/css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="../asset/css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="../asset/css/elegant-icons-style.css" rel="stylesheet" />
  <link href="../asset/css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="../asset/css/style.css" rel="stylesheet">
  <link href="../asset/css/style-responsive.css" rel="stylesheet" />

   
<!-- javascripts -->
<script src="../asset/js/jquery.js"></script>
<script src="../asset/js/bootstrap.min.js"></script>
</head>

<body>
  <!-- container section start -->
  <section id="container" class="">


    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="{% url 'dashboard' %}" class="logo"> Martial <span class="lite">Arts</span></a>
      <!--logo end-->

      
      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">

          
          
          <!-- user login dropdown start-->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="img/avatar1_small.jpg">
                            </span>
                            <span class="username"> <?php echo $usertype;   ?> : </span>   <span class="username"> <?php echo $username;   ?></span>
                            <b class="caret"></b>
                        </a>
            <ul class="dropdown-menu extended logout">
              
            <li>
                <a href="../change_pass.php"><i class="icon_key_alt"></i> Change Password</a>
              </li>
              <li>
                <a href="../logout.php"><i class="icon_key_alt"></i> Log Out</a>
              </li>
            </ul>
          </li>
          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>
    <!--header end-->

    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="active">
            <a class="" href="dashboard.php">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
          </li>
         
          <?php
if($usertype=="admin"){

?>
      
		  
			<li>
            <a class="" href="show_registration.php">
                          <i class=""></i>
                          <span>View Registrations</span>
                      </a>
          </li>
		  
        
		  
			<li>
            <a class="" href="show_arts.php">
                          <i class="arts_Show"></i>
                          <span>Marital Arts</span>
                      </a>
          </li>
		  
          <li>
            <a class="" href="show_package.php">
                          <i class="arts_Show"></i>
                          <span>Packages</span>
                      </a>
          </li>
          <li>
            <a class="" href="admin_booking.php">
                          <i class=""></i>
                          <span>Package Bookings</span>
                      </a>
          </li>
		  
		    	<li>
            <a class="" href="show_masters.php">
                          <i class="arts_Show"></i>
                          <span>Masters</span>
                      </a>
          </li>




        <li>
            <a class="" href="feedback_Show.php">
                          <i class="arts_Show"></i>
                          <span>Feedback</span>
                      </a>
          </li>
          
		  

		    	<li>
            <a class="" href="video_Show.php">
                          <i class="arts_Show"></i>
                          <span>Video Tips</span>
                      </a>
          </li>
		  
          <?php
}else if($usertype=="master"){
  ?>

<li>
            <a class="" href="../masters/master_prf_v.php">
                          <i class=""></i>
                          <span>Profile</span>
                      </a>
          </li>

<li>
            <a class="" href="../masters\video_tips_Show.php">
                          <i class=""></i>
                          <span>Video Tips</span>
                      </a>
          </li>



	<li>
            <a class="" href="../masters/show_registrations.php">
                          <i class=""></i>
                          <span>View Registrations</span>
                      </a>
          </li>


          <li>
            <a class="" href="feedback_Show.php">
                          <i class="arts_Show"></i>
                          <span>Feedback</span>
                      </a>
          </li>
  <?php
} 
else if($usertype=="student"){
  ?>

<li>
            <a class="" href="../student/show_profile.php">
                          <i class="arts_Show"></i>
                          <span>Profile</span>
                      </a>
          </li>

         

          <li>
            <a class="" href="../student/feedback.php">
                          <i class="arts_Show"></i>
                          <span>Feedback</span>
                      </a>
          </li>

          <li>
            <a class="" href="../student/show_package.php">
                          <i class="arts_Show"></i>
                          <span>Package</span>
                      </a>
          </li>

          <li>
            <a class="" href="../student/my_package.php">
                          <i class="arts_Show"></i>
                          <span>My Booking</span>
                      </a>
          </li>

          <li>
            <a class="" href="../student/fee.php">
                          <i class="arts_Show"></i>
                          <span>Fees</span>
                      </a>
          </li>

          <li>
            <a class="" href="../student/video_show.php">
                          <i class="arts_Show"></i>
                          <span>Video Tips</span>
                      </a>
          </li>



<?php
}
?>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    
     <!--main content start-->
     <section id="main-content">
      <section class="wrapper">