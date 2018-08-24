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

        <script src="../jquery/jquery.min.js"></script>
        <script src="../jquery-easing/jquery.easing.min.js"></script>
        <?php
        $maxnum = 30;
        include('../connect/conn.php');
        $key = $_POST["seach"];
        if ($_GET['pagemin']) {
            $resEvalua = get_evalua($conn, $key, $_GET['pagemin'], $maxnum);
        } else {
            $resEvalua = get_evalua($conn, $key, 0, $maxnum);
        }
        if ($_GET['evalua_id']) {
            $id = $_GET['evalua_id'];
            del_evalua($conn, $id);
        }
        ?>
    </head>
    <body>
        <?php include '../menu2.php'; ?>
        <section id="main-content">
            <section class="wrapper">
                <!--overview start-->
                <div class="col-sm-12">
                    <div class="col-sm-6">
                        <h3 class="page-header" style="color: red;"><i style="color: red;" class="icon_question"></i><b>คำถามประเมิน</b></h3>
                    </div>

                    <form class="form-horizontal" method="post">
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-3 col-xs-9">
                                <input class="form-control " type="text" name="seach" id="seach">
                            </div>
                            <input class="btn btn-md btn-success" type="submit" value="ค้นหา">
                        </div>
                    </form>

                    <table class="table text-center">
                        <tr>
                            <td>คำถาม</td>
                            <td>คะแนน</td>
                            <td>รหัสนักเรียน</td>
                            <td>รหัสผู้ประเมิน</td>
                            <td><a class="btn btn-xs btn-primary" href="evalua_f_insert.php"><i class="icon_plus_alt2"></i></a></td>
                        </tr>
                        <?php while ($rowEvalua = mysqli_fetch_array($resEvalua)) { ?>
                            <tr>
                                <td><?php echo $rowEvalua['Que_name']; ?></td>
                                <td><?php echo $rowEvalua['score']; ?></td>
                                <td><?php echo $rowEvalua['student_id']; ?></td>
                                <td><?php echo $rowEvalua['assessor']; ?></td>
                                <td>
                                    <a class="btn btn-xs btn-warning" href="edit_f_evalua.php?evalua_id=<?php echo $rowEvalua['evalua_id']; ?>&Que_id=<?php echo $rowEvalua['Que_id']; ?>"><span class="icon_target"></span></a>
                                    <a class="btn btn-xs btn-danger" href="show_evalua.php?evalua_id=<?php echo $rowEvalua['evalua_id']; ?>"><i class="icon_close_alt2"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </section>
        </section>
        <?php
        $sql = "select * from evaluation_results";
        $res = mysqli_query($conn, $sql);
        $page = mysqli_num_rows($res);
        $maxpage = $page / $maxnum;
        if ($page % $maxnum != 0) {
            $maxpage = $maxpage + 1;
        }
        for ($i = 1; $i <= $maxpage; $i++) {
            ?>
            <a href="show_evalua.php?pagemin=<?php echo $maxnum * $i - $maxnum ?>"><?php echo $i ?></a>
        <?php } ?>




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
<?php

function get_evalua($conn, $key, $pagemin, $maxnum) {
    $sql = "select * from evaluation_results,question where evaluation_results.Que_id = question.Que_id and student_id like '$key%' limit $pagemin,$maxnum";
    $res = mysqli_query($conn, $sql);
    return $res;
}

function del_evalua($conn, $id) {
    $sql = "delete from evaluation_results where evalua_id = '$id' ";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        $r = true;
        header("location: show_evalua.php");
    } else {
        $r = false;
    }
    return $r;
}
?>
