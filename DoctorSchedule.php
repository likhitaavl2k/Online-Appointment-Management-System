<html>
<head>
<link rel="stylesheet" href="adminmain.css"> 
<style>
    table
    {
        width:80%;
        border-collapse:separate;
        border: 5px black;
        padding: 2px;
        font-size: 30px;
        font-family: cursive;
    }
    th
    {
        border: 2px black;
        background-color:peru ;
        color: white;
        text-align: left;
    }
    tr,td
    {
        border: 2px black;
        background-color: whitesmoke;
        color:black;
    }
</style>
</head>
<body style="background-image: url(Images/Pic10.jpg);">
    <ul>
            <li class="dropdown"><p style="font-family: cursive;font-size: 40px;color: white;">ADMIN MODE</p></li>
            <br>
            <h2>
                <li class="dropdown">
                    <br><br>
                    <a class="dropbtn" style="font-family: cursive;">DOCTOR</a>
                    <div class="dropdown-content">
                        <a href="NewDoctor.php" style="font-family: cursive;">Add new Doctor</a>
                        <a href="DeleteDoctor.php" style="font-family: cursive;">Delete Doctor</a>
                        <a href="DoctorSchedule.php" style="font-family: cursive;">Doctor Schedules</a>
                        <a href="ShowDoctor.php" style="font-family: cursive;">Show all Doctors</a>
                    </div>
                </li>
                <li class="dropdown">
                    <br><br>
                    <a class="dropbtn" style="font-family: cursive;">CLINIC</a>
                    <div class="dropdown-content">
                        <a href="NewClinic.php" style="font-family: cursive;">Add new Clinic</a>
                        <a href="DeleteClinic.php" style="font-family: cursive;">Delete Clinic</a>
                        <a href="AddDoctorToClinic.php" style="font-family: cursive;">Assign Doctor to a Clinic</a>
                        <a href="DeleteDoctorFromClinic.php" style="font-family: cursive;">Delete Doctor from a Clinic</a>
                        <a href="ShowClinic.php" style="font-family: cursive;">Show the Clinics</a>
                    </div>
                </li>

                <li>
                    <br><br>
                    <form method="POST" action="AdminLogin.php">
                        <button type="submit" class="cancelbtn" name="logout" style="float: left;font-size: 20px;font-family: cursive;">LOGOUT</button>
                    </form>
                </li>
            </h2>
        </ul>
        <center>
            <h1 style="font-family:cursive">DOCTORS SCHEDULE</h1><hr>
        <?php
        session_start();
        $conn = mysqli_connect('localhost','root','','appointment');
        if (!$conn)
        {
            die('Could not connect: ' . mysqli_error($conn));
        }
        $sql="SELECT * FROM doctor_available order by DID,CID ASC";
        $result = mysqli_query($conn,$sql);
        echo "<br><h2>TOTAL CLINICS AVAILABLE=<b>".mysqli_num_rows($result)."</b></h2><br>";
        echo "<table>
        <tr>
        <th>CID</th>
        <th>Clinic Name</th>
        <th>DID</th>
        <th>Doctor Name</th>
        <th>Day</th>
        <th>Time</th>
        </tr>";
        while($row = mysqli_fetch_array($result))
        {
	        $sql1="SELECT * from doctor where DID=".$row["DID"];
	        $result1= mysqli_query($conn,$sql1);
	        while($row1= mysqli_fetch_array($result1))
	        {
	            $sql2="SELECT * from clinic where CID=".$row["CID"];
	            $result2= mysqli_query($conn,$sql2);
	            while($row2= mysqli_fetch_array($result2))
	            {
                    echo "<tr>";
	                echo "<td>" . $row['CID'] . "</td>";
                    echo "<td>" . $row2['name']."-".$row2['town'] . "</td>";
	                echo "<td>" . $row['DID'] . "</td>";
                    echo "<td>" . $row1['name'] . "</td>";
	                echo "<td>" . $row['day'] . "</td>";
                    echo "<td>" . $row['starttime']."-".$row['endtime']. "</td>";
                    echo "</tr>";
	            }
	        }
        }
        echo "</table>";
        ?>
    </body>
</html>