<!DOCTYPE html>
<html>
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
    <?php
    include('../connect/conn.php');
    if ($_GET["school_id"]) {
        del_sch($conn, $_GET["school_id"]);
        header('location: show_school.php');
    }
    $connnect = $conn;
    $sql = "select * from school,zone,amphur,province,district where "
            . "school.district_id = district.DISTRICT_CODE and "
            . "school.aumper_id = amphur.AMPHUR_CODE and "
            . "school.province_id = province.PROVINCE_CODE and "
            . "school.zone = zone.zone_id";

    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    ?>
    <body>
        <?php include '../menu2.php'; ?>

        <section id="main-content">
            <section class="wrapper">
                <!--overview start-->
                <div class="col-lg-12">
                    <h3 class="page-header" style="color: red;"><i style="color: red;" class="icon_key_alt"></i><b>ข้อมูลสถานศึกษา</b></h3>
                </div>
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-sm-3">รหัสสถานศึกษา</label>
                        <div class="col-sm-3">
                            <div class="form-control-static"><?php echo $row["school_id"] ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">รหัสสถานศึกษา</label>
                        <div class="col-sm-3">        
                            <div class="form-control-static"><?php echo $row["school_id"] ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">ชื่อสถานศึกษา</label>
                        <div class="col-sm-3">        
                            <div class="form-control-static"><?php echo $row["school_name"] ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">ประเภทสถานศึกษา</label>
                        <div class="col-sm-3">        
                            <div class="form-control-static"><?php echo $row["school_type"] ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">ที่อยู่</label>
                        <div class="col-sm-3">        
                            <div class="form-control-static"><?php echo $row["adress_no"] ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">ถนน</label>
                        <div class="col-sm-3">        
                            <div class="form-control-static"><?php echo $row["road"] ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">ตำบล</label>
                        <div class="col-sm-3">        
                            <div class="form-control-static"><?php echo $row["DISTRICT_NAME"] ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">อำเภอ</label>
                        <div class="col-sm-3">        
                            <div class="form-control-static"><?php echo $row["AMPHUR_NAME"] ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">จังหวัด</label>
                        <div class="col-sm-3">        
                            <div class="form-control-static"><?php echo $row["PROVINCE_NAME"] ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">รหัสไปรษณีย์</label>
                        <div class="col-sm-3">        
                            <div class="form-control-static"><?php echo $row["postcode"] ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">โทรศัพท์</label>
                        <div class="col-sm-3">        
                            <div class="form-control-static"><?php echo $row["phone"] ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">โทรสาร(fax)</label>
                        <div class="col-sm-3">        
                            <div class="form-control-static"><?php echo $row["fax"] ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">ภาค</label>
                        <div class="col-sm-3">        
                            <div class="form-control-static"><?php echo $row["zoneName"] ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">พิกัดที่ตั้ง</label>
                        <div class="col-sm-3">        
                            <div class="form-control-static"><?php echo $row["location"] ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">สังกัด</label>
                        <div class="col-sm-3">        
                            <div class="form-control-static"><?php echo $row["category"] ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">สังกัดสถาบัน</label>
                        <div class="col-sm-3">        
                            <div class="form-control-static"><?php echo $row["school_ins"] ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">ผอ</label>
                        <div class="col-sm-3">        
                            <div class="form-control-static"><?php echo $row["name_dir"] ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">รองกิจกรรม</label>
                        <div class="col-sm-3">        
                            <div class="form-control-static"><?php echo $row["deputy_academic"] ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">รองพัฒนากิจการ</label>
                        <div class="col-sm-3">        
                            <div class="form-control-static"><?php echo $row["deputy_activities"] ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">รองแผนงานและความร่วมมือ</label>
                        <div class="col-sm-3">        
                            <div class="form-control-static"><?php echo $row["deputy_plan"] ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">หัวหน้างานทะเบียน</label>
                        <div class="col-sm-3">        
                            <div class="form-control-static"><?php echo $row["head_register"] ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">หัวหน้างานการเงิน</label>
                        <div class="col-sm-3">        
                            <div class="form-control-static"><?php echo $row["head_money"] ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">หัวหน้างานหลักสูตร</label>
                        <div class="col-sm-3">        
                            <div class="form-control-static"><?php echo $row["head_course"] ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">หัวหน้างานวัดผล</label>
                        <div class="col-sm-3">        
                            <div class="form-control-static"><?php echo $row["head_measure"] ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">หัวหน้างานแนะแนว</label>
                        <div class="col-sm-3">        
                            <div class="form-control-static"><?php echo $row["head_guide"] ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">หัวหน้างานปกครอง</label>
                        <div class="col-sm-3">        
                            <div class="form-control-static"><?php echo $row["head_rule"] ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">หัวหน้างานกิจกรรม</label>
                        <div class="col-sm-3">        
                            <div class="form-control-static"><?php echo $row["head_activities"] ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">เลขที่สถานศึกษา</label>
                        <div class="col-sm-3">        
                            <div class="form-control-static"><?php echo $row["school_number"] ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">ที่ทำการไปรษณีย์</label>
                        <div class="col-sm-3">        
                            <div class="form-control-static"><?php echo $row["post_office"] ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">เลขที่ไปรษณีย์</label>
                        <div class="col-sm-3">        
                            <div class="form-control-static"><?php echo $row["postal_number"] ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">ระบบการศึกษา</label>
                        <div class="col-sm-3">        
                            <div class="form-control-static"><?php echo $row["system_dvt"] ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">โลโก้</label>
                        <div class="col-sm-3">    
                            <div class="form-control-static"><?php echo $row["school_logo"] ?>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <a class="btn btn-md btn-warning" href="f_edit.php?school_id=<?php echo $row["school_id"]; ?>">แก้ไขข้อมูลสถานศึกษา</a>
                    </div>                    
<!-- <a class="btn btn-xs btn-danger" href="JavaScript:if(confirm('ต้องการลบข้อมูลนี้?') == true){window.location='show_school.php?school_id=<?php echo $row["school_id"]; ?>';}"><i class="icon_close_alt2"></i></a> -->


                            <!--<a href="f_insert.php" class="btn btn-xs btn-primary"><i class="icon_plus_alt2"></i></a>-->





            </section>
        </section>
    </body>
</html>
<?php

function del_sch($conn, $id) {
    $sql = "delete from school where school_id = '$id' ";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        //header("location: show_school.php");
    }
}
?>
