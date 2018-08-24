<?php
include("connect/conn.php");
session_start();
$res_business = select_business($conn);
$business_id = $_POST["business_id"];
$Num_Rows=select_count($conn);
$serch = $_POST["serch"];
echo $s_limit = $_REQUEST["s"];
echo $e_limit_mk = $_REQUEST["e"];
echo $pages = $_REQUEST["page"];
$tob="ตอบรับจากสถานประกอบการ";
$Per_Page = 10;   // จำนวนข้อมูลต้องการโชว์ ตึ๋งเอง 
$Page = $_GET["Page"];
if(!$_GET["Page"])
{
	$Page=1;
}
$Prev_Page = $Page-1;
$Next_Page = $Page+1;
$Page_Start = (($Per_Page*$Page)-$Per_Page);
if($Num_Rows<=$Per_Page)
{
	$Num_Pages =1;
}
else if(($Num_Rows % $Per_Page)==0)
{
	$Num_Pages =($Num_Rows/$Per_Page) ;
}
else
{
	$Num_Pages =($Num_Rows/$Per_Page)+1;
	$Num_Pages = (int)$Num_Pages;
}

$sql2 = "select * from business,training_normal,student where training_normal.citizen_id = student.citizen_id and  normal_status = '{$tob}' and training_normal.business_id = business.business_id and (student.std_id like '%$serch%' or student.std_name like '%$serch%' or  business.business_name like '%$serch%' ) limit  $Page_Start , $Per_Page";
$res2=mysqli_query($conn,$sql2);
?>
<h2><a href="reply _to_approval.php">ระบบปกติ</a> | <a href="reply _to_approval_dve.php">ระบบทวิภาคี</a></h2>
<form method="post" action="">
        <input type="text" name="serch">
        <input type="submit" value="ค้นหา">
</form>
<table border="1">
    <tr>
        <th>ลำดับ</th>
        <th>รหัสนักศึกษา</th>
        <th>ชื่อ นามสกุล นักศึกษา</th>
        <th>ชื่อสถานประกอบการ</th>
        <th>ตอบรับแล้ว</th>
    </tr>
    <?php $i=1;while ($row2 = mysqli_fetch_assoc($res2)){?>
    <tr>
        <th><?php echo $i;?></th>
        <th><?php echo $row2["std_id"]?></th>
        <th><?php echo $row2["std_name"]?></th>
        <th><?php echo $row2["business_name"]?></th>
        <th><?php echo $row2["normal_status"]?></th>
    </tr>
    <?php
    $i++;}?>
</table>
<br>
ข้อมูลทั้งหมด <?= $Num_Rows;?>  หน้า :
<?php
if($Prev_Page)
{
	echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page'><< ก่อนหน้า</a> ";
}

for($i=1; $i<=$Num_Pages; $i++){
	if($i != $Page)
	{
		echo "[ <a href='$_SERVER[SCRIPT_NAME]?Page=$i'>$i</a> ]";
	}
	else
	{
		echo "<b> $i </b>";
	}
}
if($Page!=$Num_Pages)
{
	echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page'>หน้าต่อไป>></a> ";
}
?>
</body>
</html>
<?php
function select_business($conn){
        $sql = "select * from business";
        $res = mysqli_query($conn,$sql);
        return $res;
}
function select_count ($conn){
        $sql = "select * from business_desire";
        $res = mysqli_query($conn,$sql);
        $row = mysqli_num_rows($res);
        return $row;
}
?>