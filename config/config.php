<?php

//gen
$rep=__DIR__.'/../';

// liste des modules à inclure

//$dConfig['includes']= array('controleur/Validation.php');



//BD

$base="php";
$login="root";
$mdp="1111";
$dsn='mysql:host=localhost;dbname=php';

//Vues

$vues['erreur']='vues/erreur.php';
$vues['pagenews']='vues/Pages.php';
$vues['admin']='vues/adminView.php';

// variable nombre de news par pages/ nb pages/ pages par default.
$nbNewsPP= intval((ModeleAdmin::getNbNPP()));
$nbPages=(ModeleNews::getNbPages());

$page=1;

//// VARIABLE DE DEBUG
$debug="rien";
?>