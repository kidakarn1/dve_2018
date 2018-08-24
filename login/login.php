<?php
@SESSION_START();
include("../connect/conn.php");
// $_SESSION[username]=$_POST[username];
// $password=$_POST[password];
// $_SESSION[password]=md5($password);
$user =$_POST["username"];
$password =md5($_POST["password"]);

if ($_SESSION["captcha"] != $_POST["captcha"]){
  echo "<script>alert('กรุณากรอกรหัสให้ตรงกับรูปภาพ')</script>";
  echo "<meta http-equiv='refresh' content='0; login_admin.php' />";
  return;
}
if(strlen($user) == 13) {
  if (checkID($user)){
    echo "true";
    
    $sqlCstd = "select * from student where citizen_id = '$user'";
    $resCstd = mysqli_query($conn,$sqlCstd);
    echo $numCstd = mysqli_num_rows($resCstd);
  
    $sqlCtra = "select * from trainer where trainer_citizen = '$user'";
    $resCtra = mysqli_query($conn,$sqlCtra);
    echo $numCtra = mysqli_num_rows($resCtra);

    $sqlCtea = "select * from teacher where citizen_id = '$user'";
    $resCtea = mysqli_query($conn,$sqlCtea);
    echo $numCtea = mysqli_num_rows($resCtea);
    if($numCstd == 0 && $numCtea == 0) {
      echo "<meta http-equiv='refresh' content='0; register_teacher.php' />";
      return;
    }
    if($numCstd == 0 && $numCtra == 0  && $numCtea == 0) {
      echo "<meta http-equiv='refresh' content='0; register_trainer.php' />";
      return;
    }
  } else {
    echo "<meta http-equiv='refresh' content='0; login_admin.php' />";
    echo "<script>alert('ชื่อผู้ใช้ไม่ถูกต้อง')</script>";  
    return;
  }
}

$sql="select * from user,user_type where user.username='$user' and user.password='$password' and user_type.user_type_id = user.user_type_id";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($res);
$_SESSION['user_id']=$row['user_id'];

if (mysqli_num_rows($res) and $row['user_type_name']=="Admin"){
	$sql_staff="select * from user where username = '$user'";
	$res_staff=mysqli_query($conn,$sql_staff);
	$row_staff=mysqli_fetch_assoc($res_staff);
	echo $_SESSION['username']=$row['username'];
  $_SESSION['status']=$row['user_type_name'];
	echo $_SESSION['staff_name']=$row_staff['fname'];
  $_SESSION['staff_lname']=$row_staff['lname'];
header("location: ../index.php");
}
else if (mysqli_num_rows($res) and $row['user_type_name']=="User"){
	$sql_staff="select * from student where std_id = '$user'";
	$res_staff=mysqli_query($conn,$sql_staff);
	$row_staff=mysqli_fetch_assoc($res_staff);
	$_SESSION['staff_name']=$row_staff['std_name'];
  $_SESSION['staff_lname']=$row_staff['std_lastname'];
  $dep_id = substr($row['username'],3,3);
  $edu_id = substr($row['username'],2,1);
  $group_id = $row_staff['group_id'];
  $system_id = $row_staff['system_id'];
  date_default_timezone_set("asia/bangkok");
  $year = date("y")+43;
  $level = $year - $edu;
  if ($edu_id == 2) {
    if ($level > 3) {
      $level = 3;
    }
  }
  if ($edu_id == 3) {
    if ($level > 2) {
      $level = 2;
    }
  }

  echo $sql_inter = "select * from training_plan,groups where training_plan.group_id = groups.group_id and groups.dep_id = '$dep_id' 
  and training_plan.group_id='$group_id' and training_plan.system_id='$system_id'";
  $res_inter = mysqli_query($conn,$sql_inter);
  if (mysqli_num_rows($res_inter)) {
    $_SESSION['username']=$row['username'];
    $_SESSION['status']=$row['user_type_name'];  
    header("location: ../index.php");
  } else {
    echo "<meta http-equiv='refresh' content='0; login_admin.php' />";
    echo "<script>alert('ไม่มีกำหนดฝึกงาน/ฝึกอชีพ')</script>";
  }
}

else if (mysqli_num_rows($res) and $row['user_type_name']=="Staff"){
	$sql_staff="select * from user where username = '$user'";
	$res_staff=mysqli_query($conn,$sql_staff);
	$row_staff=mysqli_fetch_assoc($res_staff);
	echo $_SESSION['username']=$row_staff['username'];
  $_SESSION['status']=$row['user_type_name'];
	echo $_SESSION['staff_name']=$row_staff['fname'];
  $_SESSION['staff_lname']=$row_staff['lname'];
header("location: ../index.php");
}
else if (mysqli_num_rows($res) and $row['user_type_name']=="Trainer"){
  if($row['status'] == 'N') {
    header("location: chang_pass.php?id={$row['user_id']}");
    return;
  } else {
    $$sql_staff="select * from user where username = '$user'";
	$res_staff=mysqli_query($conn,$sql_staff);
	$row_staff=mysqli_fetch_assoc($res_staff);
	echo $_SESSION['username']=$row['username'];
  $_SESSION['status']=$row['user_type_name'];
	echo $_SESSION['staff_name']=$row_staff['fname'];
  $_SESSION['staff_lname']=$row_staff['lname'];
    header("location: ../index.php");
  }
}
else if (mysqli_num_rows($res) and $row['user_type_name']=="Teacher"){
  if($row['status'] == 'N') {
    header("location: chang_pass.php?id={$row['user_id']}");
  } else {
    $sql_staff="select * from user where username = '$user'";
	$res_staff=mysqli_query($conn,$sql_staff);
	$row_staff=mysqli_fetch_assoc($res_staff);
	echo $_SESSION['username']=$row_staff['username'];
  $_SESSION['status']=$row['user_type_name'];
	echo $_SESSION['staff_name']=$row_staff['fname'];
  $_SESSION['staff_lname']=$row_staff['lname'];
    header("location: ../index.php");    
  } 
}
else if (mysqli_num_rows($res) and $row['user_type_name']=="Business"){
  if($row['status'] == 'N') {
    header("location: chang_pass.php?id={$row['user_id']}");
  } else {
    $sql_staff="select * from user where username = '$user'";
	$res_staff=mysqli_query($conn,$sql_staff);
	$row_staff=mysqli_fetch_assoc($res_staff);
	echo $_SESSION['username']=$row_staff['username'];
  $_SESSION['status']=$row_staff['user_type_name'];
	echo $_SESSION['staff_name']=$row_staff['fname'];
  $_SESSION['staff_lname']=$row_staff['lname'];
    header("location: ../index.php");
  }
}

else if (mysqli_num_rows($res) and $row['user_type_name']=="Driver"){
  if($row['status'] == 'N') {
    header("location: chang_pass.php?id={$row['user_id']}");
  } else {
    $sql_staff="select * from user where username = '$user'";
	$res_staff=mysqli_query($conn,$sql_staff);
	$row_staff=mysqli_fetch_assoc($res_staff);
	echo $_SESSION['username']=$row_staff['username'];
  $_SESSION['status']=$row_staff['user_type_name'];
	echo $_SESSION['staff_name']=$row_staff['fname'];
  $_SESSION['staff_lname']=$row_staff['lname'];
    header("location: ../index.php");    
  } 
}



else{
  echo "<meta http-equiv='refresh' content='0; login_admin.php' />";
  echo "<script>alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง')</script>";
}

function checkID($id){
  if(strlen($id) != 13) return false;
  for($i=0, $sum=0; $i < 12; $i++)
    $sum += (float)$id{$i}*(13-$i); 
  if((11-$sum%11)%10!=(float)$id{12})
    return false; 
  return true;
}

?>




