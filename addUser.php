<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Ajouter un utilisateur</title>
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
  ?>
  <head>
    <meta charset="utf-8" />
    <title>Ajouter un utilisateur</title>    
    <link rel="stylesheet" href="css/whiteliste.css" media="screen" type="text/css" />
  </head>
  <body>
    <form action="confirmationAddUser.php">
        <div class="form-input" style="width: 500px;">
            <label for="pseudo">Pseudo:</label>
            <input type="text" name="pseudo" class="input"/></br>
            <label>Role:</label>
            <input type="radio" name="role" value="admin" /><label for="role">Administrateur</label>
            <input type="radio" name="role" value="modo" /><label for="role">Modérateur</label>
            <input type="radio" name="role" value="support" checked="checked"/><label for="role">Support</label></br>
            <label for="mdp" style='font-style: italic;'>Le mot de passe sera généré automatiquement.</label>
        </div>
        <div class="button">
            <button class='btn btn-primary' style='margin: 20px auto;' type="submit">Ajouter</button>
        </div>
    </form>
  </body>
</html>
