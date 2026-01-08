<?php
require_once('db.php');

// Login function
function login($username, $password)
{
    $con = con();
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $res = mysqli_query($con, $sql);
    
    if($res && mysqli_num_rows($res) == 1) {
        return mysqli_fetch_assoc($res);
    }
    return false;
}

// Doctor verification
function verifyDoctor($doctorId)
{
    $con = con();
    $sql = "SELECT * FROM doctors WHERE doctor_id='$doctorId' AND status='verified'";
    $res = mysqli_query($con, $sql);
    
    if($res && mysqli_num_rows($res) == 1) {
        return mysqli_fetch_assoc($res);
    }
    return false;
}

// Get all doctors
function getAllDoctors()
{
    $con = con();
    $sql = "SELECT doctor_id, name, specialization FROM doctors ";
    $res = mysqli_query($con, $sql);
    
    $doctors = [];
    if($res) {
        while($row = mysqli_fetch_assoc($res)) {
            $doctors[] = $row;
        }
    }
    return $doctors;
}

// Medicine verification
function verifyMedicine($medicineCode)
{
    $con = con();
    $sql = "SELECT * FROM medicines WHERE medicine_code='$medicineCode'";
    $res = mysqli_query($con, $sql);
    
    if($res && mysqli_num_rows($res) == 1) {
        return mysqli_fetch_assoc($res);
    }
    return false;
}

// Get all medicines
function getAllMedicines()
{
    $con = con();
    $sql = "SELECT medicine_code, name, company FROM medicines ";
    $res = mysqli_query($con, $sql);
    
    $medicines = [];
    if($res) {
        while($row = mysqli_fetch_assoc($res)) {
            $medicines[] = $row;
        }
    }
    return $medicines;
}

// Add verification history
function addVerification($userId, $type, $code, $name, $status) {
    $conn = con();
    
    $sql = "INSERT INTO verification_history (user_id, type, code, name, status) 
            VALUES ('$userId', '$type', '$code', '$name', '$status')";
    
    if(mysqli_query($conn, $sql)) {
        return true;
    }
    return false;
}

// Get user history
function getUserHistory($userId, $limit = 5) {
    $conn = con();
    
    $sql = "SELECT * FROM verification_history 
            WHERE user_id='$userId' 
            ORDER BY created_at DESC
            LIMIT $limit";
    
    $result = mysqli_query($conn, $sql);
    
    $history = [];
    if($result) {
        while($row = mysqli_fetch_assoc($result)) {
            $history[] = $row;
        }
    }
    return $history;
}

function deleteHistoryById($id) {
    global $conn;

    $id = intval($id);
    $query = "DELETE FROM verification_history WHERE id = $id";
    mysqli_query($conn, $query);
}
?>