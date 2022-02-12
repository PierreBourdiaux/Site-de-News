<html>
    <head>
        <title>Projet PHP Bourdiaux Defretiere</title>
        <meta charset ='utf-8'>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="vues/CSS/style.css" type="text/css" media="screen" />
    </head>

    <body>

    <?php
    include('header.php')
    ?>
    <br>

<?php
    global $nbNewsPP, $gatewayNews, $page, $nbPages;
?>

    <div class=" text-center m-4">
        <p class="mb-0 Title">Liste des News : </p>
    </div>
    <table class="table">
        <thead>
        <tr class="bg-secondary">
            <th scope="col">Site</th>
            <th scope="col">Titre</th>
            <th scope="col">Date</th>
        </tr>
        </thead>
        <tbody>
        <?php  
            if(isset($news)){
                foreach ($news as  $row) {            
        ?>
            <tr>
                <td><a class="lienNews" href=<?php echo($row->getUrl())?>><?php echo($row->getNom())?></a></td>
                <td><a class="lienNews" href=<?php echo($row->getUrlart())?>><?php echo($row->getTitre())?></a></td>
                <td><?php echo($row->getDate())?>  </td>
            </tr>
        <?php }
            }

        else{
            echo("pas de news");
        } ?>
        </tbody>
    </table>

    <br>
    

   <p class="controleurPage">
       <a href="index.php?page=1" class="navigationPages">1</a>

        <a href="index.php?page=<?php echo($page)-1 ?>" class="navigationPages"> < </a>

        <?php echo($page) ?>

        <a href="index.php?page=<?php echo($page)+1 ?>" class="navigationPages"> > </a>

        <a href="index.php?page=<?php echo($nbPages)?>" class="navigationPages"> <?php echo($nbPages)?></a>

    </p>

    <?php
    include('footer.php')
    ?>

    </body>
</div>
</html>