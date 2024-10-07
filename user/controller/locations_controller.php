<?php 

include '../../config.php';

$admin = new Admin();


//---create/insert
if(isset($_POST['insert'])){ 

	$locations_name = $_POST['locations_name'];  //['locations_name'] HTML input tag name=""

    $address =$_POST['address'];

//image
$imagetargetfolder ='../uploads/'; //folder in which we store image
$imagename=$imagetargetfolder.basename($_FILES["image"]["name"]); //['image'] is name in HTML input tag
move_uploaded_file($_FILES["image"]["tmp_name"],$imagename); 

$query=$admin->cud("INSERT INTO `locations`(`locations_name`,`address`,`imagedb`) VALUES('$locations_name','$address','$imagename')","saved");

echo "<script>alert('inserted successfully');window.location.href='../locations_manage.php';</script>";
}          
?>

<?php
//update------------------------------------------------------------------
if(isset($_POST['update'])){ 

    $id = $_POST['locations_id']; //hidden id passed in update form

	$locations_name = $_POST['locations_name']; 

    $address = $_POST['address']; 

    $imagename =$_POST['img']; //old image

    //new image
    if(is_uploaded_file($_FILES["image"]["tmp_name"])){
        $imagetargetfolder ='../uploads/'; 
        $imagename=$imagetargetfolder.basename($_FILES["image"]["name"]); //['image'] HTML tag input imagedb name
        move_uploaded_file($_FILES["image"]["tmp_name"],$imagename); 
    }

$query=$admin->cud("UPDATE `locations` SET `locations_name`='$locations_name', `address`='$address',`imagedb`='$imagename' WHERE locations.locations_id='$id' ","updated successfully"); 

echo "<script>alert('updated');window.location.href='../locations_manage.php';</script>";
}
?>

<?php
//delete------------------------------------------------------------------
if(isset($_GET['delete_locations'])){  //delete_locations id is href variable from locations_manage delete button

$id =$_GET['delete_locations']; 

$query=$admin->cud("DELETE FROM `locations` where `locations_id`=".$id,"Deleted successfully");

echo "<script>alert('deleted'); window.location.href='../locations_manage.php';</script>";
}

?>