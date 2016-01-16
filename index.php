<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Accueil modération Alysia</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Modération pour le serveur Alysiarp.fr">
    <meta name="author" content="Madsa">		
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <link rel="shortcut icon" href="http://alysiarp.fr/forums//favicon.ico">

		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
	</head>
	<body>
<div class="container-full">

      <div class="row">
       
        <div class="col-lg-12 text-center v-center">
          
          <h1>Bienvenue</h1>
          <p class="lead">Veuillez vous connecter pour accéder aux différentes options de modérations :</p>
          
          <br><br><br>
          
          <form class="form-co" action="connexion.php" method="post">
            <div class="input-group" style="width:300px;text-align:center;margin:0 auto;">
              <input type="text" class="form-control" name="log" placeholder="Votre nom d'utilisateur" required autofocus>
              <input type="password" class="form-control" name="pass" placeholder="Votre mot de passe" required><br />
              <input class="btn btn-lg btn-primary btn-block" type="submit" value="Connexion">
            </div>
          </form>
        </div>
      
      </div> <!-- /row -->  
  	  
  	<br><br><br><br><br>
    <div class="col-lg-12">
        <br><br>
          <p class="pull-right"> ©Copyright 2015 Alysia<sup>RP</sup> Réalisé par Madsa.</p>
        <br><br>
    </div>

</div> <!-- /container full -->

	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>

	</body>
</html>
<?php
      if(isset($_GET['erreur']))
      echo '<script> alert("Mauvais login ou mot de passe"); </script>';
?>