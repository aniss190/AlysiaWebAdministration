<html>
    <head><link href='css/bootstrap.css' rel='stylesheet'/><link href='css/style.css' rel='stylesheet' /><link href='css/select.css' rel='stylesheet' /></head>

    <nav class='navbar navbar-default' role='navigation'>
        <div class='container-fluid'>
            <div class='navbar-header'>
                <p class="navbar-brand"><?php echo "Bienvenue ".$_SESSION['nom']." (".$_SESSION['role'].")" ?></p>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                    <?php if($_SESSION['role']=="admin"){ ?>
                        <li <?php if ($page == 'home') {echo"class='active'";} ?>><a href='base.php' title='Accueil'>Gerer les plaintes</a></li>
                        <li <?php if ($page == 'gererWhiteliste') {echo"class='active'";} ?>><a href='gererWhiteliste.php' title='Gerer la whiteliste'>Gerer la whiteliste</a></li>
                        <li <?php if ($page == 'gererUser') {echo"class='active'";} ?>><a href='gererUser.php' title='Gerer les utilisateur'>Gerer les utilisateurs</a></li>
                        <?php if ($page == 'home') {echo"<li><a href='new-plainte.php' title='Declarer une plainte'>Declarer une plainte</a></li>";} ?>
                        <?php if ($page == 'gererWhiteliste') {echo"<li><a href='addWhiteliste.php' title='Ajouter un whiteliste'>Whiteliser un Joueur</a></li>";} ?>
                        <?php if ($page == 'gererUser') {echo"<li><a href='addUser.php' title='Ajouter un utilisateur'>Ajouter un utilisateur</a></li>";} ?>
                    <?php } ?>

                    <?php if($_SESSION['role']=="modo"){ ?>
                        <li <?php if ($page == 'home') {echo"class='active'";} ?>><a href='base.php' title='Accueil'>Gerer les plaintes</a></li>
                        <li <?php if ($page == 'gererWhiteliste') {echo"class='active'";} ?>><a href='gererWhiteliste.php' title='Gerer la whiteliste'>Gerer la whiteliste</a></li>
                        <?php if ($page == 'home') {echo"<li><a href='new-plainte.php' title='Declarer une plainte'>Declarer une plainte</a></li>";} ?>
                        <?php if ($page == 'gererWhiteliste') {echo"<li><a href='addWhiteliste.php' title='Ajouter un whiteliste'>Whiteliser un Joueur</a></li>";} ?>
                    <?php } ?>

                    <li><a href='logout.php' title='Déconnexion'>Déconnexion</a></li>
                </ul>
            </div>
        </div>
    </nav>
</html>
