<?php
class BD
{

	private $host = 'localhost';
	private $username = 'root';
	private $password = '9WGyPTB';
	private $database = 'moderation';
	private $db;
	
	public function __construct($host = null,$username = null, $password = null, $database = null)
	{
		if ($host != null)
		{
			$this->host = $host;
			$this->username = $username;
			$this->password = $password;
			$this->database = $database;
		}
		
		try
		{
			$this->db = new PDO('mysql:host='.$this->host.';dbname='.$this->database, $this->username, $this->password, array(
			PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
			PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
			));
		}
		catch(PDOException $e)
		{
			die('<h1>Impossible de se connecter à la base de donnée</h1>');
		}
	}

	public function query($sql, $data = array())
	{
		$req =$this->db->prepare($sql);
		$req->execute($data);
		return $req->fetchAll(PDO::FETCH_ASSOC);
	}

	public function update($sql, $data = array())
	{
		$req =$this->db->prepare($sql);
		$req->execute($data);
	}

	public function delete($sql, $data = array())
	{
		$req =$this->db->prepare($sql);
		$req->execute($data);
	}
}

/***<?php

class db{

private static $instance = NULL;


function __construct($classname) {
    include $classname;
}

/**
*
* Return DB instance or create intitial connection
*
* @return object (PDO)
*
* @access public
*
*/
/*public static function getInstance() {

if (!self::$instance)
    {
    self::$instance = new PDO("mysql:host=localhost;dbname=exiastore", 'root', '');;
    self::$instance-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
return self::$instance;
}


}*/


?>

