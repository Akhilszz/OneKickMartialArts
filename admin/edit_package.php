<?php
require_once("../connectionclass.php");
$pid=$_GET['pid'];
$query="SELECT * FROM package WHERE packgeid=$pid";

$obj=new Connectionclass();
$data=$obj->GetSingleRow($query);

 
?>
    <form action="update_package.php" method="post">
   
    <label for="">Package_title</label><br>
    <input type="text" name="title" value="<?php echo $data['package_title']  ?>"><br><br>
    <label for="">Duration</label><br>
    <input type="number" name="dur" value="<?php echo $data['duration']  ?>"><br><br>
    <label for="">Cost</label><br>
    <input type="text" name="cost" value="<?php echo $data['cost']  ?>"><br><br> 
    <input type="hidden" name="pid" value="<?php echo $data['packgeid']  ?>"><br><br> 
    <input type="submit">
    </form>


 
