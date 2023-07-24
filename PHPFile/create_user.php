<?php
// Get form data
//echo "Reached here..............";
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$hash = password_hash($password, PASSWORD_DEFAULT);
echo $hash;
// Validate form data
if (empty($username) || empty($email) || empty($password)) {
    die("Error: All fields are required.");
}

// Create user account
// Code to create user account goes here...

// Redirect to login page
//header("Location: login.php");
exit();
?>

