<?php
include("./database/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    	
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $sql = "SELECT * FROM user_data WHERE User_Email = '{$email}'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_fetch_assoc($result) > 0) {
        echo "<script>alert('user already exist!');window.location.href='index.php';</script>";

    } else {
        $sqli1 = "INSERT INTO user_data ( User_Name, User_Email, password ) value ('{$username}','{$email}','{$password}')";
        if (mysqli_query($conn, $sqli1)) {
          echo "<script>alert('registration successfully!');window.location.href='index.php';</script>";
        }
        else{
            // echo "<script>alert('registration failed...!')</script>";
          echo "<script>alert(registration failed...!'');window.location.href='index.php';</script>";

            exit;
        }
    }
}

?>
