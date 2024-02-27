<?php 
// Função para estabelecer conexão com o banco de dados
function conectar()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sige";

    $connectdb = new mysqli($servername, $username, $password, $dbname);

    if ($connectdb->connect_error) {
        die("Falha na conexão: " . $connectdb->connect_error);
    }

    return $connectdb;
}
?>
