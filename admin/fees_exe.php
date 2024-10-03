<?php
require_once("../connectionclass.php");
$obj=new Connectionclass();
$amount=$_POST['number'];
$inputdate=$_POST['date'];
$bookid=$_POST['fk_book_id'];


$statu="invoice";
$query="insert into studentfee(fk_book_id,amount,due_date,status)values('$bookid','$amount','$inputdate','$statu')";
$responds=$obj->Manipulation($query);
 // var_dump($responds);
 // die;

if($responds["status"]=="true"){
    $url="fees.php?bookid=$bookid";
    $obj->alert("Sucessfully Added",$url);
}else{
    $url="fees.php";
    // $mesg=$responds['message'];
    $obj->alert("something went wrong",$url);
}
?>