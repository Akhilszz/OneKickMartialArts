<?php require_once("../admin/header.php");  ?>
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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
    <title>Add Package</title>
</head>
<body>
    <form method="post" action="package_exe.php">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>

        <label for="duration">Duration:</label>
        <input type="text" id="duration" name="duration" required>

        <label for="cost">Cost:</label>
        <input type="number" id="cost" name="cost" required>
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
        <button ><input type="submit" class="btn btn-success" value="Add Pckage"></button>
    </form>
</body>
</html>

<?php require_once("../admin/footer.php");  ?>


