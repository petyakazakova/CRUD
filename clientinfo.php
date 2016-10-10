<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Client information</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
</head>

<body>

<?php
$cid = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) or die('missing parameter');
?>

<!-- CLIENT DETAILS -->    
<h1>Details for client with ID <?=$cid?>:</h1>
<ul>
<?php
require_once 'dbcon.php';
$sql = 'SELECT client_name, client_address, Zip_Code, client_contact_number FROM clients where clientsID=?';

$stmt = $link->prepare($sql);
$stmt->bind_param('i', $cid);
$stmt->execute();
$stmt->bind_result($clname, $claddress, $clzip, $clcontact);

while($stmt->fetch()){
	echo '<li>Name: '.$clname.'</li>';
    echo '<li>Address: '.$claddress.', '.$clzip.'</li>';
    echo '<li>Contact number: '.$clcontact.'</li>';   
}
?>
</ul>
    

<!-- PROJECT DETAILS -->
<h2>Projects:</h2>
<ul>
<?php
require_once 'dbcon.php';
$sql = 'SELECT ProjectID, project_name FROM projects where Clients_clientsID=?';

$stmt = $link->prepare($sql);
$stmt->bind_param('i', $cid);
$stmt->execute();
$stmt->bind_result($pid, $pname);

while($stmt->fetch()){
	echo '<li>Project name: <a href="projectdetails.php?id='.$pid.'">'.$pname.'</a></li>';
    echo '<br>';
}
?>
    
<?php
require_once 'dbcon.php';
$sql = 'SELECT ProjectID, project_name FROM projects where Clients_clientsID=?';

$stmt = $link->prepare($sql);
$stmt->execute();
$stmt->bind_result($pid, $pname);

while($stmt->fetch()){
	echo '<li>Project name: '.$pname.' </li>';
    echo '<br>';
}
?>
</ul>
    

<!-- DELETE PROJECT -->    
<h3>Delete project:</h3>
 <form action="deleteproject.php" method="post">
 <select name="cid">
		<?php
		$sql = 'Select project_name, `ProjectID` from projects;';
   		$stmt = $link->prepare($sql);
    	$stmt->execute();
    	$stmt->bind_result($pname, $pid);
    while ($stmt->fetch()){
   echo '<option value="'.$pid.'" placeholder="delete">'.$pname.'</option>'.PHP_EOL;
	}
 ?>
 <input type="submit" value="Delete">
 </select>
 </form>    

</body>
</html>


