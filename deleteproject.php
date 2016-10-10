<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Delete project</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
</head>
<body>
<?php
$cid = filter_input(INPUT_POST, 'cid', FILTER_VALIDATE_INT) or die('Missing/illegal parameter');
require_once 'dbcon.php';
$sql = 'Delete from projects where ProjectID=?';
$stmt = $link->prepare($sql);
$stmt->bind_param('i', $cid);
$stmt->execute();
if ($stmt->affected_rows >0 ){
	echo 'Project deleted from list';
}
else {
	echo 'No project deleted';
//	echo $stmt->error;
}
?>
<hr>
<a href="clientinfo.php?id=<?=$cid?>">Back to Client details</a><br>
</body>
</html>