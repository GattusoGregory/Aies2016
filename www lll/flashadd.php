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
	}
		if(isset($_POST['add']))
		{
			$title = $_POST['title'];
			$text = $_POST['text'];
			
			
			$sql = "SELECT * FROM flash";
			$query = mysqli_query($bdd,$sql);
			$rows = mysqli_num_rows($query);
			$i = $rows + 1;
			$query = "INSERT INTO flash 
			(id, name, text, row, path) 
			VALUES (NULL, '$title', '$text','$i','../../Display/flash/flash$i.php');";
			if (mysqli_query($bdd, $query)) 
			{
				$myfile = fopen("Display/flash/flash$i.php", "w");
				$txt =
				"
				<script>
				var defile;// l'element a deplacer 
				var psinit = 900	; // position horizontale de depart 
				var pscrnt = psinit;       
				function texteDefile() { 
				   if (!defile) defile = document.getElementById('defile'); 
				   if (defile) { 
				      if(pscrnt < ( - defile.offsetWidth) ){ 
				         pscrnt = psinit; 
				                } else { 
				         pscrnt+= -3; // pixel par deplacement 
				      } 
				      defile.style.left = pscrnt+\"px\"; 
				   } 
				} 
				setInterval(\"texteDefile()\",15); // delai de deplacement 
				</script>

				<?php
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
						\$sql = 'SELECT * FROM flash;';
						\$query = mysqli_query(\$bdd,\$sql);
						\$rows = mysqli_num_rows(\$query);

						if(\$id == \$rows + 1)
						{
							\$id = 1;
							header('refresh:15;url=../../flashstarter.php?link=\$id');	
						}
							else{		
									\$sql = 'SELECT * FROM flash WHERE row = '.\$id.';';
									\$query = mysqli_query(\$bdd,\$sql);
									\$rows = mysqli_num_rows(\$query);
									if(\$rows == 0)
									{
										\$id = \$id + 1;
										header('Location:../../flashstarter.php?link=\$id');
									}
										else{
												while(\$row = mysqli_fetch_assoc(\$query))
												{
													\$slidepath = \$row['path'];

												}
												\$id = \$id + 1;
												header('refresh:20;url='.\$slidepath.'?link='.\$id);
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
					<link href='/css/style_flash.css' rel='stylesheet' type='text/css' media='all' />
					<link href='/css/fonts.css' rel='stylesheet' type='text/css' media='all' />
						<link rel='stylesheet' type='text/css' href='css/style_panel.css'>
						<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
						<title>AIES 2016 Admin panel</title>
							<script src='js/prefixfree.min.js'></script>
							
					</head>

					<body>
					<div class='page'>
							<div class='title'>$title<br/></div>
					<div class='text'><div id='defile'>$text</div></div>
					</body>
					</html>
				";
				fwrite($myfile, $txt);
				header('Location:../a/a_flash.php');			
			}
			else
				{
					echo "Erreur: " . $query . "<br>" . mysqli_error($bdd);
				}
			
		}
}
else header('Location:../../login.php');			
?>
		
			
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<meta name="viewport" content="width=device-width, initial-scale=0.40, maximum-scale=1, minimum-scale=0.40"/>
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="/css/style_addtxt.css" rel="stylesheet" type="text/css" media="all" />
<link href="/css/fonts.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/style_panel.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>AIES 2016 Admin panel</title>
        <script src="js/prefixfree.min.js"></script>

  
  
  

</head>

<body>
<div class="page">
		<form method="POST" action="flashadd.php" enctype="multipart/form-data">
		<div class="title"><input type="text" placeholder="Titre" name="title"><br/></div>
		<div class="text"><textarea name="text" rows="5" cols="40">Message</textarea><br/></div>
		<div class="content">
		
	<div class="submit"><input type="submit" value="Ajouter" name="add"></div>
</form>
</div>
</body>
</html>