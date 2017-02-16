<?php
	
	session_start();
	unset($_SESSION["Logado"]);
	unset($_SESSION["nome"]);
	session_destroy();
    header("Location: Login.php");

?>
