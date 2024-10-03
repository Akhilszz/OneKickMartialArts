<?php
require_once("../connectionclass.php");

$obj=new Connectionclass();
$pid=$_GET['packgeid'];
$pk_key=$_REQUEST["pk_key"];
$query="DELETE FROM scheduling WHERE scheduleid=$pk_key";
$data=$obj->Manipulation($query);


// var_dump($data);

if($data["status"]=="true"){
    $url="schedule.php?packgeid=$pid";
    $obj->alert("Sucessfully deleted",$url);
}else{
    $url="schedule.php?packgeid=$pid";
    $msg=$responds['Message'];
    $obj->alert($msg,$url);
}

?>