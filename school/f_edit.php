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
        <?php
        include('../connect/conn.php');
        $school_id = $_GET["school_id"];
        $rowSch = get_sch($conn, $school_id);
        
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
        
        
        if ($_POST) {
            if (update_sch($conn, $_POST)) {
                header("location: show_school.php");
            } else {
                echo "อัพเดทไม่สำเร็จ";
            }
        }
        ?>
    </head>
    <body>
        <?php include '../menu2.php'; ?>



        <section id="main-content">
            <section class="wrapper">
                <!--overview start-->
                <div class="col-lg-12">
                    <h3 class="page-header" style="color: red;"><i style="color: red;" class="icon_key_alt"></i><b> แก้ไขข้อมูลสถานศึกษา</b></h3>
                </div> 

                <form class="form-horizontal" method="post" action="">



                    <div class="form-group">
                        <!--<label class="control-label col-sm-2">รหัสสถานศึกษา:</label>-->
                        <div class="col-sm-3">
                            <input class="form-control" type="hidden" name="school_id" value="<?php echo $rowSch["school_id"] ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">ชื่อสถานศึกษา:</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" name="school_name" value="<?php echo $rowSch["school_name"];?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">ชื่อประเภทสถานศึกษา</label>
                        <div class="col-sm-3">
                            <select name="school_type_id" class="form-control">
                                <?php while ($row_type = mysqli_fetch_array($res_type)) { ?>
                                    <option class="form-control" type="text" value="<?php echo $row_type["school_type_id"];?>"><?php echo $row_type["type_name"];?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">เลขที่อยู่</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" name="adress_no" value="<?php echo $rowSch["adress_no"] ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">ถนน</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" name="road" value="<?php echo $rowSch["road"] ?>">
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
                            <input class="form-control" type="text"  name="postcode" value="<?php echo $rowSch["postcode"]?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">เบอร์โทรศัพท์</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text"  name="phone" value="<?php echo $rowSch["phone"] ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">Fax</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text"  name="fax" value="<?php echo $rowSch["fax"] ?>">
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
                            <input class="form-control" type="text"  name="location" value="<?php echo $rowSch['location'];?>">
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
                                    <option class="form-control" type="text" value="<?php echo $row_ins["sch_ins_id"]?>"><?php echo $row_ins["sch_ins_name"] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">ผู้อำนวยการ</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text"  name="name_dir" value="<?php echo $rowSch["name_dir"] ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">รองผู้อำนวยการ กิจกรรม</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" name="deputy_academic" value="<?php echo $rowSch["deputy_academic"] ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">รองผู้อำนวยการ พัฒนากิจการ</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" name="deputy_activities" value="<?php echo $rowSch["deputy_activities"] ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">รองผู้อำนวยการ แผนงานและความร่วมมือ</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text"  name="deputy_plan" value="<?php echo $rowSch["deputy_plan"] ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">หัวหน้างานทะเบียน</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text"  name="head_register" value="<?php echo $rowSch["head_register"] ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">หัวหน้างานการเงิน</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text"  name="head_money" value="<?php echo $rowSch["head_money"] ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">หัวหน้างานหลักสูตร</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text"  name="head_course" value="<?php echo $rowSch["head_course"] ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">หัวหน้างานวัดผล</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text"  name="head_measure" value="<?php echo $rowSch["head_measure"] ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">หัวหน้างานแนะแนว</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text"  name="head_guide" value="<?php echo $rowSch["head_guide"] ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">หัวหน้างานปกครอง</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text"  name="head_rule" value="<?php echo $rowSch["head_rule"] ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">หัวหน้างานกิจกรรม</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text"  name="head_activities" value="<?php echo $rowSch["head_activities"] ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">เลขที่สถานศึกษา</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text"  name="school_number" value="<?php echo $rowSch["school_number"] ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">ที่ทำการไปรษณีย์</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text"  name="post_office" value="<?php echo $rowSch["post_office"] ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">เลขที่ไปรษณีย์</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text"  name="postal_number" value="<?php echo $rowSch["postal_number"] ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">โลโก้</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="file"  name="school_logo" value="<?php echo $rowSch["school_logo"] ?>">
                        </div>
                    </div>

                    <div class="text-center">
                        <input class="btn btn-success" type="submit" value="ตกลง">
                    </div>
                </form>

            </section>
        </section>
    </body>
</html>
<?php

function get_sch($conn, $id) {
    $sql = "select * from school where school_id = '$id'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    return $row;
}

function update_sch($conn, $data) {

    $school_id = $data["school_id"];
    $school_name = $data["school_name"];
    $school_type_id = $data["school_type_id"];
    $adress_no = $data["adress_no"];
    $road = $data["road"];
    $district_id = $data["district_id"];
    $aumper_id = $data["aumper_id"];
    $province_id = $data["province_id"];
    $postcode = $data["postcode"];
    $phone = $data["phone"];
    $fax = $data["fax"];
    $zone = $data["zone"];
    $location = $data["location"];
    $category = $data["category"];
    $institute_id = $data["institute_id"];
    $name_dir = $data["name_dir"];
    $deputy_academic = $data["deputy_academic"];
    $deputy_activities = $data["deputy_activities"];
    $deputy_plan = $data["deputy_plan"];
    $head_register = $data["head_register"];
    $head_money = $data["head_money"];
    $head_course = $data["head_course"];
    $head_measure = $data["head_measure"];
    $head_guide = $data["head_guide"];
    $head_rule = $data["head_rule"];
    $head_activities = $data["head_activities"];
    $school_number = $data["school_number"];
    $post_office = $data["post_office"];
    $postal_number = $data["postal_number"];
    $school_logo = $data["school_logo"];

    $sql = "update school set "
            . "school_name = '$school_name',"
            . "school_type_id = '$school_type_id',"
            . "adress_no = '$adress_no',"
            . "road = '$road',"
            . "district_id = '$district_id',"
            . "aumper_id = '$aumper_id',"
            . "province_id = '$province_id',"
            . "postcode = '$postcode',"
            . "phone = '$phone',"
            . "fax = '$fax',"
            . "zone = '$zone',"
            . "location = '$location',"
            . "category = '$category',"
            . "institute_id = '$institute_id',"
            . "name_dir = '$name_dir',"
            . "deputy_academic = '$deputy_academic',"
            . "deputy_activities = '$deputy_activities',"
            . "deputy_plan = '$deputy_plan',"
            . "head_register = '$head_register',"
            . "head_money = '$head_money',"
            . "head_course = '$head_course',"
            . "head_measure = '$head_measure',"
            . "head_guide = '$head_guide',"
            . "head_rule = '$head_rule',"
            . "head_activities = '$head_activities',"
            . "school_number = '$school_number',"
            . "post_office = '$post_office',"
            . "postal_number = '$postal_number',"
            . "school_logo = '$school_logo'"
            . "where school_id = '$school_id'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        $r = true;
    } else {
        $r = false;
    }
    return $r;
}
?>


