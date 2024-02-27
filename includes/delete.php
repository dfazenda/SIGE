<?php 
require '../components/core/Class.class.php';
$aluno =  new aluno();
$utilitarios =  new utilitarios();
$funcionario =  new funcionario();
$usuario =  new usuario();
$professor =  new professor();
$gestaoInterna = new gestaoInterna();

if($_POST['controlador'] == md5('eliminar_turma').'f'){//O f so para complicar um pouco o invasor do sistema
   $turma = $_POST['turma'];
   $gestaoInterna->eliminarTurma($turma);
}elseif($_POST['controlador'] == md5('eliminar_classe').'f'){//O f so para complicar um pouco o invasor do sistema
   $classe = $_POST['classe'];
   $gestaoInterna->eliminarClasse($classe);

}elseif($_POST['controlador'] == md5('eliminar_funcionario').'f'){//O f so para complicar um pouco o invasor do sistema
   $funcionario = $_POST['funcionario'];
   $gestaoInterna->eliminarFuncionario($funcionario);

}elseif($_POST['controlador'] == md5('eliminar_professor').'f'){//O f so para complicar um pouco o invasor do sistema
   $professor = $_POST['professor'];
   $gestaoInterna->eliminarProfessor($professor);

}elseif($_POST['controlador'] == md5('eliminar_aluno').'f'){//O f so para complicar um pouco o invasor do sistema
   $aluno = $_POST['aluno'];
   $gestaoInterna->eliminarAluno($aluno);

}elseif($_POST['controlador'] == md5('eliminar_usuario').'f'){//O f so para complicar um pouco o invasor do sistema
   $usuario = $_POST['usuario'];
   $gestaoInterna->eliminarUsuario($usuario);
}elseif($_POST['controlador'] == md5('eliminar_sala').'f'){//O f so para complicar um pouco o invasor do sistema
   $sala = $_POST['sala'];
   $gestaoInterna->eliminarSala($sala);

}elseif($_POST['controlador'] == md5('eliminar_mensalidade').'f'){//O f so para complicar um pouco o invasor do sistema
   $nomeMes = $_POST['nomeMes'];
   $stampAluno = $_POST['stampAluno'];
   $gestaoInterna->eliminarMensalidade($nomeMes, $stampAluno);

}
?>



