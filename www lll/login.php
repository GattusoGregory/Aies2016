<?php
session_start();
$bdd = mysqli_connect('localhost', 'aies2016','aies2016' , 'aies2016');
if(isset($_POST['submit']))
{
	$username=htmlentities(trim($_POST['username']));
	$password=htmlentities(trim($_POST['password']));
	$passwordmd5=md5($password);
	if($username&&$password)
	{	
		$query = mysqli_query($bdd,"SELECT * FROM users WHERE username='$username'&&password='$passwordmd5'");
		$rows = mysqli_num_rows($query);
		if($rows==1)
		{
			while($row = mysqli_fetch_assoc($query))
			{
				$db_common = $row['Common_Name'];
			}
			$_SESSION['username']=$db_common;
			header('Location:../members/panel.php');
		}else echo"<span class='echo'>"."Nom de Compte ou Mot de passe Incorrecte"."</span>";
	}else echo"<span class='echo'>"."Veuillez saisir tout les champs"."</span>";
}
?>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=0.70, maximum-scale=0.70, minimum-scale=0.70, user-scalable=no"/>
	<link rel="stylesheet" type="text/css" href="../css/style_login.css"/><?php include "css/style_login.css";?>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>AIES 2016 Login</title>
        <script src="js/prefixfree.min.js"></script>
  </head>
  
  <body>
    <div class="body"></div>
		<div class="grad"></div>
		<div class="header">
			<div>AIES<span>2016</span></div>
		</div>
		<br>
		<div class="login">
		<form method="POST" action="login.php">
				<input type="text" placeholder="Nom De Compte" name="username"><br>
				<input type="password" placeholder="Mot De Passe" name="password"><br>
				<input type="submit" value="connexion" name ="submit">
				</form>
		</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  
  </body>