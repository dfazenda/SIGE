<?php 
require '../components/core/Class.class.php';
$gestaoInterna = new gestaoInterna();
$aluno = new aluno();
if($_POST['controlador'] == 'buscarTurma'){//O f so para complicar um pouco o invasor do sistema
   $classe = $_POST['classe'];
   $gestaoInterna->listaDeTurmasSelect($classe);

}elseif($_POST['controlador'] == md5('buscar_aluno').'f'){
   $q = $_POST['buscaAluno'];
   $aluno ->buscarAluno($q);
}elseif($_POST['controlador'] == md5('consultar_inscricao').'f'){
   $q = $_POST['buscaAluno'];
   $aluno ->consultarInscricao($q);
}elseif($_POST['controlador'] == md5('pagar_mensalidade').'f'){
   $q = $_POST['nome'];
   $gestaoInterna ->mensalidade($q);
}

?>
