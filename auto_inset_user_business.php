<?php include("connect/conn.php");
ini_set('max_execution_time', 300000); //300 seconds = 5 minutes
$res_select_bu = select_bu($conn);
    while ($row_select_bu=mysqli_fetch_assoc($res_select_bu)){
        $res_user=insert_user($conn,$row_select_bu["business_id"],$row_select_bu["email"],$row_select_bu["contact_phone"]);
    }
?>
<script>alert ("เสร็จสิ้นการโอนถ่ายข้อมูล");</script>
<?php
    function select_bu($conn){
        $sql="select business_id,email,contact_phone from business";
        $res=mysqli_query($conn,$sql);
        return $res;
    }
    function insert_user($conn,$b,$email,$phone){
        $b_md5=md5($b);
        echo $sql="insert into user values('','$b','$b_md5','','','$email','$phone','','7','',
                                '','') ";
        $res=mysqli_query($conn,$sql);
        return $res;
    }
?>