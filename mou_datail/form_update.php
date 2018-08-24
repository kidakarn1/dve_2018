<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="Generator" content="EditPlus®">
        <meta name="Author" content="">
        <meta name="Keywords" content="">
        <meta name="Description" content="">
        <script src="../jquery/jquery.min.js"></script>
        <script src="../jquery-easing/jquery.easing.min.js"></script>
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
            <?php include '../menu2.php'; ?>
            <section id="main-content">
                <section class="wrapper">
                    <div class="col-sm-12">
                        <div class="col-sm-6">
                            <h3 class="page-header" style="color: red;"><i style="color: red;" class="fa fa-edit"></i><b>เพิ่มรายละเอียด MOU</b></h3>
                        </div>
<?php include("../connect/conn.php");
$id=$_GET['id'];
$mou=$_GET['mou'];
$major_id=$_GET['major_id'];
$update=$_POST['update'];
$mou_detail_id=$_POST['mou_detail_id'];
$car_brand=$_POST['car_brand'];
$type_of_car=$_POST['type_of_car'];
$business=$_POST['business'];
$education=$_POST['education'];
$major=$_POST['major'];

        if(isset($update)=="true"){
            $select_mou="select * from mou where business_id = '{$business}'";
            $res_mou=mysqli_query($conn,$select_mou);
            $row_mou=mysqli_fetch_assoc($res_mou);
            $mou_idd=$row_mou["mou_id"];
            $update="update mou_detail set mou_id='$mou_idd',level='$education',major_id = '$major' where mou_detail_id ='$mou_detail_id'";
            $res_update=mysqli_query($conn,$update);
            echo "<script> alert ('แก้ไขข้อมูลสำเร็จ');
                     window.location='select_mou_datail.php';
                 </script>";
        }
        if(isset($id)=="true"){
                $sql="select * from mou_detail where mou_detail_id = '{$id}'";
                $res=mysqli_query($conn,$sql);
                $row=mysqli_fetch_assoc($res);
                $res_education=select_education($conn);
                $res_business=select_business($conn);
                $res_major=select_major($conn);
    ?>
        <form method= "post" action="" class="form-horizontal">
            <input type="hidden" name="mou_detail_id" value="<?php echo $row["mou_detail_id"];?>">
            <div class="form-group">
            <label class="col-xs-5 col-sm-2 control-label">รหัสรายละเอียด</label>	
            <div class="col-sm-3">
            <?php echo $row["mou_detail_id"];?></th>
            </div>
            </div>
            <div class="form-group">
                <label class="col-xs-5 col-sm-2 control-label"> mou</label>	
                <div class="col-sm-3">
                <select name="business" class="form-control">
                <?php while($row_business=mysqli_fetch_assoc($res_business)){?>
	                <option value="<?php echo $row_business["business_id"];?>" <?php if ($row_business["business_id"]==$mou){echo "selected";}?>><?php echo $row_business["business_name"];?>
                <?php }?>
                </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-5 col-sm-2 control-label">ระดับที่ทำ mou</label>	
                <div class="col-sm-3">
                <select name="education" class="form-control">
                <?php while($row_education=mysqli_fetch_assoc($res_education)){?>
	                <option value="<?php echo $row_education["edu_name"];?>" <?php if ($row_education["edu_name"]==$row['level']){echo "selected";}?>><?php echo $row_education["edu_name"];?>
                <?php }?>
                </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-5 col-sm-2 control-label">สาขาวิชา</label>	
                <div class="col-sm-3">
                <select name="major" class="form-control">
                <?php while($row_major=mysqli_fetch_assoc($res_major)){?>
	                <option value="<?php echo $row_major["major_id"];?>" <?php if ($row_major["major_id"]==$row['major_id']){echo "selected";}?>><?php echo $row_major["major_name"];?>
                <?php }?>
                </select> 
                </div>
                </div>
                <div class="text-center"> 
                <input  class="btn btn-md btn-success" type="submit" name="update" value="แก้ไข"></th></tr>
                </div>
        </form>
<?php
    }
function select_education($conn){
    $sql="select * from education";
    $res=mysqli_query($conn,$sql);
    return $res;
}
function select_business($conn){
    $sql="select * from business ";
    $res=mysqli_query($conn,$sql);
    return $res;
}
function select_major($conn){
    $sql="select * from major ";
    $res=mysqli_query($conn,$sql);
    return $res;
}
?>
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
