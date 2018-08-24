<?php
include("../connect/conn.php");
@SESSION_START();
$new_pass=$_POST['new_pass'];
$new_pass=md5($new_pass);
$sql="update user set password = '$new_pass' where username = '{$_SESSION['username']}'";
if ($res=mysqli_query($conn,$sql)){
echo "update สำเร็จ";
header("location: login_admin.php");
}
else{
echo "update ไม่สำเร็จ"."<br>";
echo $sql;

}
?>