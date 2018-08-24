
<?php 
	include('../connect/conn.php');

	$business_id = $_POST["business_id"];
	$business_name = $_POST["business_name"];
	$parent_business_id = $_POST["parent_business_id"];
	$business_size = $_POST["business_size"];
	$job_description = $_POST["job_description"];
	$amount_emp = $_POST["amount_emp"];
	$address_no = $_POST["address_no"];
	$road = $_POST["road"];
	$district = $_POST["district"];
	$amphur = $_POST["amphur"];
	$province = $_POST["province"];
	$postcode = $_POST["postcode"];
	$land = $_POST["land"];
	$email = $_POST["email"];
	$contact = $_POST["contact"];
	$contact_phone = $_POST["contact_phone"];
	$do_mou = $_POST["do_mou"];
	$registration_date = $_POST["registration_date"];
	$capital = $_POST["capital"];
	$country = $_POST["country"];
	$tax_break = $_POST["tax_break"];
	$property_id = $_POST["property_id"];
	$benefit_id = $_POST["benefit_id"];
	$location = $_POST["location"];
	$status = $_POST["status"];
	$name_of_the_signatory = $_POST["name_of_the_signatory"];
	$position = $_POST["position"];

	$sql = "insert into business values('$business_id','$business_name','$parent_business_id','$business_size','$job_description','$amount_emp','$address_no','$road','$district','$amphur','$province','$postcode','$land','$email','$contact','$contact_phone','$do_mou','$registration_date','$capital','$country','$tax_break','$property_id','$benefit_id','$location','$status','$name_of_the_signatory','$position')";
	$res = mysqli_query($conn,$sql);
	if ($res){
		header("location: select_businessT.php");
	} else {
		echo "insert error";
	}
?>
