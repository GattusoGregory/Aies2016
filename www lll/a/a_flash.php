<?php
session_start();
if($_SESSION['username'])
{
		$bdd = mysqli_connect('localhost', 'aies2016','aies2016' , 'aies2016');		
		$query = mysqli_query($bdd,"SELECT * FROM users WHERE Services_ID=1 && Common_Name='".$_SESSION['username']."'");
		$rows = mysqli_num_rows($query);
		if($rows==1)
		{
			?><a href="../members/panel.php" style="color:lightgrey; position:fixed;">Sortir</a><?php
		}
		$query = mysqli_query($bdd,"SELECT * FROM flash;");
		
		if(isset($_POST['Delete']))
		{
			$query = mysqli_query($bdd,"SELECT * FROM flash WHERE name='".$_POST['cmbService']."'");
			while($row = mysqli_fetch_assoc($query))
				{
					$flash = $row['path'];
				}
			unlink($flash);
			$query = mysqli_query($bdd,"DELETE FROM flash WHERE name='".$_POST['cmbService']."'");
			header('Location:../a/a_flash.php');
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
		if(isset($_POST['zone']))
	{
		header('Location:../a/a_zone.php');
	}
		if(isset($_POST['urgence']))
	{
		header('Location:../script/set_urgency.php');
	}	
	if(isset($_POST['flash']))
	{
		header('Location:../a/a_flash.php');
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
<link href="/css/style_aflash.css" rel="stylesheet" type="text/css" media="all" /><?php include "../css/style_aflash.css";?>
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
			<span class="current_page_item"><li><a><input type="submit" value="Message Flash" name="preview"><br/></a></li></span>
			<li><a><input type="submit" value="Attribution de zones" name="zone"><br/></a></li>
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
		<form method="POST" action="a_flash.php">
				<h2>Modification de Messages Flash</h2>
				<select id="cmbService" name="cmbService">
				<?php
				while($row = mysqli_fetch_assoc($query))
				{
					$flash_list = $row['name'];?>
					<option value="<?php echo "$flash_list";?>"><?php echo "$flash_list";?></option><?php
				}
				?>
				</select>
				<div class="pos_btn1"><input type="submit" value="Ajouter" name="add"></div>
				<div class="pos_btn2"><input type="submit" value="Supprimer" name="Delete">	</div></div></div>		
		</form>
		<div id="copyright">
			<span>&copy; AIES2016. Tout droit reservé. | COSTE Geoffrey | PORTE Aubin | ANTOINE Philippe| GATTUSO Gregory
		</div>