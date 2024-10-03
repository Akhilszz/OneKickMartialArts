<?php
require_once("../../connectionclass.php");
$obj = new Connectionclass();

$name = $_POST['name'];
$gender = $_POST['gender'];
$pro = $_POST['profile'];
$ph = $_POST['phone'];
$email = $_POST['emailid'];
$artsname = $_POST['arts'];
$password = $_POST['password'];

// Check if a master already exists for the provided arts ID
$checkMasterQuery = "SELECT COUNT(*) FROM master WHERE fk_art_id = '$artsname'";
$resultCount = $obj->GetSingleData($checkMasterQuery);

if ($resultCount > 0) {
    // If a master already exists for the provided arts ID, show an error message
    $url = "../master.php";
    $obj->alert("Master already exists for this art", $url);
} else {
    // Check if the email ID already exists in the login table
    $checkUsername = "SELECT COUNT(*) FROM login WHERE username='$email'";
    $resultUsernameCount = $obj->GetSingleData($checkUsername);

    if ($resultUsernameCount > 0) {
        // If the email ID already exists, show an error message
        $url = "../show_masters.php";
        echo $obj->alert("Email ID already exists", $url);
    } else {
        // Proceed with inserting login information and master details
        $insertLoginQuery = "INSERT INTO login(username, password, usertype) VALUES ('$email', '$password', 'master')";
        $loginData = $obj->Manipulation($insertLoginQuery);

        if ($loginData['status'] === "true") {
            $insertMasterQuery = "INSERT INTO master(fk_art_id, full_name, profile, phone, email, gender) VALUES ('$artsname', '$name', '$pro', '$ph', '$email', '$gender')";
            $responds = $obj->Manipulation($insertMasterQuery);

            if ($responds['status'] === "true") {
                $url = "../show_masters.php";
                $obj->alert("Successfully registered", $url);
            } else {
                $url = "../master.php";
                $obj->alert("Something went wrong", $url);
            }
        } else {
            $url = "../master.php";
            $obj->alert("Something went wrong", $url);
        }
    }
}
?>
