<?php 
@SESSION_START();
include("../connect/conn.php");
$id = $_GET['id']; 
$sql="select * from school";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($res);
?>
<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="UTF-8">
        <title>Calm breeze login screen</title>
        <link rel="stylesheet" href="login/css/style.css">
    </head>
    <body>
        <div class="wrapper">
            <div class="container">
              <div class="row">
                  <img src="../img-slideshow/chontech.png" width="150" height="150" style="margin-top: -70px">
                  <form class="login-form" method="post" action="login.php">
                      <?php echo $_SESSION['school_name']=$row['sch_name'];?><br>
                      Username<input type="text" name="username"class="form-control" placeholder="Username" autofocus>
                      Password<input type="password" name="password"class="form-control" placeholder="Passwoed" autofocus>
                      <img src="../login_captcha.php" alt="Image created by a PHP script" width="100" height="40" class="form-control">
                      <input type="text" name="captcha"class="form-control" placeholder="Captcha" autofocus>
                      <button type="submit" id="login-button">Login</button>
                  </form>
                </div>

            </div>
            <ul class="bg-bubbles">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
        <script src='../js/jquery.js'></script>
        <script  src="js/index.js"></script>
    </body>
</html>



