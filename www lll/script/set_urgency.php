<?php

$bdd = mysqli_connect('localhost','aies2016','aies2016','aies2016');
$sql = "SELECT * FROM urgency WHERE isOn = 0;";
$query = mysqli_query($bdd,$sql);
$rows = mysqli_num_rows($query);
echo $rows;
if($rows == 0)
{
	$sql = "UPDATE urgency SET isOn = '0';";
	$query = mysqli_query($bdd,$sql);
}
else{
	$sql = "UPDATE urgency SET isOn = '1';";
	$query = mysqli_query($bdd,$sql);
}
header('Location:../a/a_panel.php');