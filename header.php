<header>
    <nav>
        <ul>
            <li><a href="">accueil</a></li>
            <li><a href="">lien 1</a></li>
            <li><a href="">lien 2</a></li>
            <li><a href="">lien 3</a></li>
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
        padding: 25px;
        background-color: coral;
    }
    ul{
        display: flex;
        justify-content: flex-end;
    }
    li{
        padding-left: 50px;
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