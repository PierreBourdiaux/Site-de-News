<?php

class Validation {

static function val_action($action) {

if (!isset($action)) {
throw new Exception('pas d\'action');
    //on pourrait aussi utiliser
//$action = $_GET['action'] ?? 'no';
    // This is equivalent to:
    //$action =  if (isset($_GET['action'])) $action=$_GET['action']  else $action='no';
}
}


    static function val_page($page): int{

        global $nbPages;
        if($page<1){
            $page=1;
            return $page;
        }
        if ($page>$nbPages){
            $page = $nbPages;
            return $page;
        }
        if($page == $nbPages) return $page;
        return $page;
    }

    static function validationNBNPP($nbnpp){
        if ($nbnpp == 0){
            return 10;
        }
        else return abs($nbnpp);
    }


    static function filtreString($string){
        return filter_var($string, FILTER_SANITIZE_STRING);
    }

    static function filtreUrl($url){
        return filter_var($url, FILTER_SANITIZE_URL);
    }


}
?>

        