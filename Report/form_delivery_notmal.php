<?php include "../connect/conn.php";
$sql="select * from business";
$res=mysqli_query($conn,$sql);
$sql="select * from education";
$res_edu=mysqli_query($conn,$sql);
?>
<form method="get" action="../MPDF/delivery_normal.php">
<select name="business_id">
<?php
    while ($row=mysqli_fetch_assoc($res)){
        ?>
<option value="<?php echo $row["business_id"]?>"><?php echo $row["business_name"]?></option>
<?php
    }
?>
</select>
<select name="edu_id">
<?php
    while ($row_edu=mysqli_fetch_assoc($res_edu)){
        ?>
<option value="<?php echo $row_edu["edu_id"]?>"><?php echo $row_edu["edu_name"]?></option>
<?php
    }
?>

<input type="submit" value="OK">
</form>