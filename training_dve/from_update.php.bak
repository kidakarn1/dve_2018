<!DOCTYPE html>
<html lang="en">
<?php include("../connect/conn.php");
$id=$_GET['id'];
$update=$_POST['update'];
$training_id=$_POST['training_id'];
$citizen_id=$_POST['citizen_id'];
$business_id=$_POST['business_id'];
$minor_id=$_POST['minor_id'];
$trainer_id=$_POST['trainer_id'];
$teacher_id=$_POST['teacher_id'];
$contract_date=$_POST['contract_date'];
$start_date=$_POST['start_date'];
$end_date=$_POST['end_date'];
$training_status=$_POST['training_status'];
        if(isset($update)=="true"){
            $update="update training_dve set citizen_id='$citizen_id',business_id='$business_id',minor_id='$minor_id',trainer_id='$trainer_id',teacher_id='$teacher_id',contract_date='$contract_date',start_date='$start_date',end_date='$end_date',training_status='$training_status' where training_id ='$training_id'";
            $res_update=mysqli_query($conn,$update);
            echo "<script> alert ('แก้ไขข้อมูลสำเร็จ');
                     window.location='select_training_dve.php';
                 </script>";
        }
        if(isset($id)=="true"){
                $sql="select * from training_dve where training_id = '{$id}'";
                $res=mysqli_query($conn,$sql);
                $row=mysqli_fetch_assoc($res);
    ?>

	<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
        <meta name="author" content="GeeksLabs">
        <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
        <link rel="shortcut icon" href="../img/favicon.png">

        <title></title>

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
               <h3 class="page-header" style="color: red;"><i style="color: red;" class="icon_genius"></i><b>แก้ไขข้อมูลการฝึกอาชีพ</b></h3>
           </div>


        <form class="form-horizontal" method= "post" action="">
            <input type="hidden" name="training_id" value="<?php echo $row["training_id"];?>">

       <div class="table-responsive">
             <table class="table text-center">
            <tr>
                 <th class="col-sm-2">รหัสการฝึกอาชีพ</th>
                <th class="col-sm-5"><?php echo $row["training_id"];?></th><th class="col-sm-2"></th>
            </tr>
            <tr>
                <th>id ประชาชน นักเรียน</th>
                <th> <input type="text" name="citizen_id"class=" form-control"value="<?php echo $row["citizen_id"];?>"></th>
            </tr>
            <tr>
                <th>รหัสสถานประกอบการ</th>
                <th> <input type="text" name="business_id"class=" form-control"value="<?php echo $row["business_id"];?>"></th>
            </tr>
	            <tr>
                <th>รหัสสาขางาน</th>
                <th> <input type="text" name="minor_id"class=" form-control"value="<?php echo $row["minor_id"];?>"></th>
            </tr>
            <tr>
                <th>รหัสครูฝึก</th>
                <th> <input type="text" name="trainer_id"class=" form-control"value="<?php echo $row["trainer_id"];?>"></th>
            </tr>
			<tr>
                <th>รหัสครู</th>
                <th> <input type="text" name="teacher_id"class=" form-control"value="<?php echo $row["teacher_id"];?>"></th>
            </tr>
            <tr>
                <th>วันที่ทำสัญญา</th>
                <th> <input type="date" name="contract_date"class=" form-control"value="<?php echo $row["contract_date"];?>"></th>
            </tr>
            <tr>
                <th>วันที่เริมต้นการฝึก</th>
                <th> <input type="date" name="start_date"class=" form-control"value="<?php echo $row["start_date"];?>"></th>
            </tr>
            <tr>
                <th>วันที่สิ้นสุดการฝึก</th>
                <th> <input type="date" name="end_date"class=" form-control"value="<?php echo $row["end_date"];?>"></th>
            </tr>
            <tr>
                <th>สถานะการฝึก</th>
				<th><select name="training_status"class=" form-control">
					<option value="อนุมัติสถานประกอบการ" selected>อนุมัติสถานประกอบการ
					<option value="กำลังฝึก">กำลังฝึก
					<option value="เสร็จสิ้นการฝึก">เสร็จสิ้นการฝึก
					<option value="พักการเรียน">พักการเรียน
					<option value="เปลี่ยนสถาณประกอบการ">เปลี่ยนสถาณประกอบการ
					<option value="อื่นๆ">อื่นๆ</th>
				</select>
            </tr>
            <tr><th class=" col-sm-3 "></th><th colspan="2"><input type="submit"class='btn btn-md btn-warning' name="update" value="แก้ไข"></th></tr>
        </table>
        </form>
<?php
    }
?>