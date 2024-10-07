<?php

include '../../config.php';

$admin = new Admin();

if (!isset($_SESSION['company_id'])) {
    header("location:login_front.php");
}

$s_variable = $_SESSION['company_id'];

?> 

<?php
//🟨 cancel booking---------------

if (isset($_GET['delete_booking_id'])) {  //delete_locations id is href variable from locations_manage delete button

    $booking_id = $_GET['delete_booking_id'];

    $booking_status = 'cancelled';

    $query = $admin->cud("UPDATE `booking` SET `booking_status`='$booking_status' WHERE booking.booking_id='$booking_id' ", "updated successfully");

    echo "<script>alert('booking cancelled'); window.location.href='../booking_manage.php';</script>";
}
?>


<?php 
//🟨 Accept booking---------------

if (isset($_GET['accept_booking'])) {  //delete_locations id is href variable from locations_manage delete button

    $booking_id = $_GET['accept_booking'];

    $booking_status = 'booking accepted';

    $query = $admin->cud("UPDATE `booking` SET `booking_status`='$booking_status' WHERE booking.booking_id='$booking_id' ", "updated successfully");

    echo "<script>alert('booking accepted'); window.location.href='../booking_manage.php';</script>";
}
?>


<?php 
//🟨 pickup booking---------------

if (isset($_GET['pickup_goods'])) {  //delete_locations id is href variable from locations_manage delete button

    $booking_id = $_GET['pickup_goods'];

    $booking_status = 'Goods picked';

    $query = $admin->cud("UPDATE `booking` SET `booking_status`='$booking_status' WHERE booking.booking_id='$booking_id' ", "updated successfully");

    echo "<script>alert('Goods picked'); window.location.href='../booking_manage.php';</script>";
}
?>


<!-- 🟩goods location update -->
<?php

if (isset($_POST['update_goods_location'])) {  //delete_locations id is href variable from locations_manage delete button

    $booking_id = $_POST['booking_id'];

    $current_location = $_POST['current_location'];

    $query = $admin->cud("UPDATE `booking` SET `current_location`='$current_location' WHERE booking.booking_id='$booking_id' ", "updated successfully");

    echo "<script>alert('updated goods location'); window.location.href='../goods_location.php';</script>";
}

?> 


<?php
//🟨 mark as reached---------------

if (isset($_GET['mark_reached'])) {  //delete_locations id is href variable from locations_manage delete button

    $booking_id = $_GET['mark_reached'];

    $booking_status = 'reached';

    $query = $admin->cud("UPDATE `booking` SET `booking_status`='$booking_status' WHERE booking.booking_id='$booking_id' ", "updated successfully");

    echo "<script>alert('updated'); window.location.href='../booking_manage.php';</script>";
}
?>


<?php
//---company complete vaccination
if (isset($_GET['complete_booking_id'])) {

    $booking_id = $_GET['complete_booking_id'];

    $booking_status = 'vaccination_completed';

    $query = $admin->cud("UPDATE `booking` SET `booking_status`='$booking_status' WHERE booking.booking_id='$booking_id' ", "updated successfully");

    echo "<script>alert('vaccination is completed');window.location.href='../booking_manage.php';</script>";
}
?>