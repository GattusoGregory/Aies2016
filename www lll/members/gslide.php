<?php
session_start();
if($_SESSION['username'])
{
	include '../script/get_data.php';
	retrieve_Data();
		$query = mysqli_query($bdd,"SELECT * FROM users WHERE Services_ID=1 && Common_Name='".$_SESSION['username']."'");
		$rows = mysqli_num_rows($query);
		if($rows==1)
		{
			?><a href="/a/a_panel.php" style="color:lightgrey; position:fixed;">Panel Admin</a><?php
		}
		$query = mysqli_query($bdd,"SELECT * FROM users WHERE Common_Name='".$_SESSION['username']."'");
		while($row = mysqli_fetch_assoc($query))
			{
				$current_service = $row['Services_ID'];
			}
		if($current_service == 1)
		{
			$query = mysqli_query($bdd,"SELECT * FROM slideshow");
			$rows = mysqli_num_rows($query);
		}
			else
			{
				$query = mysqli_query($bdd,"SELECT * FROM slideshow WHERE Service_ID = $current_service");
				$rows = mysqli_num_rows($query);
			}
	
	if(isset($_POST['submit']))
	{
		session_destroy();
		header('Location:../login.php');
	}
		if(isset($_POST['accueil']))
	{
		header('Location:../members/panel.php');
	}
			if(isset($_POST['urgence']))
	{
		header('Location:../script/set_urgency.php');
	}
			if(isset($_POST['preview']))
	{
		header('Location:../../members/multistarter.php');
	}
			if(isset($_POST['contact']))
	{
		header('Location:../members/contact.php');
	}
			if(isset($_POST['modify']))
	{
				$query = mysqli_query($bdd,"SELECT * FROM slideshow WHERE name='".$_POST['cmbService']."'");
		while($row = mysqli_fetch_assoc($query))
			{
				$current_slide = $row['name'];
				$current_template = $row['template'];
			}
			switch($current_template)
			{
				case 0:
						header('Location:../members/tdedit.php');
						break;
				case 1:
						header('Location:../members/textedit.php');
						break;
			}
	}
			if(isset($_POST['Delete']))
	{
		$query = mysqli_query($bdd,"SELECT * FROM slideshow WHERE name='".$_POST['cmbService']."'");
		while($row = mysqli_fetch_assoc($query))
			{
				$diapo = $row['path'];
				$file = $row['filepath'];
				$zone = $row['Zones_ID'];
			}
		unlink(substr($diapo,3,100));
		unlink($file);
		$query = mysqli_query($bdd,"DELETE FROM slideshow WHERE name='".$_POST['cmbService']."'");
		$query = mysqli_query($bdd,"DELETE FROM slidezone".$zone." WHERE name='".$_POST['cmbService']."'");
		echo "DELETE FROM slidezone".$zone." WHERE name='".$_POST['cmbService']."'";
		echo $zone;
		echo $diapo;
		header('Location:gslide.php');
	}
	if(isset($_POST['add']))
	{
		if($_POST['cmbtmp'] == "Tableau")
		{
			header('Location:../../td.php');
		}
		if($_POST['cmbtmp'] == "Gauche")
		{
			header('Location:../../left.php');
		}
		if($_POST['cmbtmp'] == "Droite")
		{
			header('Location:../../right.php');
		}
		if($_POST['cmbtmp'] == "Texte")
		{
			header('Location:../../textslide.php');
		}
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
<link href="/css/style_gslide.css" rel="stylesheet" type="text/css" media="all" />
<link href="/css/fonts.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/style_panel.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>AIES2016 SlideShow Panel</title>
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
		<form method="POST" action="gslide.php">
			<li><a><input type="submit" value="Accueil" name="accueil"><br/></a></li>
			<span class="current_page_item"><li><a><input type="submit" value="Gestion Affichage" name="gslide"><br/></a></li></span>
			<li><a><input type="submit" value="Afficheur" name="preview"><br/></a></li>
			<li><a><input type="submit" value="Contact" name="contact"><br/></a></li>
			<li><a><input type="submit" value="Déconnexion" name="submit"></a></li>
			</form>
			</ul>
		</div>
	</div>
	<div id="main">
		<div id="welcome">
			<div class="title">
				<h2>Gestion de l'affichage du lycée Alphonse Benoît</h2>
				<span class="byline">Fait Par le BTS SN Session 2016</span>
			</div>
			<p>Voici <strong>AIES</strong> une interface WEB, permettant l'affichage d'informations via les écrans du lycée Alphonse-Benoit</p>
		</div>
		<div id="featured">
		<p> 
		<div class="create_account">
		<form method="POST" action="gslide.php">
				<h2>Gestionnaire de Diaporamas</h2>
				<select id="cmbService" name="cmbService">
				<?php
				while($row = mysqli_fetch_assoc($query))
				{
					$account_list = $row['name'];?>
					<option value="<?php echo "$account_list";?>"><?php echo "$account_list";?></option><?php
				}
				?>
				</select>
				<select id="cmbtmp" name="cmbtmp">
				<option value="Gauche">Gauche</option>
				<option value="Tableau">Tableau</option>
				<option value="Droite">Droite</option>
				<option value="Texte">Texte</option>
				</select>
				<div class="pos_btn1"><input type="submit" value="Ajouter" name="add"></div>
				<div class="pos_btn2"><input type="submit" value="Modifier" name="modify"></div>
				<div class="pos_btn3"><input type="submit" value="Supprimer" name="Delete">	</div></div></div>		
		</form>
		<div id="copyright">
			<span>&copy; AIES2016. Tout droit reservé. | COSTE Geoffrey | PORTE Aubin | ANTOINE Philippe| GATTUSO Gregory
		</div>
	</div>
</div>
</body>
</html>