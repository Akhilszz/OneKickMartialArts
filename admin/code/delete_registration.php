<?php
require_once("../../connectionclass.php");

$rid=$_GET['rid'];

$query="DELETE FROM reg WHERE reg_id=$rid";


$obj=new Connectionclass();
$data=$obj->Manipulation($query);
if($responds["status"]=="true"){
    $url="../register.php";
    $obj->alert("Sucessfully deleted",$url);
}else
    $url="../register.php";
    $obj->alert("Something went wrong",$url);
?>