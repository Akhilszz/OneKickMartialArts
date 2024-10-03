<?php

require_once("../connectionclass.php");

$title=$_POST['title'];
$dur=$_POST['dur'];
$cost=$_POST['cost'];
$pid=$_POST['pid'];


$query="UPDATE scheduling SET time_from='$title' ,time_to='$dur' , date='$cost' WHERE scheduleid=$pid";
//echo $query;

$obj=new Connectionclass();
$status=$obj->Manipulation($query);
if($responds["status"]=="true"){
    $url="show_package.php";
    $obj->alert("Sucessfully Updated",$url);
}
else{
    $url="show_package.php";
    $obj->alert("Something went wrong",$url);
}
?>