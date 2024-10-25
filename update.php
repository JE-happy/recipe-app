
<?php 
include("form.php"); 
session_start();

$id = $_GET['id'];

$query = "SELECT * FROM  user where id='$id' ";
$data=mysqli_query($con,$query);
$result=mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update data</title>
    <link rel="stylesheet" href="styleForm.css">
</head>
<body>
    <div class="part2">
        <form action="#" method="POST">
        <div class="sign_up">
            <i class="fa-solid fa-x close_signUp"></i><br>
            <img src="logo.ico">
            <h1>fo<Span>o</Span>dista</h1>
            <p>By clicking "sign up",you agree to our <span>terms of service</span> and acknowledge you have read our <span>privacy policy</span>.</p>
            <b>Full Name <br>
            <input type="text" name="fullname" value="<?php echo $result['fullname'];?>" required></b>
            <br><br>
            <b>Username<br>
            <input type="text" name="username" value="<?php echo $result['username'];?>" required></b>
            <br><br>
            <b>E-mail address <br>
            <input type="email" name="email" value="<?php echo $result['email'];?>" required></b>
            <br><br>
            <b>Password<br>
            <input type="password" name="password" value="<?php echo $result['password'];?>" required></b>
            <br><br>
            <div class="captcha">
                <input type="checkbox" required>
                <img src="captcha.png">
            </div>
            <button type="submit" name="update">update details</button>
            <br>
            <br>
            <p>Already have an account? <span>Log in</span></p>
        </div>
        <form>
    </div>
</body>
</html>

<?php

if(isset($_POST['update'])){
$fullname =  $_POST['fullname'];
$username = $_POST['username'];
$email =  $_POST['email'];
$password = $_POST['password'];

$email=$_SESSION['email_add'];
if($email==true) {

}
else{
    header('location:login.php');
}

$query = "UPDATE `user` SET `fullname`='$fullname',`username`='$username',`email`='$email',`password`='$password' where id='$id'" ;

$result = mysqli_query($con,$query);

if($data) {
    echo "<script>alert('Recored updated')</script>"
    ?>
    <meta http-equiv = "refresh" content = "0; url = http://localhost/crud/displayData.php"/>
    <?php
    }
}
?>