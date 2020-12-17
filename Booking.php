<?php session_start();
error_reporting(0);
 ?>
<html>
    <head>
        <link rel="stylesheet" href="main.css">
    </head>
    <?php include "DBconnect.php"; ?>
    <script>
    function getTown(val) 
    {
	    $.ajax
        ({
	        type: "POST",
	        url: "get_town.php",
	        data:'countryid='+val,
	        success: function(data)
            {
	    	    $("#town-list").html(data);
	        }
	    });
    }
    function getClinic(val)
    {
	    $.ajax
        ({
	        type: "POST",
	        url: "getclinic.php",
	        data:'townid='+val,
	        success: function(data)
            {
	        	$("#clinic-list").html(data);
	        }
	    });
    }
    function getDoctorday(val) 
    {
	    $.ajax
        ({
	        type: "POST",
	        url: "getdoctordaybooking.php",
	        data:'CID='+val,
	        success: function(data)
            {
		        $("#doctor-list").html(data);
	        }
	    });
    }

    function getDay(val) 
    {
	    var CID=document.getElementById("clinic-list").value;
	    var DID=document.getElementById("doctor-list").value;
	    $.ajax
        ({
	        type: "POST",
	        url: "getDay.php",
	        data:'date='+val+'&cidval='+CID+'&didval='+DID,
	        success: function(data)
            {
	        	$("#datestatus").html(data);
	        }
	    });
    }

</script>
    <body style="background-image: url(Images/Pic12.jpg);">
	<div class="header">
    <ul>
        <li style="float: left; border-right: none;"> <a href="Home.php" class="logo"> <img src="Images/Pic9.png" width="70px" height="60px"> <strong> WeCare </strong> Online Apppointment System </a> </li>
        <li> <a href="Home.php"><strong> HOME </strong></a></li>
		<li> <a href="Login.php"><strong> BACK </strong></a></li>
    </ul>
    </div>
	<form action="Booking.php" method="post">
	<div class="sucontainer" style="background-image:url(Images/Pic12.jpg)">
		<label style="font-family:cursive;color:black"><b>Name:</b></label><br>
        <input type="text" placeholder="Enter full name of patient" name="fname" required><br>
        
        <label style="font-family:cursive;color:black"><b>Username:</b></label><br>
		<input type="text" placeholder="Enter your username" name="username" required><br>
		
		<label style="font-family:cursive;color:black"><b>Gender</b></label><br>
		<input type="radio" name="gender" value="female" style="font-family:cursive;color:black">Female
		<input type="radio" name="gender" value="male" style="font-family:cursive;color:black">Male
		<input type="radio" name="gender" value="other" style="font-family:cursive;color:black">Other<br><br>
	
		<label style="font-size:20px ;font-family:cursive;color:black">City:</label><br>
		<select name="city" id="city-list" class="demoInputBox"  onChange="getClinic(this.value);" style="width:100%;height:35px;border-radius:9px">
		<option value="" style="font-family:cursive;color:black">Select City</option>
		<?php
		$sql1="SELECT distinct(city) FROM clinic";
         $results=$conn->query($sql1); 
		while($rs=$results->fetch_assoc()) { 
		?>
		<option value="<?php echo $rs["city"]; ?>"><?php echo $rs["city"]; ?></option>
		<?php
		}
		?>
		</select>
        <br>
	
		
		<label style="font-size:20px ; font-family:cursive;color:black">Clinic:</label><br>
		<select id="clinic-list" name="cid" onChange="getDoctorday(this.value);" style="width:100%;height:35px;border-radius:9px">
        <option value="" style="font-family:cursive;color:black">Select Clinic</option>
        <?php
		$sql1="SELECT * FROM clinic";
         $results=$conn->query($sql1); 
         while($rs=$results->fetch_assoc()) { 
            ?>
            <option value="<?php echo $rs["CID"]; ?>"><?php echo $rs["name"]; ?></option>
            <?php
            }
            ?>
            </select><br>
		
		<label style="font-size:20px ;font-family:cursive;color:black">Doctor:</label><br>
		<select id="doctor-list" name="doctor" onChange="getDate(this.value);" style="width:100%;height:35px;border-radius:9px">
        <option value="" style="font-family:cursive;color:black">Select Doctor</option>
        <?php
		$sql1="SELECT * FROM doctor";
         $results=$conn->query($sql1); 
         while($rs=$results->fetch_assoc()) { 
            ?>
            <option value="<?php echo $rs["DID"]; ?>"><?php echo $rs["name"]; ?></option>
            <?php
            }
            ?>
            </select><br>
		
		
		<label style="font-family:cursive;color:black"><b>Date of Visit:</b></label><br>
		<input type="date" name="DOV" onChange="getDay(this.value);" min="<?php echo date('Y-m-d');?>" max="<?php echo date('Y-m-d',strtotime('+7 day'));?>" required><br><br>
		<div id="datestatus"> </div>
		
		<div class="container">
			<button type="submit" style="position:center" name="submit" value="Submit" style="font-family:cursive;color:black">Submit</button>
		</div>
<?php
if(isset($_POST['submit']))
{
		
		include 'DBconnect.php';
		$fname=$_POST['fname'];
        $gender=$_POST['gender'];
        $username=$_POST['username'];
		$cid=$_POST['cid'];
		$did=$_POST['doctor'];
		$dov=$_POST['DOV'];
		$status="Booking Registered.Wait for the update";
		$timestamp=date('Y-m-d H:i:s');
		$sql = "INSERT INTO booking (username,Fname,gender,CID,DID,DOV,Timestamp,Status) VALUES ('$username','$fname','$gender',$cid,$did,'$dov','$timestamp','$status') ";
		if(!empty($_POST['fname'])&&!empty($_POST['gender'])&&!empty($_POST['username'])&&!empty($_POST['cid'])&&!empty($_POST['doctor']) && !empty($_POST['DOV']))
		{
			$checkday = strtotime($dov);
			$compareday = date("l", $checkday);
			$flag=0;
			require_once("DBconnect.php");
			$query ="SELECT * FROM doctor_available WHERE DID = '" .$did. "' AND CID='".$cid."'";
			$results = $conn->query($query);
			while($rs=$results->fetch_assoc())
			{
				if($rs["day"]==$compareday)
				{
					$flag++;
					break;
				}
			}
			if($flag==0)
			{
				echo "<h2>Select another date as Doctor Unavailable on ".$compareday."</h2>";
			}
			else
			{
				if (mysqli_query($conn, $sql)) 
				{
						echo "<h2>Booking successful!! </h2>";
						header( "Refresh:2; url=Booking.php");

				} 
				else
				{
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
			}
		}
		else
		{
			echo "Enter data properly!!!!";
		}
}
?>
	</form>

    
        
    </body>
</html>