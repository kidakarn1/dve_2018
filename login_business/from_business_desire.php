<?php include("../connect/conn.php");
session_start();
$res = select_business($conn,$_SESSION["username"]);
$row = mysqli_fetch_assoc($res);
$res_minor = select_minor($conn);
$res_education = select_education($conn);
$save = $_POST["save"];
$business_id = $_POST["business_id"];
$minor_id = $_POST["minor_id"];
$edu_id = $_POST["edu_id"];
$number = $_POST["number"];
$description = $_POST["description"];
$vocational = $_POST["vocational"];
$vocational_c1 = $_POST["vehicle_c1"];
$vocational_c2 = $_POST["vehicle_c2"];
$diploma_c1 = $_POST["diploma_c1"];
$diploma_c2 = $_POST["diploma_c2"];
$diploma = $_POST["diploma"];
$tream = $_POST["tream"];


    if ($save == "บันทึก"){
        if ($vocational_c1!=""){
            $sql2 = "insert into business_desire values('','$business_id','$minor_id','2','$vocational','$description','$tream',' $vocational_c1')";
            $res2=mysqli_query($conn,$sql2);
            echo $sql2;
        }
        if ($vocational_c2!=""){
            $sql = "insert into business_desire values('','$business_id','$minor_id','2','$vocational','$description','$tream',' $vocational_c2')";
            $res=mysqli_query($conn,$sql);
            echo $sql;
            echo "<script> alert ('บันทึกข้อมูลสำเร็จ');
                        window.location.href='show_eva_business.php';
                </script>";
        }
        if ($diploma_c1!=""){
            $sql2 = "insert into business_desire values('','$business_id','$minor_id','3','$vocational','$description','$tream','$diploma_c1')";
            $res2=mysqli_query($conn,$sql2);
            echo $sql2;
        }
        if ($diploma_c2!=""){
            $sql = "insert into business_desire values('','$business_id','$minor_id','3','$vocational','$description','$tream',' $diploma_c2')";
            $res=mysqli_query($conn,$sql);
            echo $sql;
            echo "<script> alert ('บันทึกข้อมูลสำเร็จ');
                        window.location.href='show_eva_business.php';
                </script>";
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
        <meta name="author" content="GeeksLabs">
        <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
        <link rel="shortcut icon" href="../img/favicon.png">

        <title>select_department</title>

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
    </head>
	  <?php include '../menu2.php'; ?>

        <section id="main-content">
            <section class="wrapper">
                <!--overview start-->
                <div class="col-lg-12">
                    <h3 class="page-header" style="color: red;"><i style="color: red;" class="icon_key_alt"></i><b>กรุณากรอกข้อมูลความต้องการสถานประกอบการ</b></h3>
                </div>
<form method="post" action=""class="form-horizontal">
<table border="1"class="table">
 <div class="form-group">
 <label class="control-label col-sm-3">สถานประกอบการ</label>
    <div class="col-sm-3">
    <input type="hidden" name="business_id" value="<?php echo $row["business_id"];?>"> <?php echo $row["business_name"];?>
    </div>
	</div>
 <div class="form-group">
 <label class="control-label col-sm-3">สาขาวิชา</label>
  <div class="col-sm-3">  
    <select name="minor_id">
        <?php while ($row_minor = mysqli_fetch_assoc($res_minor)) {?>
            <option value="<?php echo $row_minor["minor_id"]?>"><?php echo $row_minor["minor_name"]?></option>
        <?php }?>    
    </select>
	</div>
	</div>
 <div class="form-group">
 <label class="control-label col-sm-3">   
ระดับปวช.</label> 
<div class="col-sm-4">
    จำนวน<input type="number" name="vocational">  
    <input type="checkbox" name="vehicle_c1" value="2">ทวิภาคี
    <input type="checkbox" name="vehicle_c2" value="1">ปกติ
	</div>
	</div>
<div class="form-group">
 <label class="control-label col-sm-3">     
ระดับปวส.</label> 
<div class="col-sm-4">
   จำนวน<input type="number" name="diploma">
    <input type="checkbox" name="diploma_c1" value="2">ทวิภาคี
    <input type="checkbox" name="diploma_c2" value="1">ปกต
</div>
</div>

 <div class="form-group">
 <label class="control-label col-sm-3">    
รายละเอียด</label> 
<div class="col-sm-4">
        <textarea rows="4" cols="100" name="description"></textarea>
		</div>
		</div>

 <div class="form-group">
 <label class="control-label col-sm-3">   
ภาคเรียนที่ฝึก </label> 
<div class="col-sm-4"> 
    <select name="tream">
            <option value="ภาคเรียนที่1">ภาคเรียนที่1</option>
            <option value="ภาคเรียนที่2">ภาคเรียนที่2</option>
            <option value="ภาคฤดูร้อน">ภาคฤดูร้อน</option>
    </select>
	</div>
	</div>
    
</table>
<div class="text-center">
<input type="submit" name ="save" value="บันทึก"class="btn btn-success">
<center>
</form>
<?php 
    function select_business ($conn,$session_teacher_id){
    $sql="select * from business where business_id = '$session_teacher_id'";
    $res = mysqli_query($conn,$sql);
    return $res;
    }
    function select_minor ($conn){
        $sql="select * from minor";
        $res = mysqli_query($conn,$sql);
        return $res;
    }
    function select_education ($conn){
        $sql="select * from education";
        $res = mysqli_query($conn,$sql);
        return $res;
    }
?>