<html>
<head>
    <title>Projet PHP Bourdiaux Defretiere</title>
    <meta charset ='utf-8'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="vues/CSS/style.css" type="text/css" media="screen" />
</head>

<body>

<?php
include('header.php');

?>


<div class=" text-center m-4">
    <p class="mb-0 Title">Liste des flux : </p>
</div>

<?php if(isset($flux) && !empty($flux)) { ?>
<table class="table">
    <thead>
    <tr class="bg-secondary">
        <th scope="col">Site</th>
        <th scope="col">Url flux</th>
        <th scope="col">Supprimer</th>
    </tr>
    </thead>
    <tbody>

    <?php

        foreach ($flux as $row) {
            echo("<tr>");
            echo '<td><h4>' . $row->getNom() . '</h4></td> ';
            echo '<td><a class="lienNews" href="' . $row->getUrl() . '">' . $row->getUrl() . '</a></td> ';
            //l'action suppression sera réaliser à l'ajout du front controleur
            echo '<td><a href=index.php?action=supprimer&id=' . strval($row->getId()) . '><img  src="vues/src/bean.png" width="40" height="40"> </a></td>';
            echo("</tr>");
        }


     echo'</tbody>';
     echo '</table>';
    }
else {
        echo '<p>Pas de flux </p>';

    }
    ?>

    <p class="mb-0 Title text-center m-4">Ajouter un flux : </p>
    <!-- l'action de l'ajout sera définit plus tard, au moment de l'ajout du flux RSS-->

<FORM  class=" text-center m-4" METHOD=POST ACTION=index.php?action=ajoutFlux>
    <p>Nom du flux <INPUT TYPE=TEXT NAME="nomFlux" ></br></p>
    <p>Url  <INPUT TYPE=TEXT NAME= "urlFlux" ></br></p>
    <INPUT TYPE=SUBMIT NAME="ajt" VALUE="Ajouter">
</FORM>


    <p class="mb-0 Title text-center m-4">Nombre de News par page : </p>
    <FORM class="text-center m-4" METHOD=POST ACTION=index.php?action=modifNbNews>
        <INPUT TYPE=NUMBER NAME="newsPP"></br>
        <INPUT TYPE=SUBMIT NAME="modif" VALUE="modifier">
    </FORM>


</body>



<a href="index.php?action=deconnection" >
    <h2 class="erreur_retour" > Deconnexion </h2>
</a>

<?php

include('footer.php');
?>

</body>
</div>
</html>