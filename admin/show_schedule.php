<?php
$query="SELECT * FROM scheduling";

require_once("../connectionclass.php");
$obj=new Connectionclass();
$data=$obj->GetTable($query);
?>
<table border=1 >
    <tr>
 
    <th>time_from</th>
  <th>time_to</th>
    <th>date</th>
    <th>Action</th>
    

</tr>
<?php
foreach($data as $row){
?>
<tr>
  
    <td><?php echo $row['time_from'];?></td>
    <td><?php echo $row['time_to'];?></td>
    <td><?php $inputdate= $row['date'];$date=date("d/m/y",strtotime($inputdate));echo $date?></td>
   
    <td>
    <a href="delete_schedule.php?pid=<?php echo $row['scheduleid'];?>">delete</a>
    <a href="edit_schedule.php?pid=<?php echo $row['scheduleid'];?>">edit</a>    
    </td>
    
</tr>
<?php
}
?>
</table>