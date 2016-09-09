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
	if(isset($_POST['submit']))
	{
		session_destroy();
		header('Location:../login.php');
	}
		if(isset($_POST['contact']))
	{
		header('Location:../members/Contact.php');
	}
				if(isset($_POST['gslide']))
	{
		header('Location:../members/gslide.php');
	}
			if(isset($_POST['preview']))
	{
		header('Location:multistarter.php');
	}
				if(isset($_POST['zone1']))
	{
		header('Location:../starterzone1.php');
	}
					if(isset($_POST['zone2']))
	{
		header('Location:../starterzone2.php');
	}
					if(isset($_POST['zone3']))
	{
		header('Location:../starterzone3.php');
	}
					if(isset($_POST['zone4']))
	{
		header('Location:../starterzone4.php');
	}
					if(isset($_POST['zone5']))
	{
		header('Location:../starterzone5.php');
	}
						if(isset($_POST['accueil']))
	{
		header('Location:../members/panel.php');
	}
}else header('Location:../login.php');
?>


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<meta name="viewport" content="width=device-width, initial-scale=0.40, maximum-scale=1, minimum-scale=0.40"/>
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="/css/style_panel.css" rel="stylesheet" type="text/css" media="all" />
<link href="/css/fonts.css" rel="stylesheet" type="text/css" media="all" />
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
		<form method="POST" action="multistarter.php">
			<li><a><input type="submit" value="Accueil" name="accueil"><br/></a></li>
			<li><a><input type="submit" value="Gestion Affichage" name="gslide"><br/></a></li>
			<span class="current_page_item"><li><a><input type="submit" value="Afficheur" name="preview"><br/></a></li></span>
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
				<h2>Prévisualisation des Zones</h2>
				<form method="POST" action="multistarter.php">
				<div class="btn1"><input type="submit"  formtarget="_blank"  value="Zone 1" name="zone1"></div>
				<div class="btn2"><input type="submit"  formtarget="_blank"  value="Zone 2" name="zone2"></div>
				<div class="btn3"><input type="submit"  formtarget="_blank"  value="Zone 3" name="zone3"></div><br>
				<div class="btn4"><input type="submit"  formtarget="_blank"  value="Zone 4" name="zone4"></div>
				<div class="btn5"><input type="submit"  formtarget="_blank"  value="Zone 5" name="zone5"></div></div></form>		
		<div id="copyright">
			<span>&copy; AIES2016. Tout droit reservé. | COSTE Geoffrey | PORTE Aubin | ANTOINE Philippe| GATTUSO Gregory
		</div>
	</div>
</div>
</body>
</html>