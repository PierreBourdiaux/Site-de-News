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
    if(isset($dVueErreur)){?>
        <center>
            <h1 class="erreur">ERREUR !!!!</h1>
            <?php
            foreach ($dVueErreur as $item) {?>
                <h2 class="erreur"><?php echo($item) ?></h2>

                <?php } ?>

            <?php } ?>


            <a href="index.php" >
                <h2 class="erreur_retour" > Retour au News </h2>
            </a>
        </center>

    <?php
    include('footer.php')
    ?>

    </body>
</div>
</html>