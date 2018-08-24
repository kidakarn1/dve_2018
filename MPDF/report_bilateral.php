<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>Document</title>
  <?php
	include('mpdf.php');
	ob_start();
	include ("../connect/conn.php");
	date_default_timezone_set('asia/bangkok');
	$Month = date('m');

	$sqlN = "select * from business,district,province,amphur,bilateral,department,student where business.district_id = district.DISTRICT_CODE 
	and district.AMPHUR_CODE = amphur.AMPHUR_CODE 
	and amphur.PROVINCE_CODE = province.PROVINCE_CODE 
	and business.business_id = bilateral.business_id 
	and bilateral.std_id = student.std_id 
	and student.dep_id = department.dep_id 
	";
	$resN = mysqli_query($conn,$sqlN);
	$sqlNH = "select * from bilateral";
	$resNH = mysqli_query($conn,$sqlNH);
	$rowNH = mysqli_fetch_array($resNH);

	$sqlS = "select * from school";
	$resS = mysqli_query($conn,$sqlS);
	$rowS = mysqli_fetch_array($resS)
  ?>
 </head>
 <body>
	<table align = "center">
 <tr>
 <td><center>วิทยาลัยเทคนิคชลบุรี<center></td>
 </tr>
 <tr>
 <td><center>
	รายงานขัอมูลการยื่นคำขอฝึกอาชีพ ภาคเรียนที่<?php echo $rowNH["semester"]?> ปีการศึกษา  <?php echo date("Y")+543;?><br>
	วันที่เริ่มฝึก <?php echo $rowNH["internship_date"]?> วันที่สิ้นสุดการฝึก <?php echo $rowNH["internship_date_end"]?>
	</center></td>
</table>
	<table border="1">
		<tr>
			<th>ลำดับที่</th>
			<th>ชื่อนักศึกษา</th>
			<th>แผนกวิชา</th>
			<th>ชื่อสถาณประกอบการ</th>
			<th>จังหวัด</th>
			<th>หมายเหตุ</th>
		</tr>
		<?php 
			$i = 0;
			while ($rowN = mysqli_fetch_array($resN)) {
				?>
			<tr>
				<td><?php echo ++$i?></td>
				<td><?php echo $rowN["std_name"];?></td>
				<td><?php echo $rowN["dep_name"];?></td>
				<td><?php echo $rowN["business_name"];?></td>
				<td><?php echo $rowN["PROVINCE_NAME"];?></td>
				<td></td>
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
$pdf = new mPDF('th', 'A4', '0', '');   //การตั้งค่ากระดาษถ้าต้องการแนวตั้ง ก็ A4 เฉยๆครับ ถ้าต้องการแนวนอนเท่ากับ A4-L
$pdf->SetAutoFont();
$pdf->SetDisplayMode('fullpage');
$pdf->WriteHTML($html, 2);
$pdf->Output("PDF/MyPDF.pdf");         // เก็บไฟล์ html ที่แปลงแล้วไว้ใน MyPDF/MyPDF.pdf ถ้าต้องการให้แสด
	function thaiMonth($index) {
		$thai_month_arr=array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"                 
		);
		return $thai_month_arr[$index];
	}
?>
ดาวโหลดรายงานในรูปแบบ PDF <a href="PDF/MyPDF.pdf">คลิกที่นี้</a>
