<?php
require_once("../connectionclass.php");
$obj = new Connectionclass();
$nc = $_POST['nc'];
$card = $_POST['cardno'];
$cvv = $_POST['CVV'];
$date = $_POST['date'];
$payamount = $_POST['amount'];
$bookid = $_POST['bookid'];
$cost = $_POST['cost'];
$statusamount = $_POST['payamount'];
$todayDate = date("Y-m-d");

// Check if the bank details exist
$sql = "SELECT * FROM bank WHERE name='$nc' AND card_number='$card' AND expiry='$date' AND cvv='$cvv'";
$bankDetails = $obj->GetSingleRow($sql);
//echo $date;
//var_dump($bankDetails);
//die;

if ($bankDetails) {
    // Check if payment amounts match
    if ($statusamount == $payamount) {
            // Update studentfee status to 'paid' and deduct amount from bank
            $sql = "UPDATE studentfee SET status = 'paid', amount = $cost, pay_date='$todayDate' WHERE fk_book_id=$bookid";
            $new = $obj->Manipulation($sql);

            $sql = "UPDATE bank SET amount = amount - $payamount WHERE card_number = $card";
            $new = $obj->Manipulation($sql);

            $url = "fee.php";
            $obj->alert("Successfully paid", $url);
        } 
    elseif ($payamount <= $statusamount) {
        $remainpay = $statusamount - $payamount;
        
        if ($remainpay + $statusamount == $cost) {
            // Update studentfee status to 'invoice' and deduct remaining amount from bank
            $sql = "UPDATE studentfee SET status = 'invoice', amount = $remainpay, pay_date='$todayDate' WHERE fk_book_id=$bookid";
            $new = $obj->Manipulation($sql);

            $sql = "UPDATE bank SET amount = amount - $cost WHERE card_number = $card";
            $new = $obj->Manipulation($sql);

            $url = "fee.php";
            $obj->alert("Successfully paid", $url);
        } else {
            $remainpay = $statusamount - $payamount;

            // Update studentfee status to 'invoice' and deduct remaining amount from bank
            $sql = "UPDATE studentfee SET status = 'invoice', amount = $remainpay, pay_date='$todayDate' WHERE fk_book_id=$bookid";
            $new = $obj->Manipulation($sql);

            $sql = "UPDATE bank SET amount = amount - $payamount WHERE card_number = $card";
            $new = $obj->Manipulation($sql);

            $url = "fee.php";
            $obj->alert("Successfully paid", $url);
        }
    } elseif ($payamount > $cost) {
        $url = "paynow.php?bookid=$bookid&cost=$cost&payamount=$statusamount";
        $obj->alert("Please pay the right amount", $url);
    } else {
        $url = "paynow.php?bookid=$bookid&cost=$cost&payamount=$statusamount";
        $obj->alert("Something went wrong", $url);
    }
} else {
    $url = "paynow.php?bookid=$bookid&cost=$cost&payamount=$statusamount";
    $obj->alert("Bank details not found", $url);
}
?>
