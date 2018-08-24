
<?php
include("../connect/conn.php");
		$type_name= $_POST['type_name'];
		$type_eng= $_POST['type_eng'];
 $sql="insert into edu_type value('0','$type_name','$type_eng')";
if ($res1=mysqli_query($conn,$sql)){
echo"บันทึกสำเร็จ";
}
else{
	echo"บันทึกไม่สำเร็จ";
}
header("refresh: 1; show.php");

?>