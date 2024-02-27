<?php

if (!isset($_SESSION)) {
	session_start();
}
// unset(): Remove todas as variaveis para quebrara sessao
unset($_SESSION['activa'],$_SESSION['id_usuario'],$_SESSION['usuario'],$_SESSION['nome_usuario']); 
header('location: login.php');