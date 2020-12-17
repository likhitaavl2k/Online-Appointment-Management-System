<?php session_start(); 
error_reporting(0);
?>
<html>
    <head>
    <script src="jquerypart.js" type="text/javascript"></script>
    <link rel="stylesheet" href="adminmain.css"> 
    <script>
    function getState(val) 
    {
	    $.ajax
        ({
	        type: "POST",
	        url: "getclinic.php",
	        data:'city='+val,
	        success: function(data)
            {
		        $("#clinic-list").html(data);
    	    }
	    });
    }
    function getDoctorRegion(val) 
    {
	    $.ajax
        ({
	        type: "POST",
	        url: "getdoctorregion.php",
	        data:'city='+val,
	        success: function(data)
            {
		        $("#doctor-list").html(data);
    	    }
	    });
    }
    </script>
    </head>
    <body style="background-image: url(Images/long.jpg);height: 1100px;">
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
            <h1>ASSIGN DOCTOR TO A CLINIC</h1><hr>
            <form method="post" action="AddDoctorToClinic.php"> 
            <label style="font-size:20px; font-family:cursive" >City:</label>
		    <select name="city" id="city-list" class="demoInputBox"  onChange="getState(this.value);getDoctorRegion(this.value);">
		    <option value="">Select City</option>
		    <?php
		    include 'DBconnect.php';
		    $sql1="SELECT distinct city FROM clinic";
            $results=$conn->query($sql1); 
		    while($rs=$results->fetch_assoc()) { 
		    ?>
		    <option value="<?php echo $rs["city"]; ?>"><?php echo $rs["city"]; ?></option>
		    <?php
		    }
		    ?>
		    </select>
        
	
		    <label style="font-size:20px ;font-family:cursive">Clinic:</label>
		    <select id="clinic-list" name="cid">
            <option value="">Select Clinic</option>
		    </select>
		
		    <label style="font-size:20px;font-family:cursive" >Doctor:</label>
		    <select name="doctor" id="doctor-list">
            <option value="">Select Doctor</option>
            
		    </select>
		
		    <label style="font-size:20px ;style=font-family:cursive">
		    <p style="font-family:cursive">Available Days<br>
		    <table>
		    <tr><td style="font-family:cursive">Monday:</td><td><input type="checkbox" value="Monday" name="daylist[]"/></td></tr>
		    <tr><td style="font-family:cursive">Tuesday:</td><td><input type="checkbox" value="Tuesday" name="daylist[]"/></td></tr>
		    <tr><td style="font-family:cursive">Wednesday:</td><td><input type="checkbox" value="Wednesday" name="daylist[]"/></td></tr>
		    <tr><td style="font-family:cursive">Thursday:</td><td><input type="checkbox" value="Thursday" name="daylist[]"/></td></tr>
		    <tr><td style="font-family:cursive">Friday:</td><td><input type="checkbox" value="Friday" name="daylist[]"/></td></tr>
		    <tr><td style="font-family:cursive">Saturday:</td><td><input type="checkbox" value="Saturday" name="daylist[]"/></td></tr>
		    </table>
		    <p style="font-family:cursive">Availability(24 hour Format):<br>
		    From:<input type="time" name="starttime"><br>
		    To:<input type="time" name="endtime">
		
		    </label>
		    <button name="submit" type="submit" style="font-family:cursive">SUBMIT</button>
            </form>
        <center>
        <?php
        if(isset($_POST['submit']))
        {
            require_once("includes.html");
		    include 'DBconnect.php';
		    $cid=$_POST['cid'];
		    $did=$_POST['doctor'];
		    $starttime=$_POST['starttime'];
		    $endtime=$_POST['endtime'];
		
		    foreach($_POST['daylist'] as $daylist)
		    {
		    	$sql = "INSERT INTO doctor_available(CID, DID,day,starttime,endtime) VALUES ('$cid','$did','$daylist','$starttime','$endtime')";
				if (mysqli_query($conn, $sql)) 
				{
                    // echo "<h2>Record created successfully( CID=$cid DID=$did Day=$daylist )!!</h2>";
                    // header("Refresh:3;url=AddDoctorToClinic.php");
                    echo "<script>
                        swal({ 
                            title: 'Record created successfully',
                            text: '',
                            type: 'success' 
                            },
                            function(){
                              window.location.href = 'AddDoctorToClinic.php';
                              });
                              </script>";
				} 
				else
				{
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
		    }
        }
        ?>
        </form>
    </body>
</html>