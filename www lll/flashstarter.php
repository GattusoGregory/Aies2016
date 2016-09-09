<?php

$id = $_GET['link'];

$bdd = mysqli_connect('localhost','aies2016','aies2016','aies2016');
	$sql = "SELECT * FROM flash;";
	$query = mysqli_query($bdd,$sql);
	$rows = mysqli_num_rows($query);
	if($id == $rows + 1)
	{
		$id = 1;
		header("url=../flashstarter.php?link=$id");	
	}
		else{		
				$sql = "SELECT * FROM flash WHERE row = $id;";
				$query = mysqli_query($bdd,$sql);
				$rows = mysqli_num_rows($query);
				if($rows == 0)
				{
					$id = $id + 1;
					header("Location:../flashstarter.php?link=$id");
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
?>

<p> blabla </p>