<?php
session_start();
if($_SESSION['username'])
{
	include 'script/get_data.php';
	retrieve_Data();
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
			$title = $_POST['title'];
			$refresh_time = $_POST['refresh'];

			$case01 = $_POST['case01'];$case02 = $_POST['case02'];$case03 = $_POST['case03'];$case04 = $_POST['case04'];
			$case05 = $_POST['case05'];$case06 = $_POST['case06'];$case07 = $_POST['case07'];$case08 = $_POST['case08'];
			$case09 = $_POST['case09'];$case10 = $_POST['case10'];$case11 = $_POST['case11'];$case12 = $_POST['case12'];
			$case13 = $_POST['case13'];$case14 = $_POST['case14'];$case15 = $_POST['case15'];$case16 = $_POST['case16'];
			$case17 = $_POST['case17'];$case18 = $_POST['case18'];$case19 = $_POST['case19'];$case20 = $_POST['case20'];
			$case21 = $_POST['case21'];$case22 = $_POST['case22'];$case23 = $_POST['case23'];$case24 = $_POST['case24'];

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
			VALUES (NULL, '$title', 0, '', '$case01', '$case02', '$case03', '$case04', '$case05', '$case06', '$case07', '$case08', '$case09', '$case10', '$case11', '$case12',
			'$case13', '$case14', '$case15', '$case16', '$case17', '$case18', '$case19', '$case20', '$case21', '$case22', '$case23', '$case24', '../../Display/zone".$currentradio."/diapo$i.php','', '', '0', '$i', '".$refresh_time."');";
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
					<link href='/css/style_td.css' rel='stylesheet' type='text/css' media='all' />
					<link href='/css/fonts.css' rel='stylesheet' type='text/css' media='all' />
						<link rel='stylesheet' type='text/css' href='css/style_panel.css'>
						<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
						<title>AIES 2016</title>
							<script src='js/prefixfree.min.js'></script>
							
					</head>

					<body>
					<div class='page'>
							<div class='title'>$title<br/></div>
					<table>

						<tr><td><div class='bold'>$case01</div></td>
						<td><div class='bold'>$case02</div></td>
						<td><div class='bold'>$case03</div></td>
						<td><div class='bold'>$case04</div></td></tr>
						
						<tr><td>$case05</td>
						<td>$case06</td>
						<td>$case07</td>
						<td>$case08</td></tr>
						
						<tr><td>$case09</td>
						<td>$case10</td>
						<td>$case11</td>
						<td>$case12</td></tr>
						
						<tr><td>$case13</td>
						<td>$case14</td>
						<td>$case15</td>
						<td>$case16</td></tr>
						
						<tr><td>$case17</td>
						<td>$case18</td>
						<td>$case19</td>
						<td>$case20</td></tr>
						
						<tr><td>$case21</td>
						<td>$case22</td>
						<td>$case23</td>
						<td>$case24</td>	
					</table>
					</div>
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
		
			
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<meta name="viewport" content="width=device-width, initial-scale=0.40, maximum-scale=1, minimum-scale=0.40"/>
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="/css/style_addtd.css" rel="stylesheet" type="text/css" media="all" />
<link href="/css/fonts.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/style_panel.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>AIES 2016 Admin panel</title>
        <script src="js/prefixfree.min.js"></script>

  
  
  

</head>

<body>
<div class="page">
		<form method="POST" action="td.php">
		<div class="title"><input type="text" placeholder="Titre" name="title"><br/></div>
		<div class="zone"><input type="radio" name="zone" value="1"<?php if($zone1 == 0){echo "disabled";}?> checked> zone 1
				  <input type="radio" name="zone" value="2"<?php if($zone2 == 0){echo "disabled";}?>> zone 2
				  <input type="radio" name="zone" value="3"<?php if($zone3 == 0){echo "disabled";}?>> zone 3
				  <input type="radio" name="zone" value="4"<?php if($zone4 == 0){echo "disabled";}?>> zone 4
				  <input type="radio" name="zone" value="5"<?php if($zone5 == 0){echo "disabled";}?>> zone 5</div></br>
				  <input type="text" placeholder="Temps entre 8 et 15 Sec" name="refresh">
<table>
	<td><div class="bold"><input type="text" placeholder="En-tete 1" name="case01"></div></td>
	<td><div class="bold"><input type="text" placeholder="En-tete 2" name="case02"></div></td>
	<td><div class="bold"><input type="text" placeholder="En-tete 3" name="case03"></div></td>
	<td><div class="bold"><input type="text" placeholder="En-tete 4" name="case04"></div></td>
	
	<tr><td><div class="bold"><input type="text" placeholder="Case 5" name="case05"></div></td>
	<td><div class="bold"><input type="text" placeholder="Case 6" name="case06"></div></td>
	<td><div class="bold"><input type="text" placeholder="Case 7" name="case07"></div></td>
	<td><div class="bold"><input type="text" placeholder="Case 8" name="case08"></div></td></tr>
	
	<tr><td><div class="bold"><input type="text" placeholder="Case 9" name="case09"></div></td>
	<td><div class="bold"><input type="text" placeholder="Case 10" name="case10"></div></td>
	<td><div class="bold"><input type="text" placeholder="Case 11" name="case11"></div></td>
	<td><div class="bold"><input type="text" placeholder="Case 12" name="case12"></div></td></tr>
	
	<tr><div class="bold"><td><input type="text" placeholder="Case 13" name="case13"></div></td>
	<td><div class="bold"><input type="text" placeholder="Case 14" name="case14"></div></td>
	<td><div class="bold"><input type="text" placeholder="Case 15" name="case15"></div></td>
	<td><div class="bold"><input type="text" placeholder="Case 16" name="case16"></div></td></tr>
	
	<tr><td><div class="bold"><input type="text" placeholder="Case 17" name="case17"></div></div></td>
	<td><div class="bold"><input type="text" placeholder="Case 18" name="case18"></div></td>
	<td><div class="bold"><input type="text" placeholder="Case 19" name="case19"></div></td>
	<td><div class="bold"><input type="text" placeholder="Case 20" name="case20"></div></td></tr>
	
	<tr><td><div class="bold"><input type="text" placeholder="Case 21" name="case21"></div></td>
	<td><div class="bold"><input type="text" placeholder="Case 22" name="case22"></div></td>
	<td><div class="bold"><input type="text" placeholder="Case 23" name="case23"></div></td>
	<td><div class="bold"><input type="text" placeholder="Case 24" name="case24"></div></td></tr>
	

</table>
	<div class="submit"><input type="submit" value="Ajouter" name="add"></div>
</form>
</div>
</body>
</html>