<?php @SESSION_START(); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
        <meta name="author" content="GeeksLabs">
        <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
        <link rel="shortcut icon" href="img/favicon.png">

        <title>select_group</title>

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

        <?php
        include('connect/conn.php');

        // $resMajor = select_major($conn);
        // $resGroup = select_group($conn);
        $std_id = $_SESSION['username'];
        $resBusiness = select_business($conn);
        // $resAddress_no = select_business($conn);
        // $resMoo = select_business($conn);
        // $resRoad = select_business($conn);
        // $resPhone = select_business($conn);
        // $resEmail = select_business($conn);
        // $resLocation = select_business($conn);
        // $resProvince = select_province($conn);
        // $resDistrict = select_district($conn);
        // $resAmphur = select_amphur($conn);
        $resAlley = select_business($conn);
        date_default_timezone_set("asia/bangkok");
        $year = date("y")+43;
        $sql = "select * from user,student,major where student.std_id = '$std_id' and user.username = student.std_id";
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($res);
        $edu = substr($row['std_id'], 0, 2);
        $edu_id = substr($row['std_id'], 2, 1);
        $dep_id = $row["dep_id"];
        $level = $year - $edu;
        //$level = $level + 1;
        ?>
        <script src="jquery/jquery.min.js"></script>
        <script src="jquery-easing/jquery.easing.min.js"></script>

    </head>
    <body>

        <?php include 'menu2.php'; ?>
        <section id="main-content">
            <section class="wrapper">
                <!--overview start-->
                <div class="col-lg-12">
                    <h3 class="page-header" style="color: red;"><i style="color: red;" class="icon_profile"></i><b>รายละเอียดสถานประกอบการ</b></h3>
                </div>
                <form class="form-horizontal" method="post" action="add_dve.php">
                    <input type="hidden" value="<?php echo $row['citizen_id']?>" name="citizen_id">
                    <div class="form-group">

                        <label class="control-label col-sm-2">ชื่อสถานประกอบการ</label>
                        <div class="col-sm-5">
                          <?php include("dataList_business.php"); ?>
                        </div>
                    </div>
                     <input type="hidden" name="school_id" value="<?php echo $row['school_id']?>">               
                    <div class="form-group">
                        <input type="hidden" name="std_id" value="<?php echo $row['std_id'] ?>">
                        <label class="control-label col-sm-2 col-xs-5">รหัสนักศึกษา</label>
                        <div class="col-sm-1">
                            <div class="form-control-static">
                                <?php echo $_SESSION['username']; ?>
                            </div>
                        </div>

                        <div class="col-sm-1 col-xs-4">
                          <select name="h_name_std" id="h_name_std">
                            <option value="นาย">นาย</option>
                            <option value="นาง">นาง</option>
                            <option value="นางสาว">นางสาว</option>
                          </select>
                        </div>

                        <div class="col-sm-2 col-xs-4">
                            <div class="form-control-static">
                                <?php echo $row['std_name']; ?>
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                      <label class="control-label col-sm-2 col-xs-5">ชื่อบิดา</label>
                      <div class="col-sm-1 col-xs-4">
                        <input type="hidden" name="h_dad_std" value="นาย">
                        นาย
                      </div>

                      <div class="col-sm-2 col-xs-4">
                          <div class="form-control-static">
                              <?php echo $row['dad_name']." ".$row['dad_lname']; ?>
                          </div>
                      </div>
                      <label class="col-sm-1 col-xs-4">ชื่อมารดา</label>
                      <div class="col-sm-1 col-xs-4">
                        <select name="h_mom_std" id="h_mom_std">
                          <option value="นาง">นาง</option>
                          <option value="นางสาว">นางสาว</option>
                        </select>
                      </div>

                      <div class="col-sm-2 col-xs-4">
                          <div class="form-control-static">
                              <?php echo $row['mom_name']." ".$row['mom_lname']; ?>
                          </div>
                      </div>

                    </div>

                    <div class="form-group">
                      <label class="control-label col-sm-2 col-xs-5">ชื่อผู้ปกครอง</label>
                      <div class="col-sm-1 col-xs-4">
                        <select name="h_parent_std" id="h_parent_std">
                          <option value="นาย">นาย</option>
                          <option value="นาง">นาง</option>
                          <option value="นางสาว">นางสาว</option>
                        </select>
                      </div>

                      <div class="col-sm-2 col-xs-4">
                          <div class="form-control-static">
                              <?php echo $row['parent_name']." ".$row['parent_lname']; ?>
                          </div>
                      </div>
                      <label class="col-sm-2 col-xs-5">เบอร์โทรนักศึกษา</label>
                      <div class="col-sm-2 col-xs-4">
                        <input class="form-control" type="text" name="phone" maxlength="10" required > 
                      </div>

                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2 col-xs-5">e-mail นักศึกษา</label>
                      <div class="col-sm-2 col-xs-4">
                        <input class="form-control" type="email" name="email" maxlength="50" required > 
                      </div>
                      <label class="control-label col-sm-2 col-xs-5">ความสามารถพิเศษ</label>
                      <div class="col-sm-2 col-xs-4">
                        <textarea class="form-control" name="genius" id="genius" cols="30" rows="3" maxlenght="200"></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2 col-xs-4">นักศึกษาระดับ</label>
                        <div class="col-sm-2 col-xs-6">
                            <div class="form-control-static">
                                 ปวช (   <?php
                                if ($row['edu_id'] == 2) {
                                    echo "&#x2714;";
                                    $level1 = $row['edu_id'];
                                }
                                ?>)
                                ปวส (<?php
                                if ($row['edu_id'] == 3) {
                                    echo "&#x2714;";
                                    $level1 = $row['edu_id'];
                                }
                                ?> )
                                ปีที่ <?php
                                if ($row['edu_id'] == 2) {
                                    if ($level > 3) {
                                        echo "3";
                                    } else {
                                      echo $level;
                                    }
                                }
                                if ($row['edu_id'] == 3) {
                                    if ($level > 2) {
                                        echo "2";
                                    } else {
                                      echo $level;
                                    }
                                }
                                ?>
                            </div>
                            <input type="hidden" name="level" value="<?php echo $level ?>">
                        </div>

                        <label class="control-label col-sm-1 col-xs-1">กลุ่ม</label>
                        <div class="form-control-static col-xs-1">
                            <?php echo substr($row['group_id'],6,2) ?>
                            <input type="hidden" name="group_id" value="<?php echo $row['group_id'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2 col-xs-4">สาขางาน</label>
                        <div class="col-sm-2">
                            <div class="form-control-static">
                              <select name="major_minor_id" id="major_id">
                                <?php 
                                  $sqlMajor = "select * from minor,major where minor.dep_id = '$dep_id' and major.major_id = minor.major_id";
                                  $resMajor = mysqli_query($conn,$sqlMajor);
                                  while ($rowMajor = mysqli_fetch_array($resMajor)) {?>
                                    <option value="<?php echo $rowMajor['minor_id'].",".$rowMajor['major_id']?>"><?php echo $rowMajor['minor_name']?></option>
                                <?php }?>
                              </select>
                            </div>
                        </div>


                        <label class="form-control-static col-sm-2 col-xs-4">ระบบการศึกษา</label>
                        <div class="form-control-static">
                            (<?php
                            if ($row['system_id'] == 1) {
                                echo "&#x2714;";
                            }
                            ?> ) ระบบปกติ (<?php
                            if ($row['system_id'] == 2) {
                                echo "&#x2714;";
                            }
                            ?> ) ระบบทวิภาคี 	
                        </div>
                        <input type="hidden" value="<?php echo $row['system_id'] ?>" name="system_id">
                    </div>
                    <div class="text-center">
                        <input id="submit"class="btn btn-success" type="submit" value="ตกลง">
                    </div>
                </form>
            </section>
        </section>




        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSw8juBIJndAygO7H2ZZbxLQr5BtT9TZ0&libraries=places&callback=initMap"
        async defer></script>


        <script src="js/jquery.js"></script>
        <script src="js/jquery-ui-1.10.4.min.js"></script>
        <script src="js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
        <!-- bootstrap -->
        <script src="js/bootstrap.min.js"></script>
        <!-- nice scroll -->
        <script src="js/jquery.scrollTo.min.js"></script>
        <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
        <!-- charts scripts -->
        <script src="assets/jquery-knob/js/jquery.knob.js"></script>
        <script src="js/jquery.sparkline.js" type="text/javascript"></script>
        <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
        <script src="js/owl.carousel.js"></script>
        <!-- jQuery full calendar -->
        <script src="js/fullcalendar.min.js"></script>
        <!-- Full Google Calendar - Calendar -->
        <script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
        <!--script for this page only-->
        <script src="js/calendar-custom.js"></script>
        <script src="js/jquery.rateit.min.js"></script>
        <!-- custom select -->
        <script src="js/jquery.customSelect.min.js"></script>
        <script src="assets/chart-master/Chart.js"></script>

        <!--custome script for all page-->
        <script src="js/scripts.js"></script>
        <!-- custom script for this page-->
        <script src="js/sparkline-chart.js"></script>
        <script src="js/easy-pie-chart.js"></script>
        <script src="js/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="js/jquery-jvectormap-world-mill-en.js"></script>
        <script src="js/xcharts.min.js"></script>
        <script src="js/jquery.autosize.min.js"></script>
        <script src="js/jquery.placeholder.min.js"></script>
        <script src="js/gdp-data.js"></script>
        <script src="js/morris.min.js"></script>
        <script src="js/sparklines.js"></script>
        <script src="js/charts.js"></script>
        <script src="js/jquery.slimscroll.min.js"></script>



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
    </body>
</html>
<?php

function select_business($connect) {
    $sql = "select * from business";
    $res = mysqli_query($connect, $sql);
    return $res;
}

function select_amphur($connect) {
    $sql = "select * from amphur";
    $res = mysqli_query($connect, $sql);
    return $res;
}

function select_province($connect) {
    $sql = "select * from province";
    $res = mysqli_query($connect, $sql);
    return $res;
}

function select_district($connect) {
    $sql = "select * from district";
    $res = mysqli_query($connect, $sql);
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

function select_dve02($conn, $std_id) {
  $sql = "select stu_fname,stu_lname,student_id,gpa,par_fname,par_lname from std where student_id = '{$_SESSION['username']}'";
  $res = mysqli_query($conn, $sql);
  return $res;
}
?>