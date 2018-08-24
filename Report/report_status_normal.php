<?php
	include('../MPDF/mpdf.php');
	ob_start();?>
<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <?php
  include("../connect/conn.php");
  include("function_date.php");
	date_default_timezone_set('asia/bangkok');
	$Month = date('m');

	$sqlN = "select * from training_normal,business,student,department
	where training_normal.citizen_id = student.citizen_id 
	and training_normal.business_id = business.business_id
  and student.dep_id = department.dep_id
  and training_normal.normal_status != 'เสร็จสิ้นการฝึก'
	";
	$resN = mysqli_query($conn,$sqlN);
	$sqlNH = "select * from training_normal where normal_status != 'เสร็จสิ้นการฝึก'";
	$resNH = mysqli_query($conn,$sqlNH);
	$rowNH = mysqli_fetch_array($resNH);

	$sqlS = "select * from school";
	$resS = mysqli_query($conn,$sqlS);
  $rowS = mysqli_fetch_array($resS);
  
  $year = $rowNH["start_date"];
  $sqlY = "select * from training_plan where start_date = '$year'";
  $resY = mysqli_query($conn,$sqlY);
  $rowY = mysqli_fetch_array($resY);
  ?>
 </head>
 <body>
 <table align = "center">
 <tr>
 <td>
	<center><h2>วิทยาลัย <?php echo $rowS["school_name"]?>
	<br>
	รายงานผลการขออนุญาติฝึกงานในสถาณประกอบการ <br>
	วันที่เริ่มฝึก <?php echo dateThai($rowNH["start_date"])?> วันที่สิ้นสุดการฝึก <?php echo dateThai($rowNH["end_date"])?>
  ภาคเรียนที่<?php echo $rowY["term"]?> ปีการศึกษา  <?php echo $rowY["inter_year"];?>
  </center></h2>
	</td>
	</tr>
	</table>
	<br>
	<br>
	<table border="1" align = "center" width="1500 %">
		<tr>
			<th>ลำดับที่</th>
			<th>รหัสนักศึกษา</th>
			<th>ชื่อนักษึกษา</th>
			<th>แผนกวิชา</th>
			<th>ชื่อสถาณประกอบการ</th>
			<th>ผลการอนุญาติ</th>
		</tr>
		<?php 
			$i = 0;
			while ($rowN = mysqli_fetch_array($resN)) {
				?>
			<tr>
				<td><center><?php echo ++$i?><center></td>
				<td><?php echo $rowN["std_id"];?></td>
				<td><?php echo $rowN["std_name"];?></td>
				<td><?php echo "ช่าง".$rowN["dep_name"];?></td>
				<td><?php echo $rowN["business_name"];?></td>
				<td><?php echo $rowN["normal_status"];?></td>
			</tr>
		<?php 
			} 
		?>
		</table>
		<p style="text-align: right;">วันที่ทำรายงาน วันที่ <?php echo date("d");?> เดือน <?php echo thaiMonth($Month);?> พ.ศ <?php echo date("Y")+543;?></p>
 </body>
</html>
<?php
$html = ob_get_contents();        //เก็บค่า html ไว้ใน $html 
ob_end_clean();
$pdf = new mPDF('th', 'A4-L', '0', '');   //การตั้งค่ากระดาษถ้าต้องการแนวตั้ง ก็ A4 เฉยๆครับ ถ้าต้องการแนวนอนเท่ากับ A4-L
$pdf->SetAutoFont();
$pdf->SetDisplayMode('fullpage');
$pdf->WriteHTML($html, 2);
$pdf->Output("../MPDF/PDF/MyPDF.pdf");         // เก็บไฟล์ html ที่แปลงแล้วไว้ใน MyPDF/MyPDF.pdf ถ้าต้องการให้แสด
?>
ดาวโหลดรายงานในรูปแบบ PDF<?php header('Location: ../MPDF/PDF/MyPDF.pdf');?>