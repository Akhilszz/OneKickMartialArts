<?php
require_once("../connectionclass.php");
$pid=$_GET['pid'];
$query="SELECT * FROM scheduling WHERE scheduleid=$pid";

$obj=new Connectionclass();
$data=$obj->GetSingleRow($query);

 
?>
    <form action="update_schedule.php" method="post">
   
    <label for="">time_from</label><br>
    <input type="time" name="t1" value="<?php echo $data['time_from']  ?>"><br><br>
    <label for="">time_to</label><br>
    <input type="time" name="t2" value="<?php echo $data['time_to']  ?>"><br><br>
    <label for="">date</label><br>
    <input type="date" name="date" value="<?php$inputdate= $row['date']; $date=date("d/m/y",strtotime($inputdate)); echo $date ?>"><br><br> 
    <input type="hidden" name="pid" value="<?php echo $data['scheduleid']  ?>"><br><br> 
    <input type="submit">
    </form>


 
