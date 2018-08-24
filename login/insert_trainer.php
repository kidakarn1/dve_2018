<?php
  include("../connect/conn.php");
  date_default_timezone_set("asia,bangkok");
  $today = date("Y-m-d");
  $sqlSc = "select * from school";
  $resSc = mysqli_query($conn,$sqlSc);
  $rowSc = mysqli_fetch_array($resSc);
  $trainer_citizen = $_POST["trainer_citizen"];
  $trainer_name = $_POST["trainer_name"];
  $phone = $_POST["phone"];
  $address = $_POST["home_id"]." ซอย ".$_POST["soi"]." ถนน ".$_POST["road"]." ต. ".$_POST["DISTRICT_CODE"]." อ. ".$_POST["AMPHUR_CODE"]." จ. ".$_POST["PROVINCE_CODE"]." ".$_POST["zipcode"];
  $business_id = $_POST["business_id"];
  $educational_id = $_POST["educational_id"];
  $trainer_experience = $_POST["trainer_experience"];
  $assign_date = $_POST["assign_date"];
  $password = md5($_POST["password"]);
  $email = $_POST["email"];
  $trainer_name = $row["trainer_name"];
  $trainer_name_arr = explode(" ",$trainer_name);
  $fname = $trainer_name_arr[0];
  $lname = $trainer_name_arr[1];
  if ($lname == "") {
    $trainer_name_arr = explode("  ",$trainer_name);
    $fname = $trainer_name_arr[0];
    $lname = $trainer_name_arr[1];  
  }

  $sql = "insert into trainer values('0','$trainer_citizen','$trainer_name','$phone','$address','$business_id','$educational_id','$trainer_experience','$assign_date','','0000-00-00')";
  $res = mysqli_query($conn,$sql);
  $sqlUser = "insert into user values('0','$trainer_citizen','$password','$fname','$lname','$email','$phone','{$rowSc["school_id"]}','4','Y','$today',now())";
  $resUser = mysqli_query($conn,$sqlUser);
  if($res && $resUser) {
    echo "เพิ่มสำเร็จ";
    header("location: login_admin.php");
  } else {
    echo "เพิ่มไม่สำเร็จ";
  }
?>