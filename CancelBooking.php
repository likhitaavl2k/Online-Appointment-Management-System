<html>
    <head>
        <link rel="stylesheet" href="main.css">
    </head> <?php $conn = mysqli_connect('localhost','root','','appointment'); ?>
    <body style="background-image: url(Images/Pic6.jpg);">
        <div class="header">
            <ul>
                <li style="float: left; border-right: none;"><a href="Login.php" class="logo"><img src="Images/Pic9.png" width="70px" height="60px"> <strong> WeCare </strong> Online Apppointment System </a></li>
                <li> <a href="Login.php">BACK</a></li>
            </ul>
        </div>
<form action="CancelBooking.php" method="POST">
    <div class="sucontainer">
        <label style="font-size: 30px">Select your Apppointment to Cancel:-</label><br>
        <select name="Appointment" id="Apppointment-list" class="demoInputBox" style="width: 100%;height: 50px; border-radius: 10px;">
        <option value="">Select My Apppointment</option>
    </div>
    <?php
		session_start();
		echo "<h1 style='color:black;'>".$_POST['Appointment']."</h1>";
		$username=$_SESSION['username'];
		$date= date('Y-m-d');
		$sql1="SELECT * from booking where username='".$username."'and status not like 'Cancelled by Patient' and DOV >='$date'";
         $results=$conn->query($sql1); 
		while($rs=$results->fetch_assoc()) {
			$sql2="select * from doctor where DID=".$rs["DID"];
			$results2=$conn->query($sql2);
				while($rs2=$results2->fetch_assoc()) {
					$sql3="select * from clinic where CID=".$rs["CID"];
					$results3=$conn->query($sql3);
		while($rs3=$results3->fetch_assoc()) {
			
		?>
		<option value="<?php echo $rs["Timestamp"]; ?>"><?php echo "Patient: ".$rs["Fname"]." Date: ".$rs["DOV"]." -Dr.".$rs2["name"]." -Clinic: ".$rs3["name"]." -Town: ".$rs3["town"]." - Booked on:".$rs["Timestamp"]; ?></option>
		<?php
		}
		}
		}
		?>
		</select>
		

			<button type="submit" style="position:center" name="submit" value="Submit">Submit</button>
	</form>
	<?php
if(isset($_POST['submit']))
{
		$username=$_SESSION['username'];
		$timestamp=$_POST['Appointment'];
		$updatequery="update booking set Status='Cancelled by Patient' where username='$username' and timestamp= '$timestamp'";
				if (mysqli_query($conn, $updatequery)) 
				{
							echo "Appointment Cancelled successfully..!!<br>";
							header( "Refresh:2; url=Login.php");

				} 
				else
				{
					echo "Error: " . $updatequery . "<br>" . mysqli_error($conn);
				}

}
?>
</body>
</html>