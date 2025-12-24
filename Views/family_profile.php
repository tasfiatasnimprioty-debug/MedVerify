<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Family Profile</title>
    <link rel="stylesheet" href="../Assets/dashboard.css">
    <script src="../Assets/family_profile.js"></script>
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
                <li><a href="view_reports.html">View Reports</a></li>
                <li><a href="upload_report.html">Upload Report</a></li>
                <li><a href="family_profile.html"><b>Family Profile</b></a></li>
                <li><a href="logout.html">Logout</a></li>
            </ul>
        </center>
    </nav>

    <hr>

    <main>
        
        <table width="100%">
            <tr>
                <td align="center">
                    <h2>Family Profile</h2>
                    
                </td>
            </tr>
        </table>

        <br><br>

        
        <table border="1" width="100%">
            <tr>
                <td width="100%" align="center" >
                    <h3>Total Family Members</h3>
                    <br>
                    <h1 id="familyMembersCount">3</h1>
                    <p>Registered Members</p>
                </td>
            </tr>
        </table>

        <br><br>

        
        <table width="100%">
            <tr>
                <td align="center">
                    <h3>Family Members</h3>
                </td>
            </tr>
        </table>

        <table border="1" width="100%" id="familyMembersTable">
            <tr>
                <th>Member ID</th>
                <th>Name</th>
                <th>Relationship</th>
                <th>Age</th>
                <th>Blood Group</th>
                <th>Action</th>
            </tr>
            <tr>
                <td>232345</td>
                <td>Md. Shamsul Alam</td>
                <td>Self</td>
                <td>25</td>
                <td>A+</td>
                <td><a href="#">View Profile</a></td>
            </tr>
            <tr>
                <td>435345345</td>
                <td>Md. Sadi</td>
                <td>Brother</td>
                <td>32</td>
                <td>B+</td>
                <td><a href="#">View Profile</a></td>
            </tr>
            <tr>
                <td>6575673</td>
                <td>Md. Ahsan</td>
                <td>Cousin</td>
                <td>26</td>
                <td>A+</td>
                <td><a href="#">View Profile</a></td>
            </tr>
        </table>

        <br><br>

        
        <table width="100%" >
            <tr>
                <td align="center">
                    <h3>Add New Family Member</h3>
                </td>
            </tr>
        </table>

        <table border="1" width="100%" >
            <tr>
                <td width="30%">Name:</td>
                <td width="70%"><input type="text" id="memberName" placeholder="Enter name" style="width: 100%"></td>
            </tr>
            <tr>
                <td>Relationship:</td>
                <td><input type="text" id="memberRelation" placeholder="e.g., Father, Mother, Child" style="width: 100%"></td>
            </tr>
            <tr>
                <td>Age:</td>
                <td><input type="number" id="memberAge" placeholder="Enter age" style="width: 100%"></td>
            </tr>
            <tr>
                <td>Blood Group:</td>
                <td><input type="text" id="memberBlood" placeholder="e.g., A+, B-, O+" style="width: 100%"></td>
            </tr>
        </table>

        <br>

        
        <table width="100%">
            <tr>
                <td align="center">
                    <button id="addMemberBtn">Add Family Member</button>
                    <button id="clearFormBtn">Clear Form</button>
                </td>
            </tr>
        </table>

        <br>

        
        <table  width="100%">
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
