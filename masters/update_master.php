

<?php

require_once("../connectionclass.php");
$pk_key=$_POST['pk_key'];

$name=$_POST['name'];
$profile=$_POST['profile'];
$ph=$_POST['phoneno'];
$gen=$_POST['gender'];


$query="UPDATE master SET  full_name='$name',profile='$profile',phone='$ph',gender='$gen' WHERE master_id='$pk_key'";
//echo $query;

$obj=new Connectionclass();
$status=$obj->Manipulation($query);
// var_dump($status);
// die;
if($status["status"]=="true"){
    $url="master_prf_v.php";
    $obj->alert("Sucessfully updated",$url);
}
else{
    $url="master_prf_v.php";
    $obj->alert("Something went wrong",$url);
}
?>