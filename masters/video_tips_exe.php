<?php
require_once("../connectionclass.php");

$obj = new Connectionclass();
$title = $_POST['title'];
$des = $_POST['des'];
$yt = $_POST['yt'];
$arts = $_POST['arts'];
$mid = $_POST['mid'];

// Check if the master's fk_art_id matches the provided arts
$checkQuery = "SELECT COUNT(*) AS count FROM master WHERE fk_art_id = '$arts' AND master_id = '$mid'";
$checkResult = $obj->GetSingleData($checkQuery);

if ($checkResult > 0) {
    // If the master has the same fk_art_id, proceed with insertion into video_tips table
    $query = "INSERT INTO video_tips(title, description, video_url, fk_arts_id, fk_master_id) VALUES ('$title', '$des', '$yt', '$arts', '$mid')";
    $response = $obj->Manipulation($query);

    if ($response["status"] == "true") {
        $url = "video_tips_Show.php";
        $obj->alert("Successfully updated", $url);
    } else {
        $url = "video_add.php";
        $obj->alert("Something went wrong", $url);
    }
} else {
    // If the master's fk_art_id doesn't match, show an error message
    $url = "video_add.php";
    $obj->alert("Master does not have permission to insert into this art", $url);
}
?>
