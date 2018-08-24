<?php include("../../connect/conn.php");
ini_set('max_execution_time', 600); //300 seconds = 5 minutes
@SESSION_START();
$citizen_id=$_GET['id'];
$edu_id_pvc=$_POST['edu_id_pvc'];
$groups=$_POST['groups'];
$date_start=$_POST['date_start'];
$date_end=$_POST['date_end'];
$name_parent=$_POST['name_parent'];
$parent_lastname=$_POST['parent_lname'];

$date=explode("-",$date_start);
$date_1=explode("-",$date_end);
$date_start_sum=$date[2]."-".$date[1]."-".$date[0];
$date_end_sum=$date_1[2]."-".$date_1[1]."-".$date_1[0];

$parent_name=$_POST['parent_name'];
$std_name=$_POST['std_name'];
$name_name=$_POST['name_name'];
$name_payan=$_POST['fname_payan'];
$fname_payan=$_POST['fname_payan'];
$lname_payan=$_POST['lname_payan'];
$sql="select * from student,education,department,school where 
student.citizen_id='1369900406953'
and student.edu_id = education.edu_id
and student.dep_id = department.dep_id
";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($res);
$sql1="select * from student,district,amphur,province where 
student.citizen_id='$citizen_id' and 
student.district=district.DISTRICT_CODE and 
district.AMPHUR_CODE=amphur.AMPHUR_CODE and
amphur.PROVINCE_CODE=province.PROVINCE_CODE";
$res1=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_assoc($res1);

$sql2="select * from normal,business where normal.citizen_id='$citizen_id'
and normal.business_id = business.business_id";
$res2=mysqli_query($conn,$sql2);
$row2=mysqli_fetch_assoc($res2);

date_default_timezone_set('asia/bangkok');
//
$year_start=substr($_SESSION['date_start'],0,4);
            $mouth_start=substr($_SESSION['date_start'],5,2);
            $day_start=substr($_SESSION['date_start'],8,7);
            $year_start=$year_start+543;

           $year_end=substr($_SESSION['date_end'],0,4);
           $mouth_end=substr($_SESSION['date_end'],5,2);
           $day_end=substr($_SESSION['date_end'],8,7);
           $year_endd=$year_end+543;
//
$day=date("d");
$year=date("Y")+543;
$year1=$date[0]+543;
$year_end=$date_1[0]+543;
$month=date("m");
$date[1]."-".$date[0]."<br>";
$date_1[1]."-".$date_1[0];
$number2 = array('01' => 'มกราคม',
				'02' => 'กุมภาพันธ์',
				'03' => 'มีนาคม',
				'04' => 'เมษายน',
				'05' => 'พฤษภาคม',
				'06' => 'มิถุนายน',
				'07' => 'กรกฎาคม',
				'08' => 'สิงหาคม',
				'09' => 'กันยายน',
				'10' => 'ตุลาคม',
				'11' => 'พฤศจิกายน',
				'12' => 'ธันวาคม',
				);
$number2[$month];
$mouth_number=$date[1];
$number2[$mouth_number];
$mouth_number_end=$date_1[1];
$number2[$mouth_number_end];
$mouth_start=$number2[$mouth_start];
$mouth_end=$number2[$mouth_end];
$date_1[$month];

$date_end=$date_1[1];

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Resi Bootstrap Template</title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/responsive-slider.css" rel="stylesheet">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link href="css/style.css" rel="stylesheet">	
    
    </head>
    <body>
        <!--<header>
                    <div class="container">
                        <div class="row">
                            <nav class="navbar navbar-default" role="navigation">
                                <div class="container-fluid">
                                    <div class="navbar-header">
                                        <div class="navbar-brand">
                                            <a href="index.html"><h1>Resi</h1></a>
                                        </div>
                                    </div>
                                    <div class="menu">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="index.html">Home</a></li>
                                            <li role="presentation"><a href="dve01.php">DVE01</a></li>
                                            <li role="presentation"><a href="dve03.php">DVE03</a></li>
                                            <li role="presentation"><a href="yinyom.php">หนังสือยินยอม</a></li>
                                            <li role="presentation"><a href="book.php">หนังสือแจ้งการฝึกงาน</a></li>
                                            <li role="presentation"><a href="book2.php">หนังสืออนุญาตการฝึกงาน</a></li>	
        
                                        </ul>
                                    </div>
                                </div>			
                            </nav>
                        </div>
                    </div>
                </header>-->


        <table align="center">
            <tr>
                <td>

            <center><h3>วิทยาลัยเทคนิคชลบุรี</h3></center>															
            <center><h3>หนังสือยินยอมผู้ปกครอง</h3></center>																		

            <center><?php echo "วันที่"." ".$day." ".$number2[$month]." ".$year;//เดือนภาษาไทย?></center>							

            <p class="text-justify">
               <center> ข้าพเจ้า	<?php echo $row['head_name_std']." ".$row['std_name']." ";?>	เป็นผู้ปกครองของ	<?php echo $row['head_name_std']." ".$row['std_name']." ".$row['std_lastname'];?>	

                <br>ระดับชั้นประกาศนียบัตรวิชาชีพ<?php if ($row['edu_name']=="ปวส"){echo "ชั้นสูง";}?><?php echo "(".$row['edu_name'].")";?>	แผนกช่าง <?php echo $row['dep_name']?><br>สาขาวิชาช่าง<?php echo $row['minor_name']?>	รหัส	<?php echo $row['std_id']?>	
                อยู่บ้านเลขที่ <?php echo $row1['address_number']?>		หมู่ที่	<?php echo $row1['moo']?>	ซอย <?php echo $row1['soi']?> ถนน<?php echo $row1['road']?><br>ตำบล<?php echo $row1['DISTRICT_NAME']?>	อำเภอ<?php echo $row1['AMPHUR_NAME']?>			
                จังหวัด		<?php echo $row1['PROVINCE_NAME']?>ยินยอมให้<?php echo $row['head_name_std']." ".$row['std_name']." ".$row['std_lastname'];?><br>ออกฝึกงาน ณ บริษัท  <?php echo $row2['business_name']?>และยินยอมให้
                เจ้าหน้าที่ของสถานประกอบการ มีอำนาจหน้าที่ในการ<br>ควบคุมดูแล แนะนำ<?php echo $row['head_name_std']." ".$row['std_name']." ".$row['std_lastname'];?>	
                ในระหว่างที่ฝึกทั้งในเรื่องระเบียบปฏิบัติงานและความปลอดภัย<br>ในการทำงาน																		
                ในการฝึกดังกล่าว ถ้า	<?php echo $row['head_name_std']." ".$row['std_name']." ".$row['std_lastname'];?>							ทำเครื่องมือหรืออุปกรณ์	
                ของสถานประกอบการ<br>เสียหายโดยเจตนา  ข้าพเจ้า<?php echo $row['head_name_std']." ".$row['std_name']." ".$row['std_lastname'];?>			
                ยินยอมชดใช้ค่าเสียหายต่าง ๆ ให้สถานประกอบการนั้น<br>ตามราคาที่เหมาะสม 																		ในการฝึกงานในครั้งนี้ถ้า	<?php echo $row['head_name_std']." ".$row['std_name']." ".$row['std_lastname'];?>ได้รับอุบัติเหตุหรือภัยอันตรายใดๆ <br>เนื่องจากการฝึกซึ่งอาจ	
                เกิดจากเหตุสุดวิสัย ประมาท หรือในกรณีอื่น ๆ 																		ข้าพเจ้าจะไม่ดำเนินคดีต่อทางวิทยาลัย<br>และสถานประกอบการ	
                ในการฝึกงานครั้งนี้ตั้งแต่วันที่<?php echo $day_start." ".$mouth_start." ".$year_start?> ถึง 
				<?php echo $day_end." ".$mouth_end." ".$year_endd?>								
                <br>นักศึกษาขาดงานเกิน 4 วัน จะไม่ผ่านการฝึกงานครั้งนี้  ข้าพเจ้ายินยอมปฏิบัติตามข้อตกลงนี้	<br><br>																
                
           ลงชื่อ...................................................ผู้ปกครอง
            <center>( <?php echo $row['head_parent_name']." ".$row['parent_name']." ".$row['parent_lname'];?> )</center>				

            ลงชื่อ......................................................ผู้ฝึกงาน		
            <center> ( <?php echo " ".$row['head_name_std']?><?php echo $row['std_name'];?>
			<?php echo $row['std_lastname']?> )	</center>				

            ลงชื่อ..........................................................พยาน	
            <center>( <?php echo $row['deputy_plan']." "?> )</center>			
            <center>หัวหน้างานอาชีวศึกษาระบบทวิภาคี</center>	
        </td>

    </tr>
</table>
</center>



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-2.1.1.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="js/responsive-slider.js"></script>
<script src="js/wow.min.js"></script>
<script>
    wow = new WOW(
            {

            })
            .init();
</script>
</body>
</html>






















