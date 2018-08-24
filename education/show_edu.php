<!doctype html>
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
        $maxnum = 30;
        include('../connect/conn.php');
        $key = $_POST["seach"];
        if ($_GET['pagemin']) {
            $resEdu = get_edu($conn, $key, $_GET['pagemin'], $maxnum);
        } else {
            $resEdu = get_edu($conn, $key, 0, $maxnum);
        }
        if ($_GET['edu_id']) {
            $id = $_GET['edu_id'];
            if (!del_edu($conn, $id)) {
                echo "ลบไม่สำเร็จ";
            }
            else{
                header("location: show_edu.php");
            }
        }
        ?>
    </head>
    <body>

        <?php include '../menu2.php'; ?>
        <section id="main-content">
            <section class="wrapper">
                <!--overview start-->
                <div class="col-sm-12">
                    <div class="col-sm-6">
                        <h3 class="page-header" style="color: red;"><i style="color: red;" class="icon_easel"></i><b>ประเภทการศึกษา</b></h3>
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
                            <td>รหัสการศึกษา</td>
                            <td>ชื่อระดับการศึกษา</td>
                            <!-- <td colspan="2"><a class="btn btn-xs btn-primary" href="edu_f_insert.php"><i class="icon_plus_alt2"></i></a></td>
 -->                        </tr>
                        <?php while ($rowEdu = mysqli_fetch_array($resEdu)) { ?>
                            <tr>
                                <td><?php echo $rowEdu['edu_id']; ?></td>
                                <td><?php echo $rowEdu['edu_name']; ?></td>
                                <td>
                                    <!-- <a class="btn btn-xs btn-warning" href="edit_f_edu.php?edu_id=<?php echo $rowEdu['edu_id']; ?>"><span class="icon_target"></span></a> -->
                                    <!-- <a class="btn btn-xs btn-danger" href="show_edu.php?edu_id=<?php echo $rowEdu['edu_id']; ?>"><i class="icon_close_alt2"></i></a> -->
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>

                <?php
//                $sql = "select * from education";
//                $res = mysqli_query($conn, $sql);
//                $page = mysqli_num_rows($res);
//                $maxpage = $page / $maxnum;
//                if ($page % $maxnum != 0) {
//                    $maxpage = $maxpage + 1;
//                }
//                for ($i = 1; $i <= $maxpage; $i++) {
//                    
                ?>
                    <!--<a href="show_edu.php?pagemin=//<?php echo $maxnum * $i - $maxnum ?>"><?php echo $i ?></a>-->
                <?php //}  ?>
            </section>
        </section>
    </body>
</html>
<?php

function get_edu($conn, $key, $pagemin, $maxnum) {
    $sql = "select * from education where edu_name like '%$key%' or  edu_id like '%$key%'limit $pagemin,$maxnum";
    $res = mysqli_query($conn, $sql);
    return $res;
}

function del_edu($conn, $id) {
    $sql = "delete from education where edu_id = '$id' ";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        $r = true;
    } else {
        $r = false;
    }
    return $r;
}
?>
