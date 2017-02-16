<?php
require_once "configurar.php";
?>

<html>
<head>
    <title>Cadastro Corpus Linguistícos</title>
    <meta http-equiv="Content-Type" content="text/html", charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="style-login-cadastro.css">

</head>
<body>
    <form action="?go=cadastrar" method="post">
        <p id="logo">Corpus Linguistícos</p></br>
        <div id="wrap">
            <p id="logo">Dados Cadastrais</p></br>
            
            <hr>
            <label for="name">
                Nome: <input name="name" id="name" type="text" maxlength="15" />
            </label>

            <label for="sobrenome">
                Sobrenome: <input name="sobrenome" id="sobrenome" type="text" maxlength="30" />
            </label>

            <hr>
            <label for="username">
                Usuário: <input name="username" id="username" type="text" maxlength="20" />
            </label>

            <label for="senha">
                Senha: <input name="senha" id="senha" type="password" maxlength="99" />
            </label>
            
            <hr>
            <label for="email">
                Email: <input name="email" id="email" type="email" maxlength="50" />
            </label>

            <hr>
            <a id="register" href="Login.php">Cancelar</a>
            <label for="submit">
                <input name="submit" id="register" type="submit" value="Cadastrar" />
            </label>
        </div>
        <a id="copyrights" href="Index.php">Página Inicial</a>
    </form>
       
</body>
</html>

<?php
if(@$_GET['go'] == 'cadastrar'){
    
    $name = $_POST['name'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['senha'];

    if(empty($name)){
        echo "<script>alert('Preencha todos os campos para se cadastrar')</script>";
    }
    elseif(empty($sobrenome)){
        echo "<script>alert('Preencha todos os campos para se cadastrar')</script>";
    }
    elseif(empty($email)){
        echo "<script>alert('Preencha todos os campos para se cadastrar')</script>";
    }
    elseif(empty($username)){
        echo "<script>alert('Preencha todos os campos para se cadastrar')</script>";
    }
    elseif(empty($password)){
        echo "<script>alert('Preencha todos os campos para se cadastrar')</script>";
    }
    else{
        $queryl = @mysql_fetch_row(mysql_query("SELECT * FROM USUARIOS WHERE username = '$username'"));
        if ($queryl>=1) {
            echo "<script>alert('Usuário já Existe!')</script>";
        }
        else{
            mysql_query("insert into usuarios (nome, sobrenome, email, username, password) values ('$name', '$sobrenome', '$email', '$username', '$password')");
            echo "<script>alert('Usuário Cadastrado com Sucesso')</script>";
            echo "<meta http-equiv='refresh' content='0, url=Login.php'>";
        }
    }
}
?>
