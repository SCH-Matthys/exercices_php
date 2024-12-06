<?php 
    $bdd = new PDO('mysql:host=localhost;dbname=film;charset=utf8', 'root', '');
    $id = $_GET["id"];
    $requestDelete = $bdd->prepare("    DELETE 
                                        FROM fiche_film
                                        WHERE id = ?
    ");
    $requestDelete->execute([$id]);
    header("location:./requestBDD.php");
?>