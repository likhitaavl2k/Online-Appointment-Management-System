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
    <center><h1 style="font-family: cursive">DELETE CLINIC</h1><hr>
        <form method="post" action="">  
            <p style="font-family: cursive">Enter CID:<center><input type="number" name="cid"></center>
             <button type="submit" name="submit1" style="font-family: cursive">Delete by CID</button>
             <br><p style="font-family: cursive">---------OR---------<br>
                <p style="font-family: cursive">Select Name:<br>
                    <?php
                    require_once("includes.html");
                    require_once('DBconnect.php');
                    $clinic_result = $conn->query('select * from clinic order by city,town,CID ASC');
                    ?>
                    <center>
                        <select name="clinicname">
                            <option value="" style="font-family: cursive">---Select Name---</option>
                            <?php
                            if ($clinic_result->num_rows > 0) 
                            {
                                while($row = $clinic_result->fetch_assoc()) 
                                {
                                    ?>
                                    <option value="<?php echo $row["CID"]; ?>"><?php echo $row["name"].", ".$row["town"].", ".$row["city"].",(".$row["address"].")"."(CID=".$row["CID"].")"; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select></center>	
                        <button type="submit" name="submit2">Delete by Name</button>
                    </form>			
                    <?php
                    session_start();
                    include 'DBconnect.php';
                    if(isset($_POST['submit1']))
                    {
                       $cid=$_POST['cid'];
                       $sql = "DELETE FROM clinic WHERE CID= $cid ";

                       if (mysqli_query($conn, $sql))
                       {
		            // echo "Record deleted successfully.Refreshing....";
		            // header( "Refresh:2; url=deleteclinic.php");
                        echo "<script>
                        swal({ 
                            title: 'Record deleted successfully!!',
                            text: '',
                            type: 'success' 
                            },
                            function(){
                              window.location.href = 'deleteclinic.php';
                              });
                              </script>";
                          }
                          else
                          {
                             echo "Error deleting record: " . mysqli_error($conn);
                         }
                     }
                     if(isset($_POST['submit2']))
                     {
                       $cid=$_POST['clinicname'];
                       $sql = "DELETE FROM clinic WHERE cid = $cid ";

                       if (mysqli_query($conn, $sql))
                       {
		            // echo "Record deleted successfully.Refreshing....";
		            // header( "Refresh:2; url=deleteclinic.php");
                        echo "<script>
                        swal({ 
                            title: 'Record deleted successfully!!',
                            text: '',
                            type: 'success' 
                            },
                            function(){
                              window.location.href = 'deleteclinic.php';
                              });
                              </script>";
                          }
                          else
                          {
                             echo "Error deleting record: " . mysqli_error($conn);
                         }
                     }	
                     ?>			
                 </body>
                 </html>