<?php
session_start();
if($_SESSION['username'])
{
		$i = 0;
		$j = 1;

		$rpiname1 = "rpi_accueil";
		$rpiname2 = "rpi_self";
		$rpiname3 = "rpi_vs";
		$rpiname4 = "rpi_dir";
		$rpiname5 = "rpi_prof";

		$servname1 = "Vie Scolaire";
		$servname2 = "Direction";
		$servname3 = "Infirmerie";
		$servname4 = "CVL";


		$bdd = mysqli_connect('localhost', 'aies2016','aies2016' , 'aies2016');	
		$query = mysqli_query($bdd,"SELECT * FROM users WHERE Services_ID=1 && Common_Name='".$_SESSION['username']."'");
		$rows = mysqli_num_rows($query);
		if($rows==1)
		{
			?><a href="../members/panel.php" style="color:lightgrey; position:fixed;">Sortir</a><?php
		}
	if(isset($_POST['add']))
	{
		header('Location:../flashadd.php');
	}
	if(isset($_POST['submit']))
	{
		session_destroy();
		header('Location:../login.php');
	}
	if(isset($_POST['accueil']))
	{
		header('Location:../a/a_panel.php');
	}
		if(isset($_POST['panel']))
	{
		header('Location:../a/a_account.php');
	}
		if(isset($_POST['urgence']))
	{
		header('Location:../script/set_urgency.php');
	}
		if(isset($_POST['zone']))
	{
		header('Location:../a/a_zone.php');
	}	
	if(isset($_POST['flash']))
	{
		header('Location:../a/a_flash.php');
	}	
			if(isset($_POST['edit']))
		{
					$rpi1 = substr($_POST['0'], -1);
					$rpi2 = substr($_POST['1'], -1);
					$rpi3 = substr($_POST['2'], -1);
					$rpi4 = substr($_POST['3'], -1);
					$rpi5 = substr($_POST['4'], -1);  

					$query = mysqli_query($bdd,"					
					UPDATE rpi SET
					zone_id = '$rpi1' 
					WHERE name = '$rpiname1';");

					$query = mysqli_query($bdd,"					
					UPDATE rpi SET
					zone_id = '$rpi2' 
					WHERE name = '$rpiname2';");

					$query = mysqli_query($bdd,"					
					UPDATE rpi SET
					zone_id = '$rpi3' 
					WHERE name = '$rpiname3';");

					$query = mysqli_query($bdd,"					
					UPDATE rpi SET
					zone_id = '$rpi4' 
					WHERE name = '$rpiname4';");

					$query = mysqli_query($bdd,"					
					UPDATE rpi SET
					zone_id = '$rpi5' 
					WHERE name = '$rpiname5';");

		}			
		if(isset($_POST['editzone']))
		{
			$newzone1 = $_POST['newzone1'];
			$newzone2 = $_POST['newzone2'];
			$newzone3 = $_POST['newzone3'];
			$newzone4 = $_POST['newzone4'];
			$newzone5 = $_POST['newzone5'];

			$newzone6 = $_POST['newzone6'];
			$newzone7 = $_POST['newzone7'];
			$newzone8 = $_POST['newzone8'];
			$newzone9 = $_POST['newzone9'];
			$newzone10 = $_POST['newzone10'];

			$newzone11 = $_POST['newzone11'];
			$newzone12 = $_POST['newzone12'];
			$newzone13 = $_POST['newzone13'];
			$newzone14 = $_POST['newzone14'];
			$newzone15 = $_POST['newzone15'];

			$newzone16 = $_POST['newzone16'];
			$newzone17 = $_POST['newzone17'];
			$newzone18 = $_POST['newzone18'];
			$newzone19 = $_POST['newzone19'];
			$newzone20 = $_POST['newzone20'];


					$query = mysqli_query($bdd,"					
					UPDATE services SET
					zone1 = '$newzone1', 
					zone2 = '$newzone2', 
					zone3 = '$newzone3', 
					zone4 = '$newzone4', 
					zone5 = '$newzone5'
					WHERE name = '$servname1';");

					$query = mysqli_query($bdd,"					
					UPDATE services SET
					zone1 = '$newzone6', 
					zone2 = '$newzone7', 
					zone3 = '$newzone8', 
					zone4 = '$newzone9', 
					zone5 = '$newzone10'
					WHERE name = '$servname2';");

					$query = mysqli_query($bdd,"					
					UPDATE services SET
					zone1 = '$newzone11', 
					zone2 = '$newzone12', 
					zone3 = '$newzone13', 
					zone4 = '$newzone14', 
					zone5 = '$newzone15'
					WHERE name = '$servname3';");

					$query = mysqli_query($bdd,"					
					UPDATE services SET
					zone1 = '$newzone16', 
					zone2 = '$newzone17', 
					zone3 = '$newzone18', 
					zone4 = '$newzone19', 
					zone5 = '$newzone20'
					WHERE name = '$servname4';");
		}			
} 
else header('Location:../login.php');			
?>
		
			
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<meta name="viewport" content="width=device-width, initial-scale=0.40, maximum-scale=1, minimum-scale=0.40"/>
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="/css/style_zone.css" rel="stylesheet" type="text/css" media="all" /> <?php include "../css/style_zone.css";?>
<link href="/css/fonts.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/style_panel.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>AIES 2016 Admin panel</title>
        <script src="js/prefixfree.min.js"></script>

  
  
  

</head>
<body>
<div id="page" class="container">
	<div id="header">
		<div class="logo">
			<div>AIES<span>2016</span></div>
			<span class="currentuser"><?php echo $_SESSION['username']?></span>
		</div>
		<div id="menu">
			<ul>
		<form method="POST" action="a_flash.php">
			<li><a><input type="submit" value="Création de comptes" name="accueil"><br/></a></li>
			<li><a><input type="submit" value="Compte" name="panel"><br/></a></li>
			<li><a><input type="submit" value="Message Flash" name="preview"><br/></a></li>
			<span class="current_page_item"><li><a><input type="submit" value="Attribution de zones" name="zone"><br/></a></li></span>
			<li><a><input type="submit" value="Stop Diffusions" name="urgence"><br/></a></li>
			<li><a><input type="submit" value="Déconnexion" name="submit"></a></li>
			</form>
			</ul>
		</div>
	</div>
	<div id="main">
		<div id="welcome">
			<div class="title">
				<h2>Administration de l'affichage du lycee Benoit</h2>
				<span class="byline">Fait Par le BTS SN Session 2016</span>
			</div>
			<p>Voici <strong>AIES</strong> une interface WEB, permettant l'Administration des affichages du lycee Alphonse-Benoît</p>
		</div>
		<div id="featured">
		<p> 
		<div class="create_account">
		<form method="POST" action="a_zone.php">
			<h2>Attribution de zoness</h2>
				<?php
				$query = mysqli_query($bdd,"SELECT * FROM rpi;");
				echo "<div class =\"fullrpi\"><div class =\"namerpi\">Nom</div> <div class =\"iprpi\">Adresse IP</div> <div class =\"macrpi\">Adresse MAC </div> <div class =\"zonerpi\">Zone Actuel</div></div>";
				while($row = mysqli_fetch_assoc($query))
				{
					$name = $row['name'];
					$ip = $row['ip'];
					$mac = $row['mac'];
					$currentzone = $row['zone_id'];
					echo "<div class =\"fullrpi\"><div class =\"namerpi\">".$name."</div> <div class =\"iprpi\">".$ip."</div> <div class =\"macrpi\">".$mac."</div> <div class =\"zonerpi\">".$currentzone."</div></div>";

					$query1 = mysqli_query($bdd,"SELECT * FROM zones;");
					?><select id="<?php echo "$i";?>" name="<?php echo "$i";?>"	><?php
					while($row1 = mysqli_fetch_assoc($query1))
					{
						$zones = $row1['zones'];?>
						<option value="<?php echo "$zones";?>"><?php echo "$zones";?></option></form><?php					
					}?></select><br><br><?php
					$i++;
				}
				 ?>
				 	<div class="submit"><input type="submit" value="Modifier" name="edit"></div><br><br>

				<h2>Attribution de Permissions</h2>
				<?php
				$query = mysqli_query($bdd,"SELECT * FROM services;");
				echo "
				<div class =\"fullrpi\">
				<div class =\"nameserv\">Services</div> 
				<div class =\"zone1\">Zone 1</div> 
				<div class =\"zone2\">Zone 2</div> 
				<div class =\"zone3\">Zone 3</div> 
				<div class =\"zone4\">Zone 4</div> 
				<div class =\"zone5\">Zone 5</div>
				</div>";
				while($row = mysqli_fetch_assoc($query))
				{
					$nameserv = $row['name'];
					$zone1bdd = $row['zone1'];
					$zone2bdd = $row['zone2'];
					$zone3bdd = $row['zone3'];
					$zone4bdd = $row['zone4'];
					$zone5bdd = $row['zone5'];

					echo "
					<div class =\"fullrpi\">
					<div class =\"nameserv\">".$nameserv."</div> 
					<div class =\"zone1\"><input type=\"text\" value=\"".$zone1bdd."\" name=\"newzone".$j++."\"></div> 
					<div class =\"zone2\"><input type=\"text\" value=\"".$zone2bdd."\" name=\"newzone".$j++."\"></div>
					<div class =\"zone3\"><input type=\"text\" value=\"".$zone3bdd."\" name=\"newzone".$j++."\"></div>
					<div class =\"zone4\"><input type=\"text\" value=\"".$zone4bdd."\" name=\"newzone".$j++."\"></div>
					<div class =\"zone5\"><input type=\"text\" value=\"".$zone5bdd."\" name=\"newzone".$j++."\"></div>
					</div>";
				}
				 ?>
		</div>
		<div class="editbtn"><input type="submit" value="Modifier" name="editzone"></div>
		</form>
		</p>
		<div id="copyright">
			<span>&copy; AIES2016. Tout droit reservé. | COSTE Geoffrey | PORTE Aubin | ANTOINE Philippe| GATTUSO Gregory
		</div>
	</div>
</div>
</body>
</html>