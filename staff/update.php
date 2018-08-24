<?php
include('../connect/conn.php');
    $conn = $conn;
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $status = $_POST['status'];
    $position = $_POST['position'];
    $school_id = $_POST['school_id'];
    $register_date = $_POST['register_date'];
    $last_login = $_POST['last_login'];
    
    echo $sql = "update user set username = '$username',"
            . "password = '$password',"
            . "phone = '$phone',"
            . "fname = '$fname',"
            . "lname = '$lname',"
            . "email = '$email',"
            . "user_type_id = '$position',"
            . "school_id = '$school_id',"
            . "status = '$status',"
            . "register_date = '$register_date',"
            . "last_login = '$last_login'
     where user_id = '$user_id'";
    
    if ($res1 = mysqli_query($conn,$sql)){
        echo "สำเร็จ";
         header("refresh: 0; view.php");

    }else {
        echo "ไม่สำเร็จ";
        echo $sql;
    }
    
?>