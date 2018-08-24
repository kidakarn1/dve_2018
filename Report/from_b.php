<?php include "../connect/conn.php";
$sql="select * from business";
$res=mysqli_query($conn,$sql);
?>
<form method="post" action="../fpdf17/b.php">
<select name="business_id">
<?php
    while ($row=mysqli_fetch_assoc($res)){
        ?>
<option value="<?php echo $row["business_id"]?>"><?php echo $row["business_name"]?></option>
<?php
    }
?>
</select>

<input type="submit" value="OK">
</form>