<?php
    $bdd = new PDO('mysql:host=localhost;dbname=film;charset=utf8', 'root', '');

    if(isset($_GET["id"])){
        $id = $_GET["id"];
        
        $request = $bdd->prepare("  SELECT * FROM fiche_film
                                    WHERE id=$id
                                ");

        $request->execute([]);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voir plus</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <?php include ("header.php")?>
    <main>
        <?php
            $data = $request->fetch();
        ?>
        <h2>Titre : <?= $data["title"];?></h2>
        <p>Durée : <?= date('H:i', mktime(0,$data["length"])) ?>h</p>
        <p>Date de sortie : <?= $data["release_date"];?></p>
    </main>
    <?php include ("footer.php")?>
</body>
</html>