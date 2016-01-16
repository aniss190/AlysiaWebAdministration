<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Modifier la whiteliste</title>
  </head>
  <?php
    session_start ();
    if (isset($_SESSION['nom']) && isset($_SESSION['role'])) {
      $page = 'gererWhiteliste';
      include 'navigation.php';
    }
    else
      header ('location: index.php');
    
    require_once 'db.class.php';
    $db = new BD();
    $res = $db->query('SELECT * FROM whiteliste where id = ?', array($_GET['id']))[0];
  ?>
  <head>
    <meta charset="utf-8" />
    <title>Ajouter un utilisateur</title>
  </head>
  <body>

    <form action="modifierAddWhiteliste.php" method="POST">
   
    <div>
        <input type="hidden" name="id" value="<?php echo $res['id']; ?>" />
        <label for="code">Code:</label>
        <input type="text" id="code" name="code" value="<?php echo $res['code']; ?>"/></br>
        <label for="description" style="float: left;">Description:</label>
        <textarea name="description"/><?php echo $res['description']; ?></textarea></br>
    </div>

    <div class="button">
        <button class='btn btn-primary' type="submit">Valider</button>
    
    </form>
    </form>
    <a class='btn btn-primary' onclick="return(confirm('Etes-vous sur ?'));" href='supprimerwhiteliste.php?id=<?php echo $res['id']; ?>'>Supprimer le whiteliste</a> (uniquement en cas de doublon si ce whiteliste n'a jamais été impliqué dans une panne)
  </div></body>
</html>
