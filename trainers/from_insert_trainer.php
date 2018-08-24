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
    </head>
    <?php
    include("../connect/conn.php");
    $connect = $conn;
    $res_DISTRICT = select_DISTRICT($connect);
    $res_AMPHUR = select_AMPHUR($connect);
    $res_PROVINCE = select_PROVINCE($connect);
    $res_zipcode = select_zipcodes($connect); 
    ?>
    <body>
        <?php include '../menu2.php'; ?>
        <section id="main-content">
            <section class="wrapper">
                <div class="col-sm-12">
                    <h3 class="page-header" style="color: red;"><i style="color: red;" class="icon_zoom-in_alt"></i><b>เพิ่มข้อมูลครูฝึก</b></h3>
                </div>
                <form class="form-horizontal" method="post" action="insert_trainer.php">
                  <div class="form-group">
                  <label class="control-label col-sm-2">เลขบัตรประชาชน</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" name="trainer_citizen" id="trainer_citizen" maxlength="13" required>
                    </div>
                  </div>
                  <div class="form-group">
                  <label class="control-label col-sm-2">ชื่อ-สกุล</label>
                    <div class="col-sm-3">
                    <input type="text" class="form-control" name="trainer_name" required>
                    </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-2">บ้านเลขที่</label>
                      <div class="col-sm-3">
                          <input class="form-control" type="text" name="home_id">
                      </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">ซอย</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" name="soi">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">ถนน</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" name="road">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">จังหวัด </label>
                        <div class="col-sm-3">
                            <select class="form-control" id="PROVINCE_CODE" name="PROVINCE_ID" class="form-control">
                                <?php while ($row_PROVINCE = mysqli_fetch_assoc($res_PROVINCE)) { ?>
                                    <option value="<?php echo $row_PROVINCE['PROVINCE_NAME']; ?>">
                                        <?php echo $row_PROVINCE['PROVINCE_NAME']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">อำเภอ </label>
                        <div class="col-sm-3">
                            <select class="form-control" id="AMPHUR_CODE" name="AMPHUR_CODE" class="form-control">
                                <?php while ($row_AMPHUR = mysqli_fetch_assoc($res_AMPHUR)) { ?>
                                    <option value="<?php echo $row_AMPHUR['AMPHUR_NAME']; ?>">
                                        <?php echo $row_AMPHUR['AMPHUR_NAME']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">ตำบล</label>
                        <div class="col-sm-3">
                            <select class="form-control" id="DISTRICT_CODE" name="DISTRICT_CODE" class="form-control">
                                <?php while ($row_DISTRICT = mysqli_fetch_assoc($res_DISTRICT)) { ?>
                                    <option value="<?php echo $row_DISTRICT['DISTRICT_NAME']; ?>">
                                        <?php echo $row_DISTRICT['DISTRICT_NAME']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">รหัสไปรษณีย์ </label>
                        <div class="col-sm-3">
                            <select class="form-control" id="zipcode" name="zipcode" class="form-control">
                                <?php while ($row_zipcode = mysqli_fetch_assoc($res_zipcode)) { ?>
                                    <option value="<?php echo $row_zipcode['zipcode']; ?>">
                                        <?php echo $row_zipcode['zipcode']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-sm-2">เบอร์โทรศัพท์</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="phone" maxlength="10" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2">email</label>
                      <div class="col-sm-3">
                        <input type="email" class="form-control" name="email" required>
                      </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">ชื่อสถานประกอบการ</label>
                        <div class="col-sm-3">
                          <?php include("../dataList_business.php"); ?>
                        </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2">วุฒิการศึกษาสูงสุด</label>
                      <div class="col-sm-3"> 
                        <select name="educational_id" class="form-control">
                          <?php 
                            $sqlb = "select * from education";
                            $resb = mysqli_query($conn,$sqlb);
                            while($rowb = mysqli_fetch_array($resb)) {
                          ?>
                              <option value="<?php echo $rowb["edu_id"];?>"><?php echo $rowb["edu_name"];?></option>

                          <?php }?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2">ประสบการณ์ในอาชีพที่สำเร็จการศึกษา จำนวน-ปี</label>
                        <div class="col-sm-3"> 
                          <input type="text" class="form-control" name="trainer_experience">
                        </div>
                      </div>
                      <div class="form-group">
                      <label class="control-label col-sm-2">วันที่ได้รับการแต่งตั้งครูฝึก</label>
                        <div class="col-sm-3"> 
                          <input type="date" class="form-control" name="assign_date">
                        </div>
                      </div>
                      
                      <div class="form-group">
                      <label class="control-label col-sm-2">ได้รับการแต่งตั้งเป็นครูฝึก ด้วยวิธีใด</label>
                        <div class="col-sm-3"> 
                          <input type="text" class="form-control" name="trainer_method_assign">
                        </div>
                      </div>

                      <div class="form-group">
                      <label class="control-label col-sm-2">วันที่ออกใบรับรอง</label>
                        <div class="col-sm-3"> 
                          <input type="date" class="form-control" name="certificate_date">
                        </div>
                      </div>

                    <div class="text-center">
                        <input class="btn btn-success" type="submit" id="submit" value="ตกลง">
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
        <!-- <script src="../js/scripts.js"></script> -->
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

              $("#submit").prop('disabled', true);
              $("#re_password").keyup(function(){
                if($(this).val() != $("#password").val()) {
                  $("#submit").prop('disabled', true);
                  $(this).css('background-color', '#ffb3b3');
                } else {
                  $("#submit").prop('disabled', false);
                  $(this).css('background-color', 'transparent');
                }
              });

              $("#trainer_citizen").keyup(function(){
                if(!checkID($("#trainer_citizen").val())) {
                  $("#submit").prop('disabled', true);
                  $(this).css('background-color', '#ffb3b3');
                } else {
                  $("#submit").prop('disabled', false);
                  $(this).css('background-color', 'transparent');
                }
              });

              function checkID(id){
                if(id.length != 13) return false;
                for(i=0, sum=0; i < 12; i++)
                  sum += parseFloat(id.charAt(i))*(13-i); 
                if((11-sum%11)%10!=parseFloat(id.charAt(12)))
                  return false; 
                return true;
              }


              $("#PROVINCE_CODE").change(function() {
                var amphur_name = [];
                $.post("../select_p_a_d.php",
                {
                  PROVINCE_CODE: $(this).val(),
                },function(r) {
                  amphur_name = JSON.parse(r);
                  // alert(amphur_name);
                  $('#AMPHUR_CODE').find('option').remove();
                  // alert(amphur_name.length);
                  for(var i = 0;i< amphur_name.length;i++) {
                    $('#AMPHUR_CODE').append($('<option>',
                    {
                        value: amphur_name[i],
                        text : amphur_name[i] 
                    }));                     
                  }
                });
              });

              $("#AMPHUR_CODE").change(function() {
                var district_name = [];
                $.post("../select_p_a_d.php",
                {
                  AMPHUR_CODE: $(this).val(),
                },function(r) {
                  district_name = JSON.parse(r);
                  // alert(district_name);
                  $('#DISTRICT_CODE').find('option').remove();
                  // alert(district_name.length);
                  for(var i = 0;i< district_name.length;i++) {
                    $('#DISTRICT_CODE').append($('<option>',
                    {
                        value: district_name[i],
                        text : district_name[i] 
                    }));                     
                  }
                });
              });

              $("#DISTRICT_CODE").change(function() {
                var zipcode_name = [];
                $.post("../select_p_a_d.php",
                {
                  DISTRICT_CODE: $(this).val(),
                },function(r) {
                  zipcode_name = JSON.parse(r);
                  // alert(zipcode_name);
                  $('#zipcode').find('option').remove();
                  // alert(zipcode_name.length);
                  for(var i = 0;i< zipcode_name.length;i++) {
                    $('#zipcode').append($('<option>',
                    {
                        value: zipcode_name[i],
                        text : zipcode_name[i] 
                    }));                     
                  }
                });
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

function select_business($connect) {
    $sql = "select * from business";
    $res = mysqli_query($connect, $sql);
    return $res;
}
?>