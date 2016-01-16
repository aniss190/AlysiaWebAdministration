<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Ajouter une plainte</title>
    <link rel="stylesheet" href="css/whiteliste.css" media="screen" type="text/css" />
  </head>
  <body>
    <?php
      
      @session_start ();
      if (isset($_SESSION['nom']) && isset($_SESSION['role'])) {
        $page = 'new-plainte';
        include 'navigation.php';
      	include ('infoConnexion.php');
      	include ('function.php');
      }
      else
        header ('location: index.php');
    ?>
    <form action="new_plainte.php">
      <div class="form-input" style="width: 500px;">
        <label for="plaignant">Plaignant :</label>
        <input type="text" name="plaignant" class="input"/></br>
        <label style="float: left; length: 50px;">Coupables :</label>
        <textarea style="color: black;" name="coupable" rows="2" cols="50"></textarea>
        <label style="float: left;">Description :</label>
        <textarea style="color: black;" name="description" rows="3" cols="50"></textarea>
        <label style="float: left;">Preuve :</label>
        <textarea style="color: black;" name="preuve" rows="3" cols="50"></textarea>
        <label style="float: left;">Conclusion du modérateur :</label>
        <textarea style="color: black;" name="conclusion" rows="3" cols="50"></textarea>
        <label style="float: left;">Sanction :</label>
        <textarea style="color: black;" name="sanction" rows="3" cols="50"></textarea>
        <button class='btn btn-primary' style='margin: 20px auto;' type="submit">Soumettre</button>
        </div>
    </form>
  </body>
  <?php
    if(isset($_GET['plainteAdded']))
      echo '<script> alert("plainte declaree."); </script>';
  ?>
</html>