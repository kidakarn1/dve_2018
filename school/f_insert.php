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


        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <link href="../css/bootstrap-theme.css" rel="stylesheet">


        <link href="../css/elegant-icons-style.css" rel="stylesheet" />
        <link href="../css/font-awesome.min.css" rel="stylesheet" />

        <link href="../assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
        <link href="../assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />

        <link href="../assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />

        <link rel="stylesheet" href="../css/owl.carousel.css" type="text/css">
        <link href="../css/jquery-jvectormap-1.2.2.css" rel="stylesheet">

        <link rel="stylesheet" href="../css/fullcalendar.css">
        <link href="../css/widgets.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet"> 
        <link href="../css/style-responsive.css" rel="stylesheet" />
        <link href="../css/xcharts.min.css" rel=" stylesheet">
        <link href="../css/jquery-ui-1.10.4.min.css" rel="stylesheet"> 
    </head>
    <body>
        <?php include '../menu2.php'; ?>
        <?php
        include('../connect/conn.php');

        $connnect = $conn;
        $sql_sch = "select * from school";
        $res_sch = mysqli_query($conn, $sql_sch);
        
        $sql_type = "select * from school_type";
        $res_type = mysqli_query($conn, $sql_type);
        
        $sql_dis = "select * from district";
        $res_dis = mysqli_query($conn, $sql_dis);
        
        $sql_am = "select * from amphur";
        $res_am = mysqli_query($conn, $sql_am);
        
        $sql_pro = "select * from province";
        $res_pro = mysqli_query($conn, $sql_pro);
        
        $sql_zone = "select * from zone";
        $res_zone = mysqli_query($conn, $sql_zone);
        
        $sql_ins = "select * from school_ins";
        $res_ins = mysqli_query($conn, $sql_ins);
        ?>


        <section id="main-content">
            <section class="wrapper">
                <!--overview start-->
                <div class="col-lg-12">
                    <h3 class="page-header" style="color: red;"><i style="color: red;" class="icon_key_alt"></i><b>เพิ่มข้อมูลสถานศึกษา</b></h3>
                </div> 


                <form class="form-horizontal" method="post" action="insert_sql.php">


                    <input type="hidden" name="username" value="" />
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2">รหัสสถานศึกษา:</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" name="school_id"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">ชื่อสถานศึกษา:</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" name="school_name"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">ชื่อประเภทสถานศึกษา</label>
                        <div class="col-sm-3">
                            <select name="school_type_id" class="form-control">
                                <?php while ($row_type = mysqli_fetch_array($res_type)) { ?>
                                    <option class="form-control" type="text" value="<?php echo $row_type["school_type_id"] ?>"><?php echo $row_type["type_name"] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">เลขที่อยู่</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" name="address_no" />
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2">ถนน</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" name="road" />
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2">ตำบล</label>
                        <div class="col-sm-3">
                            <select name="district_id" class="form-control">
                                <?php while ($row_dis = mysqli_fetch_array($res_dis)) { ?>
                                    <option class="form-control" type="text" value="<?php echo $row_dis["DISTRICT_CODE"] ?>"><?php echo $row_dis["DISTRICT_NAME"] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2">อำเภอ</label>
                        <div class="col-sm-3">
                            <select name="aumper_id" class="form-control">
                                <?php while ($row_am = mysqli_fetch_array($res_am)) { ?>
                                    <option class="form-control" type="text" value="<?php echo $row_am["AMPHUR_CODE"] ?>"><?php echo $row_am["AMPHUR_NAME"] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2">จังหวัด</label>
                        <div class="col-sm-3">
                            <select name="province_id" class="form-control">
                                <?php while ($row_pro = mysqli_fetch_array($res_pro)) { ?>
                                    <option class="form-control" type="text" value="<?php echo $row_pro["PROVINCE_CODE"] ?>"><?php echo $row_pro["PROVINCE_NAME"] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2">รหัสไปรษณีย์</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text"  name="postcode"/>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2">เบอร์โทรศัพท์</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text"  name="phone"/>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2">Fax</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text"  name="fax"/>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2">Zone</label>
                        <div class="col-sm-3">
                            <select name="zone" class="form-control">
                                <?php while ($row_zone = mysqli_fetch_array($res_zone)) { ?>
                                    <option class="form-control" type="text" value="<?php echo $row_zone["zone_id"] ?>"><?php echo $row_zone["zoneName"] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2">location</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text"  name="location"/>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2">สังกัด</label>
                        <div class="col-sm-3">
                            <select name="category" class="form-control">
                                    <option class="form-control" type="text" value="รัฐบาล">รัฐบาล</option>
                                    <option class="form-control" type="text" value="เอกชน">เอกชน</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2">สังกัดสถาบัน</label>
                        <div class="col-sm-3">
                            <select name="institute_id" class="form-control">
                                <?php while ($row_ins = mysqli_fetch_array($res_ins)) { ?>
                                    <option class="form-control" type="text" value="<?php echo $row_ins["sch_ins_id"] ?>"><?php echo $row_ins["sch_ins_name"] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">ผู้อำนวยการ</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text"  name="name_dir"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">รองผู้อำนวยการ กิจกรรม</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" name="deputy_academic" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">รองผู้อำนวยการ พัฒนากิจการ</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" name="deputy_activities" />
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2">รองผู้อำนวยการ แผนงานและความร่วมมือ</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text"  name="deputy_plan"/>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2">หัวหน้างานทะเบียน</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text"  name="head_register"/>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2">หัวหน้างานการเงิน</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text"  name="head_money"/>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2">หัวหน้างานหลักสูตร</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text"  name="head_course"/>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2">หัวหน้างานวัดผล</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text"  name="head_measure"/>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2">หัวหน้างานแนะแนว</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text"  name="head_guide"/>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2">หัวหน้างานปกครอง</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text"  name="head_rule"/>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2">หัวหน้างานกิจกรรม</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text"  name="head_activities"/>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2">เลขที่สถานศึกษา</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text"  name="school_number"/>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2">ที่ทำการไปรษณีย์</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text"  name="post_office"/>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2">เลขที่ไปรษณีย์</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text"  name="postal_number"/>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2">โลโก้</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="file"  name="school_logo"/>
                        </div>
                    </div>
                    
                    
                    
                    
                    
                    
                    
                    <div class="text-center">
                        <input class="btn btn-success" type="submit" value="ตกลง">
                    </div>
                </form>

            </section>
        </section>






        <script src="../js/jquery.js"></script>
        <script src="../js/jquery-ui-1.10.4.min.js"></script>
        <script src="../js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="../js/jquery-ui-1.9.2.custom.min.js"></script>
        <!-- bootstrap -->
        <script src="../js/bootstrap.min.js"></script>
        <!-- nice scroll -->
        <script src="../js/jquery.scrollTo.min.js"></script>
        <script src="../js/jquery.nicescroll.js" type="text/javascript"></script>
        <!-- charts scripts -->
        <script src="../assets/jquery-knob/js/jquery.knob.js"></script>
        <script src="../js/jquery.sparkline.js" type="text/javascript"></script>
        <script src="../assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
        <script src="../js/owl.carousel.js"></script>
        <!-- jQuery full calendar -->
        <script src="../js/fullcalendar.min.js"></script>
        <!-- Full Google Calendar - Calendar -->
        <script src="../assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
        <!--script for this page only-->
        <script src="../js/calendar-custom.js"></script>
        <script src="../js/jquery.rateit.min.js"></script>
        <!-- custom select -->
        <script src="../js/jquery.customSelect.min.js"></script>
        <script src="../assets/chart-master/Chart.js"></script>

        <!--custome script for all page-->
        <script src="../js/scripts.js"></script>
        <!-- custom script for this page-->
        <script src="../js/sparkline-chart.js"></script>
        <script src="../js/easy-pie-chart.js"></script>
        <script src="../js/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="../js/jquery-jvectormap-world-mill-en.js"></script>
        <script src="../js/xcharts.min.js"></script>
        <script src="../js/jquery.autosize.min.js"></script>
        <script src="../js/jquery.placeholder.min.js"></script>
        <script src="../js/gdp-data.js"></script>
        <script src="../js/morris.min.js"></script>
        <script src="../js/sparklines.js"></script>
        <script src="../js/charts.js"></script>
        <script src="../js/jquery.slimscroll.min.js"></script>
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
