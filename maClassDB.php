<?php 

class DB {

	private $hostname = "127.0.0.1";
	private $dbname = "monpoisson";
	private $username = "root";
	private $password = "";
	private $bdd;

	public function __construct($username=NULL, $hostname=NULL, $dbname=NULL, $password=NULL) {
		$this->hostname = $hostname;
		$this->dbname = $dbname;
		$this->username = $username;
		$this->password = $password;

		try {
			$this->bdd = new PDO('mysql:host='.$this->hostname .';dbname='.$this->dbname, $this->username, $this->password, array(
				PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
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