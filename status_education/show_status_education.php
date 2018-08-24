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

        <script src="../jquery/jquery.min.js"></script>
        <script src="../jquery-easing/jquery.easing.min.js"></script>


        <?php
        $connect = $conn;
        $maxnum = 30;
        include('../connect/conn.php');
        $key = $_POST["seach"];
        if ($_GET['pagemin']) {
            $resstatus_education = get_status_education($conn, $key, $_GET['pagemin'], $maxnum);
        } else {
            $resstatus_education = get_status_education($conn, $key, 0, $maxnum);
        }
        if ($_GET['end_edu_id']) {
            $id = $_GET['end_edu_id'];
            if (!del_status_education($conn, $id)) {
                echo "ลบไม่สำเร็จ";
            } else {
                
            }
            header("location: show_status_education.php");
        }
        ?>
    </head>
    <body>
        <?php include '../menu2.php'; ?>
        <section id="main-content">
            <section class="wrapper">
                <div class="col-sm-12">
                    <div class="col-sm-6">
                        <h3 class="page-header" style="color: red;"><i style="color: red;" class="icon_genius"></i><b>ข้อมูลสถานภาพนักศึกษา</b></h3>
                    </div>
                    <form class="form-horizontal" method="post">
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-3 col-xs-9">
                                <input class="form-control " type="text" name="seach" id="seach">
                            </div>
                            <input class="btn btn-md btn-success" type="submit" value="ค้นหา">
                        </div>
                    </form>
                </div>

                <div class="table-responsive">
                    <table class="table text-center">
                        <tr>
                            <td>รหัสสถานภาพนักศึกษา</td>
                            <td>สถานภาพนักศึกษา</td>


                            <!--<td colspan="2"><a class="btn btn-xs btn-primary" href="status_education_f_insert.php"><i class="icon_plus_alt2"></i></a></td>-->
                        </tr>
                        <?php while ($rowstatus_education = mysqli_fetch_array($resstatus_education)) { ?>
                            <tr>
                                <td><?php echo $rowstatus_education['end_edu_id']; ?></td>
                                <td><?php echo $rowstatus_education['edu_name']; ?></td>

<!--                                <td>
                                    <a class='btn btn-xs btn-warning' href="edit_f_status_education.php?end_edu_id=<?php echo $rowstatus_education['end_edu_id']; ?>&name=<?php echo $rowstatus_education['edu_name']; ?>
                                       "><span class="icon_target"></span></a>
                                    <a class='btn btn-xs btn-danger' href="show_status_education.php?end_edu_id=<?php echo $rowstatus_education['end_edu_id']; ?>"><i class="icon_close_alt2"></i></a>
                                </td>-->
                            </tr>
                        <?php } ?>
                    </table>
                </div>

                <?php
                $sql = "select * from status_education";
                $res = mysqli_query($conn, $sql);
                $page = mysqli_num_rows($res);
                $maxpage = $page / $maxnum;
                if ($page % $maxnum != 0) {
                    $maxpage = $maxpage + 1;
                }
                for ($i = 1; $i <= $maxpage; $i++) {
                    ?>
                    <a href="show_status_education.php?pagemin=<?php echo $maxnum * $i - $maxnum ?>"><?php echo $i ?></a>
                <?php } ?>
            </section>
        </section>
    </body>
</html>
<?php

function get_status_education($conn, $key, $pagemin, $maxnum) {

    $sql = "select * from status_education where edu_name like '%$key%'  limit $pagemin,$maxnum";
    $res = mysqli_query($conn, $sql);
    return $res;
}

function del_status_education($conn, $id) {
    $sql = "delete from status_education where end_edu_id = '$id' ";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        $r = true;
    } else {
        $r = false;
    }
    return $r;
}
?>
