<?php

require_once("../../connectionclass.php");

$aname=$_POST['artsname'];
$des=$_POST['des'];
$artsid=$_POST['pk_key'];


$query="update arts set artsname='$aname',description='$des' WHERE artsid=$artsid";
//echo $query;

$obj=new Connectionclass();
$status=$obj->Manipulation($query);
// var_dump($status);
// die;
if($status['status']=="true"){
    $url="../show_arts.php";
    $obj->alert("Sucessfully Updated",$url);
}else
    $url="../show_arts.php";
    $obj->alert("Something went wrong",$url);

 
header("location:../show_arts.php");

?>