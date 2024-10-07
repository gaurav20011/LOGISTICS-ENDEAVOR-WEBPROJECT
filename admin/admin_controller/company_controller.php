<?php 

include '../../config.php';

$admin = new Admin();

//note: if(isset) is given to execute particular echo, if is not present always first echo executed

if(isset($_GET['update_status']))
{
$id = $_GET['update_status']; //['mycid'] from managecutomer.php variable

$query=$admin->cud("UPDATE `company` SET `status`='approved' WHERE company.company_id=".$id,"approved");

echo "<script>alert('approved'); window.location.href='../company_manage.php';</script>";
}
?>

<?php 
//delete
if(isset($_GET['delete_company'])) 
{
  
  $id=$_GET['delete_company'];
  $query=$admin -> cud("DELETE FROM `company` WHERE `company_id`=".$id,"deleted");
  echo "<script>alert('deleted successfully'); window.location.href='../company_manage.php';</script>";
}
?>