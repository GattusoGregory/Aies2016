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
		header('Location:../members/multistarter.php');
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
			<span class="current_page_item"><li><a><input type="submit" value="Accueil" name="accueil"><br/></a></li></span>
			<li><a><input type="submit" value="Gestion Affichage" name="gslide"><br/></a></li>
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
		<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vehicula sapien eget dolor commodo volutpat. Curabitur congue molestie nisi quis mattis. Curabitur hendrerit nibh felis, vel tempus elit mollis sed. Sed dui arcu, laoreet suscipit nisl at, sollicitudin commodo neque. Vestibulum iaculis placerat arcu elementum placerat. Ut pellentesque tincidunt est, convallis aliquam lectus laoreet eget. Ut eu porta odio. Proin facilisis quis nisl quis facilisis. Aenean porta, nisi eget tristique ullamcorper, enim ligula cursus dui, vulputate commodo est lorem non mauris.<br><br>

		Quisque eget enim a nunc efficitur viverra. Mauris et neque neque. Pellentesque id fringilla enim, eu tincidunt ex. Praesent eleifend elit eu convallis fermentum. Etiam et posuere augue, at hendrerit est. Sed sollicitudin hendrerit ex non fringilla. Maecenas tempus consequat purus, at aliquet felis malesuada sed. Phasellus scelerisque ex nec bibendum condimentum. Vivamus augue ex, sagittis in mollis id, auctor id libero. Duis lectus risus, varius in neque vitae, semper feugiat orci. Quisque sed aliquet mauris, consequat tempus nulla.<br><br>

		Aliquam vel mattis eros. Aenean volutpat lorem quis sem commodo, non volutpat lectus hendrerit. Morbi eget iaculis ex. Nulla fringilla posuere venenatis. Ut ut euismod nisi. Phasellus ornare, lectus vel aliquet laoreet, elit nisi euismod nibh, eu porta mauris velit ut diam. Quisque vitae nisl dignissim, consectetur sapien sit amet, tincidunt orci. Sed pharetra eros sit amet vehicula sagittis.<br><br>

		In lorem orci, mollis non viverra quis, consectetur non orci. Aenean commodo dolor quis dolor convallis tempor. Pellentesque venenatis diam felis, vel consequat nibh sagittis sed. Donec nisl erat, maximus ut diam vitae, aliquet suscipit dolor. Integer egestas diam id turpis molestie dapibus. Phasellus vel dolor sollicitudin, laoreet erat ac, rhoncus tortor. Suspendisse viverra felis at lectus ultricies commodo. Etiam erat est, scelerisque nec magna at, tempus varius dui. Suspendisse potenti. Vestibulum non efficitur nibh. Suspendisse egestas enim ut mi sagittis finibus.<br><br>

		Proin vel arcu augue. Maecenas in turpis vel sapien molestie pretium eleifend vitae eros. Quisque eget porttitor lectus, eu finibus neque. Vestibulum non nisi finibus, ultrices velit id, posuere massa. Nulla molestie consectetur luctus. Aenean nec augue elementum lectus tristique finibus. Nullam at turpis nec nisl bibendum condimentum.
		</p>
		</div>
		<div id="copyright">
			<span>&copy; AIES2016. Tout droit reservé. | COSTE Geoffrey | PORTE Aubin | ANTOINE Philippe| GATTUSO Gregory
		</div>
	</div>
</div>
</body>
</html>