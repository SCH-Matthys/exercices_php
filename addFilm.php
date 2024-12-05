<?php 
    $bdd = new PDO('mysql:host=localhost;dbname=ex_fiche_film;charset=utf8', 'root', '');

    if(isset($_POST["title"]) && isset($_POST["length"]) && isset($_POST["release_date"])){
        $title = htmlspecialchars($_POST["title"]);
        $length = htmlspecialchars($_POST["length"]);
        $releaseDate = htmlspecialchars($_POST["release_date"]);

        // $request = $bdd->prepare("   INSERT INTO film(title,length,release_date)
        //                              VALUE (?,?,?)
        //                          ");
        $request = $bdd->prepare("  INSERT INTO film(title,length,release_date)
                                    VALUE (:title,:length,:release_date)
                                ");

        $request->execute([ 
            "title"=>$title,
            "length"=>$length,
            "release_date"=>$releaseDate
        ]);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <?php include ("header.php") ?>

    <main>
        <h2>Ajouter un film</h2>
        <form action="" id="formAddFilm">
            <label for="formAddFilmTitle">Nom du film : </label>
            <input type="text" name="formAddFilmTitle" id="formAddFilmTitle">
            <label for="formAddFilmLength">Durée du film (en minutes) : </label>
            <input type="text" name="formAddFilmLength" id="formAddFilmLength">
            <label for="formAddFilmRelease">Date de sortie du film : </label>
            <input type="date" name="formAddFilmRelease" id="formAddFilmRelease">
            <button>AJOUTER</button>
        </form>
    </main>
    
    <?php include ("footer.php") ?>
</body>
</html>