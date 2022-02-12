<?php

class ModeleAdmin{

    public function __construct(){}

    public function getFlux(){
        global $login, $mdp, $dsn;


        $con=new Connection($dsn, $login, $mdp);
        $gatewayFlux = new FluxGateway($con);
        $flux = $gatewayFlux->allFlux();
        return $flux;
    }

    public function suppFlux(){
        global $login, $mdp, $dsn;

        $con=new Connection($dsn, $login, $mdp);
        $gatewayFlux = new FluxGateway($con);
        $id = $_REQUEST['id'];
        $gatewayFlux->delFlux($id);
    }

    /*
    on suppose admin
    affichage formulaire
    action : ajout en base
    recupere la news, instantie un modele, on appele le modele->addNews()
    require d'une vue */


    public function ajoutFlux()
    {
        global $login, $mdp, $dsn;
        $nomFlux = Validation::filtreString($_REQUEST["nomFlux"]);
        $urlFlux = Validation::filtreUrl($_REQUEST["urlFlux"]);
        if(!empty($nomFlux) && !empty($urlFlux)){
            $con=new Connection($dsn, $login, $mdp);
            $gatewayFlux = new FluxGateway($con);
            $gatewayFlux->addFlux($nomFlux, $urlFlux);
        }

    }

    public function connection($loginUser, $mdpUser){
        global $login, $mdp, $dsn,$rep,$vues;
        $loginUser = Validation::filtreString($loginUser);
        $mdpUser = Validation::filtreString($mdpUser);
        $con=new Connection($dsn, $login, $mdp);
        $gatewayAdmin = new AdminGateway($con);
        $mdpBd = $gatewayAdmin->getMdp($loginUser);
        if(password_verify($mdpUser, $mdpBd)){
            $_SESSION['role']='admin';
            $_SESSION['login']=$loginUser;
            $_REQUEST['action'] = null;
            new ControleurAdmin();
        }
        else{
            $_REQUEST['action'] = null;
            new ControleurUser();
        }
    }

    public function deconnection(){
        session_unset();
        session_destroy();
        $_SESSION=array();
        $_REQUEST['action']=null;
        new FrontController();
    }

    public function isAdmin(){

        if(isset($_SESSION['login']) && isset($_SESSION['role'])){

            $login = Validation::filtreString($_SESSION['login']);
            $role = Validation::filtreString($_SESSION['role']);
            $a=new Admin($login, $role);
            return $a;

        }
        return null;
    }

   static function getNbNPP(){
       global $login, $mdp, $dsn;

       $con=new Connection($dsn, $login, $mdp);
       $gatewayAdmin = new AdminGateway($con);
       return $gatewayAdmin->getNbNewsPP();
   }

   public function modifNbNPP($newValue){
       global $login, $mdp, $dsn;

       $con=new Connection($dsn, $login, $mdp);
       $gatewayAdmin = new AdminGateway($con);
       $gatewayAdmin->setNbNewsPP($newValue);

   }

}

?>