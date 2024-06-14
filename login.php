<?php
include("./database/config.php");
// Start session
session_start();
$error='';
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from form
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    // SQL query to check if the username and password match
    $sql = "SELECT * FROM user_data WHERE User_Email='$email' AND password='$password'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // User authenticated
        $_SESSION['User_Email'] = $email;
        echo "<script>alert('login successfully!');window.location.href='index.php'</script>";
        // Redirect to dashboard page
    } else {
        // Invalid credentials
        echo "<script>alert('Invalid username or password.');window.location.href='index.php'</script>";

    }

    // Close connection
    $conn->close();
}
?>
