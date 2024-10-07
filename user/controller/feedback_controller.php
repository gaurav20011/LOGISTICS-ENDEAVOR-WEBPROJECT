<?php 

include 'config.php';

$admin = new Admin();


//---create/insert
if(isset($_POST['submit_feedback'])){ 

	$message = $_POST['message'];  //['locations_name'] HTML input tag name=""

    $company_id =$_POST['company_id'];

    $user_id=$_POST['user_id'];

$query=$admin->cud("INSERT INTO `feedback`(`message`,`doctor_id`,`petowner_id`) VALUES('$message','$doctor_id','$petowner_id')","saved");

echo "<script>alert('Thanks for your feedback');window.location.href='../../single_doctor.php';</script>";
}          
?>