<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Modifier un utilisateur</title>
  </head>
  <?php
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
    require_once 'db.class.php';
    $db = new BD();
    $res = $db->query('SELECT * FROM user where id = ?', array($_GET['id']))[0];
  ?>
  <head>
    <meta charset="utf-8" />
    <title>Modifier un utilisateur</title>    
    <link rel="stylesheet" href="css/whiteliste.css" media="screen" type="text/css" />
  </head>
  <body>

    <form action="modifierAddUser.php" method="POST">
   
    <div class="form-input" style="width: 500px;">
        <input type="hidden" name="id" value="<?php echo $res['id']; ?>" />
        <label for="pseudo">Pseudo :</label>
        <input type="text" id="pseudo" name="pseudo" value="<?php echo $res['pseudo']; ?>"/></br>
        <label>Role :</label>
        <input type="radio" id="admin" name="role" value="admin" <?php echo ($res['role'] == "admin") ? "checked" : "" ?> />
        <label for="admin">Administrateur</label>
        <input type="radio" id="modo" name="role" value="modo" checked/>
        <label for="modo"> Modérateur</label>
        <input type="radio" name="role" value="support" checked="checked"/>
        <label for="role">Support</label></br>
        <label for="pswd">Mot de Passe: </label>
        <input type="text" name="pswd" value="<?php echo $res['pswd']; ?>" /></br>
    </div>
    <div class="button">
        <button class='btn btn-primary' style='margin: 20px auto;' type="submit">Valider</button>
    
    </form>
  </div></body>
</html>
