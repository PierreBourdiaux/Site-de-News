<?php


require_once(__DIR__."/config/Autoload.php");

Autoload::charger();

require_once(__DIR__."/config/config.php");




if(isset($_GET['page']))$page=$_GET['page'];
else $page = 1;
$valid=new Validation();
$page=$valid->val_page($page);


$cont = new FrontController();

?>