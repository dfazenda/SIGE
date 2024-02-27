<?php 
require '../components/core/Class.class.php';
$sessao =  new sessao();
$usuario =  new usuario();

 //$sessao ->insert();
if($_POST['controlador'] == md5('pedido_de_senha').'f'){//O f so para complicar um pouco o invasor do sistema
   $usuario = $_POST['usuario'];
   $sessao->pedido_de_senha($usuario);//Ate aqui tudo Ok

}elseif($_POST['controlador'] == md5('redefinir_senha').'f'){//O f so para complicar um pouco o invasor do sistema
   $email = $_POST['usuario'];
   $senha = $_POST['senha'];
   $usuario->redefinir_senha($email,$senha);//Ate aqui tudo Ok 

} 

?>
