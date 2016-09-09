<?php 
	include '../script/get_data.php';
	retrieve_Data();
$title = "Titre";
$case01 = "case01";$case02 = "case02";$case03 = "case03";$case04 = "case04";$case05 = "case05";$case06 = "case06";$case07 = "case07";$case08 = "case08";$case09 = "case09";$case10 = "case10";
$case11 = "case11";$case12 = "case12";$case13 = "case13";$case14 = "case14";$case15 = "case15";$case16 = "case16";$case17 = "case17";$case18 = "case18";$case19 = "case19";$case20 = "case20";
$case21 = "case21";$case22 = "case22";$case23 = "case23";$case24 = "case24";
$query = mysqli_query($bdd,"SELECT * FROM slideshow WHERE template = 1;");
		 								if(isset($_POST['select']))
								{
									$selected_cmbbox = $_POST['cmbService'];
									$query = mysqli_query($bdd,"SELECT * FROM slideshow WHERE name ='$selected_cmbbox';");
										while($row = mysqli_fetch_assoc($query))
											{
												$title = $row['name'];
												$case01 = $row['text'];
												$path = $row['path'];
											}
								}
 								if(isset($_POST['edit']))
								{
									$current = $_POST['currentslide'];
									$path = $_POST['currentpath'];
									$case01 = $_POST['text'];
							
									$sql = 
										"UPDATE slideshow SET
										name = '$current', 
										text = '$case01' 
										WHERE name = '$current'";
									$query = mysqli_query($bdd,$sql) or die("erreur".mysqli_error($bdd));
									$myfile = fopen("$path", "w");
									echo $myfile;
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
						\$sql = 'SELECT * FROM slideshow;';
						\$query = mysqli_query(\$bdd,\$sql);
						\$rows = mysqli_num_rows(\$query);

						if(\$id == \$rows + 1)
						{
							\$id = 1;
							header('refresh:8;url=../starter.php?link=\$id');	
						}
							else{		
									\$sql = 'SELECT * FROM slideshow WHERE row = '.\$id.';';
									\$query = mysqli_query(\$bdd,\$sql);
									\$rows = mysqli_num_rows(\$query);
									if(\$rows == 0)
									{
										\$id = \$id + 1;
										header('Location:../starter.php?link=\$id');
									}
										else{
												while(\$row = mysqli_fetch_assoc(\$query))
												{
													\$slidepath = \$row['path'];

												}
												\$id = \$id + 1;
												header('refresh:5;url='.\$slidepath.'?link='.\$id);
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
					<link href='/css/style_txt.css' rel='stylesheet' type='text/css' media='all' />
					<link href='/css/fonts.css' rel='stylesheet' type='text/css' media='all' />
						<link rel='stylesheet' type='text/css' href='css/style_panel.css'>
						<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
						<title>AIES 2016 Admin panel</title>
							<script src='js/prefixfree.min.js'></script>
							
					</head>

					<body>
					<div class='page'>
							<div class='title'>$current<br/></div>
					<div class='text'>$case01</div>
					</body>
					</html>
				";
									fwrite($myfile, $txt);
									//header('Location:../members/gslide.php');	
								}?>
								
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
								<div class='page'>
										<form method='POST' action='textedit.php'>
								<div class='submit'><input type='submit' value='Choisir' name='select'></div>
									<input type="hidden" name="currentpath"
									value="<?php echo @$path; ?>">
									<input type="hidden" name="currentslide"
									value="<?php echo @$selected_cmbbox; ?>">
									<select id="cmbService" name="cmbService">
									<?php while($row = mysqli_fetch_assoc($query))
											{
												$slide_list = $row['name'];?>
												<option value="<?php echo "$slide_list";?>"><?php echo "$slide_list";?></option><?php
											}
									?></select
								</form>
								<form method="POST" action="textslide.php" enctype="multipart/form-data">
								<div class="text"><textarea name="text" rows="5" cols="40"><?php echo $case01?></textarea><br/></div>
								<div class="content">
								<div class='submit'><input type='submit' value='modifier' name='edit'></div>
								</div>
								</body>
								</html>