<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<script type="text/javascript"></script>
<body>
<?php
require_once("DBconnect.php");
	$query ="SELECT * FROM clinic WHERE town = '" . $_POST["town"] . "'";
	$results = $conn->query($query);
?>
	<option value="">Select Town</option>
<?php
	while($rs=$results->fetch_assoc()) {
?>
	<option value="<?php echo $rs["town"];?>"><?php echo $rs["town"]; ?></option>
<?php

}
?>
</body>
</html>