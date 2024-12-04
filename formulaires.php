<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les Formulaires</title>
</head>
<body>
    <?php include ("header.php") ?>
    <main>
        <h2>Exercice 0:</h2>
        <form action="./formulaires.php" method="POST">
            <label for="nbrPair">Entrez un nombre</label>
            <input id="nbrPair" type="number" name="nbrPair">
            <button>Envoyer</button>
        </form> 
        <?php 
            function EstPair($nbr){
                if ($nbr == ""){
                    echo "0 n'est pas divisible. ";
                } else {
                    if ($nbr % 2 == 0) {
                        return true;
                    } else{
                        return false;
                    }
                }
            }
        ?>
        <p><?php 
            if(isset($_POST["nbrPair"])){
                // var_dump($_POST["nbrPair"]);
                $nbrPair = $_POST["nbrPair"];
                $number = $nbrPair;
                EstPair($number);

                if(EstPair($number)){
                    echo $number. " est pair.";
                } else {
                    echo $number. " n'est pas pair.";
                }
            }
        ?></p>

        <h2>Exercice 1:</h2>
        <p><a href="">http://localhost/php%20exercices/formulaires.php?ville=Toulouse&transport=Train</a></p>
        <p><?php
            if( isset($_GET["ville"]) AND isset($_GET["transport"])){
                echo "La ville choisie est " .$_GET["ville"] ." et le voyage se fera en " .$_GET["transport"]." ! ";
            }
        ?></p>

        <h2>Exercice 2:</h2>
        <form action="./formulaires.php" method="GET">
            <label for="animal">Entrez un animal</label>
            <input id="animal" type="text" name="animal">
            <button>Soumettre</button>
        </form>
        <?php
            if(isset($_GET["animal"]) == NULL || (isset($_GET["animal"]) == "")){
                echo "Aucun animal choisi.";
            }
            elseif(isset($_GET["animal"])){
                echo "Votre animal choisi est : " .$_GET["animal"];
            }
        ?>

        <h2>Exercice 3:</h2>
        <form action="./formulaires.php" method="POST">
            <select name="selectColor" id="selectColor">
                <option value="">Choisir une couleur</option>
                <option value="lightgreen">Vert Clair</option>
                <option value="lightblue">Bleu Clair</option>
                <option value="coral">Rouge Clair</option>
            </select>
            <label for="pseudo">Entrez un nom</label>
            <input type="text" name="pseudo" id="psuedo">
            <button>Valider</button>
        </form>
        <?php
            if(isset($_POST["selectColor"]) && isset($_POST["pseudo"])){
                echo "<div> <p>".$_POST["pseudo"]."</p></div>";
                echo "<style> div{background-color:".$_POST["selectColor"].";}</style>";
            }
        ?>

        <h2>Exercice 4:</h2>
        <form action="./formulaires.php" method="POST">
            <label for="diceNumber">Entez un nombre de faces du des :</label>
            <input id="diceNumber" type="number" name="diceNumber"> 
            <button>Choisir</button>
        </form>
        <?php 
            if (isset($_POST["diceNumber"]) != NULL){
                // var_dump($_POST["diceNumber"]);
                // var_dump(empty($_POST["diceNumber"]));
                if (!empty($_POST["diceNumber"]) && isset($_POST["diceNumber"])){
                    $diceValue = $_POST["diceNumber"];
                    if($diceValue % 6 == 0){
                        echo "Lancé de des correct.";
                    } else{
                        echo "Le nombre de faces n'est pas valide. " .$diceValue." n'est pas un multiple de 6.";
                    }
                }
            }
        ?>

        <h2>Exercice 5:</h2>
        <form id="formEx5" action="./formulaires.php" method="POST">
            <h3>Se connecter :</h3>
            <label for="exPasswordUsername">Entrez votre nom d'utilisateur.</label>
            <input type="text" id="exPasswordUsername" name="exPasswordUsername">
            <label for="exPasswordPassword">Entrez votre mot de passe.</label>
            <input type="password" name="exPasswordPassword" id="exPasswordPassword">
            <button>Se connecter</button>
        </form>
        <?php 
            $admin = "admin";
            $password = "1234";
            if ((isset($_POST["exPasswordUsername"]) && isset($_POST["exPasswordPassword"]) != NULL)){
                var_dump($password);
                if ($_POST["exPasswordUsername"] == $admin && $_POST["exPasswordPassword"] == $password){
                    header("Location: ./formulaires.php#formEx5");
                } else{
                    echo " Mauvais identifiants.";
                }
            }
        ?>

        <h2>Exercice 6:</h2>
        <form action="./formulaires.php#formExerciceSix" method="POST" id="formExerciceSix">
            <label for="exerciceSixNumberOne">Entrez votre premier nombre: </label>
            <input type="number" id="exerciceSixNumberOne" name="exerciceSixNumberOne">
            <label for="exerciceSixNumberTwo">Entrez votre deuxieme nombre: </label>
            <input type="number" id="exerciceSixNumberTwo" name="exerciceSixNumberTwo">
            <select name="exerciceSixSelect" id="exerciceSixSelect">
                <option value="Substract">Soustraction</option>
                <option value="Adding">Addition</option>
                <option value="Multiply">Multiplication</option>
                <option value="Divide">Diviszion</option>
            </select>
            <button>Calculer</button>
            <?php 
                if(!empty($_POST["exerciceSixNumberOne"]) && !empty($_POST["exerciceSixNumberTwo"]) && !empty($_POST["exerciceSixSelect"])){
                    $nbr1 = $_POST["exerciceSixNumberOne"];
                    $nbr2 = $_POST["exerciceSixNumberTwo"];
                    $selectValue = $_POST["exerciceSixSelect"];
                    switch($selectValue){
                        case $selectValue == "Substract":
                            echo "<h4>".$nbr1." - ".$nbr2." = ".$nbr1 - $nbr2."</h4>";
                            break;
                        case $selectValue == "Adding":
                            echo "<h4>".$nbr1." + ".$nbr2." = ".$nbr1 + $nbr2."</h4>";
                            break;
                        case $selectValue == "Multiply":
                            echo "<h4>".$nbr1." x ".$nbr2." = ".$nbr1 * $nbr2."</h4>";
                            break;
                        case $selectValue == "Divide":
                            echo "<h4>".$nbr1." / ".$nbr2." = ".$nbr1 / $nbr2."</h4>";
                            break;
                    }
                } else{
                    echo "Entrez des valeurs.";
                }
            ?>
        </form>

        <h2>Exercice 7:</h2>
        <form action="./formulaires.php#formExerciceSept" method="POST" id="formExerciceSept">
            <label for="exerciceSeptNumber">Convert euro : </label>
            <input type="number" id="exerciceSeptNumber" name="exerciceSeptNumber">
            <label for="exerciceSeptSelect">To : </label>
            <select name="exerciceSeptSelect" id="exerciceSeptSelect">
                <option value="dollar">Dollar</option>
                <option value="BTC">Bitcoin</option>
                <option value="ETH">Ehtereum</option>
                <option value="DOGE">DOGE</option>
            </select>
            <button>Calculer</button>
            <?php 
            if(!empty($_POST["exerciceSeptNumber"]) && !empty($_POST["exerciceSeptSelect"])){
                $nbr1 = $_POST["exerciceSeptNumber"];
                $selectValue = $_POST["exerciceSeptSelect"];
                switch($selectValue){
                    case $selectValue == "dollar":
                        echo "<h4>".$nbr1."€ vaut ".($nbr1 * 1.05)." Dollars.</h4>";
                        break;
                    case $selectValue == "BTC":
                        echo "<h4>".$nbr1."€ vaut ".($nbr1 * 0.000011)." Bitcoins.</h4>";
                        break;
                    case $selectValue == "ETH":
                        echo "<h4>".$nbr1."€ vaut ".($nbr1 * 0.00028)." Ethereums.</h4>";
                        break;
                    case $selectValue == "DOGE":
                        echo "<h4>".$nbr1."€ vaut ".($nbr1 * 2.49)." Dogecoins.</h4>";
                        break;
                }
            } else{
                echo "Entrez des valeurs.";
            }
        ?>
        </form>
        
        <h2>Exercice 8:</h2>
        <form action="./formulaires.php#formExerciceHuit" method="POST" id="formExerciceHuit">
            <p><?php echo "Quel age a Pedro ?"?></p>
            <input type="radio" name="radioAge" id="radioAge1" value="20">
            <label for="radioAge1">20 ans</label>
            <input type="radio" name="radioAge" id="radioAge2" value="21">
            <label for="radioAge2">21 ans</label>
            <input type="radio" name="radioAge" id="radioAge3" value="22">
            <label for="radioAge3">22 ans</label>
            <input type="radio" name="radioAge" id="radioAge4" value="12">
            <label for="radioAge4">12 ans</label>
            <?php 
                if(!empty($_POST["radioAge"])){
                    $agePedro = $_POST["radioAge"];
                    if($agePedro == "12"){
                        echo "<p class='correct'> EH MON GARS EST JEUNE. </p>";
                        echo "<style> #formExerciceHuit>p.correct{ color: green; } </style>";
                    } else{
                        echo"<p class='incorrect'> Il a pas ".$agePedro." ans nan. Mais 12.</p>";
                        echo "<style> #formExerciceHuit>p.incorrect{ color: red; } </style>";
                    }
                }
            ?>
            <p><?php echo "Quel animal représente le mieux Pedro ?"?></p>
            <input type="radio" name="radioAnimal" id="radioAnimal1" value="lion">
            <label for="radioAnimal1">Le lion</label>
            <input type="radio" name="radioAnimal" id="radioAnimal2" value="gorille">
            <label for="radioAnimal2">Le gorille</label>
            <input type="radio" name="radioAnimal" id="radioAnimal3" value="elephant">
            <label for="radioAnimal3">L'éléphant</label>
            <input type="radio" name="radioAnimal" id="radioAnimal4" value="tetard">
            <label for="radioAnimal4">Le tétard</label>
            <?php 
                if(!empty($_POST["radioAnimal"])){
                    $animalPedro = $_POST["radioAnimal"];
                    if($animalPedro == "tetard"){
                        echo "<p class='correct'> EH MON GARS LE GROS BEBE. </p>";
                        echo "<style> #formExerciceHuit>p.correct{ color: green; } </style>";
                    } else{
                        echo"<p class='incorrect'> C'est pas un ".$animalPedro.", c'est plutôt un gros tetard.</p>";
                        echo "<style> #formExerciceHuit>p.incorrect{ color: red; } </style>";
                    }
                }
            ?>
            <p><?php echo "De quel signe astrologique est Pedro ?"?></p>
            <input type="radio" name="radioSigne" id="radioSigne1" value="dragon">
            <label for="radioSigne1">Dragon</label>
            <input type="radio" name="radioSigne" id="radioSigne2" value="serpent">
            <label for="radioSigne2">Serpent</label>
            <input type="radio" name="radioSigne" id="radioSigne3" value="singe">
            <label for="radioSigne3">Singe</label>
            <input type="radio" name="radioSigne" id="radioSigne4" value="rat">
            <label for="radioSigne4">Rat</label>
            <?php 
                if(!empty($_POST["radioSigne"])){
                    $signePedro = $_POST["radioSigne"];
                    if($signePedro == "rat"){
                        echo "<p class='correct'> EH LE GROS RAT SA MERE. </p>";
                        echo "<style> #formExerciceHuit>p.correct{ color: green; } </style>";
                    } else{
                        echo"<p class='incorrect'> C'est pas un ".$signePedro.", TEMA LA TAILLE DU RAT.</p>";
                        echo "<style> #formExerciceHuit>p.incorrect{ color: red; } </style>";
                    }
                }
            ?>
            <button>Soumettre</button>
            <?php 
                if(!empty($_POST["radioAge"]) && !empty($_POST["radioAnimal"]) && !empty($_POST["radioSigne"])){
                    $animalPedro = $_POST["radioAnimal"];
                    $signePedro = $_POST["radioSigne"];
                    $score = 0;
                    if($agePedro == "12"){
                        $score++;
                    };
                    if($animalPedro == "tetard") {
                        $score++;
                    };
                    if($signePedro == "rat") {
                        $score++;
                    };
                    echo "Ton score est de ".$score."/3";
                } else{
                    echo "Le quizz n'est pas complet.";
                }
            ?>
        </form>
        

        <h2>exercice 9:</h2>
        <form action="./formulaires.php#formExerciceNeuf" id="formExerciceNeuf" method="POST">
            <h4>Trouver le bon nombre entre 1 et 1000: </h4>
            <label for="formNeufNumber"> Choisisez un nombre : </label>
            <input type="number" name="formNeufNumber" id="formNeufNumber">
            <input type="hidden" id="postId" name="postId" value="<?php echo $magicNumber ?>"/>
            <button>Valider</button>
            <?php 
                $post = $_POST["postId"];
                var_dump($_POST);
            ?>
        </form>

        <h2>exercice 10:</h2>
        <form id="formExerciceDix" action="./formulaires.php#formExerciceDix" method="POST" enctype="multipart/form-data">
            <label for="formFile">Uploader une image : </label>
            <input type="file" name="formFile" id="formFile">
            <button>Upload</button>
            <?php 
                $fileName = $_FILES["formFile"]["name"];
                var_dump($fileName);
                $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                var_dump($fileType);
            ?>
            <!-- <?php var_dump($_FILES["formFile"]); ?>
            <?php var_dump($_FILES["formFile"]["type"]); ?>
            <?php pathinfo($_FILES["formFile"]["name"]); ?> -->
        </form> 
    </main>
    <?php include ("footer.php") ?>
    <style>
        html{
            scrollbar-color: grey #313131;
        }
        main{
            padding-left: 16px;
        }
        main>h2{
            text-decoration: underline white;
            font-size: 32px;
            text-transform: uppercase;
            padding-top: 32px;
            padding-bottom: 16px;
        }
        form{
            border: dashed 1px lightgrey;
            border-radius: 2px;
            padding: 16px;
            background-color: white;
        }
    </style>
</body>
</html>