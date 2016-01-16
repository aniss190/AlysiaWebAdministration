<?php
	// Génération d'une chaine aléatoire
	function chaine_aleatoire($nb_car, $chaine = 'azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN123456789')
	{
	    $nb_lettres = strlen($chaine) - 1;
	    $generation = '';
	    for($i=0; $i < $nb_car; $i++)
	    {
	        $pos = mt_rand(0, $nb_lettres);
	        $car = $chaine[$pos];
	        $generation .= $car;
	    }
	    return $generation;
	}
	echo chaine_aleatoire(8);


    $pseudo = $_REQUEST['pseudo'];
    $pswd = chaine_aleatoire(10);
    $role = $_REQUEST['role'];
    $present = 1;

    include ('infoConnexion.php');
    addUser($pseudo, $pswd, $role, $present);

	function addUser($pseudo, $pswd, $role, $present){
		$requete= " INSERT INTO user (pseudo ,pswd ,role, present)
		VALUES ('$pseudo', '$pswd', '$role', $present);";
		$result = mysql_query( $requete ) or die( 'Erreur de la requete : '.$requete );
		return $result;
	}
	header("refresh:0.05;url=gererUser.php" );
?>