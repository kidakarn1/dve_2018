<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
        <meta name="author" content="GeeksLabs">
        <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
        <link rel="shortcut icon" href="../../img/favicon.png">
        <title>student</title>
        <!-- Bootstrap CSS -->
        <link href="../../css/bootstrap.min.css" rel="stylesheet">
        <!-- bootstrap theme -->
        <link href="../../css/bootstrap-theme.css" rel="stylesheet">
        <!--external css-->
        <!-- font icon -->
        <link href="../../css/elegant-icons-style.css" rel="stylesheet" />
        <link href="../../css/font-awesome.min.css" rel="stylesheet" />
        <!-- full calendar css-->
        <link href="../../assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
        <link href="../../assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
        <!-- easy pie chart-->
        <link href="../../assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
        <!-- owl carousel -->
        <link rel="stylesheet" href="../../css/owl.carousel.css" type="text/css">
        <link href="../../css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
        <!-- Custom styles -->
        <link rel="stylesheet" href="../../css/fullcalendar.css">
        <link href="../../css/widgets.css" rel="stylesheet">
        <link href="../../css/style.css" rel="stylesheet">
        <link href="../../css/style-responsive.css" rel="stylesheet" />
        <link href="../../css/xcharts.min.css" rel=" stylesheet">
        <link href="../../css/jquery-ui-1.10.4.min.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <script src="../../jquery/jquery.min.js"></script>
        <script src="../../jquery-easing/jquery.easing.min.js"></script>
        <?php
        include('../../connect/conn.php');
        $connect = $conn;
        $std_id = $_GET["std_id"];
        $edu = substr($std_id, 2, 1);
        $res = select_dve01($connect, $std_id);
        $row = mysqli_fetch_array($res);
        $resEdu = select_edu($connect);
        $resGroup = select_group($connect);
        $resMajor = select_major($connect);
        ?>
    </head>
    <body>
        <?php include '../../menu2.php'; ?>
        <section id="main-content">
            <section class="wrapper">

                <form class="form-horizontal" method="post" action="DVE01.php">
                    <div class="form-group">
                        <label class="col-xs-5 col-sm-3 control-label">รหัสประจำตัว</label>
                        <div class="col-sm-6">
                            <input class="form-control " type="text" name="std_id" value="<?php echo $row["student_id"] ?>" id="std_id">
                        </div>
                        <label style="color: red;" id="Wstd_id" class="col-xs-5 col-sm-2 ">*กรุณากรอกรหัสประจำตัว*</label>
                    </div>

                    <div class="form-group">
                        <label class="col-xs-5 col-sm-3 control-label">ข้าพเจ้า</label>
                        <div class="col-sm-2">
                            <select name="sex" class="form-control">
                                <option value="M" selected>นาย
                                <option value="F">นางสาว
                                    <!-- <option value="">ไม่มีนาง? -->
                            </select>
                        </div>


                        <label class="col-xs-5 col-sm-1 control-label">ชื่อ</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" name="std_fname" value="<?php echo $row["stu_fname"] ?>" id="std_fname">
                        </div>
                        <label style="color: red;" id="Wstd_fname" class="col-sm-2 ">*กรุณากรอกชื่อ*</label>


                    </div>
                    <div class="form-group">
                        <label class="col-xs-5 col-sm-6 control-label">สกุล</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" name="std_lname" value="<?php echo $row["stu_lname"] ?>" id="std_lname">
                        </div>
                        <label style="color: red;" id="Wstd_lname" class="col-sm-2 ">*กรุณากรอกสกุล*</label>

                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">นักศึกษาระดับ</label>

                        <label class="radio-inline">
                            <div class="col-sm-1">
                                <input  type="radio" name="edu" value="2" 
                                <?php
                                if ($edu == 2) {
                                    echo "checked";
                                }
                                ?>>ปวช
                            </div>
                        </label>

                        <label class="radio-inline">
                            <input  type="radio" name="edu" value="3"<?php
                            if ($edu == 3) {
                                echo "checked";
                            }
                            ?>>ปวส
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">ภาค</label>
                        <label class="radio-inline">
                            <div class="col-sm-12">
                                <input type="radio" name="system" value="1">ระบบปกติ
                            </div>
                        </label>

                        <label class="radio-inline">
                            <input type="radio" name="system" value="5">ระบบทวิภาคี  
                        </label>

                    </div>
                    <div class="form-group">

                        <label class="col-xs-5 col-sm-3 control-label">ปีที่</label>
                        <div class="col-sm-1">
                            <select name="edu_year" class="form-control">
                                <option value="1"selected>1
                                <option value="2">2
                                <option value="3">3
                            </select>
                        </div>


                        <label class="col-xs-5 col-sm-1 control-label">กลุ่ม</label>
                        <div class="col-sm-1">
                            <select name="group" class="form-control">
                                <?php while ($rowGro = mysqli_fetch_array($resGroup)) { ?>
                                    <option value="<?php echo $rowGro['group_name'] ?>">
                                        <?php echo $rowGro['group_name'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-5 col-sm-3 control-label">แผนกวิชา</label>
                        <div class="col-sm-5">
                            <select name="major_name" class="form-control">
                                <?php while ($rowMajor = mysqli_fetch_array($resMajor)) { ?>
                                    <option value="<?php echo $rowMajor['major_name'] ?>">
                                        <?php echo $rowMajor['major_name'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>






                    <div class="form-group">
                        <label class="col-xs-5 col-sm-3 control-label">เกรดเฉลี่ยสะสม</label>
                        <div class="col-sm-2">
                            <input class="form-control" type="text" name="gpa" value="<?php echo $row['gpa'] ?>" id="gpa">
                        </div>
                        <label style="color: red;" id="Wgpa" class="col-sm-3 ">*กรุณากรอกผลการเรียนเฉลี่ยสะสม*</label>

                    </div>
                    <div class="form-group">
                        <label class="col-xs-5 col-sm-3 control-label">ชื่อผู้ปกครอง</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" name="par_name" value="<?php echo $row["par_fname"] . " " . $row["par_lname"] ?>" id="par_name">
                        </div>
                        <label style="color: red;" id="Wpar_name" class=" col-sm-3">*กรุณากรอกชื่อผู้ปกครอง*</label>
                    </div>





                    


                    <div class="text-center">
                        <input class="btn btn-success" type="submit" value="ตกลง" id="submit">
                    </div>
                </form>
            </section>
        </section>


        <script src="../../js/jquery.js"></script>
        <script src="../../js/jquery-ui-1.10.4.min.js"></script>
        <script src="../../js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="../../js/jquery-ui-1.9.2.custom.min.js"></script>
        <!-- bootstrap -->
        <script src="../../js/bootstrap.min.js"></script>
        <!-- nice scroll -->
        <script src="../../js/jquery.scrollTo.min.js"></script>
        <script src="../../js/jquery.nicescroll.js" type="text/javascript"></script>
        <!-- charts scripts -->
        <script src="../../assets/jquery-knob/js/jquery.knob.js"></script>
        <script src="../../js/jquery.sparkline.js" type="text/javascript"></script>
        <script src="../../assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
        <script src="../../js/owl.carousel.js"></script>
        <!-- jQuery full calendar -->
        <script src="../../js/fullcalendar.min.js"></script>
        <!-- Full Google Calendar - Calendar -->
        <script src="../../assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
        <!--script for this page only-->
        <script src="../../js/calendar-custom.js"></script>
        <script src="../../js/jquery.rateit.min.js"></script>
        <!-- custom select -->
        <script src="../../js/jquery.customSelect.min.js"></script>
        <script src="../../assets/chart-master/Chart.js"></script>

        <!--custome script for all page-->
        <script src="../../js/scripts.js"></script>
        <!-- custom script for this page-->
        <script src="../../js/sparkline-chart.js"></script>
        <script src="../../js/easy-pie-chart.js"></script>
        <script src="../../js/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="../../js/jquery-jvectormap-world-mill-en.js"></script>
        <script src="../../js/xcharts.min.js"></script>
        <script src="../../js/jquery.autosize.min.js"></script>
        <script src="../../js/jquery.placeholder.min.js"></script>
        <script src="../../js/gdp-data.js"></script>
        <script src="../../js/morris.min.js"></script>
        <script src="../../js/sparklines.js"></script>
        <script src="../../js/charts.js"></script>
        <script src="../../js/jquery.slimscroll.min.js"></script>
        <script>
            //knob
            $(function () {
                $(".knob").knob({
                    'draw': function () {
                        $(this.i).val(this.cv + '%')
                    }
                })
            });

            //carousel
            $(document).ready(function () {
                $("#owl-slider").owlCarousel({
                    navigation: true,
                    slideSpeed: 300,
                    paginationSpeed: 400,
                    singleItem: true

                });
            });

            //custom select box

            $(function () {
                $('select.styled').customSelect();
            });

            /* ---------- Map ---------- */
            $(function () {
                $('#map').vectorMap({
                    map: 'world_mill_en',
                    series: {
                        regions: [{
                                values: gdpData,
                                scale: ['#000', '#000'],
                                normalizeFunction: 'polynomial'
                            }]
                    },
                    backgroundColor: '#eef3f7',
                    onLabelShow: function (e, el, code) {
                        el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
                    }
                });
            });
        </script>




        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery-2.1.1.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/responsive-slider.js"></script>
        <script src="js/wow.min.js"></script>
        <script>
            $(document).ready(function () {
                $("#Wstd_fname").hide();
                $("#Wstd_lname").hide();
                $("#Wstd_id").hide();
                $("#Wgpa").hide();
                $("#Wpar_name").hide();
                //std fname
                $("#std_fname").focusout(function () {
                    if (!$("#std_fname").val()) {
                        $("#Wstd_fname").show();
                    } else {
                        $("#Wstd_fname").hide();
                    }
                });
                $("#std_fname").keyup(function () {
                    if (!$("#std_fname").val()) {
                        $("#Wstd_fname").show();
                    } else {
                        $("#Wstd_fname").hide();
                    }
                });
                //std lname
                $("#std_lname").focusout(function () {
                    if (!$("#std_lname").val()) {
                        $("#Wstd_lname").show();
                    } else {
                        $("#Wstd_lname").hide();
                    }
                });
                $("#std_lname").keyup(function () {
                    if (!$("#std_lname").val()) {
                        $("#Wstd_lname").show();
                    } else {
                        $("#Wstd_lname").hide();
                    }
                });
                //std id
                $("#std_id").focusout(function () {
                    if (!$("#std_id").val()) {
                        $("#Wstd_id").show();
                    } else {
                        $("#Wstd_id").hide();
                    }
                });
                $("#std_id").keyup(function () {
                    if (!$("#std_id").val()) {
                        $("#Wstd_id").show();
                    } else {
                        $("#Wstd_id").hide();
                    }
                });
                //gpa
                $("#gpa").focusout(function () {
                    if (!$("#gpa").val()) {
                        $("#Wgpa").show();
                    } else {
                        $("#Wgpa").hide();
                    }
                });
                $("#gpa").keyup(function () {
                    if (!$("#gpa").val()) {
                        $("#Wgpa").show();
                    } else {
                        $("#Wgpa").hide();
                    }
                });
                //par name
                $("#par_name").focusout(function () {
                    if (!$("#par_name").val()) {
                        $("#Wpar_name").show();
                    } else {
                        $("#Wpar_name").hide();
                    }
                });
                $("#par_name").keyup(function () {
                    if (!$("#par_name").val()) {
                        $("#Wpar_name").show();
                    } else {
                        $("#Wpar_name").hide();
                    }
                });
                //form
                $("form").mouseover(function () {
                    if (!$("#std_fname").val() || !$("#std_lname").val() || !$("#std_id").val() || !$("#gpa").val() || !$("#par_name").val()) {
                        $("#submit").attr('disabled', 'disabled');
                    } else {
                        $("#submit").removeAttr('disabled');
                    }
                });

            });
        </script>
    </body>
</html>
<?php

function select_dve01($conn, $std_id) {
    $sql = "select stu_fname,stu_lname,student_id,gpa,par_fname,par_lname from std where student_id = '$std_id'";
    $res = mysqli_query($conn, $sql);
    return $res;
}

function select_group($conn) {
    $sql = "select * from groups";
    $res = mysqli_query($conn, $sql);
    return $res;
}

function select_major($conn) {
    $sql = "select * from major";
    $res = mysqli_query($conn, $sql);
    return $res;
}

function select_edu($conn) {
    $sql = "select * from education";
    $res = mysqli_query($conn, $sql);
    return $res;
}
?>





















