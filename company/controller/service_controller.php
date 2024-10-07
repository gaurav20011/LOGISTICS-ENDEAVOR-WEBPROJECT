<?php 

include '../../config.php';

$admin = new Admin();


//---create/insert
if(isset($_POST['create_service'])){ 

	$service_name = $_POST['service_name'];  

    $service_price = $_POST['service_price'];
   
    $company_id = $_POST['company_id'];


//image
$imagetargetfolder ='../uploads/'; //folder in which we store image
$imagename=$imagetargetfolder.basename($_FILES["image"]["name"]); //['image'] is name in HTML input tag
move_uploaded_file($_FILES["image"]["tmp_name"],$imagename); 

$query=$admin->cud("INSERT INTO `service`(`service_name`,`service_price`,`service_imagedb`,`company_ids`) VALUES('$service_name','$service_price','$imagename','$company_id')","saved");

echo "<script>alert('inserted successfully');window.location.href='../service_manage.php';</script>";
}          
?>

<?php
//update------------------------------------------------------------------
if(isset($_POST['update_service'])){ 

    $id = $_POST['service_id']; 

	$service_name = $_POST['service_name']; 

    $service_price = $_POST['service_price']; 

    $company_id = $_POST['company_id'];

    $imagename =$_POST['img']; //old image

    //new image
    if(is_uploaded_file($_FILES["image"]["tmp_name"])){
        $imagetargetfolder ='../uploads/'; 
        $imagename=$imagetargetfolder.basename($_FILES["image"]["name"]); //['image'] HTML tag input imagedb name
        move_uploaded_file($_FILES["image"]["tmp_name"],$imagename); 
    }

$query=$admin->cud("UPDATE `service` SET `service_name`='$service_name',`service_price`='$service_price',`service_imagedb`='$imagename',`company_ids`='$company_id' WHERE service.service_id='$id' ","updated successfully"); 

echo "<script>alert('updated');window.location.href='../service_manage.php';</script>";
}
?>

<?php
//delete------------------------------------------------------------------
if(isset($_GET['delete_service'])){  //delete_service id is href variable from service_manage delete button

$id =$_GET['delete_service']; 

$query=$admin->cud("DELETE FROM `service` where `service_id`=".$id,"Deleted successfully");

echo "<script>alert('deleted'); window.location.href='../service_manage.php';</script>";
}

?>