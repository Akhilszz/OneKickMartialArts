
<?php
require_once("../connectionclass.php");
$obj = new Connectionclass();

$title = $_POST['title'];
$arts = $_POST['arts'];
$dur = $_POST['duration'];
$cost = $_POST['cost'];

// Check if a package already exists with the same arts ID
$existingQuery = "SELECT * FROM package WHERE fk_arts_id = '$arts'";
$existingRes = $obj->GetTable($existingQuery);

if (is_array($existingRes) && count($existingRes) > 0) {
    // If a package already exists with the same arts ID, show an error message
    $url = "package.php";
    $obj->alert("Package already exists for this art", $url);
} else {
    // If the package doesn't exist, proceed with insertion
    $query = "INSERT INTO package(package_title, fk_arts_id, duration, cost) VALUES ('$title', '$arts', '$dur', '$cost')";
    $responds = $obj->Manipulation($query);

    if ($responds['status'] === "true") {
        $url = "show_package.php";
        $obj->alert("Successfully Added", $url);
    } else {
        $error = isset($responds['Message']) ? $responds['Message'] : "Unknown Error";
        // Display the error message to understand the issue
        $url = "package.php";
        $obj->alert("Insertion failed: $error", $url);
    }
}
?>
