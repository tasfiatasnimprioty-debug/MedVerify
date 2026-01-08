<?php
session_start();
require_once '../Models/alldb.php';

// Check login
if(!isset($_SESSION['status'])) {
    header('location: ../Views/login.php');
    exit();
}

// Handle AJAX requests
if(isset($_GET['action'])) {
    $action = $_GET['action'];
    
    if($action == 'checkDoctor') {
        checkDoctor();
    } 
    elseif($action == 'checkMedicine') {
        checkMedicine();
    }
    elseif($action == 'getHistory') {
        getHistory();
    }
    elseif($action == 'getSampleData') {
        getSampleData();
    }
} else {
    // Load verification page
    include '../Views/verification.php';
}

// Doctor verification function
function checkDoctor() {
    $doctorId = $_POST['doctor_id'];
    
    if(empty($doctorId)) {
        echo json_encode(['status' => 'error', 'message' => 'Please enter Doctor ID']);
        return;
    }
    
    $doctor = verifyDoctor($doctorId);
    
    if($doctor) {
        // Save to history
        addVerification($_SESSION['user_id'], 'doctor', $doctor['doctor_id'], $doctor['name'], 'verified');
        
        echo json_encode([
            'status' => 'verified',
            'message' => 'Doctor Verified Successfully!',
            'doctor_name' => $doctor['name'],
            'doctor_id' => $doctor['doctor_id'],
            'specialization' => $doctor['specialization']
        ]);
    } else {
        // Save failed attempt
        addVerification($_SESSION['user_id'], 'doctor', $doctorId, 'Unknown', 'not_found');
        
        echo json_encode([
            'status' => 'not_found',
            'message' => 'Doctor ID Not Found!',
            'doctor_id' => $doctorId
        ]);
    }
}

// Medicine verification function
function checkMedicine() {
    $medicineCode = $_POST['medicine_code'];
    
    if(empty($medicineCode)) {
        echo json_encode(['status' => 'error', 'message' => 'Please enter Medicine Code']);
        return;
    }
    
    $medicine = verifyMedicine($medicineCode);
    
    if($medicine) {
        // Save to history
        addVerification($_SESSION['user_id'], 'medicine', $medicine['medicine_code'], $medicine['name'], 'verified');
        
        echo json_encode([
            'status' => 'verified',
            'message' => 'Medicine Verified Successfully!',
            'medicine_name' => $medicine['name'],
            'company' => $medicine['company'],
            'medicine_code' => $medicine['medicine_code']
        ]);
    } else {
        // Save failed attempt
        addVerification($_SESSION['user_id'], 'medicine', $medicineCode, 'Unknown', 'not_found');
        
        echo json_encode([
            'status' => 'not_found',
            'message' => 'Medicine Code Not Found!',
            'medicine_code' => $medicineCode
        ]);
    }
}



// Get history function
function getHistory() {
    $history = getUserHistory($_SESSION['user_id']);
    
    $formatted = [];
    foreach($history as $item) {
        $formatted[] = [
            'type' => $item['type'],
            'code' => $item['code'],
            'name' => $item['name'],
            'status' => $item['status'],
            'timestamp' => date('M d, h:i A', strtotime($item['created_at']))
        ];
    }
    
    echo json_encode($formatted);
}


// Get sample data function
function getSampleData() {
    $doctors = getAllDoctors();
    $medicines = getAllMedicines();
    
    echo json_encode([
        'doctors' => $doctors,
        'medicines' => $medicines
    ]);
}
?>