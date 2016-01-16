<?php 
    include 'db.class.php';
    $db = new BD();
    //echo '<pre>',print_r($_REQUEST, 1),'</pre>';
    $res = $db->update('UPDATE user set 
			pseudo     = :pseudo,
			role    = :role,
			pswd    = :pswd
			WHERE id = :id', $_POST);
    header("Location:gererUser.php?userUpdate");
?>
