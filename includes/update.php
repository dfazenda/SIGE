<?php 
require '../components/core/Class.class.php';
$aluno =  new aluno();
$utilitarios =  new utilitarios();
$funcionario =  new funcionario();
$usuario =  new usuario();
$professor =  new professor();
$gestaoInterna = new gestaoInterna();
 //$sessao  alterar dados do aluno();
if($_POST['controlador'] == md5('alterar_aluno').'f'){//O f so para complicar um pouco o invasor do sistema
   $foto = '';
   if(($_FILES['foto']['size'])>2){
      $tipoDeFicheiro = 'imagem';
      $foto =$utilitarios->upload_ficheiro($_FILES['foto'],$tipoDeFicheiro);
   }
   $id = $_POST['q'];
   $nome = $_POST['nome'];
   $dataDeNascimento = $_POST['dataDeNascimento'];
   $tipoDeDocumento = $_POST['tipoDeDocumento'];
   $numeroDeDocumento = $_POST['numeroDeDocumento'];
   $localDeEmissao = $_POST['localDeEmissao'];
   $data_emissao_doc = $_POST['data_emissao_doc'];
   $sexo = $_POST['sexo'];
   $nacionalidade = $_POST['nacionalidade'];
   $naturalidade = $_POST['naturalidade'];
   $morada = $_POST['morada'];
   $nomeEncarregado = $_POST['nomeEncarregado'];
   $localDeTrabalho = $_POST['localDeTrabalho'];
   $funcao = $_POST['funcao'];
   $email = $_POST['email'];
   $contacto = $_POST['contacto'];
   $contactoAlternativo = $_POST['contactoAlternativo'];
   if(strlen($foto)>2){
    if ($aluno -> updateFoto($id,$foto)==1)
     $aluno->update($id,$nome,$dataDeNascimento,$tipoDeDocumento,$numeroDeDocumento,$localDeEmissao,$data_emissao_doc,$sexo, $nacionalidade, $naturalidade, $morada, $nomeEncarregado, $localDeTrabalho, $funcao, $email, $contacto, $contactoAlternativo);
   } else
      $aluno->update($id,$nome,$dataDeNascimento,$tipoDeDocumento,$numeroDeDocumento,$localDeEmissao,$data_emissao_doc,$sexo, $nacionalidade, $naturalidade, $morada, $nomeEncarregado, $localDeTrabalho, $funcao, $email,$contacto, $contactoAlternativo); 
             
}elseif($_POST['controlador'] == md5('alterar_inscrito').'f'){//O f so para complicar um pouco o invasor do sistema
   $foto = '';
   if(($_FILES['foto']['size'])>2){
      $tipoDeFicheiro = 'imagem';
      $foto =$utilitarios->upload_ficheiro($_FILES['foto'],$tipoDeFicheiro);
   }
   $id = $_POST['q'];
   $nome = $_POST['nome'];
   $dataDeNascimento = $_POST['dataDeNascimento'];
   $tipoDeDocumento = $_POST['tipoDeDocumento'];
   $numeroDeDocumento = $_POST['numeroDeDocumento'];
   $localDeEmissao = $_POST['localDeEmissao'];
   $data_emissao_doc = $_POST['data_emissao_doc'];
   $sexo = $_POST['sexo'];
   $nacionalidade = $_POST['nacionalidade'];
   $naturalidade = $_POST['naturalidade'];
   $morada = $_POST['morada'];
   $nomeEncarregado = $_POST['nomeEncarregado'];
   $localDeTrabalho = $_POST['localDeTrabalho'];
   $funcao = $_POST['funcao'];
   $email = $_POST['email'];
   $contacto = $_POST['contacto'];
   $contactoAlternativo = $_POST['contactoAlternativo'];
   $classe = $_POST['classe'];
   if(strlen($foto)>2){
    if ($aluno -> updateFoto($id,$foto)==1)
     $aluno->update_inscrito($id,$nome,$dataDeNascimento,$tipoDeDocumento,$numeroDeDocumento,$localDeEmissao,$data_emissao_doc,$sexo, $nacionalidade, $naturalidade, $morada, $nomeEncarregado, $localDeTrabalho, $funcao, $email,$contacto, $contactoAlternativo, $classe);
   } else
      $aluno->update_inscrito($id,$nome,$dataDeNascimento,$tipoDeDocumento,$numeroDeDocumento,$localDeEmissao,$data_emissao_doc,$sexo, $nacionalidade, $naturalidade, $morada, $nomeEncarregado, $localDeTrabalho, $funcao, $email,$contacto, $contactoAlternativo, $classe);       
} 

 //$sessao  alterar dados do professor();
 if($_POST['controlador'] == md5('alterar_professor').'f'){//O f so para complicar um pouco o invasor do sistema
    $foto = '';
    if(($_FILES['foto']['size'])>2){
       $tipoDeFicheiro = 'imagem';
       $foto =$utilitarios->upload_ficheiro($_FILES['foto'],$tipoDeFicheiro);
    }
    $id = $_POST['q'];
    $nome = $_POST['nome'];
    $dataDeNascimento = $_POST['dataDeNascimento'];
    $tipoDeDocumento = $_POST['tipoDeDocumento'];
    $numeroDeDocumento = $_POST['numeroDeDocumento'];
    $localDeEmissao = $_POST['localDeEmissao'];
    $data_emissao_doc = $_POST['data_emissao_doc'];
    $sexo = $_POST['sexo'];
    $morada = $_POST['morada'];
    $email = $_POST['email'];
    $contacto = $_POST['contacto'];
    if(strlen($foto)>2){
    if ($professor -> updateFoto($id,$foto)==1)
     $professor->update($id,$nome,$dataDeNascimento,$tipoDeDocumento,$numeroDeDocumento,$localDeEmissao,$data_emissao_doc,$sexo,$morada,$email,$contacto);
   } else
      $professor->update($id,$nome,$dataDeNascimento,$tipoDeDocumento,$numeroDeDocumento,$localDeEmissao,$data_emissao_doc,$sexo,$morada,$email,$contacto); 
 } 


  //$sessao  alterar dados do funcionario();
 if($_POST['controlador'] == md5('alterar_funcionario').'f'){//O f so para complicar um pouco o invasor do sistema
    $foto = '';
    if(($_FILES['foto']['size'])>2){
       $tipoDeFicheiro = 'imagem';
       $foto =$utilitarios->upload_ficheiro($_FILES['foto'],$tipoDeFicheiro);
    }
    $id = $_POST['q'];
    $nome = $_POST['nome'];
    $dataDeNascimento = $_POST['dataDeNascimento'];
    $tipoDeDocumento = $_POST['tipoDeDocumento'];
    $numeroDeDocumento = $_POST['numeroDeDocumento'];
    $localDeEmissao = $_POST['localDeEmissao'];
    $data_emissao_doc = $_POST['data_emissao_doc'];
    $sexo = $_POST['sexo'];
    $morada = $_POST['morada'];
    $email = $_POST['email'];
    $contacto = $_POST['contacto'];
    if(strlen($foto)>2){
    if ($funcionario -> updateFoto($id,$foto)==1)
     $funcionario->update($id,$nome,$dataDeNascimento,$tipoDeDocumento,$numeroDeDocumento,$localDeEmissao,$data_emissao_doc,$sexo,$morada,$email,$contacto);
   } else
      $funcionario->update($id,$nome,$dataDeNascimento,$tipoDeDocumento,$numeroDeDocumento,$localDeEmissao,$data_emissao_doc,$sexo,$morada,$email,$contacto); 
 } elseif($_POST['controlador'] == md5('alterar_dados_do_perfil').'f'){//O f so para complicar um pouco o invasor do sistema
   $foto = '';
   if(($_FILES['foto']['size'])>2){
      $tipoDeFicheiro = 'imagem';
      $foto =$utilitarios->upload_ficheiro($_FILES['foto'],$tipoDeFicheiro);
   }
   $id = $_POST['q'];
   $morada = $_POST['morada'];
   $email = $_POST['email'];
   $contacto = $_POST['contacto'];
   if($_SESSION['nivelAcesso'] == 1 || $_SESSION['nivelAcesso'] == 2)
   $entidade = new funcionario();
   if($_SESSION['nivelAcesso'] == 3)
   $entidade = new professor();
   if($_SESSION['nivelAcesso'] == 4)
   $entidade = new aluno();
   if(strlen($foto)>2){
   if ($entidade -> updateFoto($id,$foto)==1)
    $entidade->updateDadosPerfil($id,$morada,$email,$contacto);
  } else
     $entidade->updateDadosPerfil($id,$morada,$email,$contacto); 
}

 if($_POST['controlador'] == md5('alterar_estado_aluno').'f'){
     $id = $_POST['id'];
     $estado = $_POST['estado'];
     $estado = ($estado=='activo') ? 'inactivo' : 'activo';
     $aluno->alterarEstado($id,$estado); 
}elseif($_POST['controlador'] == md5('alterar_estado_funcionario').'f'){
   $id = $_POST['id'];
   $estado = $_POST['estado'];
   $estado = ($estado=='activo') ? 'inactivo' : 'activo';
   $funcionario->alterarEstado($id,$estado); 
}elseif($_POST['controlador'] == md5('alterar_estado_professor').'f'){
   $id = $_POST['id'];
   $estado = $_POST['estado'];
   $estado = ($estado=='activo') ? 'inactivo' : 'activo';
   $professor->alterarEstado($id,$estado); 
}elseif($_POST['controlador'] == md5('alterar_estado_usuario').'f'){
   $id = $_POST['id'];
   $estado = $_POST['estado'];
   $estado = ($estado=='activo') ? 'inactivo' : 'activo';
   $usuario->alterarEstado($id,$estado); 
}elseif($_POST['controlador'] == md5("alterar_tema")."f"){
   $usuario->alterar_tema(); 

}elseif($_POST['controlador'] == 'alterar_senha'){
   $senha = $_POST['senha'];
   $usuario->alterar_senha($senha); 

}elseif($_POST['controlador'] == md5('editar_turma').'f'){//O f so para complicar um pouco o invasor do sistema
   $nome = $_POST['nome'];
   $turma = $_POST['turma'];
   $gestaoInterna->editarTurma($nome, $turma);
}elseif($_POST['controlador'] == md5('editar_classe').'f'){//O f so para complicar um pouco o invasor do sistema
   $nome = $_POST['nome'];
   $gestaoInterna->editarClasse($nome);
}elseif($_POST['controlador'] == md5('editar_sala').'f'){//O f so para complicar um pouco o invasor do sistema
   $id = $_POST['id'];
   $nome = $_POST['nome'];
   $gestaoInterna->editarSala($nome,$id);
}elseif($_POST['controlador'] == md5('pagar_mensalidade').'f'){//O f so para complicar um pouco o invasor do sistema
   $valorMensalidade = $_POST['valorMensalidade'];
   $gestaoInterna->pagarMensalidade($valorMensalidade);
}



?>



