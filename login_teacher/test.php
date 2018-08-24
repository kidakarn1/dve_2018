<?php 
    include("../connect/conn.php");
    ini_set('max_execution_time', 3000); 
    session_start();
    echo $_SESSION["username"];
    $connect=$conn;
    $res_teacher_nites=select_teacher_nites($connect,$_SESSION["username"]);
    while($row_teacher_nites=mysqli_fetch_assoc($res_teacher_nites)){
        $teacher_id=$row_teacher_nites["teacher_id"];
        $td_array=$row_teacher_nites["teacher_id"];
        $drive_id=$row_teacher_nites["drive_id"];
        $business_id=$row_teacher_nites["business_id"];
        $teacher_nites_date=$row_teacher_nites["plan_date"];
        $car_id=$row_teacher_nites["car_id"];
        $td=explode(",",$teacher_id);
        // print_r($td); 
        $dd=explode(",",$drive_id);
        $bd=explode(",",$business_id);
        $tnd=explode(",",$teacher_nites_date);
        $cd=explode(",",$car_id);
        $count_td=count($td);
        $count_dd=count($dd);
        $count_bd=count($bd);
        $count_tnd=count($tnd);
        $count_cd=count($cd);
             for ($p=0; $p<=$count_bd; $p++) {
                $res_teacher_count=select_teacher_count($connect,$td[$p],$_SESSION["username"]);
                 if ($res_teacher_count!="false"){
                    while($row_teacher_count=mysqli_fetch_assoc($res_teacher_count)){
                        echo "<div class='color_teacher'>"."ครูนิเทศ"."</div>".$row_teacher_count["teacher_name"];
                    }
                }
                $res_business_count=select_business_count($connect,$bd[$p],$td[$p],$_SESSION["username"]);
                    $k=0;
                    while($row_business_count=mysqli_fetch_assoc($res_business_count)){    
                        // if ($bd[$p]==$row_business_count["business_id"]){
                                print_r($bd);
                                echo $row_business_count["business_id"];
                                    echo "<br>".$row_business_count["business_id"].$row_business_count["business_name"]." "."ตำบล"." ".$row_business_count["DISTRICT_NAME"]." "."อำเภอ"." ".$row_business_count["AMPHUR_NAME"]." "."จังหวัด"." ".$row_business_count["PROVINCE_NAME"]."<br>";
                          //print_r($td);
                        // echo $td[$k];
                        // print_r($bd);
                         // }
                    $k++;}
             }
    }
?>
<?php
function select_teacher_nites($connect,$session_teacher){
echo $sql="select * from  plan_nites where teacher_id like '%$session_teacher%'";
$res=mysqli_query($connect,$sql);
return $res;
}
function select_business_count($connect,$bd,$td,$session_username){
          $sql="select * from business,district,amphur,province,training_normal where 
          training_normal.business_id = '{$bd}' and
          training_normal.business_id = business.business_id and
          business.district_id = district.DISTRICT_CODE and
          district.AMPHUR_CODE = amphur.AMPHUR_CODE and 
          amphur.PROVINCE_CODE = province.PROVINCE_CODE";
          echo "<br>";
          $res=mysqli_query($connect,$sql);
          return $res;
}
function select_teacher_count($connect,$td,$session_username){
    if ($td==$session_username){
        $sql="select * from teacher where teacher_id = '$td'";
        $res=mysqli_query($connect,$sql);
        return $res;
    }
    else if ($td!=$session_username){
        $false="false";
        return $false;
    }
}    