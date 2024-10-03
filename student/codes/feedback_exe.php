<?php
require_once("../../connectionclass.php");
$obj=new Connectionclass();
$sub=$_POST['subject'];
$msg=$_POST['message'];
$sender=$_POST['sender'] ; 
$date=date("Y-m-d") ; 


$query="insert into feedback(subject,message,sender,date)values('$sub','$msg','$sender','$date')";
$responds=$obj->Manipulation($query);
// var_dump($responds);
// die;

if($responds["status"]=="true"){
    $url="../feedback.php";
    $obj->alert("Sucessfully Submitted",$url);
}else{
    $url="../feedback.php";
    // $mesg=$responds['message'];
    $obj->alert("something went wrong",$url);
}
?>