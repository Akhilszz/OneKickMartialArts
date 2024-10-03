

<?php

require_once("../connectionclass.php");
$pk_key=$_POST['pk_key'];

$name=$_POST['name'];
$address=$_POST['address'];
$ph=$_POST['phoneno'];
$dob=$_POST['dob'];

$gen=$_POST['gender'];


$query="UPDATE reg SET name='$name',address='$address',dob='$dob',phoneno='$ph',gender='$gen' WHERE reg_id='$pk_key'";
//echo $query;

$obj=new Connectionclass();
$status=$obj->Manipulation($query);
// var_dump($status);
// die;
if($status["status"]=="true"){
    $url="show_profile.php";
    $obj->alert("Sucessfully updated",$url);
}
else{
    $url="show_profile.php";
    $obj->alert("Something went wrong",$url);
}
?>