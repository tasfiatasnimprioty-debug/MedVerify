<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Reports</title>
    <link rel="stylesheet" href="../Assets/dashboard.css">
    <script src="../Assets/view_reports.js"></script>
</head>
<body id="top">
    <header>
        <center>
            <h1>MedVerify</h1>
        </center>
    </header>

    <nav>
        <center>
            <ul>
                <li><a href="dashboard.html">Dashboard</a></li>
                <li><a href="view_reports.html"><b>View Reports</b></a></li>
                <li><a href="upload_report.html">Upload Report</a></li>
                <li><a href="family_profile.html">Family Profile</a></li>
                <li><a href="logout.html">Logout</a></li>
            </ul>
        </center>
    </nav>

    <hr>

    <main>
        
        <table width="100%">
            <tr>
                <td align="center">
                    <h2>View Medical Reports</h2>
                </td>
            </tr>
        </table>

        <br><br>

        
        <table width="100%">
            <tr>
                <td align="center">
                    <h3>Your Medical Reports</h3>
                </td>
            </tr>
        </table>

        <table border="1" width="100%" id="reportsTable">
            <tr>
                <th>Date</th>
                <th>Test Name</th>
                <th>Doctor/Lab</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <tr>
                <td>2025-10-01</td>
                <td>CBC</td>
                <td>Dr.1</td>
                <td>Normal</td>
                <td><button onclick="alert('Downloading Report')">Download</button></td>
            </tr>
            <tr>
                <td>2025-09-15</td>
                <td>X-Ray</td>
                <td>City Lab</td>
                <td>Critical</td>
                <td><button onclick="alert('Downloading Report')">Download</button></td>
            </tr>
            <tr>
                <td>2025-09-10</td>
                <td>Urine Test</td>
                <td>Dr. 2</td>
                <td>Normal</td>
                <td><button onclick="alert('Downloading Report')">Download</button></td>
            </tr>
            <tr>
                <td>2025-08-22</td>
                <td>MRI Brain</td>
                <td>ABC</td>
                <td>Normal</td>
                <td><button onclick="alert('Downloading Report')">Download</button></td>
            </tr>
            <tr>
                <td>2025-08-15</td>
                <td>Liver Function Test</td>
                <td>Dr.3</td>
                <td>Critical</td>
                <td><button onclick="alert('Downloading Report')">Download</button></td>
            </tr>
            <tr>
                <td>2025-07-30</td>
                <td>ECG</td>
                <td>Heart Clinic</td>
                <td>Normal</td>
                <td><button onclick="alert('Downloading Report')">Download</button></td>
            </tr>
        </table>

        <br><br>

        
        <table width="100%">
            <tr>
                <td align="center">
                    <h3>Add New Report</h3>
                </td>
            </tr>
        </table>

        <table border="1" width="100%">
            <tr>
                <td width="30%">Date:</td>
                <td width="70%"><input type="text" id="reportDate" placeholder="dd-mm-yyyy" ></td>
            </tr>
            <tr>
                <td>Test Name:</td>
                <td><input type="text" id="reportTest" placeholder="Enter test name" ></td>
            </tr>
            <tr>
                <td>Doctor/Lab:</td>
                <td><input type="text" id="reportDoctor" placeholder="Enter doctor or lab name" ></td>
            </tr>
            <tr>
                <td>Status:</td>
                <td><input type="text" id="reportStatus" placeholder="Normal or Critical" ></td>
            </tr>
        </table>

        <br>

        <table width="100%">
            <tr>
                <td align="center">
                    <button id="addReportBtn">Add Report</button>
                    <button id="clearFormBtn">Clear Form</button>
                </td>
            </tr>
        </table>

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
</body>
</html>
