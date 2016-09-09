<?php
session_start();
if($_SESSION['username'])
{
		$username = "";
		$cm_name = "";
		$passwd = "";
		$service = "";
		$datestamp = "";
		
	$bdd = mysqli_connect('localhost', 'aies2016','aies2016' , 'aies2016');	
		$query = mysqli_query($bdd,"SELECT * FROM users WHERE Services_ID=1 && Common_Name='".$_SESSION['username']."'");
		$rows = mysqli_num_rows($query);
		if($rows==1)
		{
			?><a href="../members/panel.php" style="color:lightgrey; position:fixed;">Sortir</a><?php
		}
		
	if(isset($_POST['search']))
	{
		$selected_cmbbox = $_POST['cmbService'];
		$sql_query = "SELECT * FROM users WHERE Common_Name='$selected_cmbbox'";
		$query = mysqli_query($bdd,$sql_query);
		$rows = mysqli_num_rows($query);
			while($row = mysqli_fetch_assoc($query))
				{
					$username = $row['Username'];
					$cm_name = $row['Common_Name'];
					$passwd = $row['Password'];
					$service = $row['Services_ID'];
					$datestamp = $row['Created_Date'];
					if($service == "2")
						{
							$service = "Infirmerie";
						}
						else if($service == 0)
						{
							$service = "Vie Scolaire";
						}
						else if($service == 1)
						{
							$service = "Direction";
						}
				}
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
	if(isset($_POST['zone']))
	{
		header('Location:../a/a_zone.php');
	}
	if(isset($_POST['urgence']))
	{
		header('Location:../script/set_urgency.php');
	}	
	
		if(isset($_POST['Delete']))
	{
		$new_username = $_POST['new_username'];
		$sql_query = 
			"DELETE FROM users
			WHERE Username = '$new_username'";
		mysqli_query($bdd, $sql_query);
		
	}
		if(isset($_POST['flash']))
	{
		header('Location:../a/a_flash.php');
	}	 
	if(isset($_POST['Validate']))
	{
					$new_username = $_POST['new_username'];
					$newcm_name = $_POST['common_name'];
					$newpasswd = $_POST['password'];
					$newmd5passwd = md5($newpasswd);
					$newservice = $_POST['service_holder'];

					if($newservice == "infirmerie")
					{
						$newservice = 2;
					}
					else if($newservice == "Vie Scolaire")
					{
						$newservice = 0;
					}
					else if($newservice == "Direction")
					{
						$newservice = 1;
					}
					else if($newservice == "Cvl")
					{
						$newservice = 3;
					}
					$sql_query = 
					"UPDATE users SET
					Username = '$new_username', 
					Common_Name = '$newcm_name', 
					Password = '$newmd5passwd', 
					Services_ID = '$newservice' 
					WHERE Username = '$new_username'";
					mysqli_query($bdd, $sql_query);
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
<link href="/css/style_panelacc.css" rel="stylesheet" type="text/css" media="all" />
<link href="/css/fonts.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/style_panel.css"><?php include "../css/style_panel.css";?>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />>
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
		<form method="POST" action="a_account.php">
			<li><a><input type="submit" value="Création de comptes" name="accueil"><br/></a></li>
			<span class="current_page_item"><li><a><input type="submit" value="Compte" name="panel"><br/></a></li></span>
			<li><a><input type="submit" value="Message Flash" name="flash"><br/></a></li>
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
		<form method="POST" action="a_account.php">
				<h2>Modification de Comptes</h2>
				<select id="cmbService" name="cmbService">
				<?php
				$sql_query = "SELECT * FROM users";
				$query = mysqli_query($bdd,$sql_query);
				while($row = mysqli_fetch_assoc($query))
				{
					echo "blablaojsdlsjhgljksdhgflkjsdhfgkljsd";
					$account_list = $row['Common_Name'];?>
					<option value="<?php echo "$account_list";?>"><?php echo "$account_list";?></option><?php
				}
				?>
				</select>
				<input type="submit" value="Rechercher" name="search"><br/>	
				<br/><input type="text" placeholder="Nom de Compte" name="new_username"><?php; ?><br/>
				<input type="text" placeholder="Mot de Passe" name="password"><br/>
				<input type="text" placeholder="Nom" name="common_name"><br/>
				<input type="text" placeholder="Service" name="service_holder"><br/>
				<input type="submit" value="Valider" name="Validate">
				<input type="submit" value="Supprimer" name="Delete">				
		</form>
		</div>
		</p>
		<div class="current">
		<?php
				echo nl2br("Nom de Compte: ".$username."\n\n");
				echo nl2br("Mot de Passe: ".$passwd."\n\n");
				echo nl2br("Nom: ".$cm_name."\n\n");
				echo nl2br("Service: ".$service."\n\n");
				echo nl2br("Date de Creation: ".$datestamp."\n\n");
		?>
		</div>
		</div>
		<div id="copyright">
			<span>&copy; AIES2016. Tout droit reservé. | COSTE Geoffrey | PORTE Aubin | ANTOINE Philippe| GATTUSO Gregory</span>
		</div>
	</div>
</div>
</body>
</html>