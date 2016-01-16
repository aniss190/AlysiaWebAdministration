<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Ajouter un whiteliste</title>
  </head>
  <?php
    session_start ();
    if (isset($_SESSION['nom']) && isset($_SESSION['role'])) {
      $page = 'gererWhiteliste';
      include 'navigation.php';
    }
    else
      header ('location: index.php');
  ?>
  
  </script>
  <head>
    <meta charset="utf-8" />
    <title>Ajouter un whiteliste</title> 
    <link rel="stylesheet" href="css/whiteliste.css" media="screen" type="text/css" />
  </head>
  <body>
    <form action="confirmationAddWhiteliste.php">
    <div class="form-input" style="width: 500px;">
      <label for="uid">Uid du joueur :</label>
      <input id="uid" type="text"  class="input" name='uid'></br></br>
      <input id="guid" type="text"  class="input" name='guid' placeholder="" readonly/>
    </div>    
    <div class="button">
      <button id='btnwhitelister'class='btn btn-primary' style='margin: 20px auto;'disabled="true" 
        type="submit">Whitelister</button>
    </div>
    </form>
    <button id="convert" class='btn btn-primary' onclick='convertir()' 
      style='margin-left: 10%;' type="submit">Convertir</button>

    <script src='js/whiteliste/jquery.js'></script>

    <script src='js/whiteliste/core.js'></script>
    <script src='js/whiteliste/md5.js'></script>
    <script src='js/whiteliste/lib-typedarrays.js'></script>
    <script src='js/whiteliste/BigInteger.min.js'></script>

    <script src="js/whiteliste/index.js"></script>
  </body>
</html>