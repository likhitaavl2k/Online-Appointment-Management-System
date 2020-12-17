<?php session_start(); 

?>
<html>
<head>
    <link rel="stylesheet" href="adminmain.css">
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
        <h1 style="font-family: cursive; font-size: 30px;">ADD DOCTOR</h1>
        <form method="POST" action="insertdoctor.php">
         <p style="font-family: cursive; font-size: 20px;position: absolute;left: 6%;">DID:</p> <input type="number" name="did" style="width: 15%;position: absolute;left: 12%;" required>
         <br>
         <p style="font-family: cursive; font-size: 20px;position: absolute;left: 30%;top: 37%;">Name:</p> <input type="text" name="name" style="width: 15%;position: absolute;left: 36%;top: 37%;" required>
         <br>
         <p style="font-family: cursive; font-size: 20px;position: absolute;left: 54%;top: 37%;">Gender:</p> <input type="text" name="gender" style="width: 15%;position: absolute;left: 60%;top: 37%;" required>
         <br>
         <p style="font-family: cursive; font-size: 20px;position: absolute;left: 6%;top: 49%;">DOB:</p> <input type="date" name="dob" style="width: 15%;position: absolute;left: 10%;top: 49%;" required>
         <br>
         <p style="font-family: cursive; font-size: 20px;position: absolute;left: 26%;top: 49%;">Experience:</p> <input type="text" name="experience" style="width: 15%;position: absolute;left: 35%;top: 49%;" required>
         <br>
         <p style="font-family: cursive; font-size: 20px;position: absolute;left: 50%;top: 49%;">Specialisation:</p> <input type="text" name="specialisation" style="width: 15%;position: absolute;left: 60%;top: 49%;" required>
         <br>
         <p style="font-family: cursive; font-size: 20px;position: absolute;left: 6%;top: 60%;">Contact:</p> <input type="number" name="contact" style="width: 15%;position: absolute;left: 13%;top: 60%;" required>
         <br>
         <p style="font-family: cursive; font-size: 20px;position: absolute;left: 35%;top: 60%;">Address:</p> <input type="text" name="address" style="width: 30%;position: absolute;left: 43%;top: 60%;" required>
         <br>
         <p style="font-family: cursive; font-size: 20px;position: absolute;left: 6%;top: 70%;">Region:</p> <input type="text" name="region" style="width: 15%;position: absolute;left: 12%;top: 70%;" required>
         <br>
         <p style="font-family: cursive; font-size: 20px;position: absolute;left: 29%;top: 70%;">Username:</p> <input type="text" name="username" style="width: 15%;position: absolute;left: 37%;top: 70%;" required>
         <br>
         <p style="font-family: cursive; font-size: 20px;position: absolute;left: 54%;top: 70%;">Password:</p> <input type="password" name="password" maxlength="10" minlength="10" style="width: 15%;position: absolute;left: 62%;top: 70%;" required>
         <br><br><br><br><br>
         <button type="submit" name="submit">REGISTER</button>
     </form>
 </center>
 

</body>
</html>