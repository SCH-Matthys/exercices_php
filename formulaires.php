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
        <form action="./formulaires.php" method="POST">
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
        </form>
        <?php 
            
        ?>
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