  <?php include('../connect/conn.php');
  $connect=$conn;
  $res_district=select_district($connect);
  $res_amphur=select_amphur($connect);
  $res_province=select_province($connect);
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="Generator" content="EditPlus®">
        <meta name="Author" content="">
        <meta name="Keywords" content="">
        <meta name="Description" content="">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
        <meta name="author" content="GeeksLabs">
        <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
        <link rel="shortcut icon" href="../img/favicon.png">
        <title>Business</title>
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
    <script language=Javascript>
        function Inint_AJAX() {
            try {
                return new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
            } //IE
            try {
                return new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
            } //IE
            try {
                return new XMLHttpRequest();
            } catch (e) {
            } //Native Javascript
            alert("XMLHttpRequest not supported");
            return null;
        }
        ;

        function dochange(src, val) {
            var req = Inint_AJAX();
            req.onreadystatechange = function () {
                if (req.readyState == 4) {
                    if (req.status == 200) {
                        document.getElementById(src).innerHTML = req.responseText; //รับค่ากลับมา
                    }
                }
            };
            req.open("GET", "localtion.php?data=" + src + "&val=" + val); //สร้าง connection
            req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); // set Header
            req.send(null); //ส่งค่า
        }

        window.onLoad = dochange('province', -1);
    </script>
	

    <style>
        .error{
            color:red;
        }
    </style>
	
	</head>
    <body>
<?php include '../menu2.php'; ?>
   <section id="main-content">
   <section class="wrapper">


<table class='table'>
<tr><th bgcolor="#990000"><font size="3"color="#ffffff"><b>Insert Business</b></font></th></tr>
<tr>
<td>

        <form class="form-horizontal" method="post" action="insert_business.php">
        <div class="container">	
		<div class='form-group'>
        <label class="col-xs-5 col-sm-2 control-label">รหัสสถานประกอบการ</label>
	    <input type="text" name="business_id">
		</div>
		</div>
	
		 <div class="container">						
		<div class='form-group'>
	    <label class="col-xs-5 col-sm-2 control-label">ชื่อสถานประกอบการ</label>
	    <input type="text" name="business_name">
		</div>
		</div>

		 <div class="container">						
		<div class='form-group'>
	    <label class="col-xs-5 col-sm-2 control-label">parent_business_id</label>
	    <input type="text" name="parent_business_id">
		</div>
		</div>
	
			 <div class="container">						
		<div class='form-group'>
	    <label class="col-xs-5 col-sm-2 control-label">ขนาดสถานประกอบการ</label>
	    <input type="text" name="business_size">
		</div>
		</div>

			<div class="container">									
        <div class='form-group'>
	    <label class="col-xs-5 col-sm-2 control-label">ลักษณะงาน</label>
	    <textarea name="job_description" rows="" cols=""></textarea>
		</div>
		</div>

			 <div class="container">						
		<div class='form-group'>
	    <label class="col-xs-5 col-sm-2 control-label">จำนวนพนักงาน</label>
	    <input type="text" name="amount_emp">
		</div>
		</div>

		    <div class="container">	
		<div class='form-group'>
	    <label class="col-xs-5 col-sm-2 control-label">ที่อยู่</label>
	    <input type="text" name="address_no">
		</div>
		</div>

		 <div class="container">
        <div class='form-group'>
	    <label class="col-xs-5 col-sm-2 control-label">ถนน</label>
	    <input type="text" name="road">
		 </div>
         </div>

		
			<div class="container">	
		<div class='form-group'>
        <label class="col-sm-2 control-label" for="district">ตำบล : </label>
        <div class="col-sm-3">
        <div name="district" id="district">
        <select>
		<?php while($row_district=mysqli_fetch_assoc($res_district)){?>
        <option value="<?php echo $row_district["DISTRICT_id"]?>" ><?php echo $row_district["DISTRICT_NAME"]?></option>
		<?php }?>
        </select>
        </div>
        </div>
	    </div>
		</div>
          
		<div class="container">	
		<div class='form-group'>
        <label class="col-sm-2 control-label" for="amphur">อำเภอ</label>
        <div class="col-sm-3">
        <div name="amphur" id="amphur">
		<select>
		<?php while($row_amphur=mysqli_fetch_assoc($res_amphur)){?>
        <option value="<?php echo $row_amphur["AMPHUR_id"]?>" ><?php echo $row_amphur["AMPHUR_NAME"]?></option>
		<?php }?>
        </select>
        </div>
        </div>
	    </div>
		</div>

		 <div class="container">					
		<div class='form-group'>
		<label class="col-sm-2 control-label" for="province">จังหวัด</label>
        <div class="col-sm-3">
        <div name="province" id="province">
	    <select>
		<?php while($row_province=mysqli_fetch_assoc($res_province)){?>
        <option value="<?php echo $row_province["PROVINCE_id"]?>" ><?php echo $row_province["PROVINCE_NAME"]?></option>
		<?php }?>
        </select>
		</div>
		</div>
		</div>
		</div>

			
			 <div class="container">						
		<div class='form-group'>
	    <label class="col-xs-5 col-sm-2 control-label">รหัสไปรษณีย์</label>
	    <input type="text" name="postcode">
		</div>
		</div>

			 <div class="container">						
		<div class='form-group'>
	    <label class="col-xs-5 col-sm-2 control-label">ประเทศ</label>
	    <input type="text" name="land">
		</div>
		</div>

			 <div class="container">						
		<div class='form-group'>
	    <label class="col-xs-5 col-sm-2 control-label">	อีเมล์</label>
	    <input type="text" name="email">
		</div>
		</div>

			 <div class="container">						
		<div class='form-group'>
	    <label class="col-xs-5 col-sm-2 control-label">ชื่อผู้ประสานงาน</label>
	    <input type="text" name="contact">
		</div>
		</div>

			 <div class="container">						
		<div class='form-group'>
	    <label class="col-xs-5 col-sm-2 control-label">เบอร์โทรศัพท์ผู้ประสานงาน	</label>
	    <input type="text" name="contact_phone">
		</div>
		</div>

			 <div class="container">						
		<div class='form-group'>
	    <label class="col-xs-5 col-sm-2 control-label">การทำ MOU</label>
	    <input type="text" name="do_mou">
		</div>
		</div>

			 <div class="container">						
		<div class='form-group'>
	    <label class="col-xs-5 col-sm-2 control-label">วันที่จดทะเบียน</label>
	    <input type="text" name="registration_date">
		</div>
		</div>

		
			 <div class="container">						
		<div class='form-group'>
	    <label class="col-xs-5 col-sm-2 control-label">ทุนจดทะเบียน</label>
	    <input type="text" name="capital">
		</div>
		</div>

			 <div class="container">						
		<div class='form-group'>
	    <label class="col-xs-5 col-sm-2 control-label">ประเทศต้นสังกัด</label>
	    <input type="text" name="country">
		</div>
		</div>

			 <div class="container">						
		<div class='form-group'>
	    <label class="col-xs-5 col-sm-2 control-label">การลดหย่อนภาษี</label>
	    <input type="text" name="tax_break">
		</div>
		</div>

			 <div class="container">						
		<div class='form-group'>
	    <label class="col-xs-5 col-sm-2 control-label">	รหัสคุณลักษณะสถานประกอบการ เก็บข้อมูลแบบเป็นชุด</label>
	    <input type="text" name="property_id">
		</div>
		</div>

			 <div class="container">						
		<div class='form-group'>
	    <label class="col-xs-5 col-sm-2 control-label">เก็บข้อมูลสวัสดิการ เก็บเป็น Array</label>
	    <input type="text" name="benefit_id">
		</div>
		</div>

			 <div class="container">						
		<div class='form-group'>
	    <label class="col-xs-5 col-sm-2 control-label">พิกัดที่ตั้งสถานประกอบการ	</label>
	    <input type="text" name="location">
		</div>
		</div>

			 <div class="container">						
		<div class='form-group'>
	    <label class="col-xs-5 col-sm-2 control-label">status</label>
	    <input type="text" name="status">
		</div>
		</div>

			 <div class="container">						
		<div class='form-group'>
	    <label class="col-xs-5 col-sm-2 control-label">	ชื่อผู้ลงนามในใบประกาศ	</label>
	    <input type="text" name="name_of_the_signatory">
		</div>
		</div>

			 <div class="container">						
		<div class='form-group'>
	    <label class="col-xs-5 col-sm-2 control-label">ตำแหน่ง</label>
	    <input type="text" name="position">
		</div>
		</div>


						
		<div class="col-md-offset-2">
        <input class="btn btn-md btn-success" type="submit"value="ตกลง">
        </div>
</td>
</tr>
	</form>





 </section>
</section>
<?php function select_district($connect){
	$sql="select * from district";
	$res=mysqli_query($connect,$sql);
	return $res;
	}
	function select_amphur($connect){
	$sql="select * from amphur";
	$res=mysqli_query($connect,$sql);
	return $res;
	}
	function select_province($connect){
	$sql="select * from province";
	$res=mysqli_query($connect,$sql);
	return $res;
	}?>
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