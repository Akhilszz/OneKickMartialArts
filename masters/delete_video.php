<?php
require_once("../connectionclass.php");

$video=$_GET['video'];

$query="delete from video_tips where tips_id=$video";


$obj=new Connectionclass();
$data=$obj->Manipulation($query);
if($data['status']=="true"){
    $url="video_tips_show.php";
    $obj->alert("Sucessfully deleted",$url);
}else{
    $url="video_tips_show.php";
    $obj->alert("Something went wrong",$url);
}

?>