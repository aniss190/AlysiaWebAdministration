<?php
  echo("
    <head>
      <meta charset=\"utf-8\" />
      <title>Gérer la Whiteliste</title>
    </head>");
  
  session_start ();
  if (isset($_SESSION['nom']) && isset($_SESSION['role'])) {
    $page = 'gererWhiteliste';
    include 'navigation.php';
  }
  else
    header ('location: index.php');
  
   
  include ('infoConnexion.php');
  include ('function.php');
  affichagewhiteliste();

  if(isset($_GET['whitelisteAdded']))
    echo '<script> alert("whiteliste ajoute."); </script>';

?>
