<?php

class FluxGateway
{
    private $con;

    public function __construct(Connection $con)
    {
        $this->con=$con;
    }

    public function allFlux(){

        $query = 'Select * from flux';
        $this->con->executeQuery($query,[]);
        $result = $this->con->getResults();
        $return=[];
        foreach ($result as $item) {
            $return[]=new Flux($item["id"],$item["nom"], $item["url"]);
        }

        return $return;
    }

    public function nbFlux(){
        $query = 'select count(*) from flux';
        $this->con->executeQuery($query,[]);
        $result = $this->con->getResults();
        return $result;
    }

    public function addFlux($nom, $url){
        $query='insert into flux(url, nom) values(:url, :nom)';
        $this->con->executeQuery($query, [':url'=>[$url, PDO::PARAM_STR],':nom'=>[$nom, PDO::PARAM_STR]]);
    }

    public function delFlux($id){
        $query='delete from flux where id=:id';
        $this->con->executeQuery($query,[':id'=>[$id, PDO::PARAM_INT]]);  // On verifie avant si le site existe
    }

    public function exist($id) : bool{
        $query='select count(*) c from flux where id=:id';
        $this->con->executeQuery($query,[':id'=>[$id, PDO::PARAM_INT]]);
        $result=$this->con->getResults();
        return ($result[0]['c']!=0);
    }

}