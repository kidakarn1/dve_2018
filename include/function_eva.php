<?php
include("../connect/conn.php");
date_default_timezone_set('asia/bangkok');
$date_kidaran_year=date("Y");
$date_kidaran_mouth=date("m");
$date_kidaran_day=date("d");
$date_kidaran_mouth=substr($date_kidaran_mouth,1,2);
$date_kidaran_year=$date_kidaran_year+543;
$get_moth = select_mouth(date("$date_kidaran_mouth"));
//echo $get_moth;
?>
<?php 
function select_mouth($index) {
    $mouth = array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
    );
    // print_r($mouth);
    return $mouth[$index];
}
function get_school($conn){
    $sql="select * from school";
    $res=mysqli_query($conn,$sql);
    return $res;
}
function get_std($conn,$id){
    $sql="select * from training_normal,student,business,department,groups,training_plan where student.std_id ='$id' and
    student.citizen_id = training_normal.citizen_id and
    training_normal.business_id = business.business_id and 
    student.dep_id = department.dep_id and 
    student.group_id = groups.group_id and
    student.group_id = training_plan.group_id
        ";
        $res=mysqli_query($conn,$sql);
        return $res;
}
function select_business($conn,$session_username){
    $sql = "select * from business,district,amphur,province where business.business_id = '$session_username' and 
            business.district_id = district.DISTRICT_CODE and 
            district.AMPHUR_CODE = amphur.AMPHUR_CODE and  
            amphur.PROVINCE_CODE = province.PROVINCE_CODE";
    $res = mysqli_query($conn, $sql);
    return $res;
}
function select_school($conn){
    $sql = "select * from school";
    $res = mysqli_query($conn, $sql);
    return $res;
}
?>
