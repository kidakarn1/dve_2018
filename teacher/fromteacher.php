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
        include("../connect/conn.php");
        $connect = $conn;
        $res_DISTRICT = select_DISTRICT($connect); //เป็นส่วนของตำบล ตึ๋งเองจะใครล่ะ
        $res_AMPHUR = select_AMPHUR($connect); //เป็นส่วนของอำเภอ ตึ๋งเองจะใครล่ะ
        $res_PROVINCE = select_PROVINCE($connect); //เป็นส่วนของจังหวัด ตึ๋งเองจะใครล่ะ
        $res_zipcode = select_zipcodes($connect); //เป็นส่วนของรหัสไปรษณีย์ ตึ๋งเองจะใครล่ะ
        $res_edu = select_education($connect); //เป็นส่วนของระดับชั้น ตึ๋งเองจะใครล่ะ
        $res_dep = select_department($connect);
        ?>     
        <?php
        date_default_timezone_set('asia/bangkok');
        $year = date("Y");
        $mouth = date("m");
        $date = date("d");
        $sql_nub = "select * from user";
        $res_nub = mysqli_query($conn, $sql_nub);
        $row_nub = mysqli_num_rows($res_nub);
        $id = $year . $mouth . $date . $row_nub + 1;
        ?>
    </head>
    <?php include("../Translate.php"); ?>
    <body>
        <?php include '../menu2.php'; ?>
        <section id="main-content">
            <section class="wrapper">
                <div class="col-lg-12">
                    <h3 class="page-header" style="color: red;"><i style="color: red;" class="icon_book"></i><b>เพิ่มข้อมูลครู</b></h3>
                </div>
                <form class='form-horizontal' method="post" action="insert_teacher.php">
                    <!--<div class='form-group'>
                        <label class="col-xs-5 col-sm-2 control-label">รหัสครู</label>
                        <div class='col-xs-7 col-sm-9' >-->
                    <input type="hidden" name="teacher_id" class="form-control">
                    <!--</div>
                    </div>-->

                    <div class='form-group'>
                        <label class="col-xs-5 col-sm-2 control-label">ชื่อ - นามสกุล</label>
                        <div class='col-xs-7 col-sm-3'>
                            <input type="text" name="teacher_name" class="form-control" required>	
                        </div>
                    </div>
                    <div class='form-group'>
                        <label class="col-xs-5 col-sm-2 control-label">ตำแหน่ง</label>
                        <div class='col-xs-7 col-sm-3'>
                            <input type="text" name="position" class="form-control" required>
                        </div>
                    </div>



                    <div class='form-group'>
                        <label class="control-label col-sm-2">แผนก</label>
                        <div class="col-sm-3">
                          <select name="dep_id" id="dep_id" class="form-control">
                            <?php 
                              $sqlDep = "select * from department";
                              $resDep = mysqli_query($conn,$sqlDep);
                              while($rowDep = mysqli_fetch_array($resDep)) {
                            ?>
                              <option value="<?php echo $rowDep["dep_id"];?>"><?php echo $rowDep["dep_name"];?></option>
                            <?php }?>
                          </select>
                        </div>
                    </div>

                    <div class='form-group'>
                        <label class="control-label col-sm-2">เลขบัตรประชาชน</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="citizen_id" maxlength="13" required>
                        </div>
                    </div>


                    <div class='text-center'>
                        <input class="btn btn-success" type="submit" value="ตกลง">
                    </div>
                </form>
            </section>
        
    </body>
</html>
<?php

function select_DISTRICT($connect) {
    $sql = "select *from district";
    $res = mysqli_query($connect, $sql);
    return $res;
}

function select_AMPHUR($connect) {
    $sql = "select *from amphur";
    $res = mysqli_query($connect, $sql);
    return $res;
}

function select_PROVINCE($connect) {
    $sql = "select *from province";
    $res = mysqli_query($connect, $sql);
    return $res;
}

function select_zipcodes($connect) {
    $sql = "select *from zipcodes";
    $res = mysqli_query($connect, $sql);
    return $res;
}

function select_education($connect) {
    $sql = "select *from education";
    $res = mysqli_query($connect, $sql);
    return $res;
}

function select_department($connect) {
    $sql = "select *from department";
    $res = mysqli_query($connect, $sql);
    return $res;
}
?>
       