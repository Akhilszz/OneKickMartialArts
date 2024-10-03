<?php
require_once("../connectionclass.php");

$fid=$_GET['fid'];

$query="DELETE FROM feedback WHERE feedid=$fid";


$obj=new Connectionclass();
$data=$obj->Manipulation($query);
if($responds["status"]=="true"){
    $url="show_feedback.php";
    $obj->alert("Sucessfully registered",$url);
}else{
    $url="show_feedback.php";
    $msg=$responds['Message'];
    $obj->alert($msg,$url);
}

?>