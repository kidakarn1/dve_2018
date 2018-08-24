<!DOCTYPE html>
<html lang="en">
<?php include("../connect/conn.php");
$id=$_GET['id'];
$add=$_POST['add'];

$mou_id=$_POST['mou_id'];
$school_id=$_POST['school_id'];
$business_id=$_POST['business_id'];
$mou_date=$_POST['mou_date'];
$director_name=$_POST['director_name'];
$ceo_name=$_POST['ceo_name'];
$mou_start_date=$_POST['mou_start_date'];
$mou_end_date=$_POST['mou_end_date'];
$mou_sign_place=$_POST['mou_sign_place'];
$studying_plan=$_POST['studying_plan'];
$training_plan=$_POST['training_plan'];
$supervision_plan=$_POST['supervision_plan'];
$major_compatibility=$_POST['major_compatibility'];

        if(isset($add)=="true" && $mou_id!=""){
            $add="insert into mou values('$mou_id','$school_id','$business_id','$mou_date','$director_name','$ceo_name','$mou_start_date','$mou_end_date','$mou_sign_place','$studying_plan','$training_plan','$supervision_plan','$major_compatibility')";
            $res_add=mysqli_query($conn,$add);
            echo "<script> alert ('เพิ่มข้อมูลสำเร็จ');
                     window.location='select_mou.php';
                 </script>";
        }
        else if(isset($add)=="true" && $mou_id==""){
            echo "<script> alert ('ไม่สามารถเพิ่มข้อมูลได้');
                 </script>";
        }
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
               <h3 class="page-header" style="color: red;"><i style="color: red;" class="icon_genius"></i><b>เพิ่มข้อมูล ลงนามความร่วมมือ</b></h3>
           </div>
       
        <form class="form-horizontal" method= "post" action="">

         <div class="table-responsive">
             <table class="table text-center">
            <tr>
                <th class="col-sm-2">รหัสMOU</th>
                <th class="col-sm-5"><input type="text" class=" form-control " name="mou_id"></th><th class="col-sm-2"></th>
            </tr>
            <tr>
                <th>รหัสสถานศึกษา</th>
                <th> <input type="text" class="form-control" name="school_id"></th><th class="col-sm-2"></th>
            </tr>
            <tr>
                <th>รหัสสถานประกอบการ</th>
                <th> <input type="text"class="form-control"  name="business_id"></th><th class="col-sm-2"></th>
            </tr>
			<tr>
                <th>วันที่ลงนามความร่วมมือ</th>
                <th> <input type="date"class="form-control" name="mou_date"></th><th class="col-sm-2"></th>
            </tr>
			<tr>
                <th>ชื่อผู้อำนวยการ</th>
                <th> <input type="text"class="form-control" name="director_name"></th><th class="col-sm-2"></th>
            </tr>
			<tr>
                <th>ชื่อผู้บริหาร</th>
                <th> <input type="text"class="form-control" name="ceo_name"></th><th class="col-sm-2"></th>
            </tr>
			<tr>
                <th>วันที่เริ่มความร่วมมือ</th>
                <th> <input type="date"class="form-control" name="mou_start_date"></th><th class="col-sm-2"></th>
            </tr>
			<tr>
                <th>วันที่สิ้นสุดความร่วมมือ</th>
                <th> <input type="date"class="form-control" name="mou_end_date"></th><th class="col-sm-2"></th>
            </tr>
			<tr>
                <th>สถานที่ลงนามความร่วมมือ</th>
                <th> <input type="text"class="form-control" name="mou_sign_place"></th><th class="col-sm-2"></th>
            </tr>

            <tr>
                <th>แผนการเรียน</th>
                <th><select name="studying_plan"class="form-control">
				<option value="มี">มี</option>
				<option value="ไม่มี">ไม่มี</option>
				</select></th><th class="col-sm-2"></th>
            </tr>

			<tr>
                <th>แผนการฝึกอาชีพ</th>
                <th><select name="training_plan"class="form-control">
				<option value="มี">มี</option>
				<option value="ไม่มี">ไม่มี</option>
				</select></th><th class="col-sm-2"></th>
            </tr>


			<tr>
                <th>แผนการนิเทศ</th>
                <th><select name="supervision_plan"class="form-control">
				<option value="มี">มี</option>
				<option value="ไม่มี">ไม่มี</option>
				</select></th><th class="col-sm-2"></th>
            </tr>

			<tr>
                <th>ฝึกอาชีพตรงกับสาขาที่เรียน</th>
                <th><select name="major_compatibility"class="form-control">
				<option value="ตรง">ตรง</option>
				<option value="ไม่ตรง">ไม่ตรง</option>
				</select></th>
            </tr>

            <tr><th class=" col-sm-3 "></th><th colspan="2"><input type="submit" class="btn btn-md btn-success"name="add" value="บันทึก"></th></tr>
        </table>
        </form>