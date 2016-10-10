
<!doctype html>


<!--  FOR THE ADD FILE IT DOES NOT WORK FOR SOME REASON. WHEN I INSERT DATA I GET IT IN MY DATABASE BUT IT DOES NOT SHOW UP IN THE BROWSER. THE CODE MUST BE CORRECT -->







<html>
<head>
<meta charset="UTF-8">
<title>Add New Client</title>
    <link rel="stylesheet" type="text/css" href="style.css">
<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
</head>

<body>

<?php
$clname = filter_input(INPUT_POST, 'clname') or die('missing parameter');
$claddress = filter_input(INPUT_POST, 'claddress') or die('missing parameter');
$clnumber = filter_input(INPUT_POST, 'clnumber', FILTER_VALIDATE_INT) or die('missing parameter');
$zip = filter_input(INPUT_POST, 'zip', FILTER_VALIDATE_INT) or die('missing parameter');

require_once 'dbcon.php';
$sql = 'INSERT INTO clients (client_name, client_address, client_contact_number, Zip_Code) VALUES (?, ?, ?, ?)';
$stmt = $link->prepare($sql);
$stmt->bind_param('ssii', $clname, $claddress, $clnumber, $zip);
$stmt->execute();
?>

    <h2>Client added to Database.</h2>
<hr>
    <h2><a href="clientlist.php>Back to client details.</a></h2>



</body>
</html>