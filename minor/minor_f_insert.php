<?php
include('../connect/conn.php');
$connect = $conn;
$sql = "select * from user";
$res = mysqli_query($connect, $sql);
?>
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
        <title>Document</title>
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
        $resMajor = get_major($conn);
        ?>
    </head>
    <body
    <?php include '../menu2.php'; ?>
        <section id="main-content">
            <section class="wrapper">
                <!--overview start-->
                <div class="col-lg-12">
                    <h3 class="page-header" style="color: red;"><i style="color: red;" class="icon_cogs"></i><b>เพิ่มข้อมูลสาขางาน</b></h3>
                </div>

                <form class="form-horizontal" method="post" action="insert_minor.php">
                    <div class="table-responsive">
                        <table class="table text-center">
                            <div class="form-group">
                                <label class="control-label col-sm-2">รหัสสาขางาน</label>
                                <div class="col-sm-3">
                                    <input class="form-control" type="text" name="minor_id" maxlength="10">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">ชื่อสาขางาน</label>
                                <div class="col-sm-3">
                                    <input class="form-control" type="text" name="minor_name" maxlength="100">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">สาขาวิชา</label>
                                <div class="col-sm-3">
                                    <select class="form-control" name="major_id">
                                        <?php while ($rowMajor = mysqli_fetch_array($resMajor)) { ?>
                                            <option value="<?php echo $rowMajor["major_id"]; ?>">
                                                <?php echo $rowMajor["major_name"]; ?>
                                            <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">ชื่อภาษาอังกฤษ	</label>
                                <div class="col-sm-3">
                                    <input class="form-control" type="text" name="minor_eng" maxlength="100">
                                </div>
                            </div>
                            <div class="text-center">
                                <input class="btn btn-md btn-success" type="submit" value="ตกลง">
                            </div>
                        </table>
                    </div>
                </form>
            </section>
        </section>
    </body>
</html>
<?php
function get_major($conn) {
    $sql = "select * from major";
    $res = mysqli_query($conn, $sql);
    return $res;
}
?>