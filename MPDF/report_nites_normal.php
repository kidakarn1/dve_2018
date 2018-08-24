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
	$teacher_id = $_GET["teacher_id"];
	$sqlN = "select * from business,teacher,nites_normal,normal,department,district,province,amphur,student
	where nites_normal.teacher_id = teacher.teacher_id 
	and nites_normal.n_id = normal.n_id 
	and normal.business_id = business.business_id 
	and normal.std_id = student.std_id 
	and student.dep_id = department.dep_id
	and business.district_id = district.DISTRICT_CODE 
	and district.AMPHUR_CODE = amphur.AMPHUR_CODE 
	and amphur.PROVINCE_CODE = province.PROVINCE_CODE 
	and province.PROVINCE_NAME = 'ชลบุรี'	and nites_normal.teacher_id = '$teacher_id'
	";
	$resN = mysqli_query($conn,$sqlN);
	$sqlNH = "select * from normal";
	$resNH = mysqli_query($conn,$sqlNH);
	$rowNH = mysqli_fetch_array($resNH);

	$sqlS = "select * from school";
	$resS = mysqli_query($conn,$sqlS);
	$rowS = mysqli_fetch_array($resS);

	$sqlT = "select * from teacher where teacher_id = '$teacher_id' ";
	$resT = mysqli_query($conn,$sqlT);
	$rowT = mysqli_fetch_array($resT)
  ?>
 </head>
 <body><table align = "center">
 <tr>
 <td><center>วิทยาลัยเทคนิคชลบุรี<center></td>
 </tr>
 <tr>
 <td><center>
	ตารางนิเทศการฝึกงาน
	ภาคเรียนที่ <?php echo $rowNH["semester"]?> ปีการศึกษา  <?php echo date("Y")+543;?>
	<br>
	ชื่อครูนิเทศ  <?php echo $rowT["teacher_name"]?> แผนกวิชา <?php echo $rowT["dep_id"]?>
	</center></td>
</table>
	<table border="1">
		<tr>
			<th>ลำดับที่</th>
			<th>วันที่นิเทศ</th>
			<th>เลขทะเบียนรถ</th>
			<th>รหัสนักศีกษา</th>
			<th>ชื่อนักศีกษา</th>
			<th>ชั้นเรียน</th>
			<th>ชื่อสถาณประกอบการ</th>
			<th>ที่อยู่</th>
			<th>เบอร์โทรศัพท์</th>
		</tr>
		<?php 
			$i = 0;
			while ($rowN = mysqli_fetch_array($resN)) {
				$std_id = $rowN["std_id"];
				$edu = substr($std_id,2,1);
				?>
			<tr>
				<td><?php echo ++$i?></td>
				<td><?php echo $rowN["date_nites"];?></td>
				<td><?php echo $rowN["code_car"];?></td>
				<td><?php echo $std_id;?></td>
				<td><?php echo $rowN["std_name"];?></td>
				<td><?php if($edu == 3){echo "ปวส.";} if($edu == 2){echo "ปวช.";}?></td>
				<td><?php echo $rowN["business_name"];?></td>
				<td><?php echo "เลขที่ ".$rowN["address_no"]." ถนน ".$rowN["road"]." ตำบล ".$rowN["DISTRICT_NAME"]." อำเภอ ".$rowN["AMPHUR_NAME"]." จังหวัด ".$rowN["PROVINCE_NAME"];?></td>
				<td><?php echo $rowN["contact_phone"];?></td>
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

