<?php
session_start();

class VerificationController {
    
    public function index() {
        if(!isset($_SESSION['status'])) {
            header('location: ../Views/login.php');
            exit();
        }
        
    }
    
    public function checkDoctor() {
        if(!isset($_SESSION['status'])) {
            header('location: ../Views/login.php');
         
            exit();
        }
        
        $doctorId = $_POST['doctor_id'] ?? '';
        
        // Sample doctor IDs for verification
        $validDoctors = [
            'DOC001' => 'Dr. John Smith',
            'DOC002' => 'Dr. Sarah Johnson',
            'DOC003' => 'Dr. Michael Brown',
            'DOC004' => 'Dr. Emily Davis',
            'DOC005' => 'Dr. Robert Wilson'
        ];
        
        if(isset($validDoctors[$doctorId])) {
            $result = [
                'status' => 'verified',
                'message' => 'Doctor Verified Successfully!',
                'doctor_name' => $validDoctors[$doctorId],
                'doctor_id' => $doctorId
            ];
            
            // Store in session history
            $this->addToHistory('doctor', $doctorId, $validDoctors[$doctorId], 'verified');
        } else {
            $result = [
                'status' => 'not_found',
                'message' => 'Doctor ID Not Found!',
                'doctor_id' => $doctorId
            ];
            
            // Store in session history
            $this->addToHistory('doctor', $doctorId, 'Unknown', 'not_found');
        }
        
        echo json_encode($result);
    }
    
    public function checkMedicine() {
        if(!isset($_SESSION['status'])) {
            echo json_encode(['error' => 'Not authenticated']);
            exit();
        }
        
        $medicineCode = $_POST['medicine_code'] ?? '';
        
 
        $validMedicines = [
            'MED001' => ['name' => 'Paracetamol 500mg', 'company' => 'ABC Pharma'],
            'MED002' => ['name' => 'Amoxicillin 250mg', 'company' => 'XYZ Drugs'],
            'MED003' => ['name' => 'Ibuprofen 400mg', 'company' => 'MediCorp'],
            'MED004' => ['name' => 'Cetirizine 10mg', 'company' => 'HealthPlus'],
            'MED005' => ['name' => 'Metformin 500mg', 'company' => 'BioLab']
        ];
        
        if(isset($validMedicines[$medicineCode])) {
            $result = [
                'status' => 'verified',
                'message' => 'Medicine Verified Successfully!',
                'medicine_name' => $validMedicines[$medicineCode]['name'],
                'company' => $validMedicines[$medicineCode]['company'],
                'medicine_code' => $medicineCode
            ];
            
            // Store in session history
            $this->addToHistory('medicine', $medicineCode, $validMedicines[$medicineCode]['name'], 'verified');
        } else {
            $result = [
                'status' => 'not_found',
                'message' => 'Medicine Code Not Found!',
                'medicine_code' => $medicineCode
            ];
            
            // Store in session history
            $this->addToHistory('medicine', $medicineCode, 'Unknown', 'not_found');
        }
        
        echo json_encode($result);
    }
    
    public function getHistory() {
        if(!isset($_SESSION['status'])) {
            echo json_encode(['error' => 'Not authenticated']);
            exit();
        }
        
        $history = $_SESSION['verification_history'] ?? [];
        echo json_encode(array_slice($history, 0, 5)); // Return last 5 entries
    }
    
    private function addToHistory($type, $code, $name, $status) {
        if(!isset($_SESSION['verification_history'])) {
            $_SESSION['verification_history'] = [];
        }
        
        $entry = [
            'type' => $type,
            'code' => $code,
            'name' => $name,
            'status' => $status,
            'timestamp' => date('Y-m-d H:i:s')
        ];
        
        array_unshift($_SESSION['verification_history'], $entry); // Add to beginning
        
        // Keep only last 5 entries
        $_SESSION['verification_history'] = array_slice($_SESSION['verification_history'], 0, 5);
    }
}

// Handle requests
$controller = new VerificationController();

if(isset($_GET['action'])) {
    switch($_GET['action']) {
        case 'checkDoctor':
            $controller->checkDoctor();
            break;
        case 'checkMedicine':
            $controller->checkMedicine();
            break;
        case 'getHistory':
            $controller->getHistory();
            break;
        default:
            $controller->index();
    }
} else {
    $controller->index();
}
?>