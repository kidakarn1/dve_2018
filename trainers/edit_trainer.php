<?php
  include("../connect/conn.php");
  date_default_timezone_set("asia,bangkok");

  $trainer_citizen = $_POST["trainer_citizen"];
  $trainer_name = $_POST["trainer_name"];
  $phone = $_POST["phone"];
  $address = $_POST["address"];
  $business_id = $_POST["business_id"];
  $educational_id = $_POST["educational_id"];
  $trainer_experience = $_POST["trainer_experience"];
  $assign_date = $_POST["assign_date"];
  $email = $_POST["email"];
  $trainer_method_assign = $_POST["trainer_method_assign"];
  $certificate_date = $_POST["ceSrtificate_date"];
  
  $trainer_name_arr = explode(" ",$trainer_name);
  $fname = $trainer_name_arr[0];
  $lname = $trainer_name_arr[1];
  if ($lname == "") {
    $trainer_name_arr = explode("  ",$trainer_name);
    $fname = $trainer_name_arr[0];
    $lname = $trainer_name_arr[1];  
  }

  $sql = "update trainer set trainer_name = '$trainer_name', 
  phone = '$phone', 
  address = '$address', 
  business_id = '$business_id', 
  educational_id = '$educational_id', 
  trainer_experience = '$trainer_experience', 
  assign_date = '$assign_date',
  trainer_method_assign = '$trainer_method_assigns',
  certificate_date = '$certificate_date'
  where trainer_citizen = '$trainer_citizen'
  ";
  $res = mysqli_query($conn,$sql);
  $sqlUser = "update user set fname = '$fname', lanem = '$lname',email = '$email' where username = '$trainer_citizen'";
  $resUser = mysqli_query($conn,$sqlUser);
  if($res && $resUser) {
    echo "แก้ไขสำเร็จ";
    header("location: show_trainer.php");
  } else {
    echo "แก้ไขไม่สำเร็จ";
  }
?>