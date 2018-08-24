<?php

include('../connect/conn.php');
$school_id = $_POST["school_id"];
$school_name = $_POST["school_name"];
$school_type_id = $_POST["school_type_id"];
$adress_no = $_POST["adress_no"];
$road = $_POST["road"];
$district_id = $_POST["district_id"];
$aumper_id = $_POST["aumper_id"];
$province_id = $_POST["province_id"];
$postcode = $_POST["postcode"];
$phone = $_POST["phone"];
$fax = $_POST["fax"];
$zone = $_POST["zone"];
$location = $_POST["location"];
$category = $_POST["category"];
$institute_id = $_POST["institute_id"];
$name_dir = $_POST["name_dir"];
$deputy_academic = $_POST["deputy_academic"];
$deputy_activities = $_POST["deputy_activities"];
$deputy_plan = $_POST["deputy_plan"];
$head_register = $_POST["head_register"];
$head_money = $_POST["head_money"];
$head_course = $_POST["head_course"];
$head_measure = $_POST["head_measure"];
$head_guide = $_POST["head_guide"];
$head_rule = $_POST["head_rule"];
$head_activities = $_POST["head_activities"];
$school_number = $_POST["school_number"];
$post_office = $_POST["post_office"];
$postal_number = $_POST["postal_number"];
$school_logo = $_POST["school_logo"];

$sql = "insert into school values('$school_id','$school_name','$school_type_id','$adress_no','$road','$district_id','$aumper_id','$province_id','$postcode'"
        . ",'$phone','$fax','$zone','$location','$category','$institute_id','$name_dir','$deputy_academic','$deputy_activities','$deputy_plan'"
        . ",'$head_register','$head_money','$head_course','$head_measure','$head_guide','$head_rule','$head_activities','$school_number','$post_office'"
        . ",'$postal_number','$school_logo')";
$res = mysqli_query($conn, $sql);

if ($res) {
    header("location: show_school.php");
} else {
    echo "insert error";
}
?>