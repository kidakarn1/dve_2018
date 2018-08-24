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
		
        <?php
        include('../connect/conn.php');
        $connnect = $conn;
        $sql = "select * from user,user_type,school where "
                . "user.school_id = school.school_id and "
                . "user.user_type_id = user_type.user_type_id";
        $res = mysqli_query($conn, $sql);
        ?>
    </head>

    <?php include("../Translate.php"); ?>

    <body>

        <?php include '../menu2.php'; ?>
        <section id="main-content">
            <section class="wrapper">
                <!--overview start-->
                <div class="col-lg-12">
                    <h3 class="page-header" style="color: red;"><i style="color: red;" class="icon_cursor_alt"></i><b>ข้อมูลเจ้าหน้าที่</b></h3>
                </div>

                <div class="table-responsive">
                    <table class="table text-center">
                        <tr>
                            <!--<td>รหัสพนักงาน</td>-->
                            <td>รหัสครู</td>
                            <!--<td>รหัสผ่าน</td>-->
                            <td>ชื่อ</td>
                            <td>นามสกุล</td>
                            <td>เบอร์โทรศัพท์</td>
                            <td>Email</td>
                            <!--<td>ชื่อวิทยาลัย</td>-->
                            <td>ประเภทผู้ใช้</td>
                            <td>สถานะ</td>
                            <td>วันที่สมัคร</td>
                            <td>วันที่เข้าใช้ล่าสุด</td>
                            <td colspan="1"><a class="btn btn-xs btn-primary" href="form_insert.php"><i class="icon_plus_alt2"></i></a></td>
                        </tr>

				


                        <?php while ($row = mysqli_fetch_array($res)) { ?>
                            <tr>
                                <!--<td><?php echo $row["user_id"] ?></td>-->
                                <td><?php echo $row["username"] ?></td>
                                <!--<td><?php echo $row["password"] ?></td>-->
                                <td><?php echo $row["fname"] ?></td>
                                <td><?php echo $row["lname"] ?></td>
                                <td><?php echo $row["phone"] ?></td>
                                <td><?php echo $row["email"] ?></td>
                                <!--<td><?php echo $row["school_name"] ?></td>-->
                                <td><?php echo $row["user_type_name"] ?></td>
                                <td><?php echo $row["status"] ?></td>
                                <td><?php echo $row["register_date"] ?></td>
                                <td><?php echo $row["last_login"] ?></td>

                                <td><a class="btn btn-xs btn-warning" href="form_update.php?user_id=<?php echo $row["user_id"]; ?>"><span class="icon_target"></span></a>
                                    <a class="btn btn-xs btn-danger" href="JavaScript:if(confirm('ต้องการลบข้อมูลนี้?') == true){window.location='delete.php?user_id=<?php echo $row["user_id"]; ?>';}"><i class="icon_close_alt2"></i></a>
                            </tr>
                        <?php } ?>

                    </table>
                </div>
            </section>
        </section>
    </body>
</html>