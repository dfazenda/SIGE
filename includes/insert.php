<?php 
require '../components/core/Class.class.php';
$aluno =  new aluno();
$utilitarios =  new utilitarios();
$usuario =  new usuario();
$funcionario =  new funcionario();
$professor =  new professor();
$gestaoInterna = new gestaoInterna();


 //$sessao  insert();
if($_POST['controlador'] == md5('inserir_aluno').'f'){//O f so para complicar um pouco o invasor do sistema
   $foto = '../components/assets/images/user.png';
   $notaInformativa = '';
   $anexoDocumento = '';
   if(($_FILES['foto']['size'])>2){
      $tipoDeFicheiro = 'imagem';
      $foto =$utilitarios->upload_ficheiro($_FILES['foto'],$tipoDeFicheiro);
   }
  
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
   $aluno->insert( $nome,$dataDeNascimento,$tipoDeDocumento,$numeroDeDocumento,$localDeEmissao,$data_emissao_doc,$sexo,$morada,$email,$contacto,$foto);
}elseif($_POST['controlador'] == md5('inserir_inscricao').'f'){//O f so para complicar um pouco o invasor do sistema
   $foto = '../components/assets/images/user.png';
   $notaInformativa = '';
   $anexoDocumento = '';
   if(($_FILES['foto']['size'])>2){
      $tipoDeFicheiro = 'imagem';
      $foto =$utilitarios->upload_ficheiro($_FILES['foto'],$tipoDeFicheiro);
   }
      if(($_FILES['notaInformativa']['size'])>2){
      $tipoDeFicheiro = 'docs';
      $notaInformativa =$utilitarios->upload_ficheiro($_FILES['notaInformativa'],$tipoDeFicheiro);
   }
     if(($_FILES['anexoDocumento']['size'])>2){
      $tipoDeFicheiro = 'docs';
      $anexoDocumento =$utilitarios->upload_ficheiro($_FILES['anexoDocumento'],$tipoDeFicheiro);
   }

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
   $interno = $_POST['interno'];
   
   $aluno->insert_inscricao($nome,$dataDeNascimento,$tipoDeDocumento,$numeroDeDocumento,$localDeEmissao,$data_emissao_doc,$sexo, $nacionalidade, $naturalidade, $morada, $nomeEncarregado, $localDeTrabalho, $funcao, $email,$contacto, $contactoAlternativo,$foto,$classe,$interno,$notaInformativa,$anexoDocumento);
}elseif($_POST['controlador'] == md5('matricular_aluno').'f'){//O f so para complicar um pouco o invasor do sistema
   $url_comprovativo = '';
   if(($_FILES['url_comprovativo']['size'])>2){
      $tipoDeFicheiro = 'doc';
      $url_comprovativo =$utilitarios->upload_ficheiro($_FILES['url_comprovativo'],$tipoDeFicheiro);
   }
   $stamp = $_POST['stamp'];
   $nRecibo = $_POST['nRecibo'];
   $turma = $_POST['turma'];
   $classe = $_POST['classe'];
   $valorMatricula = $_POST['valorMatricula'];
   $valorMensalidade = $_POST['valorMensalidade'];
   $aluno->insert_matricula($stamp, $turma,  $classe, $nRecibo, $url_comprovativo, $valorMatricula, $valorMensalidade);
}elseif($_POST['controlador'] == md5('inserir_funcionario').'f'){//O f so para complicar um pouco o invasor do sistema
   $foto = '../components/assets/images/user.png';
   if(($_FILES['foto']['size'])>2){
      $tipoDeFicheiro = 'imagem';
      $foto =$utilitarios->upload_ficheiro($_FILES['foto'],$tipoDeFicheiro);
   }
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
   $funcionario->insert( $nome,$dataDeNascimento,$tipoDeDocumento,$numeroDeDocumento,$localDeEmissao,$data_emissao_doc,$sexo,$morada,$email,$contacto,$foto);
}elseif($_POST['controlador'] == md5('inserir_professor').'f'){//O f so para complicar um pouco o invasor do sistema
   $foto = '../components/assets/images/user.png';
   if(($_FILES['foto']['size'])>2){
      $tipoDeFicheiro = 'imagem';
      $foto =$utilitarios->upload_ficheiro($_FILES['foto'],$tipoDeFicheiro);
   }
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
   $professor->insert( $nome,$dataDeNascimento,$tipoDeDocumento,$numeroDeDocumento,$localDeEmissao,$data_emissao_doc,$sexo,$morada,$email,$contacto,$foto);
}elseif($_POST['controlador'] == md5('inserir_classe').'f'){//O f so para complicar um pouco o invasor do sistema
   $nome = $_POST['nome'];
   $gestaoInterna->insertClass( $nome);
}elseif($_POST['controlador'] == md5('inserir_turma').'f'){//O f so para complicar um pouco o invasor do sistema
   $nome = $_POST['nome'];
   $classe = $_POST['classe'];
   $nrMinAluno = $_POST['nrMinAluno'];
   $nrMaxAluno = $_POST['nrMaxAluno'];
   $ano = $_POST['ano'];
   $gestaoInterna->insertTurma($nome, $classe, $nrMinAluno, $nrMaxAluno, $ano);
}elseif($_POST['controlador'] == md5('inserir_disciplina').'f'){//O f so para complicar um pouco o invasor do sistema
   $nome = $_POST['nome'];
   //$classe = $_POST['classe'];
   $gestaoInterna->insertDisciplina($nome);
}elseif($_POST['controlador'] == md5('inserir_sala').'f'){//O f so para complicar um pouco o invasor do sistema
   $nome = $_POST['nome'];
   $gestaoInterna->insertSala($nome);
}elseif($_POST['controlador'] == md5('criar_usuario').'f'){//O f so para complicar um pouco o invasor do sistema
   $email = $_POST['email'];
   $nivelAcesso = $_POST['nivelAcesso'];
   $stamp = $_POST['stamp'];
   $usuario->insertUsuario($email, $nivelAcesso,$stamp);
}elseif($_POST['controlador'] == md5('pagar_mensalidade').'f'){
   $url_comprovativo = '';
   if(($_FILES['url_comprovativo']['size'])>2){
      $tipoDeFicheiro = 'doc';
      $url_comprovativo =$utilitarios->upload_ficheiro($_FILES['url_comprovativo'],$tipoDeFicheiro);
   }
    @$stampAluno = $_POST["stampAluno"];
    $nomeMes = $_POST["nomeMes"];
    $tipoPagamento = $_POST["tipoPagamento"];
    $nrDoRecibo = $_POST["nrDoRecibo"];
    $dataDeDeposito = $_POST["dataDeDeposito"];
    $valorMensalidade = $_POST["valorMensalidade"];
    $diasDeAtraso = $_POST["diasDeAtraso"];
    $multa = $_POST["multa"];
    $gestaoInterna->pagarMensalidade(@$stampAluno, $nomeMes, $tipoPagamento, $nrDoRecibo, $dataDeDeposito, $url_comprovativo, $valorMensalidade, $diasDeAtraso, $multa);
}elseif($_POST['controlador'] == md5('atribuir_professor').'f'){//O f so para complicar um pouco o invasor do sistema
   $turma = $_POST['turma'];
   $classe = $_POST['classe'];
   $professorStamp = $_POST['professorStamp'];
   $professor = $_POST['professor'];
   $disciplina = $_POST['disciplina'];
   $sala = $_POST['sala'];
   $gestaoInterna->atribuirProfessor($professorStamp, $professor, $disciplina, $classe, $turma, $sala);
}



?>



