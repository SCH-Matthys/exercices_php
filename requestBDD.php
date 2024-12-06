<?php 
    $bdd = new PDO('mysql:host=localhost;dbname=film;charset=utf8', 'root', '');

    $requestFilm = $bdd->prepare("  SELECT * 
                                    FROM fiche_film"
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

        <?php while($data = $requestFilm->fetch()): ?>
            <?php var_dump($data) ?>
        <article>
            <h2>Titre : <?= $data["title"];?></h2>
            <?php 
                if($data["image"] == NULL){
                    echo "<img src='assets/images/ImageNonDisponible.jpg' alt='image non disponible'>";
                } else{
                    echo "<img src='assets/images/uploads/" .$data['image']."' alt='image du film ". $data['title']. "'>";
                }
            ?>
            <p>Durée : <?= date('H:i', mktime(0,$data["length"])) ?>h</p>
            <p>Date de sortie : <?= $data["release_date"];?></p>
            <a href="./voirPlus?id=<?= $data["id"]?>">Voir plus</a>
            <a href="./editFilm.php?id=<?= $data["id"]?>">Modifier</a>
            <a href="./deleteFilm.php?id=<?= $data["id"]?>">Supprimer</a>
        </article>

        <?php endwhile ?>
    </main>
    <?php include ("footer.php")?>
</body>
</html>