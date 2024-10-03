

<?php

require_once("../connectionclass.php");
$pk_key=$_GET['pk_key'];
$p_key=$_GET['p_key'];

$date=date("Y-m-d");
$m=$_GET['mid'];



$query="INSERT  into booking (fk_reg_id,fk_master_id,fk_package_id,booking_date)values('$p_key','$m','$pk_key','$date')";
//echo $query;

$obj=new Connectionclass();
$status=$obj->Manipulation($query);
//var_dump($status);
//die;
if($status["status"]=="true"){
    $url="my_package.php?p_key=$p_key";
    $obj->alert("Sucessfully booked",$url);
}
else{
    $url="show_package.php";
    $obj->alert("Something went wrong",$url);
}
?>