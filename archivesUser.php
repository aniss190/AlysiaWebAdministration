<?php
  echo("
    <head>
      <meta charset=\"utf-8\" />
      <title>Archive utilisateurs</title>
    </head>");
  
  session_start ();
  if (isset($_SESSION['nom']) && isset($_SESSION['role'])) {
    $page = 'gererUser';
    include 'navigation.php';
  }
  else
    header ('location: index.php');
  
  if($_SESSION['role']!="admin"){
    header ('location: logout.php');
  }
  
  include ('infoConnexion.php');
  include ('function.php');
  affichageArchivesUser();

?>
