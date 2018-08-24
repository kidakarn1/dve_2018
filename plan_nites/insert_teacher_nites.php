<?php include("../connect/conn.php");
@SESSION_START();
$_SESSION["num_teacher"]=$num_teacher=$_POST["num_teacher"];
$num_date=$_POST["num_date"];
$num_bus=$_POST["num_bus"];
$num_dri=$_POST["num_dri"];
$car_id=$_POST["car_id"];
$teacher_id=array();
$date_ni=array();
$bu=array();
$ud=array();
$cd=array();
for ($i=1; $i <= $num_teacher; $i++) { 
     array_push($teacher_id,$_POST["tacher_id$i"]);
}
for ($k=1; $k <= $num_date; $k++) { 
    array_push($date_ni,$_POST["date$k"]);
}
for ($a=1; $a <= $num_bus; $a++) { 
    array_push($bu,$_POST["business_id$a"]);
}
for ($b=1; $b <= $num_dri; $b++) { 
    array_push($ud,$_POST["user_id$b"]);
}
for ($e=1; $e <= $car_id; $e++) { 
    array_push($cd,$_POST["car_id$e"]);
}

$t_d=implode(",",$teacher_id);
$d_d=implode(",",$date_ni);
$b_u=implode(",",$bu);
$u_d=implode(",",$ud);
$c_d=implode(",",$cd);
//echo $t_d."<br>".$d_d."<br>".$b_u."<br>".$u_d;
$sql="insert into plan_nites values('','$d_d','$b_u','$t_d','$u_d','$c_d')";
$res=mysqli_query($conn,$sql);
if ($res){
    echo "สำเร็จ";
    header("location: table_teacher_nites.php");
}
else{
    echo "ไม่สำเสร็จนะ";
}
?>