<?php 
include("../connect/conn.php");
echo $id=$_GET['id'];
echo $status=$_GET['1'];
$sql="update training set training_status = '{$status}' where training_id='$id'";
$res=mysqli_query($conn,$sql);
if ($res){
header("location: select_bilateral.php");
}
else{

}
?>