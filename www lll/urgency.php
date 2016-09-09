<?php

	include 'script/get_data.php';
$sql = "SELECT * FROM urgency WHERE isOn = 0;";
$query = mysqli_query($bdd,$sql);
$rows = mysqli_num_rows($query);
if($rows != 0)
{
	$ip = $_SERVER['REMOTE_ADDR'];
	$sql = "SELECT * FROM rpi WHERE ip = '$ip';";
	$query = mysqli_query($bdd,$sql);
	$rows = mysqli_num_rows($query);
	if($rows != 0)
	{
		while($row = mysqli_fetch_assoc($query))
		{
			$zone = $row['zone_id'];
		}
	}
		switch($zone)
		{
			case 1:
			header("Location:../starterzone1.php");
			break;
			case 2:
			header("Location:../starterzone2.php");
			break;
			case 3:
			header("Location:../starterzone3.php");
			break;
			case 4:
			header("Location:../starterzone4.php");
			break;
			case 5:
			header("Location:../starterzone5.php");
			break;
		}

}
else{header("refresh:3;url=../urgency.php");}
?>

<link href="/css/style_urgency.css" rel="stylesheet" type="text/css" media="all" />
<body>
<div class="panne"><img src="Sa.png"/>
<meta http-equiv="Refresh" content="15">
</body>