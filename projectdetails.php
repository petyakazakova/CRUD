<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Project details</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
</head>

<body>

<?php
$prid = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) or die('missing parameter');
?>        
    
<!-- PROJECT DETAILS -->    
<h2>Project details:</h2>    
<ul>
<?php
require_once 'dbcon.php';
$sql = 'SELECT ProjectID, project_name, project_description, project_start_date, project_end_date FROM projects where ProjectID=?';

$stmt = $link->prepare($sql);
$stmt->bind_param('i', $prid);
$stmt->execute();
$stmt->bind_result($pid, $pname, $pdesc, $pstart, $pend);

while($stmt->fetch()){
	echo '<li>Project name: '.$pname.' </li>';
    echo '<li>Description: '.$pdesc.'</li>';
    echo '<li>Started '.$pstart.'<br> and finished '.$pend.'.</li>';   
}
?>
</ul>    
    
<!-- UPDATE PROJECT --> 
<h3>Update project:</h3>
<form method="post" action="editproject.php">
    <ul>
        <input type="hidden" name="id" value="<?=$prid?>" >
        <li>Change project name: <input type="text" name="pname" placeholder="New Name" value="<?=$pname?>" /></li>
        <li>Change description: <input type="text" name="pdesc" placeholder="New description" value="<?=$pdesc?>" /></li>
    <input type="submit" name="action" value="Submit" />
    </ul>
</form>    
    
<!-- RESOURCES --> 
<h2>Resources used:</h2>      
<ul>    
<?php
require_once 'dbcon.php';
$sql = 'SELECT ResourceID, resource_name, Other_Resource_Details, Resource_Type_Resource_Type_Code FROM resources WHERE ResourceID=?';

$stmt = $link->prepare($sql);
$stmt->bind_param('i', $prid);
$stmt->execute();
$stmt->bind_result($rid, $rname, $rdesc, $rtype);

while($stmt->fetch()){
	echo '<li>Resource name: '.$rname.' </li>';
    echo '<li>Description: '.$rdesc.'</li>';
    echo '<br>';
}
?>
    
   
    </ul>
    
    
<!-- ADD RESOURCE -->  
<h3>Add resource:</h3>
 <form action="addresource.php" method="post">
     <input type="hidden" name="prid" value="<?=$prid?>">
     Resource name: <input type="text" name="rname" placeholder="add name"/><br>
     Description: <input type="text" name="rdesc" placeholder="add description"/><br>
    <input type="submit" name="action" value="submit" />
    </form>    
    

</body>
</html>