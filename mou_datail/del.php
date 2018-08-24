<?php include("../connect/conn.php");
$id=$_GET['id'];
        if(isset($id)=="true"){
            $del="delete from  mou_detail where mou_detail_id ='$id'";
            $res_del=mysqli_query($conn,$del);
            echo "<script> alert ('ลบข้อมูลสำเร็จ');
                     window.location='select_mou_datail.php';
                 </script>";
        }
?>