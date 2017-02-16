<?php 
session_start();
if (isset($_SESSION["Logado"])==false) {
    header("Location: Login.php");
}
?>

<!DOCTYPE html>
    <html>
    <head>
        <title>Home Corpus Linguistícos</title>
        <meta http-equiv="Content-Type" content="text/html", charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="style-inicial.css">       
    </head>
    <body>

        <header>
            <p id="logo">Corpus Linguisticos</p><br></br>
        </header>

        <form action="?go=search" method="post">
        <nav>
            <ul>
                <li><a href="Logado.php">Home</a></li>
                <li><a href="Quem-somos.php">Informes</a></li>
                <li><a href="Contato.php">Contatos</a></li>
                <li><a href="Perfil.php">
                <?php
                    echo "".$_SESSION["nome"];
                ?>
                </a>
                    <li><a href="Conta.php">Config</a></li>
                    <li><a href="Deslogar.php">Sair</a></li>
                </li>
                <li><input name="keyword" id="campo-pesquisa" type="text" /></li>
                <label>
                    <input type="submit" name="search" value="Search">
                </label>
            </ul>
        </nav>
        </form>

        <aside>
        </aside>
        
        <section>
            <article>
                <br></br>
                <br></br>
                <?php
                    echo "Seja Bem-Vindo " .$_SESSION["nome"];
                ?>
                </br>
            </article>
        </section>

        <?php

    include "twitteroauth/twitteroauth.php";

    $consumer_key = "CGQ1Er3rmkklEokk343pnyxkd";
    $consumer_secret = "G6tUw8fdhsG3Ge8d5oaTaEz2meqCyrZkYc9vlKKdY9wUAHgVkT";
    $access_token = "2386163342-D2CwrTGH5Dmmyjy4DluDEI733zh3Wo7StOItFM2";
    $access_token_secret = "jC176ARhtgPItxmq8r5BhfG5eAHUW4GHr8Rx9rnqrUEZu";

    $twitter = new TwitterOAuth($consumer_key,$consumer_secret,$access_token,$access_token_secret);

    ?>

    <?php

    if (@$_GET ['go'] == "search"){
        
        $keyword = $_POST['keyword'];

        if(empty($keyword)){
           echo "<script>alert('Preencha Todos os Campos Para Pesquisar!')</script>";

        }else{
        
            if(isset($_POST['keyword'])){
                    
                $tweets = $twitter->get('https://api.twitter.com/1.1/search/tweets.json?q='.$_POST['keyword'].'&result_type=recent&count=50');
                foreach ($tweets->statuses as $key => $tweet) { ?>
                    Tweet : <img src="<?=$tweet->user->profile_image_url;?>" /><?=$tweet->text; ?><br>
                <?php } } } } ?>
        <footer>
            <button type="button" onclick="window.open('Rodape.php');">Rodapé 1</button>
            <button type="button" onclick="window.open('Rodape.php');">Rodapé 2</button>
            <button type="button" onclick="window.open('Rodape.php');">Rodapé 3</button>
            <button type="button" onclick="window.open('Rodape.php');">Rodapé 4</button>
            <button type="button" onclick="window.open('Rodape.php');">Rodapé 5</button>
        </footer>

    </body>
    </html>
