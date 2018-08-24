<?php
include("../connect/conn.php");
$connect = $conn;
@SESSION_START();
$_SESSION["business_id"]  ;
$_SESSION["edu_id"];
$res_business_id = business_id($connect);
?>


    <body>

                <div class="table-responsive">
                    <table class="table text-center">
                        <tr>
                            <th><h4><a href="../fpdf17/b.php?business_id=<?php echo $_SESSION['business_id']?>">หนังสือส่งตัว</a>|</h4></th>
                            <th><h4><a href="../MPDF/delivery_normal.php?business_id=<?php echo $_SESSION['business_id']?>&edu_id=<?php echo $_SESSION['edu_id']?>">รายชื่อนักศึกษา |</h4></th>
                            <th><h4><a href="select_certificate_normal.php">หนังสือรับรองปกติ |</h4></th>
                        </tr>
                    </table>
                </div>
            </section>
 
    </body>
</html>
<?php
	function business_id($connect) {
$business_id=$_POST["business_id"];
$sql_b="select *,business.road from business,district,amphur,province,training_normal,student,major,department 
where business.district_id=district.DISTRICT_CODE 
and business.aumphur_id=amphur.AMPHUR_CODE 
and business.province_id=province.PROVINCE_CODE 
and business.business_id=training_normal.business_id 
and training_normal.citizen_id=student.citizen_id
and student.major_id = major.major_id 
and student.dep_id = department.dep_id 
and business.business_id= '$business_id'
";
$res = mysqli_query($connect, $sql_b);
    return $res;
}
?>