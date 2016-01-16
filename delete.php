<?php
  #connexion a la base de donnee
  include ('infoConnexion.php');
  include ('function.php');

  $id=$_REQUEST['id'];
  deletePlainte($id);
  
  header("Location:base.php");
?>
