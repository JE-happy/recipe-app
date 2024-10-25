<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <form action="" method="POST">
        <div class="cantainer">
            <h1>Login</h1>
            <input type="text" name="email" placeholder="email">
            <input type="text" name="password" placeholder="password">
            <p style="color:blue; cursor:pointer;" onclick="messege()">forget password?</p>
            <input type="submit" name="login" value="login" class="btn">
            <p>new member? <a href="index.php" style="color:red;">signUp here</a></p>
            
        </div>
    </form>

    <script>
        function messege() {
            alert("toh password yad karo")
        }
    </script>
</body>
</html>

<?php
include("form.php");



if(isset($_POST['login'])){
    $email= $_POST['email'];
    $pwd=$_POST['password'];

    $query="select * from `user` where email='$email' && password='$pwd'";
    $data=mysqli_query($con,$query);

    $total=mysqli_num_rows($data);
   
    if($total==1){
       $_SESSION['email_add']= $email;
        header('location:displayData.php');
    }

}

?>