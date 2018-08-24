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
    <?php include("../Translate.php"); ?>
    <body>
        <?php include '../menu2.php'; ?>
        <section id="main-content">
            <section class="wrapper">
                <!--overview start-->
                <div class="col-lg-12">
                    <h3 class="page-header" style="color: red;"><i style="color: red;" class="icon_book"></i><b>ข้อมูลครู</b></h3>
                </div>
   
                <form action="select_teacher.php" method="get">
				<div class="form-group">
                 <div class="col-sm-offset-9 col-sm-3">
                  ชื่อครู <input type="text" name="search">
				  
				  
				  <input type="submit" value="ค้นหา"class="btn-md btn-success">
				  </div>	  <div class="row"></div></div>
			
                </form>

                <table class="table text-center" >
                    <tr>
                        <!--<td>รหัสครู</td>-->
                        <!--<td>รหัส 13 หลัก</td>-->
                        <td>รหัสครู</td>
                        <td>ชื่อ-นามสกุล</td>
                        <td>ตำแหน่ง</td>
                        <!--<td>ที่อยู่</td>-->
                        <!--<td>หมู่</td>-->
                        <!-- <td>ถนน</td> -->
                        <td>แผนก</td>
                        <td><center><a class='btn btn-xs btn-primary' href="fromteacher.php"><i class="icon_plus_alt2"></i></a></center></td>
                    </tr>
                    <?php
                    include("../connect/conn.php");
                    $search = "";
                    if($_GET["search"]) {
                      $search = $_GET["search"];
                    }
                    $sql = "select * from teacher,department where department.dep_id = teacher.dep_id and teacher.teacher_name like '%$search%'";
                    $res = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($res)) {
                        ?>
                        <tr>
                            <td><?php echo $row['teacher_id'] ?></td>
                            <td><?php echo $row['teacher_name'] ?></td>
                            <td><?php echo $row['position'] ?></td>
                            <td><?php echo $row['dep_name'] ?></td>
                            <td><a class='btn btn-xs btn-warning' href="fromedit_teacher_admin.php?id=<?php echo $row['teacher_id'] ?>"><span class="icon_target"></span></a>
                                <a class='btn btn-xs btn-danger' href="delete_teacher_admin.php?id=<?php echo $row['teacher_id'] ?>&citizen_id=<?php echo $row['citizen_id'] ?>"  onclick="return confirm('คุณต้องการลบข้อมูลใช่หรือไม่?');"><i class="icon_close_alt2"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </section>
    </body>
</html>