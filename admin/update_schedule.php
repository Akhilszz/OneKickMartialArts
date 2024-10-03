<?php

require_once("../connectionclass.php");

$title=$_POST['t1'];
$dur=$_POST['t2'];
$cost=$_POST['date'];
$pid=$_POST['pid'];


$query="UPDATE scheduling SET time_from='$title', time_to='$dur' ,  date='$cost' WHERE scheduleid=$pid";
//echo $query;

$obj=new Connectionclass();
$status=$obj->Manipulation($query);
if($responds["status"]=="true"){
    $url="show_schedule.php";
    $obj->alert("Sucessfully Updated",$url);
}
else{
    $url="show_schedule.php";
    $obj->alert("Something went wrong",$url);
}
?>