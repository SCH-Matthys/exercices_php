<?php 
    $bdd = new PDO('mysql:host=localhost;dbname=ex_fiche_film;charset=utf8', 'root', '');

    $requestFilm = $bdd->prepare("  SELECT * 
                                    FROM film"
                                );
    $requestFilm->execute([]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requetes BDD</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <?php include ("header.php")?>
    <main>
        <h1>Recupération de la requete:</h1>

        <?php while($data = $requestFilm->fetch()): 
            
            // var_dump($data);
        ?>

            
        <article>
            <h2>Titre : <?= $data["title"];?></h2>
            <p>Durée : <?= date('H:i', mktime(0,$data["length"])) ?>h</p>
            <p>Date de sortie : <?= $data["release_date"];?></p>
        </article>

        <?php endwhile ?>
    </main>
    <?php include ("footer.php")?>
</body>
</html>