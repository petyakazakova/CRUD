<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Add resource</title>
    <link rel="stylesheet" type="text/css" href="style.css">
<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
</head>

<body>

<?php
$prid = filter_input(INPUT_POST, 'prid', FILTER_VALIDATE_INT) or die('missing parameter');
$rname = filter_input(INPUT_POST, 'rname') or die('missing parameter');
$rdesc = filter_input(INPUT_POST, 'rdesc') or die('missing parameter');

    
require_once 'dbcon.php';
$sql = 'INSERT INTO resources (ResourceID, resource_name, Other_Resource_Details) VALUES (?,?,?)';
$stmt = $link->prepare($sql);
$stmt->bind_param('iss', $rid, $rname, $rdesc);
$stmt->execute();

?>

    <h3>Resource added to category.</h3>
    <hr>

<a href="projectdetails.php?id=<?=$prid?>">Go back to project</a> 



</body>
</html>