<?php

include '../../config.php';

$admin = new Admin();

?>

<?php
//update------------------------------------------------------------------
if (isset($_POST['pay_to_service'])) {

    echo $booking_id = $_POST['booking_id'];

    echo  $company_id = $_POST['company_id'];

    $query = $admin->cud("UPDATE `booking` SET `payment_status`='paid' WHERE booking.booking_id='$booking_id' ", "updated successfully");

    echo "<script>alert('updated');window.location.href='../../single_company.php?company_id=$company_id';</script>";
}
?>