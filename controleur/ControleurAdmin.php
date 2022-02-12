<?php

class ControleurAdmin
{

    function __construct()
    {
        global $rep, $vues; // nécessaire pour utiliser variables globales
// on démarre ou reprend la session si necessaire (préférez utiliser un modèle pour gérer vos session ou cookies)

        $modeleAdmin = new ModeleAdmin();

        if($modeleAdmin->isAdmin() == null){
            $dVueEreur[] =	"Erreur : admin non autorisé";
            require ($rep.$vues['erreur']);

        }

        else{

            //debut

//on initialise un tableau d'erreur
            $dVueErreur = array();

            try {
                if(!isset($_REQUEST['action'])){
                    $action = NULL;
                }
                else{
                    $action=$_REQUEST['action'];
                }

                switch ($action){

                    case NULL:
                        $this->pageAdmin($dVueErreur);
                        break;

                    case 'supprimer' :
                        $this->suppFlux($dVueErreur);
                        break;

                    case 'ajoutFlux' :
                        $this->ajoutFlux($dVueErreur);
                        break;

                    case 'deconnection' :
                        $this->deconnection($dVueErreur);
                        break;

                    case "connection" :
                        $this->connection($dVueErreur);
                        break;

                    case 'modifNbNews' :
                        $this->modifNbNews($dVueErreur);
                        break;


                    default :
                        $dVueErreur[] =	"Erreur d'appel php";
                        require ($rep.$vues['erreur']);
                        break;
                }
            }
            catch (PDOException $e){
                //si erreur BD, pas le cas ici
                $dVueErreur[] =	"Erreur Base de données ";
                require ($rep.$vues['erreur']);
            }

            catch (Exception $e2)
            {
                $dVueErreur[] =	"Erreur inattendue!!! ";
                require ($rep.$vues['erreur']);
            }
        }


    }


    public function PageAdmin(array $dVueErreur) {
        global $rep,$vues;

        $model=new ModeleAdmin();
        $flux=$model->getFlux();


        //appelle de la vue

        require ($rep.$vues['admin']);

    }


    private function suppFlux(array $dVueErreur){
        $modele=new ModeleAdmin();
        $flux=$modele->suppFlux();

        $this->PageAdmin($dVueErreur);
    }

    private function ajoutFlux(array $dVueErreur)
    {
        $modele=new ModeleAdmin();
        $modele->ajoutFlux();
        $this->PageAdmin($dVueErreur);
    }

    private function deconnection($dVueErreur)
    {
        $modele=new ModeleAdmin();
        $modele->deconnection();
    }

    private function connection($dVueErreur)
    {
        global $rep,$vues;
        $modele=new ModeleAdmin();
        if($modele->isAdmin() == null){
            $modele->connection($_REQUEST['loginUser'], $_REQUEST['mdpUser']);
            $dVueErreur[] =	"Erreur inattendue!!! ";
            require ($rep.$vues['erreur']);
        }
        else{
            $this->PageAdmin($dVueErreur);
        }
    }

    private function modifNbNews($dVueErreur){
        global $rep,$vues;

        $modele=new ModeleAdmin();
        if(!isset($_REQUEST['newsPP'])){
            $dVueErreur[] = "Erreur de requete : le nombre de news page";
            require ($rep.$vues['erreur']);
            return;
        }
        $new = Validation::validationNBNPP($_REQUEST['newsPP']);
        $modele->modifNbNPP($new);
        $this->PageAdmin($dVueErreur);
    }
}