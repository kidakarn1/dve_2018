<?php
  	include('../connect/conn.php');
	$std_name = $_POST['std_name'];
	$std_id = $_POST['std_id'];
	$business_name = $_POST['business_name'];
	$address_no = $_POST['address_no'];
	$road = $_POST['road'];
	$district = $_POST['district'];
	$amphur = $_POST['amphur'];
	$province = $_POST['province'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$location = $_POST['startLocation']."-".$_POST['endLocation'];
	$moo = $_POST['moo'];
	$alley = $_POST['alley'];
	$startLocation = $_POST['startLocation'];
	$endLocation = $_POST['endLocation'];
	$major_name = $_POST['major_name'];
	$groups = $_POST['group'];
	
	
	$sqlDistrict = "select * from district where DISTRICT_NAME = '$district' ";
	$resDistrict  = mysqli_query($conn,$sqlDistrict);
	$rowDistrict  = mysqli_fetch_array($resDistrict);

	$sqlAmphur = "select * from amphur where AMPHUR_NAME = '$amphur' ";
	$resAmphur  = mysqli_query($conn,$sqlAmphur);
	$rowAmphur  = mysqli_fetch_array($resAmphur);

	$sqlProvince = "select * from province where PROVINCE_NAME = '$province' ";
	$resProvince  = mysqli_query($conn,$sqlProvince);
	$rowProvince  = mysqli_fetch_array($resProvince);

	$district_id = $rowDistrict["DISTRICT_ID"];
	$aumpher_id = $rowAmphur["AMPHUR_ID"];
	$province_id = $rowProvince["PROVINCE_ID"];
	$postcode = $rowAmphur["POSTCODE"];

	$sqlCheckbuss = "select * from business where business_name = '$business_name' 
	and district_id = '$district_id' and aumpher_id = '$aumpher_id' and province_id = '$province_id'
	";
	$resCheckbuss  = mysqli_query($conn,$sqlCheckbuss);
	$rowCheckbuss  = mysqli_num_rows($resCheckbuss);

	if ($rowCheckbuss == 0) {
		$sql="insert into business values(
		'0',
		'$business_name',
		'$address_no',
		'$road',
		'$district_id',
		'$aumpher_id',
		'$province_id',
		'$postcode',
		'$email',
		'$phone',
		'$location',
		'$moo'
		)";		
	$res = mysqli_query($conn,$sql);
	}
	$resChecky  = mysqli_query($conn,$sqlCheckbuss);
	$rowChecky  = mysqli_fetch_array($resChecky);
	$bs_id = $rowChecky["business_id"];
	
	$sqlyinyom = "insert into yinyom values('','$std_id','$bs_id')";
	$resyinyom = mysqli_query($conn,$sqlyinyom);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Resi Bootstrap Template</title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/responsive-slider.css" rel="stylesheet">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link href="css/style.css" rel="stylesheet">	
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
		<script src="../jquery/jquery.min.js"></script>
		<script src="../jquery-easing/jquery.easing.min.js"></script>
	<style>
		  /* Always set the map height explicitly to define the size of the div
		   * element that contains the map. */
		  #map {
			height: 100%;
		  }
		  /* Optional: Makes the sample page fill the window. */
		  html, body {
			height: 100%;
			margin: 0;
			padding: 0;
		  }
		  #floating-panel {
			position: absolute;
			top: 10px;
			left: 25%;
			z-index: 5;
			background-color: #fff;
			padding: 5px;
			border: 1px solid #999;
			text-align: center;
			font-family: 'Roboto','sans-serif';
			line-height: 30px;
			padding-left: 10px;
		  }
		</style>
	<body>

        <!--        <header>
                    <div class="container">
                        <div class="row">
                            <nav class="navbar navbar-default" role="navigation">
                                <div class="container-fluid">
                                    <div class="navbar-header">
        
        
                                    </div>
        
        
                                    <div class="menu">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="index.html">Home</a></li>
                                            <li role="presentation"><a href="feature.html">Feature</a></li>
                                            <li role="presentation"><a href="blog.html">Blog</a></li>
                                            <li role="presentation"><a href="portfolio.html">Portfolio</a></li>
                                            <li role="presentation"><a href="contact.html">Contact</a></li>						
                                        </ul>
                                    </div>
                                </div>
        
                            </nav>
                        </div>
                    </div>
                </header>-->

        <div class="container">
            <div class="col-lg-6">
                <form class="form-horizontal" role="form">

                    <font color="#000000" size="3">
                        <table>
                            <center><h3 colspan="2">รายละเอียดสถานประกอบการ</h3></center>
                            <tr>
                                <td>ชื่อสถานประกอบการ
									<?php echo $business_name?>
								</td>
                            </tr>
                            <tr>
                                <td>ที่ตั้งเลขที่
									<?php echo $address_no?>
								</td>
                            </tr>
                            <tr>
                                <td>หมู่ที่
									<?php echo $moo?>
								</td>
                            </tr>
                            <tr>
                                <td>ตรอก/ซอย
									<?php echo $alley?>
								</td>
                            </tr>
                            <tr>
                                <td>ถนน
									<?php echo $road?>
								</td>
                            </tr>
                            <tr>
                                <td>ตำบล
									<?php echo $district?>
								</td>
                            </tr>
                            <tr>
                                <td>อำเภอ
									<?php echo $amphur?>
								</td>
                            </tr>
                            <tr>
                                <td>จังหวัด
									<?php echo $province?>
								</td>
                            </tr>

                            <tr>
                                <td>เบอร์โทรท์
									<?php echo $phone?>
								</td>
                            </tr>
                            <tr>
                                <td><b>Email
									<?php echo $email?>
								</b></td>
                            </tr>
                            <!-- <tr>
                              //<td>รายชื่อนักเรียน นักศึกษาที่เข้าการฝึกอาชีพ/ฝึกงาน รวมจำนวน.........คน</td>
                            </tr> -->
                            <tr>
                                <td>ชื่อ<?php echo $std_name?>รหัส<?php echo $std_id?>
								กลุ่ม<?php echo $groups?>แผนก<?php echo $major_name?></td>
                            </tr>

                        </table>
                    </font>
					<input type="hidden" name="startLocation" id="startLocation" value="<?php echo $startLocation?>">
					<input type="hidden" name="endLocation" id="endLocation" value="<?php echo $endLocation?>">
                </form>	
            </div> 
        </div>	 



        <!--        <footer>		
                    <div class="sub-footer">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="social-network">
                                        <li><a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook fa-1x"></i></a></li>
                                        <li><a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter fa-1x"></i></a></li>
                                        <li><a href="#" data-placement="top" title="Linkedin"><i class="fa fa-linkedin fa-1x"></i></a></li>
                                        <li><a href="#" data-placement="top" title="Pinterest"><i class="fa fa-pinterest fa-1x"></i></a></li>
                                        <li><a href="#" data-placement="top" title="Google plus"><i class="fa fa-google-plus fa-1x"></i></a></li>
                                    </ul>
                                </div>
        
        
                            </div>
                        </div>
                    </div>
                </footer>-->

        <!--end footer-->
		<div id="map"></div>
    <script>
	var startLocation = $("#startLocation").val();
	var endLocation = $("#endLocation").val();
	var onChangeHandler;
      function initMap() {
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 13,
          center: {lat: 13.293379, lng: 101.165815}
        });
        directionsDisplay.setMap(map);

		onChangeHandler = calculateAndDisplayRoute(directionsService, directionsDisplay);
      }

      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        directionsService.route({
		  origin: {'placeId': startLocation},
		  destination: {'placeId': endLocation},
           travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }
		 $(document).ready(function(){
			onChangeHandler;
		});

    </script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSw8juBIJndAygO7H2ZZbxLQr5BtT9TZ0&callback=initMap">
    </script>
    </body>
</html>