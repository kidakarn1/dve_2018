<?php

include("../connect/conn.php");
date_default_timezone_set("asia/bangkok");
$today = date("Y-m-d");
$citizen_id=$_POST['citizen_id'];
$teacher_name = $_POST['teacher_name'];
$teacher_name_arr = explode(" ",$teacher_name);
$fname = $teacher_name_arr[0];
$lname = $teacher_name_arr[1];
if ($lname == "") {
  $teacher_name_arr = explode("  ",$teacher_name);
  $fname = $teacher_name_arr[0];
  $lname = $teacher_name_arr[1];  
}

$username=$citizen_id;
$password=md5($_POST["password"]);

$dep_id=$_POST['dep_id'];
$position=$_POST['position'];

$sql = "insert into teacher values(
'0',
'$teacher_name',
'$position',
'$dep_id',
'$citizen_id'
)";
$res = mysqli_query($conn,$sql);
$sqlUser = "insert into user values(
  '0',
  '$username',
  '$password',
  '$fname',
  '$lname',
  '',
  '',
  '',
  '5',
  'Y',
  '$today',
  ''
)";
$resUser = mysqli_query($conn,$sqlUser);

if ($res and $resUser) {
	header("location: login_admin.php");
} else {
    echo "ไม่สำเร็จ"."<br>".$sql."<br>".$sqlUser;
}

?>