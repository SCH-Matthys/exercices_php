<?php 
    $bdd = new PDO('mysql:host=localhost;dbname=film;charset=utf8', 'root', '');
    
    $id = $_GET["id"];
    $request= $bdd->prepare(" SELECT * 
                        FROM fiche_film 
                        WHERE id = ?
    ");
    $request->execute([$id]);
    $data = $request->fetch();
    

    if(isset($_POST["title"]) && isset($_POST["length"]) && isset($_POST["release_date"])){
        $id = $_POST["id"];
        $title = htmlspecialchars($_POST["title"]);
        $length = htmlspecialchars($_POST["length"]);
        $releaseDate = htmlspecialchars($_POST["release_date"]);
        if(isset($_FILES['imgFilm'])) {
            $image = $_FILES['imgFilm']['name']; 
            $imageTmp = $_FILES['imgFilm']['tmp_name']; 
            $infoImage = pathinfo($image); 
            $extImage = $infoImage['extension']; 
            $imageName = $infoImage['filename']; 
            $uniqueName = $imageName . time() . rand(1, 1000) . "." . $extImage;
            move_uploaded_file($imageTmp, 'assets/images/uploads/' . $uniqueName);
        }
        
        $newRequest = $bdd->prepare("   UPDATE fiche_film
                                        SET     title = :title,
                                                length = :length,
                                                release_date = :release_date,
                                                image = :image
                                        WHERE id = :id
        ");

        $newRequest->execute([ 
            "title"         =>$title,
            "length"        =>$length,
            "release_date"  =>$releaseDate,
            "image"         =>$uniqueName,
            "id"            =>$id
        ]);
        
        header("location: ./requestBDD.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <?php include ("header.php") ?>

    <main>

        <h2>Modifier le film</h2>
        <?php var_dump($data)?>
        <form action="./editFilm.php" id="formAddFilm" method="POST">
            <label for="title">Nom du film : </label>
            <input type="text" name="title" id="title" value="<?= $data["title"] ?>">
            <label for="imgFilm">Ajouter une image au film :</label>
            <input type="file" name="imgFilm" id="imgFilm" value="<?= $data["image"] ?>">
            <label for="length">Durée du film (en minutes) : </label>
            <input type="text" name="length" id="length" value="<?= $data["length"] ?>">
            <label for="release_date">Date de sortie du film : </label>
            <input type="date" name="release_date" id="release_date" value="<?= $data["release_date"] ?>">
            <input type="hidden" name="id" value="<?= $data["id"] ?>">
            <button>Modifier</button>
        </form>

    </main>
    
    <?php include ("footer.php") ?>
</body>
</html>