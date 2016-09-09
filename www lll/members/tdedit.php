<?php 
	include '../script/get_data.php';
	retrieve_Data();
$title = "Titre";
$case01 = "case01";$case02 = "case02";$case03 = "case03";$case04 = "case04";$case05 = "case05";$case06 = "case06";$case07 = "case07";$case08 = "case08";$case09 = "case09";$case10 = "case10";
$case11 = "case11";$case12 = "case12";$case13 = "case13";$case14 = "case14";$case15 = "case15";$case16 = "case16";$case17 = "case17";$case18 = "case18";$case19 = "case19";$case20 = "case20";
$case21 = "case21";$case22 = "case22";$case23 = "case23";$case24 = "case24";
$query = mysqli_query($bdd,"SELECT * FROM slideshow WHERE template = 0;");
		 								if(isset($_POST['select']))
								{
									$selected_cmbbox = $_POST['cmbService'];
									$query = mysqli_query($bdd,"SELECT * FROM slideshow WHERE name ='$selected_cmbbox';");
										while($row = mysqli_fetch_assoc($query))
											{
												$title = $row['name'];
												$case01 = $row['case01'];$case02 = $row['case02'];$case03 = $row['case03'];$case04 = $row['case04'];$case05 = $row['case05'];$case06 = $row['case06'];$case07 = $row['case07'];$case08 = $row['case08'];$case09 = $row['case09'];$case10 = $row['case10'];
												$case11 = $row['case11'];$case12 = $row['case12'];$case13 = $row['case13'];$case14 = $row['case14'];$case15 = $row['case15'];$case16 = $row['case16'];$case17 = $row['case17'];$case18 = $row['case18'];$case19 = $row['case19'];$case20 = $row['case20'];
												$case21 = $row['case21'];$case22 = $row['case22'];$case23 = $row['case23'];$case24 = $row['case24'];$path = $row['path'];
											}
											echo $path;
								}
 								if(isset($_POST['edit']))
								{
									$current = $_POST['currentslide'];
									$path = $_POST['currentpath'];
									echo $current;
									$case01 = $_POST['case01'];$case02 = $_POST['case02'];$case03 = $_POST['case03'];$case04 = $_POST['case04'];
									$case05 = $_POST['case05'];$case06 = $_POST['case06'];$case07 = $_POST['case07'];$case08 = $_POST['case08'];
									$case09 = $_POST['case09'];$case10 = $_POST['case10'];$case11 = $_POST['case11'];$case12 = $_POST['case12'];
									$case13 = $_POST['case13'];$case14 = $_POST['case14'];$case15 = $_POST['case15'];$case16 = $_POST['case16'];
									$case17 = $_POST['case17'];$case18 = $_POST['case18'];$case19 = $_POST['case19'];$case20 = $_POST['case20'];
									$case21 = $_POST['case21'];$case22 = $_POST['case22'];$case23 = $_POST['case23'];$case24 = $_POST['case24'];
							
									$sql = 
										"UPDATE slideshow SET
										name = '$current', 
										case01 = '$case01', 
										case02 = '$case02', 
										case03 = '$case03', 
										case04 = '$case04', 
										case05 = '$case05', 
										case06 = '$case06', 
										case07 = '$case07', 
										case08 = '$case08', 
										case09 = '$case09', 
										case10 = '$case10', 
										case11 = '$case11', 
										case12 = '$case12', 
										case13 = '$case13', 
										case14 = '$case14', 
										case15 = '$case15', 
										case16 = '$case16', 
										case17 = '$case17', 
										case18 = '$case18', 
										case19 = '$case19', 
										case20 = '$case20', 
										case21 = '$case21', 
										case22 = '$case22', 
										case23 = '$case23', 
										case24 = '$case24' 
										WHERE name = '$current'";
									$query = mysqli_query($bdd,$sql);
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
																	header('Location:../starter.php?link='.\$id);
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
												<link href='/css/style_td.css' rel='stylesheet' type='text/css' media='all' />
												<link href='/css/fonts.css' rel='stylesheet' type='text/css' media='all' />
													<link rel='stylesheet' type='text/css' href='css/style_panel.css'>
													<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
													<title>AIES 2016 Admin panel</title>
														<script src='js/prefixfree.min.js'></script>
														
												</head>

												<body>
												<div class='page'>
														<div class='title'>$current<br/></div>
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
								}?>
								
								<html xmlns='http://www.w3.org/1999/xhtml'>
								<head>
								<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
								<meta name='keywords' content='' />
								<meta name='viewport' content='width=device-width, initial-scale=0.40, maximum-scale=1, minimum-scale=0.40'/>
								<meta name='description' content='' />
								<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900' rel='stylesheet' />
								<link href='/css/style_addtd.css' rel='stylesheet' type='text/css' media='all' />
								<link href='/css/fonts.css' rel='stylesheet' type='text/css' media='all' />
									<link rel='stylesheet' type='text/css' href='css/style_panel.css'>
									<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
									<title>AIES 2016 Admin panel</title>
										<script src='js/prefixfree.min.js'></script>

								  
								  
								  

								</head>

								<body>
								<div class='page'>
										<form method='POST' action='tdedit.php'>
								<div class='submit'><input type='submit' value='Choisir' name='select'></div>
									<input type="hidden" name="currentslide"
									value="<?php echo @$selected_cmbbox; ?>">
									<input type="hidden" name="currentpath"
									value="<?php echo @$path; ?>">
									<select id="cmbService" name="cmbService">
									<?php while($row = mysqli_fetch_assoc($query))
											{
												$slide_list = $row['name'];?>
												<option value="<?php echo "$slide_list";?>"><?php echo "$slide_list";?></option><?php
											}
									?></select
								</form>
								<table>
									<td><div class='bold'><input type='text' value='<?php echo $case01;?>' name='case01'></div></td>
									<td><div class='bold'><input type='text' value='<?php echo $case02;?>' name='case02'></div></td>
									<td><div class='bold'><input type='text' value='<?php echo $case03;?>' name='case03'></div></td>
									<td><div class='bold'><input type='text' value='<?php echo $case04;?>' name='case04'></div></td>
									
									<tr><td><input type='text' value='<?php echo $case05;?>' name='case05'></td>
									<td><input type='text' value='<?php echo $case06;?>' name='case06'></td>
									<td><input type='text' value='<?php echo $case07;?>' name='case07'></td>
									<td><input type='text' value='<?php echo $case08;?>' name='case08'></td></tr>
									
									<tr><td><input type='text' value='<?php echo $case09;?>' name='case09'></td>
									<td><input type='text' value='<?php echo $case10;?>' name='case10'></td>
									<td><input type='text' value='<?php echo $case11;?>' name='case11'></td>
									<td><input type='text' value='<?php echo $case12;?>' name='case12'></td></tr>
									
									<tr><td><input type='text' value='<?php echo $case13;?>' name='case13'></td>
									<td><input type='text' value='<?php echo $case14;?>' name='case14'></td>
									<td><input type='text' value='<?php echo $case15;?>' name='case15'></td>
									<td><input type='text' value='<?php echo $case16;?>' name='case16'></td></tr>
									
									<tr><td><input type='text' value='<?php echo $case17;?>' name='case17'></td>
									<td><input type='text' value='<?php echo $case18;?>' name='case18'></td>
									<td><input type='text' value='<?php echo $case19;?>' name='case19'></td>
									<td><input type='text' value='<?php echo $case20;?>' name='case20'></td></tr>
									
									<tr><td><input type='text' value='<?php echo $case21;?>' name='case21'></td>
									<td><input type='text' value='<?php echo $case22;?>' name='case22'></td>
									<td><input type='text' value='<?php echo $case23;?>' name='case23'></td>
									<td><input type='text' value='<?php echo $case24;?>' name='case24'></td></tr>									

								</table>
								<div class='submit'><input type='submit' value='modifier' name='edit'></div>
								</div>
								</body>
								</html>