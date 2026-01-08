
<?php
session_start();
if(!isset($_SESSION['status'])) {
    header('location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedVerify - Doctor & Medicine Verification</title>
    <link rel="stylesheet" href="../Assets/dashboard.css">
    
</head>
<body id="top">
    <header>
        <center>
            <h1>MedVerify</h1>
            <p><b>Doctor & Medicine Verification</b></p>
        </center>
    </header>

    <nav>
        <center>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="view_reports.php">View Reports</a></li>
                <li><a href="upload_report.php">Upload Report</a></li>
                <li><a href="family_profile.php">Family Profile</a></li>
                <li><a href="verification.php" >Verification</a></li>
                <li><a href="../Controllers/logout.php">Logout</a></li>
            </ul>
        </center>
    </nav>

    <hr>

    <main>
        <table width="100%">
            <tr>
                <td align="center">
                    <h2>Welcome <?php echo $_SESSION['full_name']; ?></h2>
                    <p>Verify Doctors and Medicines manually</p>
                </td>
            </tr>
        </table>

        <div class="verification-container">
            <!-- Doctor Verification Box -->
            <div class="verification-box">
                <h3>Doctor Verification</h3>
        
                
                <input type="text" id="doctorId" placeholder="Enter Doctor ID (e.g., DOC001)">
                <button onclick="verifyDoctor()">Verify Doctor</button>
                
                <div id="doctorResult" class="result-box"></div>
              
            </div>

            <!-- Medicine Verification Box -->
            <div class="verification-box">
                <h3>Medicine Verification</h3>
                <p>Enter Medicine Code to verify:</p>
                
                <input type="text" id="medicineCode" placeholder="Enter Medicine Code (e.g., MED001)">
                <button onclick="verifyMedicine()">Verify Medicine</button>
                
                <div id="medicineResult" class="result-box"></div>
                
            </div>
        </div>

        <!-- Verification History -->
        <table width="100%">
            <tr>
                <td align="center">
                    <h3>Recent Verification History</h3>
                    <button id="refreshHistory">Refresh History</button>
                </td>
            </tr>
        </table>

        <table border="1" width="100%" class="history-table" id="historyTable">
    <thead>
        <tr>
            <th>Type</th>
            <th>Code/ID</th>
            <th>Name</th>
            <th>Status</th>
            <th>Time</th>
          
        </tr>
    </thead>
    <tbody id="historyBody">
        <!-- History will be loaded here via JavaScript -->
         <tr><td colspan="5">Loading history...</td>
    </tbody>
</table>


        <!-- Fake Medicine Info Section -->
        <div style="margin-top: 40px; padding: 20px; background-color: #fff3cd; border: 1px solid #ffeaa7;">
            <h3>How to Identify Fake Medicines</h3>
            <table width="100%" border="0">
                <tr>
                    <td width="50%" valign="top">
                        <h4>🔴 Signs of Fake Medicine:</h4>
                        <ul>
                            <li>Unusual packaging or spelling errors</li>
                            <li>Missing hologram or security seal</li>
                            <li>Wrong texture, color, or smell</li>
                            <li>Price significantly lower than market</li>
                            <li>No batch number or expiry date</li>
                        </ul>
                    </td>
                    <td width="50%" valign="top">
                        <h4>✅ Safe Medicine Checklist:</h4>
                        <ul>
                            <li>Check for proper hologram/sticker</li>
                            <li>Verify manufacturer details</li>
                            <li>Check expiry date clearly printed</li>
                            <li>Buy from licensed pharmacies only</li>
                            <li>Use MedVerify to check codes</li>
                        </ul>
                    </td>
                </tr>
            </table>
        </div>

        <br>
        <table width="100%">
            <tr>
                <td align="center">
                    <a href="#top">Back to Top</a>
                </td>
            </tr>
        </table>
    </main>

    <hr>

    <footer>
        <center>
            <p>&copy; 2025 MedVerify | All Rights Reserved</p>
        </center>
    </footer>

    <script src="../Assets/verification.js"></script>
</body>
</html>