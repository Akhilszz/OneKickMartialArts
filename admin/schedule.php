<?php require_once("header.php");  ?>
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

<td>  
  <a onclick='return confirm("are you sure want to delete")' class="btn btn-primary btn-xs"   href="delete_schedule.php?pk_key=<?php  echo $pk_key; ?>&packgeid=<?php  echo $packgeid; ?>" >delete</a></td>
</tr>
<?php
}
?>
 </table> 
</div>
</section>
</div>



<div class="col-lg-4">
<section class="panel">
<header class="panel-heading"> ADD SCHEDULING </header>

<div class="panel-body">
 <form method="post" action="code/schedule_exe.php">

 <div class="form-group"> 
  <label class="col-sm-12 control-label">DATE</label> 
  <div class='col-lg-12'><input required class='form-control' type='date' name='date' id='txtDate'/></div>

</div>

<div class="form-group"> 
  <label class="col-sm-12 control-label">TIME FROM</label> 
  <div class='col-lg-12'>
    <input required class='form-control' type='time' name='t1' id='time_from' pattern="^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$" title="Enter a valid time (hh:mm)"/>
  </div>

</div>


<div class="form-group"> <label class="col-sm-12 control-label">TIME TO</label> <div class='col-lg-12'><input required class='form-control' type='time' name='t2' id='time_to' pattern="^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$" title="Enter a valid time (hh:mm)"/></div>
<br></div>

  <div class="form-group">
                        <label class="col-sm-3 control-label"></label>
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-success">Submit</button>
                    <button type="reset" class="btn btn-danger">Cancel</button>
                    <input required class='form-control' type='hidden' value="<?php echo $packgeid  ?>" name='fk_package_id' id='fk_package_id'/>
                        </div>
                    </div></div>
</form>
</div>
</section>
</div>





</div>
</div>
</section>
<?php require_once("footer.php");  ?>