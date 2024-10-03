<?php
session_start();
require_once("connectionclass.php");
$obj=new Connectionclass();

$email=$_POST['email'];
$otp=$_POST['otp'];


$query="select * from forgot_password where username='$email'";
$responds=$obj->GetSingleRow($query);

$otp2=$responds['random_number'];

if($otp== $otp2)
{

    
        $url="new_pass.php?email=$email";
        // $mesg=$responds['message'];
        $obj->alert("Please Set New Password",$url);
}

else{
    $url="forgot_pass.php?email=$email";
    // $mesg=$responds['message'];
    $obj->alert("invalid otp",$url);
}
?>