<?php
  #connexion a la base de donnee
  include ('infoConnexion.php');
  include ('function.php');

  $id=$_REQUEST['id'];
  deleteWhiteliste($id);
  
  header("Location:gererWhiteliste.php");
?>
