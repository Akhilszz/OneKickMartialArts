<?php
require_once("../connectionclass.php");
$obj=new connectionclass() ; 
$name=$_POST['name'];
$gender=$_POST['gender'];
$dob=$_POST['dob'];
$adres=$_POST['address'];
$ph=$_POST['phoneno'];
$email=$_POST['emailid'];
$password=$_POST['password'] ; 
$user="student";
$doj=date("Y-m-d");
$dob = date("Y-m-d",strtotime($dob));
$checkusername="select count(*) from login where username='$email'";
$resultcount=$obj->GetSingleData($checkusername);
if($resultcount>0)
{
 
  echo $obj->alert("Email ID Already exists","../register.php");  
}
else
{
	$qry="insert into login(username,password,usertype)values('$email','$password','student')"; 
$data=$obj->Manipulation($qry); 
if($data["status"]=="true"){

$query="insert into reg(name,address,phoneno,gender,emailid,dob,usertype,doj)values('$name','$adres','$ph','$gender','$email','$dob','$user','$doj')";


$responds=$obj->Manipulation($query);

    $url="../register.php";
    $obj->alert("Sucessfully registered",$url);
}else{
    $url="../register.php";
    $msg=$responds['Message'];
    $obj->alert($msg,$url);
}
}
?>