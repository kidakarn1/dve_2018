<?php
  include("connect/conn.php");
  session_start();
  echo $user_id = $_SESSION['user_id'];
  echo $old_pass = md5($_POST["old_password"]);
  $sqlCuser = "select * from user where user_id = '$user_id' and password ='$old_pass'";
  $resCuser = mysqli_query($conn,$sqlCuser);
  $rowCuser = mysqli_num_rows($resCuser);
  if($rowCuser) {
    $pass = md5($_POST["new_password"]);
    $sqluser = "update user set password = '$pass' where user_id = '$user_id'";
    $resuser = mysqli_query($conn,$sqluser);
    if($resuser) {
      echo "<meta http-equiv='refresh' content='0; login/logout.php' />";
      echo "<script>alert('เปลี่ยนรหัสผ่านสำเร็จ กรุณาเข้าสู่ระบบใหม่')</script>";
    }
  } else {
    echo "<meta http-equiv='refresh' content='0; update_pass.php' />";
    echo "<script>alert('รหัสผ่านเดิมไม่ตรง')</script>";
  }
?>