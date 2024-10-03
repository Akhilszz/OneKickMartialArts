<?php require_once("../admin/header.php");  ?>
<script>
$(function(){
     
    var dtToday = new Date();
 
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();

    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();

    var maxDate = year + '-' + month + '-' + day;    
    $('#txtDate').attr('min', maxDate);
});

</script>

<section  >
<div class="table-agile-info">
<div class="row">
<div class="col-lg-8">
<section class="panel">
<header class="panel-heading"> SCHEDULES </header>

<div class="panel-body">
<?php 
$packgeid =$_GET["packgeid"];
require_once("../connectionclass.php");
  $qry="select * from scheduling s join package p on(p.packgeid=s.fk_package_id)  where fk_package_id=$packgeid";  
  $obj=new connectionclass() ; 
$data=$obj->GetTable($qry);
 ?> 
  <table class="table table-bordered" >
 <tr> 
 <th>PACKAGE NAME</th>  
 <th>DATE</th>
   <th>TIME FROM</th>  
   <th>TIME TO</th>  
  
  <th></th> </tr> 
<?php  
 foreach($data as $row){
 ?> 
 <tr> 
<?php 
 $pk_key=$row['scheduleid'];
 ?>
  <td><?php  echo $row['package_title']; ?>  </td> 
  <td><?php  
$date=$row['date'];
$formattedDa = date("d-m-Y", strtotime($date));
 echo $formattedDa;
   ?>  </td> 
  <td><?php  echo $row['time_from']; ?>  </td> 
 <td><?php  echo $row['time_to']; ?>  </td> 

</tr>
<?php
}
?>
 </table> 
</div>
</section>
</div>



</div>
</div>
</section>
<?php require_once("../admin/footer.php");  ?>