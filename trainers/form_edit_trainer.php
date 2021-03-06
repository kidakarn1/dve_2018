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
    ?>
    <?php
    date_default_timezone_set('asia/bangkok');
    $sqlT = "select * from trainer,business,user where trainer.trainer_id = '{$_GET["id"]}' 
    and trainer.business_id = business.business_id
    and user.username = trainer.trainer_citizen
    "; 
    $resT = mysqli_query($conn,$sqlT);
    $rowT = mysqli_fetch_array($resT);
    $res_business = select_business($conn);
    ?>
    <body>
        <?php include '../menu2.php'; ?>
        <section id="main-content">
            <section class="wrapper">
                <div class="col-sm-12">
                    <h3 class="page-header" style="color: red;"><i style="color: red;" class="icon_zoom-in_alt"></i><b>เพิ่มข้อมูลครูฝึก</b></h3>
                </div>
                <form class="form-horizontal" method="post" action="edit_trainer.php">
                  <input value = "<?php echo $rowT["trainer_citizen"]?>" type="hidden" name="trainer_citizen" id="trainer_citizen" maxlength="13" required>
                  <div class="form-group">
                  <label class="control-label col-sm-2">ชื่อ-สกุล</label>
                    <div class="col-sm-3">
                    <input value = "<?php echo $rowT["trainer_name"]?>" type="text" class="form-control" name="trainer_name" required>
                    </div>
                  </div>
                  <div class="form-group">
                  <label class="control-label col-sm-2">ที่อยู่</label>
                    <div class="col-sm-3">
                      <textarea class="form-control" name="address" id="" cols="30" rows="5"><?php echo $rowT["address"]?></textarea>
                    </div>
                  </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2">เบอร์โทรศัพท์</label>
                      <div class="col-sm-3">
                        <input value = "<?php echo $rowT["phone"]?>" type="text" class="form-control" name="phone" maxlength="10" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2">email</label>
                      <div class="col-sm-3">
                        <input value = "<?php echo $rowT["email"]?>" type="email" class="form-control" name="email" required>
                      </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">ชื่อสถานประกอบการ</label>
                        <div class="col-sm-3">
                          <input value = "<?php echo $rowT["business_name"]?>" id="business_id" list="browsers" class="form-control" name="business_id">

                          <datalist id="browsers">
                            <?php while ($row_business = mysqli_fetch_assoc($res_business)) { ?>
                                <option class="browsers" data-value="<?php echo $row_business['business_id']; ?>"
                                value="<?php echo $row_business['business_name']; ?>"
                                ></option>
                            <?php } ?>
                          </datalist>
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
                              <option value="<?php echo $rowb["edu_id"];?>"
                                <?php if($rowb["edu_id"] == $rowT["edu_id"]) {echo "selected";}?>
                              ><?php echo $rowb["edu_name"];?></option>

                          <?php }?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2">ประสบการณ์ในอาชีพที่สำเร็จการศึกษา จำนวน-ปี</label>
                        <div class="col-sm-3"> 
                          <input value = "<?php echo $rowT["trainer_experience"]?>" type="text" class="form-control" name="trainer_experience">
                        </div>
                      </div>
                      <div class="form-group">
                      <label class="control-label col-sm-2">วันที่ได้รับการแต่งตั้งครูฝึก</label>
                        <div class="col-sm-3"> 
                          <input value = "<?php echo $rowT["assign_date"]?>" type="date" class="form-control" name="assign_date">
                        </div>
                      </div>
                      
                      <div class="form-group">
                      <label class="control-label col-sm-2">ได้รับการแต่งตั้งเป็นครูฝึก ด้วยวิธีใด</label>
                        <div class="col-sm-3"> 
                          <input value = "<?php echo $rowT["trainer_method_assign"]?>" type="text" class="form-control" name="trainer_method_assign">
                        </div>
                      </div>

                      <div class="form-group">
                      <label class="control-label col-sm-2">วันที่ออกใบรับรอง</label>
                        <div class="col-sm-3"> 
                          <input value = "<?php echo $rowT["certificate_date"]?>" type="date" class="form-control" name="certificate_date">
                        </div>
                      </div>

                    <div class="text-center">
                        <input class="btn btn-success" type="submit" id="submit" value="ตกลง">
                    </div>
                </form>
            </section>
        </section>
      
    </body>
</html>
<?php

function select_business($connect) {
    $sql = "select * from business";
    $res = mysqli_query($connect, $sql);
    return $res;
}
?>