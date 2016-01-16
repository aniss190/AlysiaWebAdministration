
<?php 
    include 'db.class.php';
    $db = new BD();
    //echo '<pre>',print_r($_REQUEST, 1),'</pre>';
    $res = $db->update("UPDATE whiteliste SET 
			code = :code, 
			description = :description 
			WHERE id = :id", $_POST);
    header("Location:gererWhiteliste.php?whitelisteUpdate");
?>
