<?php

class AdminGateway {

	private $con;

	public function __construct($con)
	{
		$this->con=$con;
	}

	public function connexion($login, $mdp) : bool{

		$query='select count(*) c from admin where user=:login and mdp=:mdp';
		$this->con->executeQuery($query, [":login"=>[$login, PDO::PARAM_STR],
											":mdp"=>[$mdp, PDO::PARAM_STR]]);
		$result = $this->con->getResults();
		if($result[0]['c'] == 1 ) return true;
		return false;
	}

	public function getNbNewsPP(){

		$query='select nbNewsPP npp from admin where user ="admin"';
		$this->con->executeQuery($query);
		$result = $this->con->getResults();

		return $result[0]['npp'];
	}

	public function setNbNewsPP($nbNewsPP){
		$query = 'update admin set nbNewsPP = :nb where user="admin"';
		$this->con->executeQuery($query, [':nb'=>[$nbNewsPP, PDO::PARAM_INT]]);
	}


	public function getMdp($login){
		$query = 'select mdp from admin where user=:login';
		$this->con->executeQuery($query, [':login'=>[$login, PDO::PARAM_STR]]);
		$res = $this->con->getResults();
		return $res[0]['mdp'];
	}
}

?>
