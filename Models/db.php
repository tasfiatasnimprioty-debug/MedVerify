<?php 
function con()
{
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbname = "medverify";
    
    $conn = new mysqli($serverName, $userName, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    return $conn;
}
?>