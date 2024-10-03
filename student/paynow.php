<?php require_once("../admin/header.php"); 
require_once("../connectionclass.php");
$obj=new connectionclass() ; 
$bookid=$_GET['bookid'];
$cost=$_GET['cost'];
$amount=$_GET['payamount'];

$qry="SELECT * FROM studentfee where fk_book_id='$bookid'";
$data=$obj->GetTable($qry);
//var_dump($qry);
//die;
?>
<div class="col-lg-4">
<section class="panel">
<header class="panel-heading"> STUDENT FEES </header>

<div class="panel-body">
 <form method="post" action="fee_exe.php">

 <div class="form-group"> <label class="col-sm-12 control-label">Your Invoice</label>
 <div class='col-lg-12'>
 <label for="">invoice total</label>
 <?php

        foreach($data as $row){
            ?>
            <?php echo $row['amount']?>
            <?php
        }
        ?>
</div>
        
 <div class="form-group"> <label class="col-sm-12 control-label">Payment</label>

<div class="form-group"> <label class="col-sm-12 control-label">Name on Card</label>
 <div class='col-lg-12'>
  <input required class='form-control' type='text' name='nc' id='subject'pattern="[a-zA-Z\s]+" title="only alphabets and spaces allowed"/>
</div>
<br></div><div class="form-group"> <label class="col-sm-12 control-label">Card Number</label> 
  <div class='col-lg-12'>
    <input required class='form-control' type='number' name='cardno' id='message'pattern="[a-zA-Z\s]+" title="only alphabets and spaces allowed">
  </div>
<br></div>
<div class="form-group"> <label class="col-sm-12 control-label">Exp Date</label> 
  <div class='col-lg-12'>
  <input required class='form-control' type='month' name='date'>
 <br></div>  
 <div class="form-group"> <label class="col-sm-12 control-label">C.V.V</label> 
  <div class='col-lg-12'>
  <input required class='form-control' type='number' name='CVV' id='message'pattern="[a-zA-Z\s]+" title="only alphabets and spaces allowed">
 <br></div> 
 <div class="form-group"> <label class="col-sm-12 control-label">AMOUNT</label> 
  <div class='col-lg-12'>
  <input required class='form-control' type='number' name='amount' value="<?php echo $amount  ?>" readonly id='message'pattern="[a-zA-Z\s]+" title="only alphabets and spaces allowed">
 <br></div>  
 <div class="form-group">
                        <label class="col-sm-3 control-label"></label>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <input required class='form-control' type='hidden' value="<?php echo $bookid  ?>" name='bookid' />
                            <input required class='form-control' type='hidden' value="<?php echo $cost  ?>" name='cost' />
                            <input required class='form-control' type='hidden' value="<?php echo $amount  ?>" name='payamount'/>

                    
                        </div>
                    </div></div>
</form></section>
</div>



</div>
</div>
</section>
<?php require_once("../admin/footer.php");  ?>