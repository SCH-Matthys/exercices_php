<?php 
    $bdd = new PDO('mysql:host=localhost;dbname=film;charset=utf8', 'root', '');

    if(isset($_POST["title"]) && isset($_POST["length"]) && isset($_POST["release_date"])){
        if(isset($_FILES['imgFilm'])) {
            $image = $_FILES['imgFilm']['name']; 
            $imageTmp = $_FILES['imgFilm']['tmp_name']; 
            $infoImage = pathinfo($image); 
            $extImage = $infoImage['extension']; 
            $imageName = $infoImage['filename']; 
            $uniqueName = $imageName . time() . rand(1, 1000) . "." . $extImage;
            move_uploaded_file($imageTmp, 'assets/images/uploads/' . $uniqueName);
        }

        $title = htmlspecialchars($_POST["title"]);
        $length = htmlspecialchars($_POST["length"]);
        $releaseDate = htmlspecialchars($_POST["release_date"]);

        // $request = $bdd->prepare("   INSERT INTO film(title,length,release_date)
        //                              VALUE (?,?,?)
        //                          ");
        // C'est la même chose

        $request = $bdd->prepare("  INSERT INTO fiche_film (title,length,release_date,image)
                                    VALUE (:title,:length,:release_date,:image)
        ");

        $request->execute([ 
            "title"         =>$title,
            "length"        =>$length,
            "release_date"  =>$releaseDate,
            "image"         =>$uniqueName
        ]);
        header("location:./requestBDD.php");
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
        <form action="" id="formAddFilm" method="POST" enctype="multipart/form-data">
            <label for="title">* Nom du film : </label>
            <input type="text" name="title" id="title" required>
            <label for="imgFilm">Ajouter une image au film :</label>
            <input type="file" name="imgFilm" id="imgFilm">
            <label for="length">* Durée du film (en minutes) : </label>
            <input type="text" name="length" id="length" required>
            <label for="release_date">* Date de sortie du film : </label>
            <input type="date" name="release_date" id="release_date" required>
            <p>* champs obligatoires</p>
            <button>Ajouter</button>
        </form>

    </main>
    
    <?php include ("footer.php") ?>
</body>
</html>