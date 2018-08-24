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

        <?php
        include('../connect/conn.php');
        $connect = $conn;
//$DiseaseID = $_GET['DiseaseID'];
        $sql = "select * from user where user_id = '" . $_GET["user_id"] . "'";
        $res = mysqli_query($connect, $sql);
        $rowDist = mysqli_fetch_array($res);

        $sql1 = "select * from user_type";
        $res_type = mysqli_query($connect, $sql1);

        $sql2 = "select * from school";
        $res_sch = mysqli_query($connect, $sql2);
        ?>
    </head>
    <body>
        <?php include '../menu2.php'; ?>
        <section id="main-content">
            <section class="wrapper">
                <!--overview start-->
                <div class="col-lg-12">
                    <h3 class="page-header" style="color: red;"><i style="color: red;" class="icon_cursor_alt"></i><b>แก้ไขข้อมูลเจ้าหน้าที่</b></h3>
                </div>

                <form class="form-horizontal" id="form1" name="form1" method="post" action="update.php">


                    <input type="hidden" name="user_id" id="user_id"  value="<?php echo $rowDist[user_id]; ?>" />


                    <div class="form-group">
                        <label class="control-label col-sm-2">ชื่อผู้ใช้งาน</label>
                        <div class="col-sm-4">

                            <input class="form-control" type="hidden" name="username"value= "<?php echo $rowDist[username]; ?>"  />
                            <div class="form-control"><?php echo $rowDist[username]; ?></div>
                        </div>
                    </div>




                    <div class="form-group">
                        <label class="control-label col-sm-2">รหัสผ่าน</label>
                        <div class="col-sm-4">

                            <input class="form-control" type="hidden" name="password"value= "<?php echo $rowDist[password]; ?>" />
                            <div class="form-control"><?php echo $rowDist[password]; ?></div>
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="control-label col-sm-2">ชื่อ</label>
                        <div class="col-sm-4">

                            <input class="form-control" type="text" name="fname"value= "<?php echo $rowDist[fname]; ?>"  />
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="control-label col-sm-2">นามสกุล</label>
                        <div class="col-sm-4">

                            <input class="form-control" type="text" name="lname"value="<?php echo $rowDist[lname]; ?>"  />
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="control-label col-sm-2">เบอร์โทรศัพท์</label>
                        <div class="col-sm-4">

                            <input class="form-control" type="text" name="phone" value= "<?php echo $rowDist[phone]; ?>" />
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="control-label col-sm-2">Email</label>
                        <div class="col-sm-4">

                            <input class="form-control" type="email" name="email" value="<?php echo $rowDist[email]; ?>"  />
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="control-label col-sm-2">ตำแหน่ง</label>
                        <div class="col-sm-4">

                            <select class="form-control" name="position">
                                <?php while ($row_type = mysqli_fetch_array($res_type)) { ?>
                                    <option value="<?php echo $row_type[user_type_id]; ?>"><?php echo $row_type[user_type_name]; ?></option>
                                <?php } ?>

                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">สถานะ</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="status">
                                <option value="Y">Y</option>
                                <option value="Y">N</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-sm-2">โรงเรียน</label>
                        <div class="col-sm-4">

                            <select class="form-control" name="school_id">
                                <?php while ($row_sch = mysqli_fetch_array($res_sch)) { ?>
                                    <option value="<?php echo $row_sch[school_id]; ?>"><?php echo $row_sch[school_name]; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>


                    <!-- 
                    <div class="form-group">
                        <label class="control-label col-sm-2">โรงเรียน</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" name="school_name" value= ""/>
                        </div>
                    </div>
                    -->

                    <input class="form-control" type="hidden" name="register_date" value= "<?php echo $rowDist[register_date]; ?>"/>




                    <input class="form-control" type="hidden" name="last_login" value= "<?php echo $rowDist[last_login]; ?>"/>


                    <div class="text-center">
                        <input class="btn btn-md btn-success" type="submit" value="OK" />
                    </div>

                </form>
            </section>
        </section>
    </body>
</html>