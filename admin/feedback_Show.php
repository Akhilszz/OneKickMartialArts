<?php require_once("../admin/header.php"); 
$username= $_SESSION['username'];


?>
<section  >
<div class="table-agile-info">
<div class="row">
<div class="col-lg-8">
<section class="panel">
<header class="panel-heading">  FEEDBACK </header>

<?php 
require_once("../connectionclass.php");
$qry="select * from feedback  ";  
  $obj=new connectionclass() ; 
$data=$obj->GetTable($qry);
 ?> 
 <div class="panel-body">
  <table class="table table-bordered" >
 <tr> 
   <th>SUBJECT</th>  
   <th>MESSAGE</th>  
   <th>SENDER</th>  
   <th>DATE</th>  
  </tr> 
<?php  
 foreach($data as $row){
 ?> 
 <tr> 
<?php 
 $pk_key=$row['feedid'];
 ?>
  <td><?php  echo $row['subject']; ?>  </td> 
 <td><?php  echo $row['message']; ?>  </td> 
 <td><?php  echo $row['sender']; ?>  </td> 
 <td><?php  

 $date=$row['date'];
$formattedDa = date("d-m-Y", strtotime($date));
 echo $formattedDa;
  ?>  </td> 
 </tr>
<?php
}
?>
 </table> 
</div>
</section>
</div>