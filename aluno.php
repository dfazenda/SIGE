<?php
if (!isset($_SESSION)) {
    session_start();
}

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "sige";

try {
    $conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);
    //echo "Conexao com sucesso!";
} catch (PDOException $err) {
    echo "Erro: Falha na conexao com base de dados" . $err->getMessage();
}

if (isset($_POST['recibo'])) {
    $nrDoRecibo = $_POST['recibo'];

  
}else{
    echo "Aluno não encontrado."
}
?>
