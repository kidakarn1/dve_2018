<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
        <meta name="author" content="GeeksLabs">
        <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
        <link rel="shortcut icon" href="img/favicon.png">

        <title>select_group</title>

        <!-- Bootstrap CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- bootstrap theme -->
        <link href="css/bootstrap-theme.css" rel="stylesheet">
        <!--external css-->
        <!-- font icon -->
        <link href="css/elegant-icons-style.css" rel="stylesheet" />
        <link href="css/font-awesome.min.css" rel="stylesheet" />
        <!-- full calendar css-->
        <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
        <link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
        <!-- easy pie chart-->
        <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
        <!-- owl carousel -->
        <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
        <link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
        <!-- Custom styles -->
        <link rel="stylesheet" href="css/fullcalendar.css">
        <link href="css/widgets.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet"> 
        <link href="css/style-responsive.css" rel="stylesheet" />
        <link href="css/xcharts.min.css" rel=" stylesheet">
        <link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">
<script src="js/jquery-3.3.1.min.js"></script>
    </head>

  <?php include "menu.php"; ?>
        <section id="main-content">
            <section class="wrapper">
                <!--overview start-->
                <div class="col-lg-12">
                    <h3 class="page-header" style="color: red;"><i style="color: red;" class="icon_star-half_alt"></i><b>สถานนะตอบกลับจากสถานประกอบการ</b></h3>
                </div>
    

	<?php
include("connect/conn.php");
session_start();
$sql_check="select * from student where std_id = '{$_SESSION["username"]}'";
$res_check=mysqli_query($conn,$sql_check);
$row_check=mysqli_fetch_assoc($res_check);
$res_check_std = select_std($conn,$row_check["system_id"],$row_check["citizen_id"]);
// echo "<script> alert ('สถานะ:$res_check_std');
//     window.location.href = 'f_dve.php';
// </script>";

echo "<table border='1'class='table'>

<tr><td><b>ชื่อ-สกุล</b></td><td><b>สถานะ</b></td></tr>
<tr><td><font size='3'>".$_SESSION['staff_name'] . " " . $_SESSION['staff_lname'] ."</font></td><td><font color='green'size='3'>".$res_check_std."</font>";
if ($res_check_std == "อนุมัติสถานประกอบการ"){
    ?>
     |&nbsp;<a id="yinyom" href="staff_new/yinyom/print_yinyom.php?id=<?php echo $row_check["citizen_id"];?>"><font size="3"><input type="submit" value="ปริ้นใบยินยอมผู้ปกครอง"></font></a></td></tr>
<?php
}
?>
<?php
function select_std($conn,$systeam_id,$session_id){
    if ($systeam_id == "1"){
    $sql="select * from training_normal where citizen_id = '$session_id'";
    $res=mysqli_query($conn,$sql);
    $row_check=mysqli_fetch_assoc($res);
    $key= $row_check["normal_status"];
    return $key;
    }
    if ($systeam_id == "2"){
     $sql="select * from training_dve where citizen_id = '$session_id'";
    $res=mysqli_query($conn,$sql);
    $row_check=mysqli_fetch_assoc($res);
    $key= $row_check["training_status"];
    return $key;
        }
}
?>

<script>
    $(document).ready(function(){
        $("#yinyom").click(function(){
            $("body").load("add/pageLoad.php");
        });
    });
</script>