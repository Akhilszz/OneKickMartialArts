<?php
require_once("../../connectionclass.php");

$artsid=$_GET['pk_key'];

$query="DELETE FROM arts WHERE artsid=$artsid";


$obj=new Connectionclass();
$data=$obj->Manipulation($query);

if($data['status']=="true"){
    $url="../show_arts.php";
    $obj->alert("Sucessfully deleted",$url);
}else{
    $url="../show_arts.php";
    $obj->alert("Something went wrong",$url);
}

?>