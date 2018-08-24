<?php 
include("../connect/conn.php");
$id=$_GET['id'];
$status=$_GET['1'];
$sql="update training_normal set normal_status = '{$status}' where normal_id = '$id'";
$res=mysqli_query($conn,$sql);
if ($res){
    echo "<script> alert ('อัฟเดชสถานะเรียบร้อบ');
                  window.location.href='select_normal.php';
          </script>";
}
else{

}
?>