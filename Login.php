<?php
require_once "configurar.php";

?>''

    <html>
    <head>
        <title>Login Corpus Linguistícos</title>
        <meta http-equiv="Content-Type" content="text/html", charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="style-login-cadastro.css">
    </head>
    <body>

        <form action="?go=login" method="post">
            <p id="logo">Corpus Linguistícos</p>
            <div id="wrap">
                <hr>
                <label for="username">
                    Usuário:
                    <input name="username" id="username" type="text" />
                </label>
                
                <label for="password">
                    Senha:
                    <input name="password" id="password" type="password" />
                </label>
                
                <label for="login">
                    <input name="login" id="register" type="submit" value="Login" />
                </label>
                
                <hr>
                <label for="sendpassword">
                    <a href="Redefinir.php">Esqueci Usuário e/ou Senha</a>
                </label>
                
                <label for="autologin">
                    <input name="autologin" id="autologin" tabindex="4" checked="checked" class="radio" type="checkbox" /> Conexão automática
                </label><br></br>
                <a id="register" href="Register.php">Cadastrar-se</a>
            </div>
            <a id="copyrights" href="Index.php">Página Inicial</a>
        </form>
       
    </body>
    </html>

    <?php

    if (@$_GET ['go'] == "login"){
        
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        if(empty($username)){
           echo "<script>alert('Preencha Todos os Campos Para Logar!')</script>";
        }
        elseif(empty($password)){
            echo "<script>alert('Preencha Todos os Campos Para Logar!')</script>";
        }
        else{
            $queryl = @mysql_fetch_row(mysql_query("SELECT * FROM USUARIOS WHERE USERNAME = '$username' AND PASSWORD = '$password'"));
            if($queryl >= 1){
                session_start();
                $_SESSION["Logado"]=true;
                $_SESSION["nome"]=$queryl[1];
                echo "<script>alert('Login Sucessfull!')</script>";
                echo "<meta http-equiv='refresh' content='0, url=Logado.php'>";
            }
            else{
                echo "<script>alert('Usuário e Senha Não Coincidem')</script>";
                echo "<meta http-equiv='refresh' content='0, url=Login.php'>";
            }
        }
    }
?>
