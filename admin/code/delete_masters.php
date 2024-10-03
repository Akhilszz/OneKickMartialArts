<?php
require_once("../../connectionclass.php");

$msid=$_GET['pk_key'];

$query="delete from master where master_id=$msid";


$obj=new Connectionclass();
$data=$obj->Manipulation($query);
if($data['status']=="true"){
    $url="../show_masters.php";
    $obj->alert("Sucessfully deleted",$url);
}else{
    $url="../show_masters.php";
    $obj->alert("Something went wrong",$url);
}

?>