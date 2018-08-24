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

    <body>
        <?php include '../menu2.php'; ?>
        <?php
        include("../connect/conn.php");
        $business_id = $_POST['business_id'];
        $sql = "select * from normal,student,minor where normal.business_id = '$business_id' and normal.citizen_id = student.citizen_id and student.minor_id = minor.minor_id";
        $res = mysqli_query($conn, $sql);
        ?>
        ระบบปกติ
        <section id="main-content">
            <section class="wrapper">
                <!--overview start-->
                <div class="col-lg-12">
                    <h3 class="page-header" style="color: red;"><i style="color: red;" class="fa fa-laptop"></i><b>นักศึกษาระบบทปกติ</b></h3>
                </div>
				<?php 		echo $business_id;?>
                <div class="table-responsive">
                    <table class="table text-center">
                        <tr>
                            <td>รหัสนักศึกษา</td>
                            <td>คำนำหน้า</td>
                            <td>ชื่อ</td>
                            <td>นามสกุล</td>
                            <td>เบอร์โทรศัพท์</td>
                            <td>สาขางาน</td>
                        </tr>
                        <?php while ($row = mysqli_fetch_assoc($res)) { ?>
                            <tr>
                                <td><?php echo $row['std_id']; ?></td>
                                <td><?php echo $row['head_name_std']; ?></td>
                                <td><?php echo $row['std_name']; ?></td>
                                <td><?php echo $row['std_lastname']; ?></td>
                                <td><?php echo $row['phone']; ?></td>
                                <td><?php echo $row['minor_name']; ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </section>
       </section>
    </body>
</html>