
<?php
//session_start();
require_once("../admin/header.php");  ?>

<section >
<div class="table-agile-info">
<div class="row">
<div class="col-lg-12">
<section class="panel">
<header class="panel-heading">  PACKAGE BOOKINGS </header>



<?php 
require_once("../connectionclass.php");
$obj=new connectionclass() ;
$qry="SELECT * FROM `booking` inner join package ON booking.fk_package_id=package.packgeid INNER JOIN arts ON package.fk_arts_id=arts.artsid   inner join reg on booking.fk_reg_id=reg.reg_id"; 
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
   <th>STUDENT DETAILS</th>
  
   <th>ACTION</th>
  </tr> 
<?php  
 foreach($data as $row){
 ?> 
 <tr> 
 <?php 
 $book_id=$row['bookid'];
 ?>
 <td><?php  echo $row['package_title']; ?>  </td> 
 <td><?php  echo $row['artsname']; ?>  </td> 
 <td><?php  echo $row['duration']; ?>  </td> 
 <td><?php  echo $row['cost']; ?>  </td>  
 <td><?php  echo $row['name']; ?> <br>
 <?php  echo $row['address']; ?> <br> </td> 
  <td> <a   class="btn btn-danger btn-xs"   href="fees.php?bookid=<?php  echo $book_id; ?> " >Fee invoice</a>
</td> 
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