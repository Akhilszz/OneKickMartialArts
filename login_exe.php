<?php
session_start();
require_once("connectionclass.php");
$obj=new ConnectionClass();
$username=$_POST['username'];
$password=$_POST['password']; 
$qry="select usertype from login where username='$username' and password='$password' ";
$exe=$obj->GetSingleData($qry);


if($exe=='admin')
{
	$_SESSION['username']=$username;
    
	$_SESSION['usertype']=$exe;
	header("location:admin/dashboard.php");
}
elseif ($exe=='master') 
{
	$_SESSION['username']=$username;

	$_SESSION['usertype']=$exe;
	header("location:admin/dashboard.php");
}elseif ($exe=='student') 
{
	$_SESSION['username']=$username;

	$_SESSION['usertype']=$exe;
	header("location:admin/dashboard.php");
}
 
else
{
	 echo $obj->alert("Invalid Username or password","login.php");
}
?>