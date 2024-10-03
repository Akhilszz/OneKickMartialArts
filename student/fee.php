
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

$qry="SELECT * FROM package p JOIN arts a on(p.fk_arts_id=a.artsid) JOIN booking b on(p.packgeid=b.fk_package_id) JOIN studentfee s on(s.fk_book_id=b.bookid) WHERE b.fk_reg_id='$reg_id'";
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
   <th>BOOK DATE</th>  
   <th>AMOUNT TO PAY</th>  
   <th>DUE DATE</th>
   <th>PAID DATE</th> 
   <th>STATUS</th> 
   <th >ACTION </th>
   </tr> 
  <?php  
 foreach($data as $row){
 ?> 
<?php
 $cost=$row['cost'];
 $bookid=$row['fk_book_id'];
 $amount=$row['amount'];
?>

 <tr> 
 <td><?php  echo $row['package_title']; ?>  </td> 
 <td><?php  echo $row['artsname']; ?>  </td> 
 <td><?php  echo $row['duration']; ?>  </td> 
 <td><?php  echo $row['cost']; ?>  </td>
 <td><?php  $inputdate= $row['booking_date'];$date=date("d-m-Y",strtotime($inputdate));echo $date ?>  </td> 
 <td><?php  echo $row['amount']; ?>  </td> 
 <td><?php  $inputduedate=$row['due_date'];$duedate=date("d-m-Y",strtotime($inputduedate)); echo $duedate?>  </td> 
 <td><?php  $inputpaydate = $row['pay_date']; 

if (!empty($inputpaydate)) {
    $paydate = date("d-m-Y", strtotime($inputpaydate));
    echo $paydate;
}
 
 
 
 ?>  </td> 
 <td><?php  echo $row['status']; ?>  </td> <?php
 if($row['status']=="invoice") {?><td> <a href="paynow.php?bookid=<?php  echo $bookid; ?>&cost=<?php  echo $cost; ?>&payamount=<?php  echo $amount; ?>"><button type="reset" class="btn btn-danger">Pay Now</button> </a></td><?php
 }?></tr>
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