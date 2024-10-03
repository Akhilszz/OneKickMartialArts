<?php
require_once("../connectionclass.php");

$pid=$_GET['pk_key'];

$query="delete from package where packgeid=$pid";


$obj=new Connectionclass();
$data=$obj->Manipulation($query);
if($data['status']=="true"){
    $url="show_package.php?packgeid=$pid";
    $obj->alert("Sucessfully deleted",$url);
}else{
    $url="show_package.php?packgeid=$pid";
    $msg=$responds['Message'];
    $obj->alert($msg,$url);
}

?>