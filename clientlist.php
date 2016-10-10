<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Client list</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>

</head>

<body>
<h1>Clients:</h1>
<ul>
<?php
require_once 'dbcon.php';
$sql = 'SELECT client_name, clientsID FROM clients';
$stmt = $link->prepare($sql);
$stmt->execute();
$stmt->bind_result($cname, $cid);
while($stmt->fetch()){
	echo '<li><a href="clientinfo.php?id='.$cid.'">'.$cname.'</a></li>'.PHP_EOL;
}
?>
</ul>
    
<!-- ADD CLIENT -->    

    <h2>Add client:</h2>
<form method="post" action="addclient.php">
	New Name: <input type="text" name="clname" placeholder="New Name"/>
    New address: <input type="text" name="claddress" placeholder="New address"/>
    New number: <input type="text" name="clnumber" placeholder="New number"/>
    New zip: <input type="text" name="zip" placeholder="New zip"/>
    <input type="submit" name="action" value="Add to clients" />
</form>


<!-- DELETE CLIENT -->    
<h2>Delete client:</h2>
 <form action="deleteclient.php" method="post">
 <select name="cid">
		<?php
		$sql = 'Select client_name, `clientsID` from clients;';
   		$stmt = $link->prepare($sql);
    	$stmt->execute();
    	$stmt->bind_result($clname, $clid);
    while ($stmt->fetch()){
   echo '<option value="'.$clid.'" placeholder="Zip">'.$clname.'</option>'.PHP_EOL;
	}
 ?>
 <br><input type="submit" value="Delete">
 </select>
 </form>


</body>
</html>