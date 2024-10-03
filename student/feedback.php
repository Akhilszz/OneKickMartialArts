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
$qry="select * from feedback where sender='$username' ";  
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


<div class="col-lg-4">
<section class="panel">
<header class="panel-heading"> ADD FEEDBACK </header>

<div class="panel-body">
 <form method="post" action="codes/feedback_exe.php">
<div class="form-group"> <label class="col-sm-12 control-label">SUBJECT</label>
 <div class='col-lg-12'>
  <input required class='form-control' type='text' name='subject' id='subject'pattern="[a-zA-Z\s]+" title="only alphabets and spaces allowed"/>
</div>
<br></div><div class="form-group"> <label class="col-sm-12 control-label">MESSAGE</label> 
  <div class='col-lg-12'>
    <textarea required class='form-control' type='text' name='message' id='message'pattern="[a-zA-Z\s]+" title="only alphabets and spaces allowed"></textarea>
  </div>
<br></div>
<div class="form-group"> <label class="col-sm-12 control-label">SENDER</label> 
  <div class='col-lg-12'>
    <input value="<?php echo $username ?>" readonly required class='form-control' type='text' name='sender' id='sender'/></div>
 <br></div>  
 <div class="form-group">
                        <label class="col-sm-3 control-label"></label>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-success">Submit</button>
                    <button type="reset" class="btn btn-danger">Cancel</button>
                        </div>
                    </div></div>
</form></section>
</div>



</div>
</div>
</section>
<?php require_once("../admin/footer.php");  ?>