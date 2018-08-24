<?php
include("../../connect/conn.php");
@SESSION_START();
$_SESSION['date_start']=$date_start=$_POST['date_start'];
$_SESSION['date_end']=$date_end=$_POST['date_end'];
$connect=$conn;
$res_yinyom=select_yinyom($connect);
?>
<table border="0">
<tr>
   <th><a href="select_yinyom.php">หนังสือยินยอมปกติ(ฝึกงาน)</a> |</th>
   <th><a href="select_yiyom_bilateral.php">หนังสือยินยอมทวิภาคี(ฝึกอาชีพ)</a></th>
</tr>
</table>
<table border="1">
    <tr>
        <th>ลำดับ</th>
        <th>ชื่อ-สกุล</th>
        <th>แผนก</th>
        <th>สถานประกอบการ</th>
        <th>ปริ้น</th>
    </tr>
    <?php while ($row_yinyom=mysqli_fetch_assoc($res_yinyom)){?>
    <tr>
    <th><?php echo $row_yinyom["training_id"]?></th>
    <th><?php echo $row_yinyom["head_name_std"]." ".$row_yinyom["std_name"]." "?></th>
    <th><?php echo $row_yinyom["dep_name"]?></th>
    <th><?php echo $row_yinyom["business_name"]?></th>
    <th><a href="print_yinyom.php?id=<?php echo $row_yinyom["citizen_id"]?>">ปริ้น</a></th>
    </tr>
    <?php } ?>
</table>
<?php function select_yinyom($connect){
$sql="select * from  training,student,department,business where training_status = 'อนุมัติสถานประกอบการ' and training.citizen_id = student.citizen_id and student.dep_id = department.dep_id and training.business_id = business.business_id";
$res=mysqli_query($connect,$sql);
return $res;
}?>