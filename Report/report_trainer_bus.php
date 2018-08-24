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

	$sqlN = "select * from business,trainer
	where trainer.business_id = business.business_id 
	";
	$resN = mysqli_query($conn,$sqlN);

	$sqlS = "select * from school";
	$resS = mysqli_query($conn,$sqlS);
  $rowS = mysqli_fetch_array($resS);

  $sqlS = "select * from school";
	$resS = mysqli_query($conn,$sqlS);
  $rowS = mysqli_fetch_array($resS);
  
  $year = date("Ymd");
  $sqlY = "select * from training_plan where start_date <= '$year'";
  $resY = mysqli_query($conn,$sqlY);
  $rowY = mysqli_fetch_array($resY);
  ?>
 </head>
 <body>
 <table align = "center">
 <tr>
 <td>
	<center><h2>
	<center>วิทยาลัย <?php echo $rowS["school_name"]?>
	<br>
	รายงานข้อมูลครูฝึก
  ภาคเรียนที่ <?php echo $rowY["term"]?> ปีการศึกษา  <?php echo $rowY["inter_year"];?>
  </center></h2>
	</td>
	</tr>
	</table>
	<br>
	<br>
	<table border="1" align = "center">
		<tr>
			<th>ลำดับที่</th>
			<th>ชื่อครูฝึก</th>
			<th>ชื่อสถานประกอบการ</th>
			<th>หมายเหตุ</th>
		</tr>
		<?php 
			$i = 0;
			while ($rowN = mysqli_fetch_array($resN)) {
				?>
			<tr>
				<td><center><?php echo ++$i?></center></td>
				<td><?php echo $rowN["trainer_name"];?></td>
				<td><?php echo $rowN["business_name"];?></td>
				<td></td>
			</tr>
		<?php 
			} 
		?>
		</table>
		<p style="text-align: right;">วันที่ทำรายงาน วันที่ <?php echo date("d");?> เดือน <?php echo thaiMonth($Month);?> พ.ศ <?php echo date("Y")+543;?></p>
 </body>
</html>
