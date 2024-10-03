<?php

require_once("../../connectionclass.php");

$name=$_POST['name'];
$pro=$_POST['profile'];
$pno=$_POST['phone'];
$msid=$_POST['pk_key'];
$mgen=$_POST['gender'];


$query="update master set full_name='$name',profile='$pro',phone='$pno',gender='$mgen' where master_id=$msid";
//var_dump($query);
//die;

$obj=new Connectionclass();
$status=$obj->Manipulation($query);
var_dump($status);
if($status['status']=="true"){
    $url="../show_masters.php";
    $obj->alert("Sucessfully updated",$url);
}
else{
    $url="../show_masters.php";
    $obj->alert("Something went wrong",$url);
}
?>