<?php 
$host="localhost";
$user="root";
$pass="12345678";
$db="dve2017";
$conn=mysqli_connect($host,$user,$pass,$db);
if (! $conn){
echo "MYSQL_ERROR";
}
?>