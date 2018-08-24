<!DOCTYPE html>
<html lang="en">
<?php include("../connect/conn.php");?>
<?php
$serch=$_POST['serch'];
    if(isset($serch)=="true"){
        $sql="select * from mou where mou_id like '%$serch%' or mou_sign_place like '%$serch%'";
    }
    else{
        $sql="select * from mou";
    }
        $res=mysqli_query($conn,$sql);
?>


    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
        <meta name="author" content="GeeksLabs">
        <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
        <link rel="shortcut icon" href="../img/favicon.png">

        <title>show_user_type</title>

        <!-- Bootstrap CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <!-- bootstrap theme -->
        <link href="../css/bootstrap-theme.css" rel="stylesheet">
        <!--external css-->
        <!-- font icon -->
        <link href="../css/elegant-icons-style.css" rel="stylesheet" />
        <link href="../css/font-awesome.min.css" rel="stylesheet" />
        <!-- full calendar css-->
        <link href="../assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
        <link href="../assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
        <!-- easy pie chart-->
        <link href="../assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
        <!-- owl carousel -->
        <link rel="stylesheet" href="../css/owl.carousel.css" type="text/css">
        <link href="../css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
        <!-- Custom styles -->
        <link rel="stylesheet" href="../css/fullcalendar.css">
        <link href="../css/widgets.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet"> 
        <link href="../css/style-responsive.css" rel="stylesheet" />
        <link href="../css/xcharts.min.css" rel=" stylesheet">
        <link href="../css/jquery-ui-1.10.4.min.css" rel="stylesheet">

        <script src="../jquery/jquery.min.js"></script>
        <script src="../jquery-easing/jquery.easing.min.js"></script> 
    </head>
<?php include '../menu2.php'; ?>
     <section id="main-content">
     <section class="wrapper">
        <div class="col-sm-12">
           <div class="col-sm-6">
               <h3 class="page-header" style="color: red;"><i style="color: red;" class="icon_genius"></i><b>ลงนามความร่วมมือ</b></h3>
           </div>
	<form method="post" action="">
	  <div class="form-group">
         <div class="col-sm-offset-2 col-sm-3 col-xs-9">
          <input type="text" class="form-control" name="serch">
		 </div>
		<input type="submit"class="btn btn-md btn-success" value="serch">
	   </div>
    </form>
   </div>

<!-- <a href="from_insert_mou.php">เพิ่มข้อมูล</a> -->

 <div class="table-responsive">
   <table class="table text-center">
        <td>ลำดับ</td>
        <td>รหัส MOU</td>
        <td>รหัสสถานศึกษา</td>
        <td>รหัสสถานประกอบการ</td>
		<td>วันที่ลงนามความร่วมมือ</td>
		<td>ชื่อผู้อำนวยการ</td>
		<td>ชื่อผู้บริหาร</td>
		<td>วันที่เริ่มความร่วมมือ</td>
		<td>วันที่สิ้นสุดความร่วมมือ</td>
		<td>สถานที่ลงนามความร่วมมือ</td>
		<!-- <td>แผนการเรียน</td> -->
		<!-- <td>แผนการฝึกอาชีพ</td> -->
		<!-- <td>แผนการนิเทศ</td> -->
		<!-- <td>ฝึกอาชีพตรงกับสาขาที่เรียน</td> -->
		 <td colspan="2"><a class="btn btn-xs btn-primary" href="from_insert_mou.php"><i class="icon_plus_alt2"></i></a></td>
    </tr>
<?php
    $i=1;
    while ($row=mysqli_fetch_assoc($res)){?>
    <tr>
        <th><?php echo $i;?></th>
        <th><?php echo $row["mou_id"];?></th>
        <th><?php echo $row["school_id"];?></th>
        <th><?php echo $row["business_id"];?></th>
		<th><?php echo $row["mou_date"];?></th>
		<th><?php echo $row["director_name"];?></th>
		<th><?php echo $row["ceo_name"];?></th>
		<th><?php echo $row["mou_start_date"];?></th>
		<th><?php echo $row["mou_end_date"];?></th>
		<th><?php echo $row["mou_sign_place"];?></th>
		<!-- <th><?php echo $row["studying_plan"];?></th>-->
		<!--<th><?php echo $row["training_plan"];?></th>-->
		<!--<th><?php echo $row["supervision_plan"];?></th>-->
		<!--<th><?php echo $row["major_compatibility"];?></th>-->

        <th><a href="form_update_mou.php?id=<?php echo $row["mou_id"];?>"class='btn btn-xs btn-warning'><span class="icon_target"></span></a></th>
        <th><a href="del_mou.php?id=<?php echo $row["mou_id"];?>"onclick="return confirm('คุณแน่ใจหรือไม่ว่าจะลบข้อมูล?');"class='btn btn-xs btn-danger'><i class="icon_close_alt2"></i></a></th>
    </tr>    
 <?php $i++;}?>
</table>
