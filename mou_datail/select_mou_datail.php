<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="Generator" content="EditPlus®">
        <meta name="Author" content="">
        <meta name="Keywords" content="">
        <meta name="Description" content="">
        <script src="../jquery/jquery.min.js"></script>
        <script src="../jquery-easing/jquery.easing.min.js"></script>
        <!DOCTYPE html>
    <html lang="en">

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
<?php include("../connect/conn.php");?>
<?php
$serch=$_POST['serch'];
    if(isset($serch)=="true"){
        $sql="select * from mou_detail,major,business,mou where mou_detail.mou_detail_id like '%$serch%' 
        and mou_detail.major_id = major.major_id 
        and mou_detail.mou_id = mou.mou_id
        and mou.business_id = business.business_id";
    }
    else{
        $sql="select * from mou_detail,major,business,mou where mou_detail.major_id = major.major_id 
        and mou_detail.mou_id = mou.mou_id
        and mou.business_id = business.business_id";
    }
        $res=mysqli_query($conn,$sql);
?>
<?php include '../menu2.php'; ?>
            <section id="main-content">
                <section class="wrapper">
                    <div class="col-sm-12">
                        <div class="col-sm-6">
                            <h3 class="page-header" style="color: red;"><i style="color: red;" class="fa fa-edit"></i><b>รหัสรายละเอียด MOU</b></h3>
                        </div>
<form class="form-horizontal" method="post" action="">
<div class="form-group">
                                <div class="col-sm-offset-2 col-sm-3 col-xs-9">
    <input class="form-control" type="text" name="serch">
    </div>
    <input class="btn btn-md btn-success" type="submit" value="serch">
    </div>
</form>

<div class="table-responsive">
<table class="table text-center">
    <tr>
        <td>ลำดับ</td>
        <td>mou</td>
        <td>ระดับที่ทำmou</td>
        <td>สาขาวิชา</td>
        <td colspan="2"><a class="btn btn-xs btn-primary" href="from_insert.php"><i class="icon_plus_alt2"></a></td>
    </tr>
<?php
    $i=1;
    while ($row=mysqli_fetch_assoc($res)){?>
    <tr>
        <td><?php echo $row["mou_detail_id"];?></td>
        <td><?php echo $row["business_name"];?></td>
        <td><?php echo $row["level"];?></td>
        <td><?php echo $row["major_name"];?></td>
        <td><a class='btn btn-xs btn-warning' href="form_update.php?id=<?php echo $row["mou_detail_id"];?>&mou=<?php echo $row["business_id"];?>&major_id=<?php echo $row["major_id"];?>"><span class="icon_target"></a>
        <a class='btn btn-xs btn-danger' href="del.php?id=<?php echo $row["mou_detail_id"];?>"onclick="return confirm('คุณแน่ใจหรือไม่ว่าจะลบข้อมูล?');"><i class="icon_close_alt2"></i></a></td>
    </tr>    
 <?php $i++;}?>
</table>

        </body>
    </html>

