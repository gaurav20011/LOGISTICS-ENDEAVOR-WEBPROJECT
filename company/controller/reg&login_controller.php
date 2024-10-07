<?php

include '../../config.php';

$admin = new Admin();

//---LOGIN
if(isset($_POST['login'])){

	$username = $_POST['username'];

	$password = $_POST['password'];

	$query=$admin->ret("SELECT * FROM `company` WHERE `username`='$username' AND `password`='$password' AND `status`='approved' ");


//couting row
	$num=$query->rowCount();

	if($num>0){
		$row=$query->fetch(PDO::FETCH_ASSOC);

		$id =$row['company_id'];
		$_SESSION['company_id']=$id; //used to uniquely identify user session. use this in user pages

		echo "<script>alert('login successful'); window.location.href='../index.php';</script>";

	}


	else
	{
		echo "<script>alert('wrong username/password OR wait for approval'); window.location.href='../login_front.php';</script>";
	}
	
}

?>

<?php
//Registration
if(isset($_POST['register'])){

	$username = $_POST['username'];

	$password = $_POST['password'];

	$company_name = $_POST['company_name'];

	$phone = $_POST['phone'];

	$location_id =$_POST['location_id'];

	$status ='pending';

	$email =$_POST['email'];


	
	//---image
	$imagetargetfolder ='../uploads/';  // folder to store images
	$imagename=$imagetargetfolder.basename($_FILES["image"]["name"]); //['image'] is HTML name=""
	move_uploaded_file($_FILES["image"]["tmp_name"],$imagename); 
	
	$query=$admin->cud("INSERT INTO `company` (`username`,`password`,`company_name`,`phone`,`company_imagedb`,`status`,`location_id`,`email`) VALUES('$username','$password','$company_name','$phone','$imagename','$status','$location_id','$email')","saved");
	
	echo "<script>alert('registration successful'); window.location.href='../index.php';</script>";
	}
	
	
	

?>