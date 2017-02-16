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
                <!-- --> <li><input name="campo-pesquisa" id="campo-pesquisa" type="text" /></li>
                <button type="button" onclick="window.open('Pesquisar.php');">Pesquisar</button>
                <button type="button" onclick="window.open('pesquisa.php');">pesquisa</button>
            </ul>
        </nav>

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

        <footer>
            <button type="button" onclick="window.open('Rodape.php');">Rodapé 1</button>
            <button type="button" onclick="window.open('Rodape.php');">Rodapé 2</button>
            <button type="button" onclick="window.open('Rodape.php');">Rodapé 3</button>
            <button type="button" onclick="window.open('Rodape.php');">Rodapé 4</button>
            <button type="button" onclick="window.open('Rodape.php');">Rodapé 5</button>
        </footer>

    </body>
    </html>
