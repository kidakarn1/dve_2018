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
		<?php
			@SESSION_START();
			include('../../connect/conn.php');
			$_SESSION['id']=$id=$_GET['id'];
			$_SESSION['business_id']=$business_id=$_GET['business_id'];
			$sql_student="select * from student,major where student.citizen_id='{$_SESSION['citizen_id']}'  and student.major_id = major.major_id";
			$res_student=mysqli_query($conn,$sql_student);
			$row_student=mysqli_fetch_assoc($res_student);
			$sql="";
            if ( $row_student["system_id"]==1){
				$sql="select * from training_normal,business,district,amphur,province where training_normal.citizen_id ='{$_SESSION['citizen_id']}'and training_normal.business_id = business.business_id  and
				business.district_id = district.DISTRICT_CODE and
				district.AMPHUR_CODE = amphur.AMPHUR_CODE and 
				amphur.PROVINCE_CODE = province.PROVINCE_CODE
				";
				//echo $sql_select;   
            }
            if ( $row_student["system_id"]==2){
				$sql="select * from training_dve,business,district,amphur,province where training_dve.citizen_id ='{$_SESSION['citizen_id']}'and training_dve.business_id = business.business_id  and
				business.district_id = district.DISTRICT_CODE and
				district.AMPHUR_CODE = amphur.AMPHUR_CODE and 
				amphur.PROVINCE_CODE = province.PROVINCE_CODE
				";            }
			
			$res=mysqli_query($conn,$sql);
			$row=mysqli_fetch_assoc($res);
			$resSTD = select_dve02($conn);
			$rowSTD = mysqli_fetch_array($resSTD);

			$resMajor = select_major($conn);
			$resGroup = select_group($conn);

			$resBusiness = select_business($conn);
			$resAddress_no = select_business($conn);
			$resMoo = select_business($conn);
			$resRoad = select_business($conn);
			$resPhone = select_business($conn);
			$resEmail = select_business($conn);
			$resLocation = select_business($conn);
			$resProvince = select_province($conn);
			$resDistrict = select_district($conn);
			$resAmphur = select_amphur($conn);
			$resAlley = select_business($conn);
		?>
		<script src="../jquery/jquery.min.js"></script>
		<script src="../jquery-easing/jquery.easing.min.js"></script>
			<style>
			  /* Always set the map height explicitly to define the size of the div
			   * element that contains the map. */
			  #map {
				width:90%;
				height: 80%;
			  }
			  /* Optional: Makes the sample page fill the window. */
			  html, body {
				width: 105%;
				height: 90%;
				margin: 0;
				padding: 0;
			  }
			  .controls {
				margin-top: 10px;
				border: 1px solid transparent;
				border-radius: 2px 0 0 2px;
				box-sizing: border-box;
				-moz-box-sizing: border-box;
				height: 32px;
				outline: none;
				box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
			  }

			  #origin-input,
			  #destination-input {
				background-color: #fff;
				font-family: Roboto;
				font-size: 15px;
				font-weight: 300;
				margin-left: 12px;
				padding: 0 11px 0 13px;
				text-overflow: ellipsis;
				width: 200px;
			  }

			  #origin-input:focus,
			  #destination-input:focus {
				border-color: #4d90fe;
			  }

			  #mode-selector {
				color: #fff;
				background-color: #4d90fe;
				margin-left: 12px;
				padding: 5px 11px 0px 11px;
			  }

			  #mode-selector label {
				font-family: Roboto;
				font-size: 13px;
				font-weight: 300;
			  }
			</style>
		</head>
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
                <form class="form-horizontal" role="form" action="insert_DVE02.php" method="post">

                    <font color="#000000" size="3">
                        <table>
                            <center><h3 colspan="2">รายละเอียดสถานประกอบการ</h3></center>
                            <tr>
                                <td>ชื่อสถานประกอบการ<?php echo " ".$row['business_name'];?>
								</td>
                            </tr>
                            <tr>
                                <td>ที่ตั้งเลขที่<?php echo " ".$row['address_no'];?>
								</td>
                            </tr>
                            <tr>
                                <td>ถนน<?php echo " ".$row['road'];?>
								</td>
                            </tr>
                            <tr>
                                <td>ตำบล<?php echo " ".$row['DISTRICT_NAME'];?>
								</td>
                            </tr>
                            <tr>
                                <td>อำเภอ<?php echo " ".$row['AMPHUR_NAME'];?>
								</td>
                            </tr>
                            <tr>
                                <td>จังหวัด<?php echo " ".$row['PROVINCE_NAME'];?>
								</td>
                            </tr>

                            <tr>
                                <td>เบอร์โทรศัพท์<?php echo " ".$row['contact_phone'];?>
								</td>
                            </tr> 
                            <!-- <tr>
                              //<td>รายชื่อนักเรียน นักศึกษาที่เข้าการฝึกอาชีพ/ฝึกงาน รวมจำนวน.........คน</td>
                            </tr> -->
                            <tr>
                                <td>ชื่อ<?php echo " ".$row_student['head_name_std']." ".$row_student['std_name']." ".$row_student['std_lastname']?>
								รหัส<?php echo " ".$row_student['std_id'];?>
								แผนก <?php echo " ".$row_student['major_name'];?>
								</td>
                            </tr>

                        </table>
                    </font>
                    <div class="form-group">
                        <div class="col-sm-offset-10 col-sm-10">
                        </div>
                    </div>
					<input type="hidden" name="startLocation" id="startLocation">
					<input type="hidden" name="endLocation" id="endLocation">
                </form>	
            </div> 



           <!-- <div class="col-lg-6">
                <div class="map">
                    <iframe src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Kuningan,+Jakarta+Capital+Region,+Indonesia&amp;aq=3&amp;oq=kuningan+&amp;sll=37.0625,-95.677068&amp;sspn=37.410045,86.572266&amp;ie=UTF8&amp;hq=&amp;hnear=Kuningan&amp;t=m&amp;z=14&amp;ll=-6.238824,106.830177&amp;output=embed">
                    </iframe>
                </div>
            </div>-->
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

		<input id="origin-input" class="controls" type="text"
				value="วิทยาลัยเทคนิคชลบุรี"placeholder="Enter an origin location">

			<input id="destination-input" class="controls" type="text" value="<?php echo $row['business_name'];?>"
				placeholder="Enter a destination location">

			<div id="mode-selector" class="controls">
			  <input type="radio" name="type" id="changemode-walking">
			  <label for="changemode-walking">Walking</label>

			  <input type="radio" name="type" id="changemode-transit">
			  <label for="changemode-transit">Transit</label>

			  <input type="radio" name="type" id="changemode-driving"  checked="checked">
			  <label for="changemode-driving">Driving</label>
			</div>

			<div id="map"></div>
			<br>
			<br>
			<div class="pd">
                        <center><button id="print">ปริ้น</button></center>
                        </div>
			<script>
			  // This example requires the Places library. Include the libraries=places
			  // parameter when you first load the API. For example:
			  // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
			  var startLocation;
			  var endLocation;
			  function initMap() {
				var map = new google.maps.Map(document.getElementById('map'), {
				  mapTypeControl: false,
				  center: {lat: 13.293379, lng: 101.165815},
				  zoom: 13
				});

				new AutocompleteDirectionsHandler(map);
			  }

			   /**
				* @constructor
			   */
			  function AutocompleteDirectionsHandler(map) {
				this.map = map;
				this.originPlaceId = null;
				this.destinationPlaceId = null;
				this.travelMode = 'WALKING';
				var originInput = document.getElementById('origin-input');
				var destinationInput = document.getElementById('destination-input');
				var modeSelector = document.getElementById('mode-selector');
				this.directionsService = new google.maps.DirectionsService;
				this.directionsDisplay = new google.maps.DirectionsRenderer;
				this.directionsDisplay.setMap(map);

				var originAutocomplete = new google.maps.places.Autocomplete(
					originInput, {placeIdOnly: true});
				var destinationAutocomplete = new google.maps.places.Autocomplete(
					destinationInput, {placeIdOnly: true});

				this.setupClickListener('changemode-walking', 'WALKING');
				this.setupClickListener('changemode-transit', 'TRANSIT');
				this.setupClickListener('changemode-driving', 'DRIVING');

				this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
				this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');

				this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(originInput);
				this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(destinationInput);
				this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(modeSelector);
			  }

			  // Sets a listener on a radio button to change the filter type on Places
			  // Autocomplete.
			  AutocompleteDirectionsHandler.prototype.setupClickListener = function(id, mode) {
				var radioButton = document.getElementById(id);
				var me = this;
				radioButton.addEventListener('click', function() {
				  me.travelMode = mode;
				  me.route();
				});
			  };

			  AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function(autocomplete, mode) {
				var me = this;
				autocomplete.bindTo('bounds', this.map);
				autocomplete.addListener('place_changed', function() {
				  var place = autocomplete.getPlace();
				  if (!place.place_id) {
					window.alert("Please select an option from the dropdown list.");
					return;
				  }
				  if (mode === 'ORIG') {
					me.originPlaceId = place.place_id;
				  } else {
					me.destinationPlaceId = place.place_id;
				  }
				  me.route();
				});

			  };

			  AutocompleteDirectionsHandler.prototype.route = function() {
				if (!this.originPlaceId || !this.destinationPlaceId) {
				  return;
				}
				startLocation = this.originPlaceId;
				endLocation = this.destinationPlaceId;
				var me = this;
				this.directionsService.route({
				  origin: {'placeId': startLocation},
				  destination: {'placeId': endLocation},
				  travelMode: this.travelMode
				}, function(response, status) {
				  if (status === 'OK') {
					me.directionsDisplay.setDirections(response);
				  } else {
					window.alert('Directions request failed due to ' + status);
				  }
				});
			  };

			 $(document).ready(function(){
				 $("#Wbusiness_name").hide();
				 $("#Waddress_no").hide();
				 $("#Wroad").hide();
				 $("#Walley").hide();
				 $("#Wdistrict").hide();
				 $("#Wamphur").hide();
				 $("#Wprovince").hide();
				 $("#Wphone").hide();
				 $("#Wemail").hide();
				 $("#Wmoo").hide();
				 $("#Wstd").hide();
			   $("#Tbusiness_name").focusout(function(){
					$("#destination-input").val($("#Tbusiness_name").val());
			   });
				$("form").submit(function(){
					$("#startLocation").val(startLocation);
					$("#endLocation").val(endLocation);
				});
				//business_name
				$("#Tbusiness_name").focusout(function(){
					if(!$("#Tbusiness_name").val()) {
						 $("#Wbusiness_name").show();
					} else {
						 $("#Wbusiness_name").hide();
					}
				});
				$("#Tbusiness_name").keyup(function(){
					if(!$("#Tbusiness_name").val()) {
						 $("#Wbusiness_name").show();
					} else {
						 $("#Wbusiness_name").hide();
					}
				});
				//address_no
				$("#Taddress_no").focusout(function(){
					if(!$("#Taddress_no").val()) {
						 $("#Waddress_no").show();
					} else {
						 $("#Waddress_no").hide();
					}
				});
				$("#Taddress_no").keyup(function(){
					if(!$("#Taddress_no").val()) {
						 $("#Waddress_no").show();
					} else {
						 $("#Waddress_no").hide();
					}
				});
				//road
				/*$("#Troad").focusout(function(){
					if(!$("#Troad").val()) {
						 $("#Wroad").show();
					} else {
						 $("#Wroad").hide();
					}
				});
				$("#Troad").keyup(function(){
					if(!$("#Troad").val()) {
						 $("#Wroad").show();
					} else {
						 $("#Wroad").hide();
					}
				});*/
				//moo
				$("#Tmoo").focusout(function(){
					if(!$("#Tmoo").val()) {
						 $("#Wmoo").show();
					} else {
						 $("#Wmoo").hide();
					}
				});
				$("#Tmoo").keyup(function(){
					if(!$("#Tmoo").val()) {
						 $("#Wmoo").show();
					} else {
						 $("#Wmoo").hide();
					}
				});
				//alley
				/*$("#Talley").focusout(function(){
					if(!$("#Talley").val()) {
						 $("#Walley").show();
					} else {
						 $("#Walley").hide();
					}
				});
				$("#Talley").keyup(function(){
					if(!$("#Talley").val()) {
						 $("#Walley").show();
					} else {
						 $("#Walley").hide();
					}
				});*/
				//district
				$("#Tdistrict").focusout(function(){
					if(!$("#Tdistrict").val()) {
						 $("#Wdistrict").show();
					} else {
						 $("#Wdistrict").hide();
					}
				});
				$("#Tdistrict").keyup(function(){
					if(!$("#Tdistrict").val()) {
						 $("#Wdistrict").show();
					} else {
						 $("#Wdistrict").hide();
					}
				});
				//amphur
				$("#Tamphur").focusout(function(){
					if(!$("#Tamphur").val()) {
						 $("#Wamphur").show();
					} else {
						 $("#Wamphur").hide();
					}
				});
				$("#Tamphur").keyup(function(){
					if(!$("#Tamphur").val()) {
						 $("#Wamphur").show();
					} else {
						 $("#Wamphur").hide();
					}
				});
				//province
				$("#Tprovince").focusout(function(){
					if(!$("#Tprovince").val()) {
						 $("#Wprovince").show();
					} else {
						 $("#Wprovince").hide();
					}
				});
				$("#Tprovince").keyup(function(){
					if(!$("#Tprovince").val()) {
						 $("#Wprovince").show();
					} else {
						 $("#Wprovince").hide();
					}
				});
				//phone
				$("#Tphone").focusout(function(){
					if(!$("#Tphone").val()) {
						 $("#Wphone").show();
					} else {
						 $("#Wphone").hide();
					}
				});
				$("#Tphone").keyup(function(){
					if(!$("#Tphone").val()) {
						 $("#Wphone").show();
					} else {
						 $("#Wphone").hide();
					}
				});
				//email
				$("#Temail").focusout(function(){
					if(!$("#Temail").val()) {
						 $("#Wemail").show();
					} else {
						 $("#Wemail").hide();
					}
				});
				$("#Temail").keyup(function(){
					if(!$("#Temail").val()) {
						 $("#Wemail").show();
					} else {
						 $("#Wemail").hide();
					}
				});
				//std_name
				$("#std_name").focusout(function(){
					if(!$("#std_name").val()) {
						 $("#Wstd").show();
					} else {
						 $("#Wstd").hide();
					}
				});
				$("#std_name").keyup(function(){
					if(!$("#std_name").val()) {
						 $("#Wstd").show();
					} else {
						 $("#Wstd").hide();
					}
				});

				//std_id
				$("#std_id").focusout(function(){
					if(!$("#std_id").val()) {
						 $("#Wstd").show();
					} else {
						 $("#Wstd").hide();
					}
				});
				$("#std_id").keyup(function(){
					if(!$("#std_id").val()) {
						 $("#Wstd").show();
					} else {
						 $("#Wstd").hide();
					}
				});
				//form
				$("form").mouseover(function(){
					if(!$("#Tbusiness_name").val() || !$("#Taddress_no").val() ||  !$("#Tmoo").val() || !$("#Tdistrict").val() || !$("#Tamphur").val() || !$("#Tprovince").val() 
					|| !$("#Tphone").val() || !$("#Temail").val() || !$("#std_name").val() || !$("#std_id").val() || !startLocation || !endLocation) {
						$("#submit").attr('disabled','disabled');
					} else {
						$("#submit").removeAttr('disabled');
					}

				});
			});
			</script>

 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSw8juBIJndAygO7H2ZZbxLQr5BtT9TZ0&libraries=places&callback=initMap"
        async defer></script>

	</body>
</html>
<?php
	function select_business($connect) {
		$sql = "select * from business";
		$res = mysqli_query($connect,$sql);
		return $res;
	}
	function select_amphur($connect) {
		$sql = "select * from amphur";
		$res = mysqli_query($connect,$sql);
		return $res;
	}
	function select_province($connect) {
		$sql = "select * from province";
		$res = mysqli_query($connect,$sql);
		return $res;
	}
	function select_district($connect) {
		$sql = "select * from district";
		$res = mysqli_query($connect,$sql);
		return $res;
	}
	function select_group($conn) {
		$sql = "select * from groups";
		$res = mysqli_query($conn,$sql);
		return $res;
	}
	function select_major($conn) {
		$sql = "select * from major";
		$res = mysqli_query($conn,$sql);
		return $res;
	}
	function select_dve02($conn) {
		$sql = "select * from student where std_id = '{$_SESSION['username']}'";
		$res = mysqli_query($conn,$sql);
		return $res;
	}
?>
<script src="../../js/jquery-3.3.1.min.js"></script>
<script>
    $(document).ready(function(){
        $("#print").click(function(){
            $(".pd").hide();
            window.print();
            $(".pd").show();
        });
    });
</script>