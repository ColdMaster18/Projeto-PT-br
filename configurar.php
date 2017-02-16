<meta http-equiv="Content-Type" content="text/html, charset=utf-8">

<?php
$conexao = @mysql_connect("localhost", "root", "") or die ("Não foi possivl conectar com o servidor");
mysql_select_db("register",$conexao) or die ("Banco de dados não localizado")

?>;
