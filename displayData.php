<?php
session_start();
?>


<html>
    <head>
        <title>display data</title>
    </head>
    <style>
        body{
            background-color:black;
        }
        h1 {
            text-align:center;
            background-color:red;
            color:white;
        }
        table {
            width:80%;
            background-color:white;
            border:2px solid black;
            border-collapse:collapse;
            font-size:21px;
        }
        th {
            text-transform:uppercase;
            font-family: Arial, Helvetica, sans-serif;
            padding:10px;
            
        }
        td {
            padding:10px;
        }
        tr:nth-child(even){
            background-color:aqua;
        }
        .update,.delete {
            background-color:green;
            color:white;
            width:70px;
            padding:4px;
            font-size:19px;
            border-radius:8px;
            outline:none;
            border:none;
            cursor:pointer;
        }
        .delete {
            background-color:red;
        }
    </style>
</html>

<?php
    include("form.php");

    $email=$_SESSION['email_add'];

    if($email==true) {

    }
    else{
        header('location:login.php');
    }
    $query = "SELECT * FROM  user ";
    $data=mysqli_query($con,$query);

    $total = mysqli_num_rows($data); //print total number of data
    // $result=mysqli_fetch_assoc($data);
    
    if($total != 0) {
        ?>
        <h1> Displaying All Records</h1>
        <center>
        <table>
            <tr>
                <th width="3%">id</th>
                <th width="15%">fullname</th>
                <th width="15%">username</th>
                <th width="25%">email</th>
                <th width="10%">password</th>
                <th width="15%">operation</th>
            </tr>


        <?php
        while($result  = mysqli_fetch_assoc($data)) {
            echo "
            <tr>
                <td>".$result['id']."</td>
                <td>".$result['fullname']."</td>
                <td>".$result['username']."</td>
                <td>".$result['email']."</td>
                <td>".$result['password']."</td>

                 <td><a href='update.php?id=$result[id]'><input type'submit' value='update' class='update'>

                 <a href='delete.php?id=$result[id]'><input type'submit' value='delete' class='delete' onclick= 'return checkDelete()' ></td>
            </tr>
            ";
        } 
    }
?>

</table>
</center>
<a href="login.php"><input type="submit" name="" value="logOut"></a>


<script>
function checkDelete() {
    return confirm('Are you sure you want to delete this record ?');
}
</script>