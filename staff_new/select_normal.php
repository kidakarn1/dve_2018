<?php
include("../connect/conn.php");
$connect = $conn;
@SESSION_START();
$_SESSION["tream_start"] = $tream = $_POST["tream_start"];
$_SESSION["year_start"] = $year = $_POST["year_start"];
$_SESSION["tream_end"] = $tream = $_POST["tream_end"];
$_SESSION["year_end"] = $year = $_POST["year_end"];
$res_training_normal = select_training_normal($connect);
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
        <meta name="author" content="GeeksLabs">
        <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
        <link rel="shortcut icon" href="img/favicon.png">

        <title>select_training_normal</title>

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

    </head>

    <body>
        <?php include "../menu2.php"; ?>
        <section id="main-content">
            <section class="wrapper">
                <!--overview start-->
                <div class="col-lg-12">
                    <h3 class="page-header" style="color: red;"><i style="color: red;" class="icon_star-half_alt"></i><b>select_training_normal</b></h3>
                </div>
                <div class="table-responsive">
                    <table class="table text-center">
                        <tr>    
                            <td><h2><a href="select_normal.php">ระบบปกติ(ฝึกงาน)</a>|<a href="select_bilateral.php">ระบบทวิภาคี(ฝึกอาชีพ)</a></h2></td>
                        </tr>
                    </table>
                    </center>
                    <center>
                        <table class="table">
                            <tr>
                                <th>ลำดับ</th>
                                <th>ชื่อ นามสกุล</th>
                                <th>เบอร์โทรศัพท์</th>
                                <th>แผนก</th>
                                <th>สถานประกอบการ</th>
                                <th>จัดการ</th>
                            </tr>
                            <?php
                            $i = 1;
                            while ($row_training_normal = mysqli_fetch_assoc($res_training_normal)) {
                                ?>
                                <tr>
                                    <th><?php echo $i; ?></th>
                                    <th><?php echo $row_training_normal["head_name_std"] . " " . $row_training_normal["std_name"] ?></th>
                                    <th><?php echo $row_training_normal["phone"] ?></th>
                                    <th><?php echo $row_training_normal["dep_name"] ?></th>
                                    <th><?php echo $row_training_normal["business_name"] ?></th>
                                    <th><a href="menu_dve.php?id=<?php echo $row_training_normal["citizen_id"] ?>">จัดการ</a></th>
                                </tr>

                                <?php
                                $i++;
                            }
                            ?>
                        </table>
                </div>
            </section>
        </section>
    </body>
</html>

<?php

function select_training_normal($connect) {
    $sql = "select * from training_normal,student,business,department where training_normal.citizen_id = student.citizen_id and training_normal.business_id = business.business_id and student.dep_id = department.dep_id and training_normal.normal_status ='อื่นๆ'";
    $res = mysqli_query($connect, $sql);
    return $res;
}
?>