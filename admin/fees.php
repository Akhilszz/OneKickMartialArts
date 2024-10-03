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
<header class="panel-heading"> STUDENT FEES </header>

<div class="panel-body">
<?php 
$bookid =$_GET['bookid'];
require_once("../connectionclass.php");
  $qry="select * from studentfee sf join booking b on (sf.fk_book_id=b.bookid) join reg r on (r.reg_id=fk_reg_id) where sf.fk_book_id='$bookid'";
  $obj=new connectionclass() ; 
$data=$obj->GetTable($qry);

$qry1="select * from studentfee sf join booking b on (sf.fk_book_id=b.bookid) join reg r on (r.reg_id=fk_reg_id) where sf.fk_book_id='$bookid'";
$obj1=new connectionclass() ; 
$data1=$obj1->GetSingleRow($qry1);

$qr="select * from booking  b join package p on b.fk_package_id=p.packgeid where b.bookid='$bookid'";
$obj=new connectionclass() ; 
$dat=$obj->GetSingleRow($qr);

//var_dump($dat);
 ?> 
  <table class="table table-bordered" >
 <tr> 
 <th>STUDENT NAME</th>  
 <th>AMOUNT</th>
   <th>DUE DATE</th>  
   <th>PAID DATE</th>
   <th>STATUS</th>  
  
  <th></th> </tr> 
<?php  
 foreach($data as $row){
 ?> 
 <tr> 

  <td><?php  echo $row['name']; ?>  </td> 
  <td><?php  echo $row['amount']; ?>  </td> 
 <td><?php  $inputdate = $row['due_date']; $date=date("d-m-Y",strtotime($inputdate));echo $date ?>  </td> 
 <td><?php  echo $row['pay_date']; ?>  </td> 
 <td><?php  echo $row['status']; ?>  </td> 
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
<header class="panel-heading"> ADD STUDENT FEES</header>

<div class="panel-body">
 <form method="post" action="fees_exe.php">

 <div class="form-group"> 
  <label class="col-sm-12 control-label">AMOUNT</label> 
  <div class='col-lg-12'><input required class='form-control' type='number'  value="<?php  echo $dat['cost'] ?>" readonly name='number' id='txtDate'/></div>

</div>

<div class="form-group"> 
  <label class="col-sm-12 control-label">DATE</label> 
  <div class='col-lg-12'>
    <input required class='form-control' type='date' name='date' id='txtDate'/>
  </div>

</div>

  <div class="form-group">
                        <label class="col-sm-3 control-label"></label>
                        <div class="col-sm-12">
                          <?php if(empty($data1['status'])){?>
                            
                            <button type="submit" class="btn btn-success">Submit</button>
                                             
                          <button type="reset" class="btn btn-danger">Cancel</button>
                          <?php }?> 
                    <input required class='form-control' type='hidden' value="<?php echo $bookid  ?>" name="fk_book_id"/>
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