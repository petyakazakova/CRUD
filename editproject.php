<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Edited Project</title>
    <link rel="stylesheet" type="text/css" href="style.css">
<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
</head>

<body>


<?php
$prid = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT) or die('missing parameter');
$pname = filter_input(INPUT_POST, 'pname') or die('missing parameter');
$pdesc = filter_input(INPUT_POST, 'pdesc') or die('missing parameter');
require_once 'dbcon.php';
$sql = 'UPDATE projects SET project_name=?, project_description=? WHERE projectID=?';
$stmt = $link->prepare($sql);
$stmt->bind_param('ssi', $pname, $pdesc, $prid);
$stmt->execute();
if ($stmt->affected_rows > 0){
	echo '<br/><br/>';
    echo 'Project updated...';
}
?>
<hr>
<a href="projectdetails.php?id=<?=$prid?>">Back to project <?=$pname?>.</a>

</body>
</html>