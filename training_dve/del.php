<?php include("../connect/conn.php");
$id=$_GET['id'];
        if(isset($id)=="true"){
            $del="delete from  training_dve where training_id ='$id'";
            $res_del=mysqli_query($conn,$del);
            echo "<script> alert ('ลบข้อมูลสำเร็จ');
                     window.location='select_training_dve.php';
                 </script>";
        }
?>