<?php

class NewsGateway {

	private $con;

	public function __construct(Connection $con)
	{
		$this->con=$con;
	}

	public function allNews(){
		$query="SELECT * FROM news, site where urlsite=url";
		$this->con->executeQuery($query,[]);
		$result = $this->con->getResults();
		$return=[];
		foreach ($result as $item) {
			$return[]=new News($item["urlart"], $item["titre"], $item["date"], $item["nom"], $item["url"] );
		}
		return $return;
	}

	public function insert(News $n) : bool{
		$query="INSERT INTO news values (:url, :nom, :description)";
		$this->con->executeQuery($query, array(':url' => array($n->url,PDO::PARAM_STR ),':nom' => array($n->nom,PDO::PARAM_STR), ':description' => array($n->description,PDO::PARAM_STR) ));
		return true;

		return false;
		
	}


	public function nbNews(){

		$query = 'Select count(*) c from news';
		$this->con->executeQuery($query);
		$result = $this->con->getResults();

		return $result[0]['c'];


	}



	public function delete(News $n) : bool{
		$query="DELETE FROM news WHERE $this->urlart=:urlart";
		try{
			$this->con->executeQuery($query, array(':urlart' => array($n->urlart,PDO::PARAM_STR )));
			return true;
		}
		catch(Exception $e){
			throw $e;
			
		}
		return false;
		
	}

	public function findNews($page, $nbNewsParPage){
		// on considère que les parametres on déja été verifié
		$firstId = ($page-1)*$nbNewsParPage;
		$query = "select * from news n, flux f where f.url = n.urlsite order by n.id desc LIMIT :firstId, :nbNewsParPage";
		$this->con->executeQuery($query,["nbNewsParPage"=>[$nbNewsParPage, PDO::PARAM_INT], "firstId"=>[$firstId, PDO::PARAM_INT]]);
		$result = $this->con->getResults();

		$return=[];
		foreach ($result as $item) {
			$return[]=new News($item["urlart"], $item["titre"], $item["date"], $item["nom"], $item["url"] );

		}

		return $return;
	}
}

?>
