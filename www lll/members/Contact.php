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
	if(isset($_POST['gslide']))
	{
		header('Location:../members/gslide.php');
	}
	if(isset($_POST['preview']))
	{
		header('Location:../../members/multistarter.php');
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
		<form method="POST" action="panel.php">
			<li><a><input type="submit" value="Accueil" name="accueil"><br/></a></li>
			<li><a><input type="submit" value="Gestion Affichage" name="gslide"><br/></a></li>
			<li><a><input type="submit" value="Afficheur" name="preview"><br/></a></li>
			<span class="current_page_item"><li><a><input type="submit" value="Contact" name="contact"><br/></a></li></span>
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
		<h2>Contacts</h2>
		<div class="contact1"><img src="../res/antoine.jpg" width="200" height="200"/><br/>Antoine Philippe<br/><a href="mailto:phA.travail@gmail.com.com" target="_top">Envoyer un E-mail</a></div>
		<div class="child">
		<div class="contact2"><img src="../res/coste.jpg" width="200" height="200"/><br/>Geoffrey Coste</div>
		<div class="contact3"><img src="../res/porte.jpg" width="200" height="200"/><br/>Aubin Porte</div>
		<div class="contact4"><img src="../res/gattuso.jpg" width="200" height="200"/><br/>Gregory Gattuso</div>
		</div>
		</p>
		</div>
		<div id="copyright">
			<span>&copy; AIES2016. Tout droit reservé. | COSTE Geoffrey | PORTE Aubin | ANTOINE Philippe| GATTUSO Gregory
		</div>
	</div>
</div>
</body>
</html>