<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "sige";

try{
	$conn = new PDO("mysql:host=$host;dbname=" .$dbname, $user, $pass);
	//echo "Conexao com sucesso!";
}catch(PDOException $err){
   echo "Erro: Falha na conexao com base de dado" . $err->getMessage();
}


?>