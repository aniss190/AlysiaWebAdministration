<?php
  echo("
    <head>
      <meta charset=\"utf-8\" />
      <title>Gérer les plaintes</title>
    </head>");
  
  session_start ();
  if (isset($_SESSION['nom']) && isset($_SESSION['role'])) {
    $page = 'base';
    include 'navigation.php';
  }
  else
    header ('location: index.php');
  
  if($_SESSION['role']!="admin"){
    header ('location: logout.php');
  }
  
  include ('infoConnexion.php');
  include ('function.php');
  affichageArchivesPLainte();

?>


