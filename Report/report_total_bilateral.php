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
	include('../connect/conn.php');
  date_default_timezone_set('asia/bangkok');
  include("function_date.php");
	$dates = date('Y')+543;
	$Month = date('m');
	$date_y = substr($dates,2,2);
	$resDep = get_dep($conn);
	$resDep2 = get_dep($conn);
	$resBus = get_bus($conn);
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
 <body>
	<center>วิทยาลัย <?php echo $rowS["school_name"]?>
	<br>
	รายงานสรุปจำนวนนักเรียนในสถานประกอบการ <br>
	ระหว่างวันที่ <?php echo dateThai($rowNH["start_date"])?> ถึง  <?php echo dateThai($rowNH["end_date"])?>  ภาคเรียนที่<?php echo $rowY["term"]?> ปีการศึกษา  <?php echo $rowY["inter_year"];?>

	</center>

		<table border="1">
			<tr>
				<th rowspan="2">ลำดับ</th>
				<th rowspan="2">ชื่อสถานประกอบการ</th>
				<?php while ($rowDep = mysqli_fetch_array($resDep)) {?>
					<th ><?php echo $rowDep["dep_name"];?></th>
				<?php }?>
			</tr>
			<tr>
				<?php while ($rowDep2 = mysqli_fetch_array($resDep2)) {?>
				<td id="nested">
					  <table id="table2" width="100%" style="text-align: center;">
						<tr>
						  <td>ช2</td>
						  <td style="border-left: 1px solid black;">ช3</td>
						  <td style="border-left: 1px solid black;">ส1</td>
						  <td style="border-left: 1px solid black;">ส2</td>
						</tr>
					  </table>
				</td>
			  <?php }?>
			</tr>
			<?php $i = 1; while ($rowBus = mysqli_fetch_array($resBus)) {
				$resDep3 = get_dep($conn);
				$business_id = $rowBus["business_id"];
			?>
			<tr>
				<td><?php echo $i++ ?></td>
				  <td><?php echo $rowBus["business_name"];?></td>
				<?php while ($rowDep3 = mysqli_fetch_array($resDep3)) {
				$dep_id = $rowDep3["dep_id"];
					$edu_3_1 = 0;
					$edu_3_0 = 0;
					$edu_2_1 = 0;
					$edu_2_2 = 0;

				$sqlCount = "select * from business,training_dve,student where business.business_id = training_dve.business_id 
				and training_dve.citizen_id = student.citizen_id
        and student.dep_id = '$dep_id' 
        and training_dve.training_status != 'เสร็จสิ้นการฝึก'
				and business.business_id = '$business_id'
				";
				$resCount = mysqli_query($conn,$sqlCount);
				while ($rowConnt = mysqli_fetch_array($resCount)) {
					$edu = substr($rowConnt["std_id"],2,1);
					$std_y = substr($rowConnt["std_id"],0,2);
					if ($edu == 3 ) {
						if ($date_y-$std_y >= 1) {
							$edu_3_1 = $edu_3_1+1;
						} 
						if ($date_y-$std_y < 1) {
							$edu_3_0 = $edu_3_2+1;
						}
					}
					if ($edu ==2 ) {
						if ($date_y-$std_y >= 1) {
							$edu_2_1 = $edu_2_1+1;
						} 
						if ($date_y-$std_y > 1) {
							$edu_2_2 = $edu_2_2+1;
						}
					}
						
					}
				?>
					<td id="nested">
					  <table id="table2" width="100%" style=" text-align: center;">
						<tr>
								  <td><?php echo $edu_2_1?></td>
								  <td><?php echo $edu_2_2?></td>
								  <td><?php echo $edu_3_0?></td>
								  <td><?php echo $edu_3_1?></td>
						</tr>
					  </table>
				</td>
			<?php }?>
			</tr>
			<?php }?>
		</table>
		<p style="text-align: right;">วันที่ทำรายงาน วันที่ <?php echo date("d");?> เดือน <?php echo thaiMonth($Month);?> พ.ศ <?php echo date("Y")+543;?></p>
 </body>
</html>
<?php
	function get_dep($conn) {
		$sql = "select * from department";
		$res = mysqli_query($conn,$sql);
		return $res;
	}
	function get_bus($conn) {
		$sql = "select * from business,training_dve,student where business.business_id = training_dve.business_id 
    and training_dve.citizen_id = student.citizen_id
    and training_dve.training_status != 'เสร็จสิ้นการฝึก'
		group by training_dve.business_id";
		$res = mysqli_query($conn,$sql);
		return $res;
	}
?>
