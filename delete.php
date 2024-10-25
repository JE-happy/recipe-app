<?php
    include("form.php");

    $id=$_GET['id'];
    $query="DELETE FROM `user` WHERE id='$id'";
    $data=mysqli_query($con,$query);

    if($data) {
        echo "<script>alert('record deleted')</script>";
        ?>
        <meta http-equiv = "refresh" content = "0; url = http://localhost/crud/displayData.php"/>;
        <?php
    }
?>