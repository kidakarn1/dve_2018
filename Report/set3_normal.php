<?php
include("../connect/conn.php");
$connect = $conn;
@SESSION_START();
echo $_SESSION["business_id"] = $_REQUEST["business_id"];
echo $_SESSION["edu_id"] = $_REQUEST["edu_id"];
$res_training_normal = training_normal($connect);
?>


 
                    
                    </center>
                    <center>
                        <table class="table">
                            <tr>
                                <th>ลำดับ</th>
                                <th>ชื่อ นามสกุล</th>
                                <th>เบอร์โทรศัพท์</th>
                                <th>แผนก</th>
                                <th>สถานประกอบการ</th>
                                <th>จัดการ</th>
                            </tr>
                            <?php
                            $i = 1;
                            while ($row_training_normal = mysqli_fetch_assoc($res_training_normal)) {
                                ?>
                                <tr>
                                    <th><?php echo $i; ?></th>
                                    <th><?php echo $row_training_normal["head_name_std"] . " " . $row_training_normal["std_name"] ?></th>
                                    <th><?php echo $row_training_normal["phone"] ?></th>
                                    <th><?php echo $row_training_normal["dep_name"] ?></th>
                                    <th><?php echo $row_training_normal["business_name"] ?></th>
                                    <th><a href="menu_set3.php?business_id=<?php echo $_SESSION["business_id"]?> & edu_id=<?php echo $_SESSION["edu_id"] ?>">จัดการ</a></th>
                                </tr>

                                <?php
                                $i++;
                            }
                            ?>
                        </table>
                </div>
            </section>
        </section>
    </body>
</html>

<?php
	function training_normal($connect) {
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