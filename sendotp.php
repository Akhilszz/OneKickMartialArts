<?php
require_once("connectionclass.php");
$obj=new Connectionclass();
require_once("smtp/otp.php");


$otp=rand(100000,999999);
$reciveremail=$_POST['username'];
$subject="email verification";
$emailbody="your 6 digit otp code is:";

echo smtp_mailer($reciveremail,$subject,$emailbody.$otp);

$query="select * from forgot_password where username='$reciveremail'";
$r=$obj->GetSingleRow($query);
if($r==null)
	{	
$query="INSERT into forgot_password(username,random_number)values('$reciveremail','$otp')";
$responds=$obj->Manipulation($query);
if($responds["status"]=="true"){
    $url = "verify.php?email=$reciveremail";
    $obj->alert("Sucessfully updated",$url);
}else{
    $url="forgot_pass.php";
    // $mesg=$responds['message'];
    $obj->alert("something went wrong",$url);
}
    }

    else{
        $query="update forgot_password set random_number='$otp' where username='$reciveremail'";
        $responds2=$obj->Manipulation($query);
        if($responds2["status"]=="true"){
            $url = "verify.php?email=$reciveremail";
            $obj->alert("Sucessfully OTP Send",$url);
        }else{
            $url="forgot_pass.php";
            // $mesg=$responds['message'];
            $obj->alert("something went wrong",$url);
        }

    }

