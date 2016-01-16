<?php
    $uid= $_REQUEST['uid'];
    $guid = $_REQUEST['guid'];   

    #connexion a la base de donnee
    include ('infoConnexion.php');
    include ('function.php');
    
   	addWhiteliste($uid,$guid);
    
    header("Location:gererWhiteliste.php?whitelisteAdded");
      
?>
