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
    <h1 style="font-family: cursive">DELETE DOCTOR</h1><hr>
    <form method="post" action="deletedocfromdb.php">  
      <p style="font-family: cursive">Enter DID:<center><input type="number" name="did"></center>
       <button type="submit" name="submit1" style="font-family: cursive">Delete by DID</button>
       <br><p style="font-family: cursive">---------OR---------<br>
        <p style="font-family: cursive">Select Name:<br>
          <?php
          require_once('DBconnect.php');
          $doctor_result = $conn->query('select * from doctor order by DID ASC');
          ?>
          <center>
            <select name="doctorname">
              <option value="">---Select Name---</option>
              <?php
              if ($doctor_result->num_rows > 0) 
              {
                while($row = $doctor_result->fetch_assoc())
                {
                  ?>
                  <option value="<?php echo $row["DID"]; ?>"><?php echo "(DID= $row[DID]) Dr. ".$row["name"]; ?></option>
                  <?php
                }
              }
              ?>
            </select>
          </center>

          <button type="submit" name="submit2">Delete by Name</button>
        </form>			
        
      </body>
      </html>