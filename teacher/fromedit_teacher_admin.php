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
        <?php
        include("../connect/conn.php");
        $id = $_GET['id'];
        $sql = "select * from teacher,department where teacher_id='$id' and department.dep_id = teacher.dep_id";
        $res = mysqli_query($conn, $sql);
        $row_teacher = mysqli_fetch_array($res);
        ?>
        <section id="main-content">
            <section class="wrapper">
                <div class="col-lg-12">
                    <h3 class="page-header" style="color: red;"><i style="color: red;" class="icon_book"></i><b>แก้ไขข้อมูลครู</b></h3>
                </div>
                <form class="form-horizontal" method="post" action="edit_teacher.php">
                    <!--<div class='form-group'>
                    <label class="col-xs-5 col-sm-2 control-label">รหัสครู</label>
                    <div class='col-xs-7 col-sm-9'>-->
                    <input type="hidden" name="teacher_id" class="form-control" value="<?php echo $row_teacher['teacher_id'] ?>">
                    <!--</div>
                </div>-->


                    <div class='form-group'>
                        <label class="col-xs-5 col-sm-2 control-label">ชื่อ-นามสกุล</label>
                        <div class='col-xs-7 col-sm-3'>
                            <input type="text" name="teacher_name" class="form-control" value="<?php echo $row_teacher['teacher_name'] ?>">
                        </div>
                    </div>

                    <div class='form-group'>
                        <label class="col-xs-5 col-sm-2 control-label">ตำแหน่ง</label>
                        <div class='col-xs-7 col-sm-3'>
                            <input type="text" name="position" class="form-control" value="<?php echo $row_teacher['position'] ?>">
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
                              <option value="<?php echo $rowDep["dep_id"];?>"
                                <?php if($rowDep["dep_id"] == $row_teacher['dep_id']) { echo "selected";} ?>
                              ><?php echo $rowDep["dep_name"];?></option>
                            <?php }?>
                          </select>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label class="col-xs-5 col-sm-2 control-label">เลขบัตรประชาชน</label>
                        <div class='col-xs-7 col-sm-3'>
                            <input type="text" name="citizen_id" class="form-control" value="<?php echo $row_teacher['citizen_id'] ?>">
                        </div>
                    </div>

                    <div class="text-center">
                        <input type="submit" class="btn btn-md btn-success " value="แก้ไข">
                    </div>
                </form>

            </section>

    </body>
</html>
