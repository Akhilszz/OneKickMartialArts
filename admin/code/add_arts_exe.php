<?php
require_once("../../connectionclass.php");
$obj = new Connectionclass();
$aname = $_POST['artsname'];
$des = $_POST['description'];
$itm_image = time() . $_FILES['image']['name'];

// Check if the art name already exists
$existingQuery = "SELECT * FROM arts WHERE artsname = '$aname'";
$existingRes = $obj->GetTable($existingQuery);

if (is_array($existingRes) && count($existingRes) > 0) {
    // If the art name already exists, show an error message
    $url = "../add_arts.php";
    $obj->alert("Art already exists with this name", $url);
} else {
    // If the art name doesn't exist, proceed with inserting the new art
    move_uploaded_file($_FILES['image']['tmp_name'], "../../image_arts/" . $itm_image);

    $query = "INSERT INTO arts(artsname, description, image) VALUES ('$aname', '$des', '$itm_image')";
    $res = $obj->Manipulation($query);

    if ($res['status'] === "true") {
        $url = "../show_arts.php";
        $obj->alert("Art Added Successfully", $url);
    } else {
        $url = "../add_arts.php";
        $obj->alert("Something went wrong", $url);
    }
}
?>
