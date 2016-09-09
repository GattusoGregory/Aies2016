<?php

  $id = $_GET['id'];
  $bdd = mysqli_connect('localhost','aies2016','aies2016','aies2016');		
  $sql = "SELECT images FROM credits WHERE id=$id";
  $result = mysqli_query($bdd,$sql);
  $row = mysqli_fetch_assoc($result);
  header("Content-type: image/jpeg");
  readfile($row['images']);
?>
