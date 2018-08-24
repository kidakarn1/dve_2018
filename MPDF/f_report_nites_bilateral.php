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
	include ("../connect/conn.php");
	date_default_timezone_set('asia/bangkok');
	$Month = date('m');

	$sqlN = "select * from teacher,nites_bilateral where nites_bilateral.teacher_id = teacher.teacher_id";
	$resN = mysqli_query($conn,$sqlN);
  ?>
 </head>
 <body>
	<table border="1">
		<tr>
			<th>ลำดับที่</th>
			<th colspan="2">ชื่อครูนิเทศ</th>
		</tr>
		<?php 
			$i = 0;
			while ($rowN = mysqli_fetch_array($resN)) {
				?>
			<tr>
				<td><?php echo ++$i?></td>
				<td><?php echo $rowN["teacher_name"];?></td>
				<td><a href="report_nites_bilateral.php?teacher_id=<?php echo $rowN["teacher_id"];?>">รายงาน</a></td>
			</tr>
		<?php 
			} 
		?>
		</table>
 </body>
</html>
<?php
	function thaiMonth($index) {
		$thai_month_arr=array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"                 
		);
		return $thai_month_arr[$index];
	}
?>
