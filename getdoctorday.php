<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<script type="text/javascript"></script>
<body>
<?php
require_once("DBconnect.php");
	$query ="SELECT * FROM doctor_available WHERE CID =".$_POST["cid"];
	$results = $conn->query($query);
?>
	<option value="">Select Day & Time</option>
<?php
	while($rs=$results->fetch_assoc()) {
		$query1="Select *from doctor where DID=".$rs["DID"];
		$result1=$conn->query($query1);
		while($rs1=$result1->fetch_assoc())
		{
?>
	<option value="<?php echo $rs["DID"]." AND day='".$rs["day"]."' AND starttime='".$rs["starttime"]."'"; ?>"><?php echo "Dr.".$rs1["name"]."-".$rs["day"]."(".$rs["starttime"]." to ".$rs["endtime"].")"; ?></option>
<?php
		}
}
?>
</body>
</html>