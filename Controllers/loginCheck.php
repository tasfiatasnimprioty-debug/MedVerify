<?php
session_start();
require_once '../Models/alldb.php';

// Check if form submitted
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Call login function
    $user = login($username, $password);
    
    if($user) {
        // Set session
        $_SESSION['status'] = true;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['full_name'] = $user['full_name'];
        
        // Redirect to home
        header('location: ../Views/dashboard.php');
    } else {
        echo "Invalid username or password!";
        echo '<br><a href="../Views/login.php">Try Again</a>';
    }
} else {
    // Direct access - redirect to login
    header('location: ../Views/login.php');
}
?>