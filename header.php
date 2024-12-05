<header>
    <nav>
        <ul>
            <li><a href="./index.php">accueil</a></li>
            <li><a href="./formulaires.php">Les formulaires</a></li>
            <li><a href="./requestBDD.php">Requetes BDD</a></li>
            <li><a href="./addFilm.php">Ajouter Film</a></li>
        </ul>
    </nav>
</header>

<style>
    *{
        margin: 0px;
        padding: 0px;
        list-style: none;
        text-decoration: none;
    }
    nav{
        padding: 25px 75px;
        background-color: coral;
    }
    ul{
        display: flex;
        justify-content: flex-end;
    }
    li{
        padding-right: 50px;
    }
    nav>ul>li>a{
        text-transform: uppercase;
        font-size: 24px; 
        font-weight: bold;
        color: black
    }
    li:nth-of-type(1){
        margin-right: auto;
    }
    nav>ul>li>a:hover{
        text-decoration: underline red;
    }
</style>