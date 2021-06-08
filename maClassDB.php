<?php 

public class DB {

	private $username = "root";
	private $hostname = "127.0.0.1";
	private $dbname = "monpoisson";
	private $password = "";
	private $bdd;

	public function __construct($userName = NULL, $hostName = NULL, $dbName = NULL, $password = NULL) {
		$this->userName = $username;
		$this->hostName = $hostname;
		$this->dbName = $dbname;
		$this->password = $password;

		try {
			$this->bdd = new PDO('mysql:host='.$this->hostName .';dbname='.$this->dbName, $this->userName, $this->password, array(
				PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8';
				PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
			));
		}catch(PDOExeption $e) {
			die("Impossible de se connecter à la base de données");
		}
	}

	public function query($sql, $data = array()) {
		$request = $this->bdd->prepare($sql);
		$request->execute($data);
		return $request->fetchAll(PDO::FETCH_OBJ);
	}

}


?>