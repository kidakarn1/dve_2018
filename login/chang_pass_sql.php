<?php
  include("../connect/conn.php");
  $user_id = $_POST["user_id"];
  $pass = md5($_POST["new_password"]);
  $sqluser = "update user set password = '$pass', status = 'y' where user_id = '$user_id'";
  $resuser = mysqli_query($conn,$sqluser);
  if($resuser) {
    echo "<meta http-equiv='refresh' content='0; login_admin.php' />";
    echo "<script>alert('เปลี่ยนรหัสผ่านสำเร็จ กรุณาเข้าสู่ระบบใหม่')</script>";
  }
?>