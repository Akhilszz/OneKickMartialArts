<?php
require_once("../connectionclass.php");
$obj=new Connectionclass();
$arts="select * from arts";
$res=$obj->GetTable($arts);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <fieldset>
    <form action="package_exe.php" method="post">
      <label for="">Package Title</label>
      <input type="text" name="title"><br>
      <label for="">Duration</label>
        <input type="text" name="Dur"><br>
        <label for="">Cost</label>
        <input type="number" name="cost"><br>
      <label for="">Arts</label>
      <select name="arts">
        <option value="">Select</option>
        <?php
        foreach($res as $a){
            ?>
            <option value="<?php echo $a['artsid']?>"><?php echo $a['artsname']?></option>
            <?php
        }
        ?>
       
        <input type="submit">

    </form>
    </fieldset>
</body>
</html>