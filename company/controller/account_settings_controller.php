<?php 

include '../../config.php';

$admin = new Admin();

?>

<?php
//update------------------------------------------------------------------
if(isset($_POST['update'])){ //update is submit button name

    $id = $_POST['company_id']; //hidden id passed in update form

	$username = $_POST['username']; 

    $password = $_POST['password']; 

    $imagename =$_POST['img']; //old image

    //new image
    if(is_uploaded_file($_FILES["image"]["tmp_name"])){
        $imagetargetfolder ='../uploads/'; 
        $imagename=$imagetargetfolder.basename($_FILES["image"]["name"]); //['image'] HTML tag input imagedb name
        move_uploaded_file($_FILES["image"]["tmp_name"],$imagename); 
    }

$query=$admin->cud("UPDATE `company` SET `username`='$username', `password`='$password',`company_imagedb`='$imagename' WHERE company.company_id='$id' ","updated successfully"); 

echo "<script>alert('updated');window.location.href='../account_settings.php';</script>";
}
?>

<?php
//delete------------------------------------------------------------------
if(isset($_GET['delete_account'])){  //delete_locations id is href variable from locations_manage delete button

$id =$_GET['delete_account']; 

$query=$admin->cud("DELETE FROM `company` where `company_id`=".$id,"Deleted successfully");
session_destroy();
echo "<script>alert('your account is deleted'); window.location.href='../../index.php';</script>";
}

?>