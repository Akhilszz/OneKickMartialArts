<?php
require_once("header.php");
require_once("../connectionclass.php");
$obj=new connectionclass() ; 
  
 
$arts=$obj->GetSingleData("select count(*) from arts");
$students=$obj->GetSingleData("select count(*) from reg");
$masters=$obj->GetSingleData("select count(*) from master");
$feedback=$obj->GetSingleData("select count(*) from feedback");

?>
  
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
              <li><i class="fa fa-laptop"></i>Dashboard</li>
            </ol>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box blue-bg">
              <i class="fa fa-cloud-download"></i>
              <div class="count"><?php echo $arts ?></div>
              <div class="title">MartialArts</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box brown-bg">
              <i class="fa fa-shopping-cart"></i>
              <div class="count"><?php echo $students ?></div>
              <div class="title">Students</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box dark-bg">
              <i class="fa fa-thumbs-o-up"></i>
              <div class="count"><?php echo $masters ?></div>
              <div class="title">Masters</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box green-bg">
              <i class="fa fa-cubes"></i>
              <div class="count"><?php echo $feedback ?></div>
              <div class="title">Feedbacks</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

        </div>
        <!--/.row-->


    
 <?php
require_once("footer.php");

?>
