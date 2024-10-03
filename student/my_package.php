
<?php
//session_start();
require_once("../admin/header.php");  ?>

<section >
<div class="table-agile-info">
<div class="row">
<div class="col-lg-12">
<section class="panel">
<?php 
require_once("../connectionclass.php");
$obj=new connectionclass() ; 

$email=$_SESSION['username'];
//echo $email;

$qry="select * from reg where emailid ='$username' ";  
$new=$obj-> GetSingleRow($qry);
$reg_id=$new['reg_id'];

$qry="SELECT * FROM `booking` inner join package ON booking.fk_package_id=package.packgeid INNER JOIN arts ON package.fk_arts_id=arts.artsid WHERE booking.fk_reg_id='$reg_id'"; 

$data=$obj->GetTable($qry);
//var_dump($qry);
//die;
 ?> 
  <table class="table table-bordered" >
 <tr> 
   <th>PACKAGE NAME</th>  
   <th>ARTS NAME</th>  
   <th>DURATION</th>  
   <th>COST</th>   
  </tr> 
<?php  
 foreach($data as $row){
 ?> 
 <?php 
 $pk_key=$row['packgeid'];
 ?>
 <tr> 
 <td><?php  echo $row['package_title']; ?>  </td> 
 <td><?php  echo $row['artsname']; ?>  </td> 
 <td><?php  echo $row['duration']; ?>  </td> 
 <td><?php  echo $row['cost']; ?>  </td> <td>
 <a   class="btn btn-danger btn-xs"   href="schedule.php?packgeid=<?php  echo $pk_key; ?> " >Schedules</a></td>
 </tr>
<?php
}
?>
 </table> 
</section>
</div>
</div>
</div>
</section>
<?php require_once("../admin/footer.php");  ?>