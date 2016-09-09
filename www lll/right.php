<?php
session_start();
if($_SESSION['username'])
{
	include 'script/get_data.php';
	retrieve_Data();
	$uploadDir = 'C:/wamp/www/res/';
	$query = mysqli_query($bdd,"SELECT * FROM users WHERE Common_Name='".$_SESSION['username']."'");
	while($row = mysqli_fetch_assoc($query))
	{
		$current_service = $row['Services_ID'];
		$zone1 = $row['zone1'];
		$zone2 = $row['zone2'];
		$zone3 = $row['zone3'];
		$zone4 = $row['zone4'];
		$zone5 = $row['zone5'];
	}
		if(isset($_POST['add']))
		{
			$fileName = $_FILES['userfile']['name'];
			$tmpName = $_FILES['userfile']['tmp_name'];
			$fileSize = $_FILES['userfile']['size'];
			$fileType = $_FILES['userfile']['type'];
			$refresh_time = $_POST['refresh'];
			$filePath = $uploadDir . $fileName;
				$filee = "../../res/".$fileName;
				$result = move_uploaded_file($tmpName, $filePath);
				if (!$result) {
				echo "Error uploading file";
				exit;
				}

				if(!get_magic_quotes_gpc())
				{ 
				$fileName = addslashes($fileName);
				$filePath = addslashes($filePath);
				}
				$query = "INSERT INTO content (name, size, type, path ) VALUES ('$fileName', '$fileSize', '$fileType', '$filePath')";

				mysqli_query($bdd,$query) or die('Error, query failed : ' . mysql_error());
			
			$title = $_POST['title'];
			$text = $_POST['text'];
			
			if($refresh_time >= '8' && $refresh_time <= '15')
			{
				if(isset($_POST['zone']))
					{
						$currentradio = $_POST['zone'];
						echo $currentradio;
					}
				$sql = "SELECT * FROM slidezone".$currentradio;
				$query = mysqli_query($bdd,$sql);
				$rows = mysqli_num_rows($query);
				$i = $rows + 1;
				$query = "INSERT INTO slidezone".$currentradio."
					(id, name, path, row) 
					VALUES (NULL, '$title', '../../Display/zone".$currentradio."/diapo$i.php', '$i');";
					mysqli_query($bdd, $query); 
			
			$query = "INSERT INTO slideshow 
			(id, name, template, text, case01, case02, case03, case04, case05, case06, case07, case08, case09, case10, case11, case12, case13, case14, case15, case16, case17, case18, case19, case20, case21, case22, case23, case24, path, filepath, Zones_ID, Service_ID, row, refresh_time) 
			VALUES (NULL, '$title', 2, '$text', '', '', '', '', '', '', '', '', '', '', '', '',
			'', '', '', '', '', '', '', '', '', '', '', '', '../../Display/zone".$currentradio."/diapo$i.php','', ".$currentradio.", '$current_service', '$i', '".$refresh_time."');";
			if (mysqli_query($bdd, $query)) 
			{
				$myfile = fopen("Display/zone".$currentradio."/diapo$i.php", "w");
				$txt =
						"<?php
							\$id=\$_GET['link'];

							\$bdd = mysqli_connect('localhost','aies2016','aies2016','aies2016');
							\$sql = 'SELECT * FROM urgency WHERE isOn = 0;';
							\$query = mysqli_query(\$bdd,\$sql);
							\$rows = mysqli_num_rows(\$query);
							if(\$rows == 0)
							{
								header('Location:../urgency.php');
							}
							else{
								\$sql = 'SELECT * FROM slidezone".$currentradio.";';
								\$query = mysqli_query(\$bdd,\$sql);
								\$rows = mysqli_num_rows(\$query);

								if(\$id == \$rows + 1)
								{
									\$id = 1;
									header('refresh:8;url=../../starterzone".$currentradio.".php?link=\$id');	
								}
									else{		
											\$sql = 'SELECT * FROM slidezone".$currentradio." WHERE row = '.\$id.';';
											\$query = mysqli_query(\$bdd,\$sql);
											\$rows = mysqli_num_rows(\$query);
											if(\$rows == 0)
											{
												\$id = \$id + 1;
												header('Location:../../starterzone".$currentradio.".php?link=\$id');
											}
												else{
														while(\$row = mysqli_fetch_assoc(\$query))
														{
															\$slidepath = \$row['path'];

														}
														\$id = \$id + 1;
														header('refresh:5;url=../'.\$slidepath.'?link='.\$id);
												}
								}
							}
							?>
					<html xmlns='http://www.w3.org/1999/xhtml'>
					<head>
					<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
					<meta name='keywords' content='' />
					<meta name='viewport' content='width=device-width, initial-scale=0.40, maximum-scale=1, minimum-scale=0.40'/>
					<meta name='description' content='' />
					<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900' rel='stylesheet' />
					<link href='/css/style_right.css' rel='stylesheet' type='text/css' media='all' />
					<link href='/css/fonts.css' rel='stylesheet' type='text/css' media='all' />
						<link rel='stylesheet' type='text/css' href='css/style_panel.css'>
						<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
						<title>AIES 2016</title>
							<script src='js/prefixfree.min.js'></script>
							
					</head>

					<body>
					<div class='page'>
							<div class='title'>$title<br/></div>
					<div class='text'>$text</div>
					<div class='content'><img src='$filee' width='600' height='480'/></div>
					</body>
					</html>
				";
				fwrite($myfile, $txt);
				header('Location:../members/gslide.php');			
			}
			else
				{
					echo "Erreur: " . $query . "<br>" . mysqli_error($bdd);
				}
			}
			else{echo "<p style='color:red; text-align: center;'>Le temps de rafraichissement n'est pas valide !</p>";}			
		}
}
else header('Location:../../login.php');			
?>
?>
		
			
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<meta name="viewport" content="width=device-width, initial-scale=0.40, maximum-scale=1, minimum-scale=0.40"/>
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="/css/style_addright.css" rel="stylesheet" type="text/css" media="all" />
<link href="/css/fonts.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/style_panel.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>AIES 2016 Admin panel</title>
        <script src="js/prefixfree.min.js"></script>

  
  
  

</head>

<body>
<div class="page">
		<form method="POST" action="right.php" enctype="multipart/form-data">
		<div class="title"><input type="text" placeholder="Titre" name="title"><br/></div>
		<div class="zone"><input type="radio" name="zone" value="1"<?php if($zone1 == 0){echo "disabled";}?> checked> zone 1
			  <input type="radio" name="zone" value="2"<?php if($zone2 == 0){echo "disabled";}?>> zone 2
			  <input type="radio" name="zone" value="3"<?php if($zone3 == 0){echo "disabled";}?>> zone 3
			  <input type="radio" name="zone" value="4"<?php if($zone4 == 0){echo "disabled";}?>> zone 4
			  <input type="radio" name="zone" value="5"<?php if($zone5 == 0){echo "disabled";}?>> zone 5</div></br>
			  <input type="text" placeholder="Temps entre 8 et 15 Sec" name="refresh">
		<input type="hidden" name="MAX_FILE_SIZE" value="20000000">
		<div class ="file"><input name="userfile" type="file" id="userfile"></div>
		<div class="text"><textarea name="text" rows="5" cols="40">Message</textarea><br/></div>
		<div class="content">
		
	<div class="submit"><input type="submit" value="Ajouter" name="add"></div>
</form>
</div>
</body>
</html>