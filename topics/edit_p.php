<?php
include('../connect/conn.php');
    $conn = $conn;
$topics_id = $_POST['id'];

 echo $sql = "update topics set topics_name = '$topics_name'  
     where topics_id = '$topics_id'";

 if ($res1 = mysqli_query($conn,$sql)){
        echo "สำเร็จ";
         header("refresh: 0; view.php");

    }else {
        echo "ไม่สำเร็จ";
        echo $sql;
    }
    
?>