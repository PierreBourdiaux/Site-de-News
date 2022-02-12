<?php

class ControleurUser {

function __construct() {
	global $rep,$vues; // nécessaire pour utiliser variables globales
// on démarre ou reprend la session si necessaire (préférez utiliser un modèle pour gérer vos session ou cookies)


//debut

//on initialise un tableau d'erreur
$dVueErreur = array ();

try{

	if(!isset($_REQUEST['action'])){
		$action = NULL;
	}
	else{
		$action=$_REQUEST['action'];
	} 


switch($action) {

//pas d'action, on réinitialise 1er appel

		case NULL:
			$this->PagesNews($dVueErreur);
			break;

		case 'connection':
			$this->connection($dVueErreur);
			break;

		default:
			$dVueErreur[] =	"Erreur d'appel php  ".$action;
			require ($rep.$vues['erreur']);
			break;
}

}
catch (PDOException $e)
{
	//si erreur BD, pas le cas ici
	$dVueErreur[] =	"Erreur Base de données  : ". $e->getMessage();

	require ($rep.$vues['erreur']);

}
catch (Exception $e2)
	{
		$dVueErreur[] =	"Erreur inattendue!!! ";
		require ($rep.$vues['erreur']);
	}


//fin
exit(0);
}//fin constructeur



function PagesNews(array $dVueErreur) {
	global $rep,$vues;
	$modele=new ModeleNews();
	$news=$modele->getNews();
	require ($rep.$vues['pagenews']);
}

private function connection($dVueErreur)
	{
		global $rep,$vues;

		$modele=new ModeleAdmin();
		$login=Validation::filtreString($_REQUEST['loginUser']);
		$mdp=Validation::filtreString( $_REQUEST['mdpUser']);
		if($modele->isAdmin() == null){
			$modele->connection($login, $mdp);

		}
		else{
			new ControleurAdmin();
		}
	}

}//fin class

?>
