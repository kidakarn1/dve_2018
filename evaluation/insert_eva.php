<?php

include('../connect/conn.php');
include('../include/function_kidakarn.php');
session_start();
echo $_SESSION["username"];
$res_school = select_school($conn);
$row_school = mysqli_fetch_assoc($res_school);
$res_check_user = check_user_type_id($conn,$_SESSION["username"]);
$row_check_user = mysqli_fetch_assoc($res_check_user);
$eva_id = $_POST["eva_id"];
echo $std = $_SESSION["std_id"];
echo $assessor = $_SESSION["assessor"];
echo $update = $_POST["update"];
echo $button_business = $_POST["button_business"];
$OK = $_POST["OK"];
echo "<br>";
$sqlQue = "select *from question where eva_id = '$eva_id' ";
$resQue = mysqli_query($conn, $sqlQue);
if ($update=="update"){
    echo $sql = "delete from evaluation_results where student_id = '$std' and assessor = '{$_SESSION["username"]}'";
         $res=mysqli_query($conn,$sql);
}
while ($rowQue = mysqli_fetch_array($resQue)) {
    $que_id = $rowQue["Que_id"];
    $score = $_POST[$que_id];
        if ($OK == "OK"){
            echo $sql = "insert into evaluation_results values('','$que_id','$score','{$row_school["school_id"]}','{$_SESSION["username"]}')";
            $res = mysqli_query($conn, $sql);
        }
        else{
        $sql = "insert into evaluation_results values('','$que_id','$score','$std','{$_SESSION["username"]}')";
        $res = mysqli_query($conn, $sql);
        }
}
    echo "<script> alert ('บันทึกข้อมูลสำเร็จ') </script>";
        if ($row_check_user["user_type_id"] == "4"){
            echo "<script> window.location.href='../login_trainer/select_nites_dve.php' </script>";
        }
        if ($row_check_user["user_type_id"] == "5"){
            echo "<script>  window.location.href='../login_teacher/select_student.php' </script>";
        }
        if ($row_check_user["user_type_id"] == "7"){
            echo "รอลิงค์";
            exit;
        }
        if ($row_check_user["user_type_id"] == ""){
            echo "ว่าง";
        }
?>
<?php function check_user_type_id($conn,$session_username){
        $sql="select * from user where username = '{$session_username}'";
        $res=mysqli_query($conn,$sql);
        return $res;
}?>
