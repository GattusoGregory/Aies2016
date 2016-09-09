<?php
							$id=$_GET['link'];

							$bdd = mysqli_connect('localhost','aies2016','aies2016','aies2016');
							$sql = 'SELECT * FROM urgency WHERE isOn = 0;';
							$query = mysqli_query($bdd,$sql);
							$rows = mysqli_num_rows($query);
							if($rows == 0)
							{
								header('Location:../urgency.php');
							}
							else{
								$sql = 'SELECT * FROM slidezone1;';
								$query = mysqli_query($bdd,$sql);
								$rows = mysqli_num_rows($query);

								if($id == $rows + 1)
								{
									$id = 1;
									header('refresh:8;url=../../starterzone1.php?link=$id');	
								}
									else{		
											$sql = 'SELECT * FROM slidezone1 WHERE row = '.$id.';';
											$query = mysqli_query($bdd,$sql);
											$rows = mysqli_num_rows($query);
											if($rows == 0)
											{
												$id = $id + 1;
												header('Location:../../starterzone1.php?link=$id');
											}
												else{
														while($row = mysqli_fetch_assoc($query))
														{
															$slidepath = $row['path'];

														}
														$id = $id + 1;
														header('refresh:5;url=../'.$slidepath.'?link='.$id);
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
					<link href='/css/style_left.css' rel='stylesheet' type='text/css' media='all' />
					<link href='/css/fonts.css' rel='stylesheet' type='text/css' media='all' />
						<link rel='stylesheet' type='text/css' href='css/style_panel.css'>
						<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
						<title>AIES 2016</title>
							<script src='js/prefixfree.min.js'></script>
							
					</head>

					<body>
					<div class='page'>
							<div class='title'>sdfg<br/></div>
					<div class='text'>Message10</div>
					<div class='content'><img src='../res/Tulips.jpg' width='600' height='480'/></div>
					</body>
					</html>
				