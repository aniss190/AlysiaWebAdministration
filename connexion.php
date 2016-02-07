<?php
  
  $host='localhost';
  $bd='moderation';
  $login='root';
  $password='********';

  try
  {
    $pdo = new PDO('mysql:host='.$host.';dbname='.$bd, $login, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
  }
  catch (Exception $e) //Le catch est chargé d’intercepter une éventuelle erreur
  {
    die ($e->getMessage());
  }
  
  
  function getAuthentification($login,$pass){
    global $pdo;
    $query = "SELECT * FROM user where pseudo=:login and pswd=:pass";
    $prep = $pdo->prepare($query);
    $prep->bindValue(':login', $login);
    $prep->bindValue(':pass', $pass);
    $prep->execute();
    if($prep->rowCount() == 1){
      $result = $prep->fetch(PDO::FETCH_ASSOC);
      return $result;
    }
    else
      return false;
  }
  
  if (isset($_REQUEST['log']) && isset($_REQUEST['pass']) && !empty($_REQUEST['log'])&& !empty($_REQUEST['pass'])) {

    $result = getAuthentification($_REQUEST['log'],$_REQUEST['pass']);

    if($result){
      
      if($result['present']==1){

        session_start ();

        $_SESSION['nom'] = $result['pseudo'];
        $_SESSION['role'] = $result['role'];
        $_SESSION['id'] = $result['id'];
      
        if($_SESSION['role'] == "support")
          header ('location: addWhiteliste.php');
        else if($_SESSION['role'] == "modo")
          header ('location: base.php');
        else if($_SESSION['role'] == "admin")
          header ('location: base.php');
        else
          header ('location: logout.php');
      }
      else{
	     header ('location: index.php?erreur');
      }

    }

    else{
      header ('location: index.php?erreur');
    }
  }

  else {
    header ('location: index.php?erreur');
  }
?>
