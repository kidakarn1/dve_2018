<?php
@SESSION_START();
if ($_SESSION['username'] == "") {
    header("location: login/login_admin.php");
} else {
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
            <meta name="author" content="GeeksLabs">
            <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
            <link rel="shortcut icon" href="../img/favicon.png">
            <title></title>
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
            <!--  -->
            <!-- <link rel="stylesheet" href="index.css"> -->
            <meta name="viewport" content="width=device-width">
            <!-- include the stylesheet -->
            <link rel="stylesheet" href="slideshow.css">
        </head>
        <body>
            <?php include'menu.php'; ?>
            <section id="main-content">
                <!-- include slideshow div -->
                <div id="slideshow">
                    <figure>
                        <img src="img-slideshow/12341.jpg" alt="blue sea in front of an island with a palmtree">
                    </figure>

                    <figure>
                        <img src="img-slideshow/1211.jpg" alt="five red velvet cupcakes on a white plate with red harts on top of there white topping">
                    </figure>
                    <figure>
                        <img src="img-slideshow/127.jpg" alt="thick forest with a small brown path curved between the trees">
                        <figcaption></figcaption>
                    </figure>
                    <figure>
                        <img src="img-slideshow/12345.jpg" alt="an empty desert with wavy sand hills and a glare of the bright sun"> 
                    </figure> 
                </div>



                <table class="table">
                    <div class="col-sm-12">
                        <h3 class="page-header text-center" style="color: red;"><b>งานประชาสัมพันธ์ วิทยาลัยเทคนิคชลบุรี</b></h3>
                    </div>
                    <tr>
                        <td><img src="img-slideshow/1.png" width="360" height="200"></td>
                        <td><img src="img-slideshow/3.png" width="360" height="200"></td>
                        <td width="390" height="200">
                            <a href="https://www.facebook.com/chontech.ac.th/photos/a.462278450478520.106996.227978340575200/1658101110896242/?type=3">
                                <img src="img-slideshow/2.png" width="360" height="200">
                            </a>
                        </td>
                    </tr>
                </table>

            </section>
            <script src="slideshow.js"></script>

        </body>
    </html>
<?php } ?>