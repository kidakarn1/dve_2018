<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
  <title> New Document </title>

 </head>

 <body>
<?php
include('MPDF/mpdf.php');
ob_start();
include ("../connect/conn.php");
	date_default_timezone_set('asia/bangkok');
	$Month = date('m');

	$sql = "select * from business,district,province,amphur where business.district_id = district.DISTRICT_CODE 
	and district.AMPHUR_CODE = amphur.AMPHUR_CODE and amphur.PROVINCE_CODE = province.PROVINCE_CODE and province.PROVINCE_NAME = 'ชลบุรี'";
	$res = mysqli_query($conn,$sql);
?>  


<table border = "0" ALIGN = "center">
<tr>
<td COLSPAN ="3"><center>วิทยาลัยเทคนิคชลบุรี</center></td>
</tr>
<tr>
<td><center>รายงานสรุปข้อมูลสถานประกอบการ</td>
</tr>
</table>
<table border="1">
		<tr>
			<td><center>ลำดับที่</td>
			<td><center>ชื่อสถานประกอบการ</td>
			<td><center>ที่อยู่</td>
			<td><center>เบอร์โทรศัพท์</td>
			<td><center>ชื่อผู้ประสานงาน</td>
			<td><center>หมายเหตุ</td>
		</tr>
		<?php 
			$i = 0;
			while ($row = mysqli_fetch_array($res)) {
		?>
			<tr>
				<td><center><?php echo ++$i?></td>
				<td><?php echo $row["business_name"];?></td>
				<td><?php echo "เลขที่ ".$row["address_no"]." ถนน ".$row["road"]." ตำบล ".$row["DISTRICT_NAME"]." อำเภอ ".$row["AMPHUR_NAME"]." จังหวัด ".$row["PROVINCE_NAME"];?></td>
				<td><center><?php echo $row["contact_phone"];?></td>
				<td></td>
				<td></td>
			</tr>
		<?php }?>
		</table>
		<p style="text-align: right;">วันที่ทำรายงาน วันที่ <?php echo date("d");?> เดือน <?php echo thaiMonth($Month);?> พ.ศ <?php echo date("Y")+543;?></p>
 

</table>
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
ดาวโหลดรายงานในรูปแบบ PDF<?php header('Location: PDF/MyPDF.pdf');?>
