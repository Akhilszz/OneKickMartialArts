<?php
require_once("../connectionclass.php");
$obj=new Connectionclass();
$nc=$_POST['nc'];
$card=$_POST['cardno'];
$cvv=$_POST['CVV'] ; 
$date=$_POST['date'] ;
//$date=date("d/m/y",strtotime($inputdate));
$payamount=$_POST['amount'] ;
$bookid=$_POST['bookid'];
$cost=$_POST['cost'];
$statusamount=$_POST['payamount'];   
$todayDate = date("Y-m-d");


$query="INSERT into bank(name,card_number,expiry,cvv,amount)select
'$nc','$card','$date','$cvv','$payamount'
where not exists(
 select 1 from bank where 
 name='$nc' 
 and card_number='$card'
 and expiry='$date' 
 and cvv='$cvv')";

$responds=$obj->Manipulation($query);
 //var_dump($responds);
 //die;
if($statusamount==$payamount){

if($responds["status"]=="true"){
    require_once("../connectionclass.php");
$obj=new Connectionclass();
 $sql= "UPDATE studentfee
SET status = 'paid',amount =$cost,pay_date='$todayDate' where fk_book_id=$bookid";
$new=$obj->Manipulation($sql);
$sql= "UPDATE bank SET amount =$cost where card_number=$card";
$new=$obj->Manipulation($sql);
//var_dump($new);
//die;

    $url="fee.php";
    $obj->alert("Sucessfully paid",$url);
}else{
    $url="paynow.php?bookid=$bookid&cost=$cost&payamount=$statusamount";
    // $mesg=$responds['message'];
    $obj->alert("something went wrong",$url);
}
}
elseif($payamount<=$statusamount){
    $remainpay=$statusamount-$payamount;
    if($remainpay+$statusamount==$cost){
    require_once("../connectionclass.php");
    $obj=new Connectionclass();
     $sql= "UPDATE studentfee
    SET status = 'invoice',amount =$remainpay,pay_date='$todayDate' where fk_book_id=$bookid";
    $new=$obj->Manipulation($sql);
    $sql= "UPDATE bank SET amount =$cost where card_number=$card";
    $new=$obj->Manipulation($sql);
    $url="fee.php";
    $obj->alert("Sucessfully paid",$url);
    }
    else{
        $remainpay=$statusamount-$payamount;
    
    require_once("../connectionclass.php");
    $obj=new Connectionclass();
     $sql= "UPDATE studentfee
    SET status = 'invoice',amount =$remainpay,pay_date='$todayDate' where fk_book_id=$bookid";
    $new=$obj->Manipulation($sql);
    $sql= "UPDATE bank SET amount =$cost where card_number=$card";
    $new=$obj->Manipulation($sql);
    $url="fee.php";
    $obj->alert("Sucessfully paid",$url);
    }

}
elseif($payamount>$cost){
    $url="paynow.php?bookid=$bookid&cost=$cost&payamount=$statusamount";
    $obj->alert("please pay right amount",$url);
}
else{
    $url="paynow.php?bookid=$bookid&cost=$cost&payamount=$statusamount";
    // $mesg=$responds['message'];
    $obj->alert("something went wrong",$url);
}

?>