
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
<?php
	include('../MPDF/mpdf.php');
	ob_start();?>  

<?php
include("../connect/conn.php");
include("function_date.php");    
date_default_timezone_set('asia/bangkok');

$education = $_GET["edu_id"];
$business_id = $_GET["business_id"];
$sql = "SELECT * FROM training_normal,business,student,education,minor,department WHERE 
training_normal.business_id = '$business_id' and 
education.edu_id = '$education' and 
training_normal.minor_id = minor.minor_id and 
minor.dep_id = department.dep_id and 
training_normal.citizen_id = student.citizen_id and 
student.edu_id = education.edu_id and 
training_normal.business_id = business.business_id";
$res = mysqli_query($conn,$sql);
$res1 = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($res);

$sql_sc = "SELECT * FROM school";
$res_sc = mysqli_query($conn,$sql_sc);
$row_sc = mysqli_fetch_assoc($res_sc);

?>
<table align = "center" border="0">
<tr>
<td align = "center">
<img src="../school/logo_school/<?php echo  $row_sc["school_logo"]?>" width="150px"  height="150px">
</td>
</tr>
<tr>
<td align = "center">
<h2>วิทยาลัยเทคนิคชลบุรี
</td>
</tr>
<tr>
<td align = "center">
<h2>รายชื่อนักศึกษาฝึกอาชีพระบบ ปกติ <?php echo $row["edu_name"] ?>
</td>
</tr>
<tr>
<td align = "center">
<h2>บริษัท <?php echo $row["business_name"]?>
</td>
</tr>
<tr>
<td align = "center">
<h2>ระหว่างวันที่ <?php echo dates($row["start_date"])?> ถึงวันที่ <?php echo dates($row["end_date"])?>
</td>
</tr>
<tr>
<td>
<hr width="1350 %">
</td>
</tr>
<tr>
<td>
</td>
</tr>
</table>
<table >
<tr>
<td COLSPAN ="3" align = "left">
<h2>แผนกวิชาช่าง<?php echo $row["dep_name"]?><br>
<?php while ($row = mysqli_fetch_assoc($res1)) { ?>
</td>
</tr>
</table>
<table  align ="center">
<tr>
<td>
<h3><?php echo ++$i?>.
</td>
<td><h2><center> <?php echo $row["std_name"]?> 
</td>
<td> <h2>  รหัส <?php echo $row["std_id"]?>
</td>
<?php } ?>
</td>
</tr>
</table>
<?php 
function dates ($date) { 
	$a = explode("-", $date);
	$month = array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฏาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
	$y = $a [0]+543;
	return day($a[1])." ".$month[$a[2] -1]." ".$y;
}
function day($del) {
	if ($dates < 10) {
		$r = substr($del, 1);
	} else {
		$r = $strDate;
	}
	return $r;
}
?>


<?php
$html = ob_get_contents();        //เก็บค่า html ไว้ใน $html 
ob_end_clean();
$pdf = new mPDF('th', 'A4', '0', '');   //การตั้งค่ากระดาษถ้าต้องการแนวตั้ง ก็ A4 เฉยๆครับ ถ้าต้องการแนวนอนเท่ากับ A4-L
$pdf->SetAutoFont();
$pdf->SetDisplayMode('fullpage');
$pdf->WriteHTML($html, 2);
$pdf->Output("../MPDF/PDF/MyPDF.pdf");         // เก็บไฟล์ html ที่แปลงแล้วไว้ใน MyPDF/MyPDF.pdf ถ้าต้องการให้แสด
?>
ดาวโหลดรายงานในรูปแบบ PDF<?php header('Location: ../MPDF/PDF/MyPDF.pdf');?>


</body>
</html>