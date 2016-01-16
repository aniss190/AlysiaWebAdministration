<?php

  echo("
  <head>
    <meta charset=\"utf-8\" />
    <title>Gérer les plaintes</title>   
    <link rel='stylesheet' href='css/whiteliste.css' media='screen' type='text/css' />
  </head>");
  session_start ();
  $page = 'home';
  include('infoConnexion.php');
  include_once('function.php');

  if (isset($_SESSION['nom']) && isset($_SESSION['role'])) {
    include 'navigation.php';
  }
    
  else
    header ('location: index.php');
  
  if($_SESSION['role']=="support" || $_SESSION['role'] ==""){
    header ('location: logout.php');
  }
    
  sortByUser();

  echo "<form class='form-input' name='sortByCoupable' method='POST' action='base.php'>
        Rechercher les plaintes d'un coupable :
        <input style='color: black;' name='searchCoupable' type='text' name='pswd'/>";

  echo "</select></label>
       <button class='btn btn-primary' type='submit'>Rechercher</button>
       </form>";

  sortByCoupable();  
  affichageSortByDate();
  linkarchivesPlainte();
  affichageplainte();

  if(isset($_GET['plainteAdded']))
    echo '<script> alert("Plainte declarée."); </script>';
  /*function affichagearchivesWhiteliste(){
  $requete = 'SELECT * FROM whiteliste WHERE present="0"';

  if ( !( $result = mysql_query( $requete )))
    die( 'Erreur de la requete : '.$requete );

  if($result = mysql_query($requete)) {
    $str="<table class='table' border=1>";
    $str=$str."<tr>";
    $str=$str."<th>Code</th><th>Description</th><th>Restaurer</th>";
    $str=$str."</tr>";

    while($ligne = mysql_fetch_row($result)) {
      $id = $ligne[0];
      $code = $ligne[1];
      $description = $ligne[2];
      $present = $ligne[3];
      if($present==1){
        $present="Oui";
      }
      else{
        $present="Non";
      }
      
      $str=$str."<tr>";
      $str=$str. "
      <td>".$code."</td>   
      <td>".$description."</td>     
      <td><a class='btn btn-default' href='restaurerwhiteliste.php?id=$id'>Restaurer</a></td>";
      $str=$str."</tr>";
    }
  } 
  else {
    $str='Erreur de requête de base de données.';
  }
  echo($str);
}*/
?>