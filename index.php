
<?php include("form.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            <input type="text" name="fullname" required></b>
            <br><br>
            <b>Username<br>
            <input type="text" name="username" required></b>
            <br><br>
            <b>E-mail address <br>
            <input type="email" name="email" required></b>
            <br><br>
            <b>Password<br>
            <input type="password" name="password" required></b>
            <br><br>
            <div class="captcha">
                <input type="checkbox" required>
                <img src="captcha.png">
            </div>
            <button type="submit" name="submit">Sign up</button>
            <br>
            <br>
            <p>Already have an account? <span>Log in</span></p>
        </div>
        <form>
    </div>
</body>
</html>

<?php

if(isset($_POST['submit'])){
$fullname =  $_POST['fullname'];
$username = $_POST['username'];
$email =  $_POST['email'];
$password = $_POST['password'];

if($fullname!="" || $username!="" || $email!="" || $password!=""){
$query = "INSERT INTO `user`(`fullname`, `username`, `email`,`password`) VALUES ('$fullname','$username','$email','$password')";

$result = mysqli_query($con,$query);

header('location:index.html');
}
else {
    echo "<Script>alert(please fill the form)</script>";
}
}

?>











