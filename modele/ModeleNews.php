<?php

class ModeleNews{

    public function __construct(){}

    public static function getNbPages(){

        global $login, $mdp, $nbNewsPP, $dsn;
        $con=new Connection($dsn, $login, $mdp);
        $gatewayNews = new NewsGateway($con);
        return ceil($gatewayNews->nbNews()/$nbNewsPP);

    }

    public function getNews(){
        global $login, $mdp, $page, $nbNewsPP, $dsn;

        $con=new Connection($dsn, $login, $mdp);
        $gatewayNews = new NewsGateway($con);
        return $gatewayNews->findNews($page, $nbNewsPP);

    }


}

?>