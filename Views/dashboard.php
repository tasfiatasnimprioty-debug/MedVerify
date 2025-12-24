
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
    <title>MedVerify</title>
    <link rel="stylesheet" href="../Assets/dashboard.css">
    <script src="../Assets/dashboard.js"></script>
</head>
<body id="top">
    <header>
        <center>
            <h1>MedVerify</h1>
            <p><b>Dashboard</b></p>
        </center>
    </header>

    <nav>
        <center>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="view_reports.php">View Reports</a></li>
                <li><a href="upload_report.php">Upload Report</a></li>
                <li><a href="family_profile.php">Family Profile</a></li>
                <li><a href="verification.php">Verification</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </center>
    </nav>

    <hr>

    <main>
        
        <table width="100%">
            <tr>
                <td align="center">
                   <h1>Welcome Home! <?php echo $_SESSION['username'];?></h1>
                </td>
            </tr>
        </table>

        <br><br>

        
        <table border="1" width="100%">
            <tr>
                <td align="center" class="card-blue" id="card1">
                    <h3>Total Verifications</h3>
                    <br>
                    <h1 id="verificationsCount">12</h1>
                    <p>Checks Completed</p>
                    <br>
                    <a href="view_reports.html">View Details</a>
                </td>

                <td align="center" class="card-green" id="card2">
                    <h3>Upcoming Appointments</h3>
                    <br>
                    <h1 id="appointmentsCount">Oct 24</h1>
                    <p>Next Appointment</p>
                    <br>
                    <a href="#">View Calendar</a>
                </td>

                <td  align="center"class="card-orange" id="card3">
                    <h3>Total Reports</h3>
                    <br>
                    <h1 id="reportsCount">5</h1>
                    <p>Reports Available</p>
                    <br>
                    <a href="view_reports.html">View Reports</a>
                </td>
            </tr>
        </table>

        <br>

        
        <table width="100%">
            <tr>
                <td align="center">
                    <button id="addVerificationBtn">Add Verification</button>
                    <button id="addReportBtn">Add Report</button>
                    <button id="resetBtn">Reset Counts</button>
                </td>
            </tr>
        </table>

        <br><br>

        
        <table width="100%">
            <tr>
                <td align="center">
                    <h3>Recent Activity</h3>
                </td>
            </tr>
        </table>

        <table border="1" width="100%">
            <tr>
                <th>Date</th>
                <th>Activity</th>
                <th>Status</th>
            </tr>
            <tr>
                <td>Dec 5, 2025</td>
                <td>Medical Verification</td>
                <td>Completed</td>
            </tr>
            <tr>
                <td>Dec 3, 2025</td>
                <td>Lab Report Upload</td>
                <td>Completed</td>
            </tr>
            <tr>
                <td>Nov 28, 2025</td>
                <td>Doctor Consultation</td>
                <td>Completed</td>
            </tr>
        </table>

        <br><br>

        
        <!-- <table width="100%">
            <tr>
                <td align="center">
                    <h3>Quick Actions</h3>
                    <p>
                        <a href="#">Upload New Report</a> | 
                        <a href="#">Book Appointment</a> | 
                        <a href="#">Contact Support</a>
                    </p>
                </td>
            </tr>
        </table> -->

        <br>

        
        <table border="0" width="100%" cellpadding="10px" cellspacing="0px">
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
            <!-- <table>
                <tr>
                    <td>
                        <p>&copy; 2025 MedVerify | All Rights Reserved</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>
                            <a href="#">Privacy Policy</a> | 
                            <a href="#">Terms of Service</a> | 
                            <a href="#">Help</a>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p><a href="#top">Back to Top</a></p>
                    </td>
                </tr>

            </table> -->
            <p>&copy; 2025 MedVerify | All Rights Reserved</p>


        </center>
    </footer>
</body>
</html>
