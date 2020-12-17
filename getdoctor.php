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
	$query ="SELECT distinct DID FROM doctor_available WHERE CID = '" . $_POST["CID"] . "'";
	$results = $conn->query($query);
?>
	<option value="">Select Doctor</option>
<?php
	while($rs=$results->fetch_assoc()) {
		$query1="Select distinct name from doctor where DID=".$rs["DID"];
		$result1=$conn->query($query1);
		while($rs1=$result1->fetch_assoc())
		{
?>
	<option value="<?php echo $rs["DID"]; ?>"><?php echo $rs["DID"].":".$rs1["name"]; ?></option>
<?php
		}
}
?>
</body>
</html>