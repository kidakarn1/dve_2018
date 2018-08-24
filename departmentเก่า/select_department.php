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

    </head>
    <body>
        <?php include '../menu2.php'; ?>
        <section id="main-content">
            <section class="wrapper">
                <!--overview start-->

                <div class="col-lg-12">
                    <h3 class="page-header" style="color: red;"><i style="color: red;" class="fa fa-laptop"></i>แผนก</h3>

                </div>
                <table class='table text-center'>
                    <tr>
                        <td>รหัสประเภทวิชา</td>
                        <td>ชื่อประเภทวิชา</td>
						<td>ชื่อหัวหน้าแผนก</td>
                        <td><a href='department.php' class="btn btn-xs btn-primary"><i class="icon_plus_alt2"></i></a></td>

                    </tr>
                    <?php
                    include("../connect/conn.php");
     
$sql="select * from department,teacher where department.teacher_id = teacher.teacher_id";
$res = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_assoc($res)) {
                        ?>
                        <tr>
                            <td><?php echo $row['dep_id'] ?></td>
                            <td><?php echo $row['dep_name'] ?></td>
							<td><?php echo $row['teacher_name'] ?></td>
                            <td>
                                <a class="btn btn-xs btn-warning" href="fromedit_department_admin.php?dep_id=<?php echo $row['dep_id'] ?>"><span class="icon_target"></span></a>
                                <a class="btn btn-xs btn-danger" href="del_department_admin.php?id=<?php echo $row['dep_id'] ?>" onclick="return confirm('คุณต้องการลบข้อมูลใช่หรือไม่?');"><i class="icon_close_alt2"></i></a>
                            </td>

                        </tr>
                    <?php } ?>
                </table>
            </section>
        </section>
    </body>
</html>