<?php 
require '../components/core/Class.class.php';
$sessao =  new sessao();

 //$sessao ->insert();
if($_POST['controlador'] == md5('valida_login').'f'){//O f so para complicar um pouco o invasor do sistema
   $usuario = $_POST['usuario'];
   $senha = $_POST['senha'];
   $sessao->valida_login($usuario, $senha);//Ate aqui tudo Ok

} 

?>
