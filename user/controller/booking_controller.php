<?php

include '../../config.php';

$admin = new Admin();

if (!isset($_SESSION['user_id'])) {
    header("location:../login_front.php");
    // echo "<script>alert('please login'); window.location.href='../login_front.php';</script>";
}

$s_variable = $_SESSION['user_id'];



//---create/insert
if (isset($_POST['token_booking_button'])) {
    //used to book token : 🟥 javascript is used so any form field name can be given here

    $company_id = $_POST['company_id'];

    $service_id = $_POST['service_id'];

    $booking_date = $_POST['booking_date'];

    $p_location = $_POST['p_location'];

    $booking_status = 'booked'; 

    $map_location = $_POST['map_location'];

    $payment_status='pending';


    $query = $admin->cud("INSERT INTO `booking`(`company_idb`,`service_idb`,`user_idb`,`booking_status`,`booking_date`,`p_location`,`map_location`,`payment_status`) VALUES('$company_id','$service_id','$s_variable','$booking_status','$booking_date','$p_location','$map_location','$payment_status' )", "saved");
    echo "<script>alert('booking is done');window.location.href='../../single_company.php?company_id=$company_id';</script>";
}
//main if condition ends

?>


<?php
//cancel booking
if (isset($_GET['cancel_booking'])) {  //delete_locations id is href variable from locations_manage delete button

    $booking_id = $_GET['cancel_booking'];

    $company_id = $_GET['company_id'];

    $query=$admin->cud("UPDATE `booking` SET `booking_status`='cancelled' where booking.booking_id='$booking_id' ","updated successfully"); 

    echo "<script>alert('booking is cancelled'); window.location.href='../../single_company.php?company_id=$company_id';</script>";
}

?>