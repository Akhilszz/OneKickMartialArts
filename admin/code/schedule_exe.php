<?php
require_once("../../connectionclass.php");
$obj=new Connectionclass();


 $t1=$_POST['t1'];
 $t2=$_POST['t2'];
 $date=$_POST['date'];
$id=$_POST['fk_package_id'];
$query="insert into scheduling(time_from,time_to,date,fk_package_id)values('$t1','$t2','$date','$id')";
$responds=$obj->Manipulation($query);



if($responds['status']=="true"){
    $url="../schedule.php?packgeid=$id";
    $obj->alert("Sucessfully  Scheduled",$url);
}else{
    $url="../schedule.php";
    $obj->alert("Something went wrong",$url);
}
?>
