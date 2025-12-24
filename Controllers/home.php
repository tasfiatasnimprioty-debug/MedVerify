<?php
    session_start();

    if(isset($_SESSION['status']) !== true){
        header('location: ../Views/login.php');
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
        <h1>Welcome Home! <?php echo $_SESSION['username'];?></h1>
        <a href="../Views/dashboard.php">Dashboard</a>
        <a href="logout.php">Logout</a>

</body>
</html>