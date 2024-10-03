<?php require_once("header.php");  ?>

<section >
<div class="table-agile-info">
<div class="row">
<div class="col-lg-12">
<section class="panel">
<?php 
require_once("../connectionclass.php");
$qry="select * from reg where usertype='student'";  
  $obj=new connectionclass() ; 
$data=$obj->GetTable($qry);
 ?> 
  <table class="table table-bordered" >
 <tr> 
   <th>NAME</th>  
   <th>ADDRESS</th>  
   <th>PHONENO</th>  
   <th>GENDER</th>  
   <th>EMAILID</th>  
   <th>DATE OF BIRTH</th>  
   <th>USERTYPE</th>  
   <th>DATE OF JOINING</th>  
  </tr> 
<?php  
 foreach($data as $row){
 ?> 
 <tr> 
<?php 
 $pk_key=$row['reg_id'];
 ?>
  <td><?php  echo $row['name']; ?>  </td> 
 <td><?php  echo $row['address']; ?>  </td> 
 <td><?php  echo $row['phoneno']; ?>  </td> 
 <td><?php  echo $row['gender']; ?>  </td> 
 <td><?php  echo $row['emailid']; ?>  </td> 
 <td><?php $dob = $row['dob'];$formattedDob = date("d-m-Y", strtotime($dob)); echo $formattedDob; ?></td> 
 <td><?php  echo $row['usertype']; ?>  </td> 
 <td><?php  $doj=$row['doj'];$formattedDoj = date("d-m-Y", strtotime($doj)); echo $formattedDoj; ?>  </td> 
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
<?php require_once("footer.php");  ?>