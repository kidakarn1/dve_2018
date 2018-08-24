<?php include("../../connect/conn.php");
$sql="select * from normal";
$res=mysqli_query($conn,$sql);
?>
<table border="1">
<tr>
	<th>ลำดับ</th>
	<th>รหัสนักศึกษา</th>
	<th>ชื่อสถานศึกษา</th>
	<th>วันที่ทำสัญญา</th>
	<th>วันที่ออกฝึกงาน</th>
	<th>วันที่ออกฝึกงานจบ</th>
	<th>เทอม</th>
	<th>ปี</th>
	<th>ปริ้น</th>
</tr>
<?php while($row=mysqli_fetch_assoc($res)){
?>
<tr>
	<th><?php echo $row['n_id']?></th>
	<th><?php echo $row['std_id']?></th>
	<th><?php echo $row['business_id']?></th>
	<th><?php echo $row['contract_date']?></th>
	<th><?php echo $row['internship_date']?></th>
	<th><?php echo $row['internship_date_end']?></th>
	<th><?php echo $row['semester']?></th>
	<th><?php echo $row['year']?></th>
	<th><a href="print_dve2.php?id=<?php echo $row['std_id'];?>&business_id=<?php echo $row['business_id']?>">ปริ้น</th>
</tr>
<?php }?>
</table>