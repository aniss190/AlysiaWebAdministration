<?php
  //include ('infoConnexion.php');
  //session_start ();

  function affichageplainte()
  {
	  
	  
	  $requete = determinationRequete();

	  if ( !( $result = mysql_query( $requete )))
	    die( 'Erreur de la requete : '.$requete );
	  
	  if(isset($_GET['selectUser']) || isset($_GET['selectCoupable']) || isset($_GET['selectDate'])){
	    echo "<a href='base.php'> Afficher toutes les plaintes </a>";
	  }
	 
	  affichageTableau($requete);
	  
	  
  }

  function determinationRequete()
  {
    if(isset($_GET['selectUser'])){
	    return ('SELECT * FROM plainte WHERE modo = "'.$_GET['selectUser'].'" AND present=1');
	  }
	  else if(isset($_GET['selectCoupable'])){
	    return ('SELECT * FROM plainte WHERE coupables = "'.$_GET['selectCoupable'].'" AND present=1');
	  }
	  else if(isset($_GET['selectDate'])){
	    if($_GET['selectDate']==31){
	      return ('SELECT * FROM plainte WHERE TO_DAYS(NOW()) - TO_DAYS(date) >= 30 AND present="1"' );
	    }
	    else{
	      return ('SELECT * FROM plainte WHERE TO_DAYS(NOW()) - TO_DAYS(date) <= '.$_GET['selectDate'].' AND present="1"'); 
	    }
	  }
	  else{
	    return ('SELECT * FROM plainte WHERE present="1"'); 
	  }
  }

  function affichageSortByDate()
  {
     if(!isset($_GET['selectUser']) && !isset($_GET['selectCoupable']) ){
	    echo"
	    <form class='form-input' name='sortByDate' action='base.php'>
	      Afficher les plaintes datant de :
	      <label class='custom-select'><select name='selectDate'>
		<option value='1'>moins d'un</option>
		<option value='7'>moins de 7</option>
		<option value='15'>moins de 15</option>
		<option value='30'>moins de 30</option>
		<option value='31'>plus de 30</option>
	      </select></label>
	      jour(s).
	      <button class='btn btn-primary' type='submit'>Afficher</button>
	    </form>";
	  }
  }

  function affichageTableau($requete)
  {
    $role = $_SESSION['role'];
    if($result = mysql_query($requete)) {
	    echo"<table class='table' border=1>";
	    echo "<tr class='titre'>";
	    echo"<th>Id</th><th>Modo en charge</th><th>Date</th><th>Plaignant</th><th>Coupables</th><th>Description</th><th>Preuve</th><th>Conclusion</th><th>Sanction</th>";
      if($role=="admin"){echo "<th>Archiver</th>";}
	    echo"</tr>";
	    while($ligne = mysql_fetch_row($result)) {

	      $id = $ligne[0];
	      $modo = $ligne[1];
	      $date = $ligne[2];
	      $plaignant = $ligne[3];
	      $coupable = $ligne[4];
	      $descrip = $ligne[5];
	      $preuve = $ligne[6];
	      $conclusion = $ligne[7];
	      $sanction = $ligne[8];
	      echo"<tr>";
	      echo "
	      <td>".$id."</td>
	      <td>".$modo."</td>	     
	      <td>".$date."</td>	      
	      <td>".$plaignant."</td>
	      <td>".$coupable."</td>
	      <td><span class='btn btn-default' onclick=\"alert('".$descrip."');\">Lire la description</td>
	      <td>".$preuve."</td>
        <td>".$conclusion."</td>
        <td>".$sanction."</td>";
        if($role=="admin"){
          echo "<td><a class='btn btn-default' href='archiverPlainte.php?id=$id'>Archiver</a></td>";
        }
	      echo"</tr>";
	    }
	  } 
	  else {
	    echo 'Erreur de requête de base de données.';
	  }
  }

  function affichageArchivesPlainte(){
    $requete = 'SELECT * FROM plainte WHERE present="0"';

    if ( !( $result = mysql_query( $requete )))
      die( 'Erreur de la requete : '.$requete );

    if($result = mysql_query($requete)) {
      echo"<table class='table' border=1>";
      echo "<tr class='titre'>";
      echo"<th>Id</th><th>Modo en charge</th><th>Date</th><th>Plaignant</th><th>Coupables</th>
        <th>Description</th><th>Preuve</th><th>Conclusion</th><th>Sanction</th><th>Restaurer</th>";
      echo"</tr>";

      while($ligne = mysql_fetch_row($result)) {
        $id = $ligne[0];
        $modo = $ligne[1];
        $date = $ligne[2];
        $plaignant = $ligne[3];
        $coupable = $ligne[4];
        $descrip = $ligne[5];
        $preuve = $ligne[6];
        $conclusion = $ligne[7];
        $sanction = $ligne[8];
        echo"<tr>";
        echo "
        <td>".$id."</td>
        <td>".$modo."</td>       
        <td>".$date."</td>        
        <td>".$plaignant."</td>
        <td>".$coupable."</td>
        <td><span class='btn btn-default' onclick=\"alert('".$descrip."');\">Lire la description</td>
        <td>".$preuve."</td>
        <td>".$conclusion."</td>
        <td>".$sanction."</td>
        <td><a class='btn btn-default' href='restaurerPlainte.php?id=$id'>Restaurer</a></td>";
      }
    } 
    else {
      $str='Erreur de requête de base de données.';
    }
  }


  function determinationDeclarant($ligne)
  {
	  $requete2 = 'SELECT * FROM user WHERE id="'.$ligne.'"';
	  if ( !( $result2 = mysql_query( $requete2 )))
		  die( 'Erreur de la requete : '.$requete2 );
	    if($result2 = mysql_query($requete2)) {
		  while($ligne2 = mysql_fetch_row($result2)) {
		    return ($ligne2[4]);
		  }
	  }	      
  }

function alertwhiteliste($whiteliste){

	      $requete3 = 'SELECT * FROM whiteliste WHERE id="'.$whiteliste.'"';
	      if ( !( $result3 = mysql_query( $requete3 )))
		die( 'Erreur de la requete : '.$requete3 );
	      if($result3 = mysql_query($requete3)) {
		$str="";
		while($ligne3 = mysql_fetch_row($result3)) {
		  $str=$str."Description: ".$ligne3[2];
		  if($ligne3[3]==1)
		    $present='Oui';
		  else
		    $present='Non';
		  $str=$str." ---Present: ".$present;         
		}
		return($str);
	      }

}
function sortByUser(){
  $str= "<form class='form-input' name='sortByUser' action='base.php'>
          Afficher les plaintes par Modérateur : 
          <label class='custom-select'><select name='selectUser'>";
            
          $requeteUser = 'SELECT pseudo FROM user ';
          if ( !( $resultUser = mysql_query( $requeteUser )))
             die( 'Erreur de la requete : '.$requeteUser );
          if($resultUser = mysql_query($requeteUser)) {
            while($ligneUser = mysql_fetch_row($resultUser)) {
              $str=$str."<option value='".$ligneUser[0]."'>".$ligneUser[0]."</option>";
            }
          }
            
  $str=$str."</select></label>
       <button class='btn btn-primary' type='submit'>Afficher</button>
       </form>";
  echo($str);
}
function sortByCoupable(){
  
  if(isset($_POST['searchCoupable'])){
    $str="";

          $rechCoupable = $_POST['searchCoupable'];
          $requeteCoupable = "SELECT * FROM plainte where coupables LIKE '%".$rechCoupable."%'";

          if ( !( $resultCoupable = mysql_query( $requeteCoupable )))
            die( 'Erreur de la requete : '.$requeteCoupable );
          if($resultCoupable = mysql_query($requeteCoupable)) {
            while($ligneCoupable = mysql_fetch_row($resultCoupable)) {
              $str=$str."<option value='".$ligneCoupable[0]."'>".$ligneCoupable[0]."</option>";
            }
          }
    echo($str);
  }
}
function addWhiteliste($uid,$guid){
    $requete= " INSERT INTO `whiteliste` (`BattlEyeGUID` ,`UID`)
    VALUES ('$guid', '$uid');";
    $result = mysql_query( $requete ) or die( 'Erreur de la requete : '.$requete );
    return $result;
}

function addplainte($modo,$plaignant,$date,$coupable,$descript,$preuve,$conclusion,$sanction, $present){
  $requete= " INSERT INTO plainte(modo, date, plaignant, coupables, description, preuve, conclusion, sanction, present)
       values('$modo','$date','$plaignant','$coupable','$descript','$preuve','$conclusion','$sanction', $present) ";
  $result = mysql_query( $requete ) or die( 'Erreur de la requete : '.$requete );
  return $result;
}

function deleteplainte($id){
  $requete = "DELETE FROM plainte WHERE id='$id'"; 
  mysql_query($requete) or die(mysql_error());
  return;
}
function deleteWhiteliste($id){
  $requete = "DELETE FROM whiteliste WHERE id ='$id'"; 
  mysql_query($requete) or die(mysql_error());
  return;
}


function affichagewhiteliste(){
  $role = $_SESSION['role'];
  $requete = 'SELECT * FROM whiteliste';
  
  if ( !( $result = mysql_query( $requete )))
    die( 'Erreur de la requete : '.$requete );

  if($result = mysql_query($requete)) {
    $str="<table class='table' border=1>";
    $str=$str."<tr>";
    $str=$str."<th>Id</th><th>GUID</th><th>UID</th>";
    if($role=="admin"){$str=$str. "<th>X</th>";}
    $str=$str."</tr>";

    while($ligne = mysql_fetch_row($result)) {
      $id = $ligne[0];
      $guid = $ligne[1];
      $uid = $ligne[2];
      
      
      $str=$str."<tr>";
      $str=$str. "
      <td>".$id."</td>  
      <td>".$guid."</td>   
      <td>".$uid."</td>";
      if($role=="admin"){
          $str=$str. "<td><a class='btn btn-default' href='deleteWhiteliste.php?id=".$id."' title='delete' onClick=\"return confirm('Etes vous sur de vouloir supprimer ce joueur de la Whitelist ?')\">Supprimer</a></td>";
      }
      $str=$str."</tr>";
    }
  } 
  else {
    $str='Erreur de requête de base de données.';
  }
  echo($str);
}
function affichagearchivesWhiteliste(){
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
}

function affichageUser(){
  $requete = 'SELECT * FROM user WHERE present ="1"';

  if ( !( $result = mysql_query( $requete )))
    die( 'Erreur de la requete : '.$requete );

  if($result = mysql_query($requete)) {
    $str="<table class='table' border=1>";
    $str=$str."<tr>";
    $str=$str."<th>Pseudo</th><th>Mot de passe</th><th>Role</th><th>Présent</th><th>Archiver</th><th>Modifier</th>";
    $str=$str."</tr>";

    while($ligne = mysql_fetch_row($result)) {
      $id = $ligne[0];
      $nom = $ligne[1];
      $prenom = $ligne[2];
      $role = $ligne[3];
      $pseudo = $ligne[4];
      $str=$str."<tr>";
      $str=$str."
      <td>".$nom."</td>
      <td>".$prenom."</td>   
      <td>".$role."</td>     
      <td>".$pseudo."</td>
      <td><a class='btn btn-default' href='archiverUser.php?id=$id'>Archiver</a></td>
      <td><a class='btn btn-default' href='modifierUser.php?id=$id'>Modifier</a></td>";
      $str=$str."</tr>";
    }
  } 
  else {
    $str='Erreur de requête de base de données.';
  }
  echo($str);
}

function affichageArchivesUser(){
  $requete = 'SELECT * FROM user WHERE present ="0"';

  if ( !( $result = mysql_query( $requete )))
    die( 'Erreur de la requete : '.$requete );

  if($result = mysql_query($requete)) {
    $str="<table class='table' border=1>";
    $str=$str."<tr>";
    $str=$str."<th>Nom</th><th>Prenom</th><th>Role</th><th>Pseudo</th><th>Restaurer</th>";
    $str=$str."</tr>";

    while($ligne = mysql_fetch_row($result)) {
      $id = $ligne[0];
      $nom = $ligne[1];
      $prenom = $ligne[2];
      $role = $ligne[3];
      $pseudo = $ligne[4];
      
      $str=$str."<tr>";
      $str=$str."
      <td>".$nom."</td>
      <td>".$prenom."</td>   
      <td>".$role."</td>     
      <td>".$pseudo."</td>
      <td><a class='btn btn-default' href='restaurerUser.php?id=$id'>Restaurer</a></td>";
      $str=$str."</tr>";
    }
  } 
  else {
    $str='Erreur de requête de base de données.';
  }
  echo($str);
}

function selectCodeWhiteliste(){
	$str='<label for="whiteliste">Code whiteliste:</label>';
        $str=$str.'<label class="custom-select"><select name="whiteliste">';
        $requeteCoupable = 'SELECT * FROM whiteliste WHERE present="1"';
        if ( !( $resultCoupable = mysql_query( $requeteCoupable )))
          die( 'Erreur de la requete : '.$requeteCoupable );
        if($resultCoupable = mysql_query($requeteCoupable)) {
          while($ligneCoupable = mysql_fetch_row($resultCoupable)) {
            $str=$str."<option value='".$ligneCoupable[0]."'>".$ligneCoupable[1]."</option>";
          }
        }
        $str=$str.'</select></label>';
	echo ($str);
}
function linkarchivesWhiteliste(){
	$str="<a href='archivesWhiteliste.php' title='Archives whiteliste'>Afficher les anciens whitelistes</a><br/>";
	echo ($str);
}
function linkarchivesPlainte(){
  $str="<a href='archivesPlainte.php' title='Archives plainte'>Afficher les anciennes plaintes</a><br/>";
  echo ($str);
}
function linkArchivesUser(){
	$str="<a href='archivesUser.php' title='Archives utilisateurs'>Afficher les anciens utilisateur</a><br/>";
	echo ($str);
}
?>
