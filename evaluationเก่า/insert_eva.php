<?php

include('../connect/conn.php');
session_start();
$eva_id = $_POST["eva_id"];
$std = $_SESSION["std_id"];
$assessor = $_SESSION["assessor"];
$sqlQue = "select *from question where eva_id = '$eva_id' ";
$resQue = mysqli_query($conn, $sqlQue);
while ($rowQue = mysqli_fetch_array($resQue)) {
    $que_id = $rowQue["Que_id"];
    $score = $_POST[$que_id];
    $sql = "insert into evaluation_results values('','$que_id','$score','$std','$assessor')";
    $res = mysqli_query($conn, $sql);
}
    echo "<script>
    alert ('บันทึกข้อมูลสำเร็จ');
    window.location='../login_teacher/select_student.php';
    </script>"
?>
