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

	$sqlN = "select *,COUNT(distinct training_dve.citizen_id) as count from business,district,province,amphur,training_dve where business.district_id = district.DISTRICT_CODE 
	and district.AMPHUR_CODE = amphur.AMPHUR_CODE 
	and amphur.PROVINCE_CODE = province.PROVINCE_CODE 
	and business.business_id = training_dve.business_id 
  and province.PROVINCE_NAME = 'ชลบุรี'
  and training_dve.training_status != 'เสร็จสิ้นการฝึก'
	group by training_dve.business_id";
	$resN = mysqli_query($conn,$sqlN);
	$sqlNH = "select * from training_dve where training_status != 'เสร็จสิ้นการฝึก'";
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
 <table align = "center">
 <tr>
 <td>
	<center><h2>วิทยาลัย <?php echo $rowS["school_name"]?>
	<br>
	รายงานขัอมูลสถาณประกอบการที่ประจำ ภาคเรียนที่<?php echo $rowY["term"]?> ปีการศึกษา  <?php echo $rowY["inter_year"];?>
	</center></h2>
	</td>
	</tr>
	</table>
	<br>
	<br>
	<table border="1" align = "center" width="1500 %">
		<tr>
			<th>ลำดับที่</th>
			<th>ชื่อสถาณประกอบการ</th>
			<th>ที่อยู่</th>
			<th>จำนวนนักเรียนทีฝึกอาชีพ</th>
			<th>หมายเหตุ</th>
		</tr>
		<?php 
			$i = 0;
			while ($rowN = mysqli_fetch_array($resN)) {
				?>
			<tr>
				<td><?php echo ++$i?></td>
				<td><?php echo $rowN["business_name"];?></td>
				<td><?php echo "เลขที่ ".$rowN["address_no"]." ถนน ".$rowN["road"]." ตำบล ".$rowN["DISTRICT_NAME"]." อำเภอ ".$rowN["AMPHUR_NAME"]." จังหวัด ".$rowN["PROVINCE_NAME"];?></td>
				<td><?php echo $rowN["count"];?></td>
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
?>
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
