<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
        <meta name="author" content="GeeksLabs">
        <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
        <link rel="shortcut icon" href="../img/favicon.png">

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

    </head>
    <?php
    include("../connect/conn.php");
    $connect = $conn;
    @SESSION_START();
       if  (isset($_POST["serch"])=="true"){
            $serch=$_POST["serch"];
        }
        if  (isset($_POST["serch"])!="true"){
            $serch="";
        }
// $_SESSION["tream_start"]=$tream=$_POST["tream_start"];
// $_SESSION["year_start"]=$year=$_POST["year_start"];
// $_SESSION["tream_end"]=$tream=$_POST["tream_end"];
// $_SESSION["year_end"]=$year=$_POST["year_end"];
    $res_normal = select_normal($connect,$serch);
    ?>
    <body>
        <?php include '../menu2.php'; ?>
        <section id="main-content">
            <section class="wrapper">
                <!--overview start-->
                <div class="col-lg-12">
                    <h3 class="page-header" style="color: red;"><i style="color: red;" class="icon_key_alt"></i><b>ข้อมูลสถานศึกษา</b></h3>
                </div>
                <center>
                    <table border="0">
                        <tr>
                            <td><h2><a href="select_normal.php">ระบบปกติ(ฝึกงาน) </a>|</h2></td>
                            <td><h2><a href="select_bilateral.php">ระบบทวิภาคี(ฝึกอาชีพ)</a></h2></td>
                        </tr>
                    </table>
                </center>
                <center>
                <form method="post" action="">
                    <input type="text" name="serch">
                    <input type="submit" value="ค้นหา">
                </form>
                    <table class="table">
                        <tr>
                            <td><center>ลำดับ</center></td>
                        <td><center>ชื่อ นามสกุล</center></td>
                        <td><center>เบอร์โทรศัพท์</center></td>
                        <td><center>แผนก</center></td>
                        <td><center>สถานประกอบการ</center></td>
                        <td colspan="2"><center>สถานะ</center></td>
                        </tr>
                        <?php
                        $i = 1;
                        while ($row_normal = mysqli_fetch_assoc($res_normal)) {
                            ?>
                            <tr>
                                <td><center><?php echo $i; ?></center></td>
                            <td><center><?php echo $row_normal["head_name_std"] . " " . $row_normal["std_name"] ?></center></td>
                            <td><center><?php echo $row_normal["phone"] ?></center></td>
                            <td><center><?php echo $row_normal["dep_name"] ?></center></td>
                            <td><center><?php echo $row_normal["business_name"] ?></center></td>
                            <td><center><?php echo $row_normal["normal_status"] ?></center></td>
                            <td><center><?php if ($row_normal["normal_status"] == "อื่นๆ") { ?><a href="update_status.php?id=<?php echo $row_normal["normal_id"] ?>&1=<?php echo "อนุมัติสถานประกอบการ" ?>">อนุมัติสถานประกอบการ</a> | 
							<a href="update_status.php?id=<?php echo $row_normal["normal_id"] ?>&1=<?php echo "ไม่ประสงค์รับนักศึกษาฝึกงาน" ?>">ไม่ประสงค์รับนักศึกษาฝึกงาน</a><?php } 
                                              else if ($row_normal["normal_status"] == "อนุมัติสถานประกอบการ"){ ?><a href="../staff_new/yinyom/print_yinyom.php?id=<?php echo $row_normal["citizen_id"]?>">ปริ้นใบยินยอมผู้ปกครอง</a><?php }?>
                            </center></td>
                            </tr>
                            <?php $i++;
                        } ?>
                    </table>
                </center>
            </section>
        </section>
    </body>
</html>
<?php

function select_normal($connect,$serch) {
    $sql = "select * from training_normal,student,business,department where 
           training_normal.citizen_id = student.citizen_id and 
           training_normal.business_id = business.business_id and
           student.dep_id = department.dep_id and (student.std_id like '%$serch%' or student.head_name_std like '%$serch%' or student.std_name like '%$serch%' or department.dep_name like '%$serch%' or business.business_name like '%$serch%')";
    $res = mysqli_query($connect, $sql);
    return $res;
}
?>