<?php 
    include("../connect/conn.php");
    session_start();
    echo $_SESSION["std_id"] = $id= $_GET["id"];
?>
<form method="post" action="print_select_business_student.php">
    <table border="1">
    <tr>
        <th>รวมระยะเวลาการฝึกงาน</th>
        <th><input type="number" name="Internship" required>วัน</th>
        <th>ลาป่วย</th>
        <th><input type="number" name="Sick_Leave" required>วัน</th>
        <th>ลากิจ</th>
        <th><input type="number" name="Errand_leave" required>วัน</th>
        <th>มาสาย</th>
        <th><input type="number" name="late" required>วัน</th>
        <th><input type="submit" value="ตกลง"></th>
    </tr>
    </table>

</form>
