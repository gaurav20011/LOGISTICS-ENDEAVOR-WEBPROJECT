<?php 

include 'config.php';

$admin = new Admin();


//---create/insert 

	$message = $_GET['message'];  //['locations_name'] HTML input tag name=""

    $company_id_f =$_GET['company_id'];

    $user_id = $_GET['user_id'];

$query=$admin->cud("INSERT INTO `feedback`(`message`,`company_id_f`,`user_id`) VALUES('$message','$company_id_f','$user_id')","saved");

echo "thank you for your feedback";
?>

