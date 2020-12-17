<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<script type="text/javascript"></script>
<body>
<?php
	$string = $_POST["date"];
	$timestamp = strtotime($string);
	$compareday = date("l", $timestamp);
	$flag=0;
	if($_POST["DID"]==""||$_POST["CID"]=="")
		echo "SELECT CID AND DID PROPERLY!!!";
	else
	{
	require_once("DBconnect.php");
	$query ="SELECT * FROM doctor_availability WHERE DID = '" . $_POST["DID"] . "' AND CID='".$_POST["CID]."'";
	$results = $conn->query($query);
	while($rs=$results->fetch_assoc())
		{
		   if($rs["day"]==$compareday)
		   {
			   $flag++;
			   echo "Doctor Available on ".$compareday;
			   break;
		   }
		}
		if($flag==0)
			echo "Doctor Unavailable on ".$compareday;
	}
?>
	
</body>
</html>