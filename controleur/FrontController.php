<?php

class FrontController
{

    function __construct()
    {
        session_start();

        global $rep,$vues;
        $listeAction_Admin = array('supprimer', 'ajoutFlux', 'deconnection', 'ValideAdmin', 'modifNbNews');
        try {

            $modeleAdmin = new ModeleAdmin();
            $admin = $modeleAdmin->isAdmin();



            if(isset($_REQUEST['action']) && in_array($_REQUEST['action'], $listeAction_Admin)){
                
                if(!isset($admin) || $admin == null){
                    $_REQUEST['action']=NULL;
                    new ControleurUser();
                }
                else {
                    new ControleurAdmin();
                }
            }
            else{
                new ControleurUser();
            }
        }
        catch(Exception $e){
            $dVueEreur[] =	"Erreur Front Controller ";
            require ($rep.$vues['erreur']);
        }


    }
}