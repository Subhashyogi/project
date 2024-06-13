<?php
include("./database/config.php");
// session_start();
// if(!isset($_SESSION["username"])) { 
//     header( "Location: index.php" );
// }
// Start session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    	
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
    $sql = "SELECT * FROM user_data WHERE User_Email = '{$email}'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_fetch_assoc($result) > 0) {
        echo "<script>alert('user already exist...')</script>";
    } else {
        $sqli1 = "INSERT INTO user_data ( User_Name, User_Email, password ) value ('{$username}','{$email}','{$password}')";
        if (mysqli_query($conn, $sqli1)) {
          echo "<script>alert('registration successfully!')</script>";
            header("Location: index.php");
        }
        else{
            echo "<script>alert('registration failed...!')</script>";
            exit;
        }
    }
}

?>
