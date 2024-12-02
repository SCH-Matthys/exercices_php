<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include ("header.php")?>
    <main>
        <h2>Exercice 1:</h2>
        <?php 
            for ( $i=1; $i <= 25; $i++){
                echo $i;
            }
        ?>

        <h2>Exercice 2:</h2>  
        <?php
            $i = 1;
            while ( $i <= 25){
                echo $i;
                $i ++;
            }
        ?>

        <h2>Exercice 3:</h2>  
        <?php
            for ( $j=1; $j <= 25; $j++){
                for ($i =1; $i <= $j; $i++){
                    echo $i;
                }
                echo "<br>";
            }
        ?>

        <h2>Exercice 4:</h2>  
        <?php
            $cumul = 0;
            for ( $i = 1; $i <= 30; $i++){
                $cumul += $i;
            }
            echo $cumul;
        ?>

        <h2>Exercice 5:</h2>  
        <?php
            $number = 18;
            function EstPair($nbr){
                if ($nbr % 2 == 0) {
                    return true;
                } else{
                    return false;
                }
            }
            if(EstPair($number)){
                echo $number. " est pair.";
            } else {
                echo $number. " n'est pas pair.";
            }
        ?>

        <h2>Exercice 6:</h2>  
        <?php
            for ( $i = 1; $i <= 20; $i++){
                if(EstPair($i)){
                    echo $i. " ";
                }
            }
        ?>

        <h2>Exercice 7:</h2>  
        <?php
        $b = 4;
        $c = 6;
        function Pythagore($a,$b){
            $c = sqrt(($a * $a) + ($b * $b));
            echo "Dans un triangle recangle, si b vaut " .$a. " et c vaut " .$b. " alors l'hypothénuse a vaut environ " .$c;
        }
        Pythagore($b,$c);
        ?>

        <h2>Exercice 8:</h2>  
        <?php
        $heureGlobale = time();
        $heureH = date( "H", $heureGlobale);
        echo "Il est actuellement ";
        echo date( "H:i:s", $heureGlobale);
        echo "<br>";
        if ( $heureH < 12 && $heureH > 4){
            echo "On est le matin.";
        } elseif ( $heureH > 12 && $heureH < 18){
            echo "On est l'après midi.";
        } else {
            echo "On est le soir.";
        }
        ?>

        <h2>Exercice 9:</h2>  
        <?php
            $number = 16;
            echo EstPair($number) ? $number . " est pair." : $number . " n'est pas pair.";
            echo  "<br>";
            $number2 = 13;
            echo EstPair($number2) ? $number2 . " est pair." : $number2 . " n'est pas pair.";
        ?>

        <h2>Exercice 10:</h2>  
        <?php
            for ($i = 1; $i<= 100; $i++){
                if ( $i % 5 == 0 && $i % 3 == 0){
                    echo $i . " FOOBAR";
                    echo "<br>";
                } elseif ( $i % 3 == 0){
                    echo $i . " FOO";
                    echo "<br>";
                } elseif ( $i % 5 == 0){
                    echo $i . " BAR";
                    echo "<br>";
                } else {
                    $i;
                }
            }
        ?>

        <h2>Exercice 11:</h2>  
        <?php
            $identitePersonne = [
                "nom" => "Croft",
                "prenom" => "Lara",
                "metier" => "Archéologue"
            ];
            echo "<h1> C'est un plaisir de vous voir " .$identitePersonne["prenom"]. " " .$identitePersonne["nom"]. "!". "(" .$identitePersonne["metier"]. ") </h1>"
        ?>

        <h2>Exercice 12:</h2>  
        <?php
            $fighters=['Zelda','Samus','Bowser','Peach','Lucina'] ;
            foreach($fighters as $fighter){
                if ( strlen($fighter) >= 6 ){
                    echo $fighter;
                    echo "<br>";
                }
            }
        ?>

        <h2>Exercice 13:</h2>   
        <?php
            $tableau = [
                10, 12, 5, 98, 555, 4, 6, 80, 89, 16
            ];
            echo min($tableau) . " est la plus petite valeur du tableau.";
        ?>

        <h2>Exercice 14:</h2>   
        <?php
            $tableau = [
                10, 12, 5, 98, 555, 4, 6, 80, 89, 16
            ];
            sort($tableau);
            foreach( $tableau as $value){
                echo $value . " ";
            }
        ?>

        <h2>Exercice 15:</h2>   
        <table>
            <?php
                for ( $j=1; $j <= 9; $j++){
                    echo "<tr>";
                    for ($i =1; $i <= 9; $i++){
                        echo "<td>".($i * $j)."</td>";
                    }
                    echo "</tr>";
                }
            ?>
        </table>
        <style>
            html{
                scrollbar-color: white #313131;
            }
            main{
                background-color: #393939;
                color: white;
                padding-left: 16px;
            }
            main>h2{
                text-decoration: underline white;
                font-size: 32px;
                text-transform: uppercase;
                padding-top: 32px;
                padding-bottom: 16px;
            }
            /* ///////////////////////////////////// */
            table{
                border: solid 2px black;
            }
            tr,td{
                border: solid 1px black;
            }
        </style>
    </main>  
    <?php include ("footer.php")?>
</body>
</html>