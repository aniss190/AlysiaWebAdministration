<?php
  echo("
  <head>
    <meta charset=\"utf-8\" />
    <title>Gérer les utilisateurs</title>
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

  linkArchivesUser();
  affichageUser();
  
  if(isset($_GET['userAdded']))
    echo '<script> alert("Utilisateur ajoute."); </script>';

?>
