<?php
require_once("connectionclass.php");
$obj=new Connectionclass();


$pass1=$_POST['new_pass'];
$pass2=$_POST['con_pass'];
$pass3=$_POST['old_pass'];




if($pass1===$pass2){
$query="update login set password='$pass1' where username='$email'";
$responds=$obj->Manipulation($query);
//var_dump($responds);
//die;
if($responds["status"]=="true"){
    $url="login.php";
    $obj->alert("Sucessfully updated",$url);
}
}
else{
    $url="new_pass.php?email=$email";
    $obj->alert("Something went wrong",$url);
}
?>