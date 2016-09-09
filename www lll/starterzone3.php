<?php
echo "<body style='background-color: black !important;font-size: 0%; border-style: none;border-width: 0%;'>";
$id = $_GET['link'];
$bdd = mysqli_connect('localhost', 'aies2016','aies2016' , 'aies2016');
$sql = "SELECT * FROM urgency WHERE isOn = 0;";
$query = mysqli_query($bdd,$sql);
$rows = mysqli_num_rows($query);
if($rows == 0)
{
	header("Location:../urgency.php");
}
else{
	$sql = "SELECT * FROM slidezone3 ;";
	$query = mysqli_query($bdd,$sql);
	$rows = mysqli_num_rows($query);

	if($id == $rows + 1)
	{
		$id = 1;
		header("refresh:5;url=../starterzone3.php?link=$id");	
	}
		else{		
				$sql = "SELECT * FROM slidezone3 WHERE row = $id;";
				$query = mysqli_query($bdd,$sql);
				$rows = mysqli_num_rows($query);
				if($rows == 0)
				{
					$id = $id + 1;
					header("Location:../starterzone3.php?link=$id");
				}
					else{
							while($row = mysqli_fetch_assoc($query))
							{
								$slidepath = $row['path'];

							}
							$id = $id + 1;
							header("refresh:0.01;url=$slidepath?link=".$id);
					}
	}
}
include "css/style_login.css";
?>