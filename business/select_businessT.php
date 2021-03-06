<?php
@SESSION_START();
if ($_SESSION['user_id'] == "") {
    header("location: ../login/login_admin.php");
} else {
    ?>
    <!doctype html>
    <html lang="en">
        <head>
            <!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
                <meta name="author" content="GeeksLabs">
                <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
                <link rel="shortcut icon" href="img/favicon.png">

                <title>Creative - Bootstrap Admin Template</title>

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
                $keys = $_POST["se"];
                $sql = "select * from business where business_name like '%$keys%'";
                $res = mysqli_query($conn, $sql);
                ?>
            </head>
            <body>
                <?php include '../menu2.php'; ?>
                <section id="main-content">
                    <section class="wrapper">
                        <form class="form-horizontal" method="post" action="">
                            <div class="form-group">
                                <label class=" col-sm-2 col-sm-offset-6 col-xs-12 control-label">ค้นหาชื่อสถานประกอบการ</label>
                                <div class="col-sm-3 col-xs-6">
                                    <input class="form-control" type="text" name="se">
                                </div>
                                <input class="col-xs-2 col-sm-1 btn btn-success" type="submit" value="ค้นหา">
                            </div>
                        </form>
                        <br>

                        <table class="table">
                            <tr>
                                <td>รหัสสถานประกอบการ</td>
                                <td>ชื่อสถานประกอบการ</td>
                                <td>ขนาดสถานประกอบการ</td>
                                <td>โทรศัพท์</td>
                                <td class="text-center" colspan="2"><a class=" btn btn-primary" href="../business/frominsert_business.php">เพิ่มข้อมูล</a></td>
                            </tr>

                            <?php while ($row = mysqli_fetch_array($res)) { ?>

                                <tr>
                                    <td><?php echo $row['business_id']; ?></td>
                                    <td><?php echo $row['business_name']; ?></td>
                                    <td><?php echo $row['business_size']; ?></td>
                                    <td><?php echo $row['contact_phone']; ?></td>

                                    <td><a class="btn btn-sm btn-success" href="edit_bus.php?id=<?php echo $row['business_id']; ?>">แก้ไข</a></td>
                                    <td><a class="btn btn-sm btn-success" href="del_bus.php?id=<?php echo $row['business_id']; ?>">ลบ</a></td>
                                </tr>
                            <?php } ?>
                        </table>
                    </section>
                </section>

            </body>
        </html>
        <?php
    }
    ?>
