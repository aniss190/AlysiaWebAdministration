<?php
  #connexion a la base de donnee
  include ('infoConnexion.php');

  $id=$_REQUEST['id'];
  mysql_query("UPDATE user SET Present='1' WHERE id=$id") or die(mysql_error());

  header("Location:archivesUser.php");
?>
