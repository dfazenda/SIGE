<?php
if (!isset($_SESSION))
{
    session_start();
}

//Importar biblioteca de emails
// require 'path/to/phpmailer/PHPMailerAutoload.php';
use PHPMailer\PHPMailer\PHPMailer;
require_once "\PHPMailer/src/PHPMailer.php";
require_once "\PHPMailer/src/SMTP.php";
require_once "\PHPMailer/src/Exception.php";


//Conexao com Base de Dados

abstract class conexao
{
    public function connect()
    {

        try
        {
            $pdo = new PDO("mysql:host=localhost;dbname=sige;charset=utf8", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }
        catch(PDOException $e)
        {
            $arr = array(
                "success" => 0,
                "msg" => "Connection Error ! " . $e->getMessage()
            );
            echo json_encode($arr);
        }
    }
}
//Fim conexao com base de dados

//Criando funcao para validar dados do usuario
class sessao extends conexao
{

    //Funcao que gera senha automaticamente em PHP
    public function gerarSenha(){
        $caracteres_validos = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789$%@";
        $senha = "";
        for($i = 0; $i < 10; $i++){
            $index = rand(0, strlen($caracteres_validos) - 1);
            $senha .=$caracteres_validos[$index];
        }
        return $senha;
    }



    public function url()
    {
        if (isset($_SERVER['HTTPS'])){
            $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
        }else{
            $protocol = 'http';
        }
        //return $protocol . ".//" .$_SERVER['HTTP_HOST'] .$_SERVER['REQUEST_URL'];
        return $protocol ."://" .$_SERVER['HTTP_HOST']."/sige/";
    }


    function mailBoasVindas($nome, $valor, $banco, $conta, $titular, $endereco, $email, $telefone){
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;

        $html = '
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8">
            <title>Bem vindo ao Colégio ILIA</title>
        </head>
        <body style="font-family: Arial, sans-serif; font-size: 16px;">
            <h2>Bem vindo ao Colégio ILIA</h2>
            <p>Prezado(a) '.$nome.', </p>
            <p>É com grande satisfação que lhe damos boas vindas à nossa escola. Agradecemos a sua inscrição que ela foi efectuada com sucesso </p>
            <p>Para efectuar o pagamento, primeiro veja o valor da matricula e mensalidade da sua classe, depois poderá efectuar o depósito ou transferência na seguinte conta Bancária: </p>
            <ul>
                <li><strong>Banco:</strong> '.$banco.'</li>  
                <li><strong>Número da conta:</strong> '.$conta.'</li>    
                <li><strong>Titular da conta:</strong> '.$titular.'</li> 
            </ul>
            <p>Após o depósito, é necessário apresentar o comprovativo de pagamento na secretaria da escola, localizada no Bairro de Magoanine B - CMC</p>
            <p>Caso necessite de ajuda ou tenha alguma dúvida, por favor entre em contacto conosco através do e-mail '.$email.' ou do telefone 5436 9546</p>
            <p>Agradecemos novamente pela sua inscrição e estamos ansiosos para recebê-lo(a) em breve em nossa escola.</p>
            <p>Atenciosamente,</p>
            <p>Equipe da Escola</p>

        </body>
        </html>


        ';
        return $html;
    }


 //var_dump();


     public function corpo_email_confirmacao_inscricaoVersaoOriginal($email,$senha, $interno){
        $html   ="";
        $html .="   <!DOCTYPE html> ";
        $html .="   <html> ";
        $html .="   <head> ";
        $html .="   <title>Bem vindo(a) ao ILIA-SIGE</title> ";
        $html .="   <style> ";
        $html .="   body{ ";
        $html .="   font-family: helvetica, sans-serif ";
        $html .="   background-color: #f7f7f7; ";
        $html .="   } ";
        $html .=" ";
        $html .="   .container{ ";
        $html .="   max-width:600px; ";
        $html .="   margin: 0 auto; ";
        $html .="   background-color: #fff; ";
        $html .="   box-shadow: 0 0 10px rgbO(0, 0, 0, 1); ";
        $html .="   border-radius: 8px; ";
        $html .="   } ";
        $html .=" ";
        $html .="   h1{ ";
        $html .="   font-size: 24px; ";
        $html .="   margin-top: 0; ";
        $html .="   } ";
        $html .=" ";
        $html .="   p{ ";
        $html .="   font-size: 16px; ";
        $html .="   line-height: 1.5px; ";
        $html .="   margin-bottom: 20px; ";
        $html .="  } ";
        $html  .=" ";
        $html  .="  .login-info { ";
        $html  .="   border-top: 1px solid #ccc; ";
        $html  .="   padding-top: 20px ";
        $html  .="  }";
        $html  .=" ";
        $html  .="  .login-info p{ ";
        $html  .="   margin-bottom: 10px; ";
        $html  .=" } ";
        $html  .=" ";
        $html  .="  .login-info p:last-child{ ";
        $html  .="  margin-bottom: 0; ";
        $html  .=" } ";
        $html  .=" ";
        $html  .="  btn{ ";
        $html  .="  display: inline-block ";
        $html  .="  background-color: # 007bff; ";
        $html  .="  color: #fff; ";
        $html  .="  border:none; ";
        $html  .="  padding: 10px 20px; ";
        $html  .="  border-radius: 4px; ";
        $html  .="  text-decoration: none; ";
        $html  .="  font-size: 16px; ";
        $html  .="  cursor: pointer; ";
        $html  .=" } ";
        $html  .=" ";
        $html .= "  .btn:hover{ ";
        $html .= "   background-color: #0069d9 ";
        $html .= "   } ";
        $html .= "  </style> ";
        $html .= "   </head> ";
        $html .= "   <body> ";
        $html .= "   <div class='container'> ";
        $html .= "   <h1>Bem vindo(a) ao nosso sistema!</h1> ";
        if($interno != 1){
            $html .= "   <p>A sua inscrdição foi confirmada com sucesso. Você pode acessar o sistema usando o seu e-mail e a senha gerada automaticamente pelo sistema.</p> ";
            $html .= "   <div class='login-info'> ";
            $html .= "   <p><strong>E-mail:</strong>".$email." </p> ";
            $html .= "   <p><strong>Senha:</strong>".$senha." </p> ";
            $html .= "   </div> ";
        }else{
            $html .= "   <p>A sua inscrdição foi confirmada com sucesso!.";
        }
        $html .= "   <p>Clique no botão abaixo para acessar o sistema</p> ";
        $html .= "   <a href='". self::url() ."' class='btn' style='color:#fff;'>Acessar o sistema</a> ";
        $html .= "   </br></br> ";
        $html .= "   <p>Agradecemos novamente pela sua inscrição e estamos ansiosos para recebe-lo(a) em breve em nossa escola</p> ";
        $html .= "   <p>Atenciosamnte,</p> ";
        $html .= "   <p>Equipe da escola</p> ";
        $html .= "   </div>" ;
        $html .= "   </body> ";
        $html .= "   </html> ";
        $html .= " ";

        return $html;


    }

    public function corpo_email_confirmacao_inscricao($email,$senha, $interno){
        $html = "";
        $html .= "<!DOCTYPE html>";
        $html .= "<html>";
        $html .= "<head>";
        $html .= "<style>";
        $html .= "body{";
        $html .= "font-family: helvetica, sans-serif;";
        $html .= "background-color: #f7f7f7;";
        $html .= "}";
        $html .= "";
        $html .= ".container{";
        $html .= "max-width: 600px;";
        $html .= "margin: 0 auto;";
        $html .= "background-color: #fff;";
        $html .= "box-shadow: 0 0 10px rgba(0, 0, 0, 1);";
        $html .= "border-radius: 8px;";
        $html .= "}";
        $html .= "";
        $html .= "h1{";
        $html .= "font-size: 24px;";
        $html .= "margin-top: 0;";
        $html .= "}";
        $html .= "";
        $html .= "p{";
        $html .= "font-size: 16px;";
        $html .= "line-height: 1.5;";
        $html .= "margin-bottom: 20px;";
        $html .= "}";
        $html .= "";
        $html .= ".login-info {";
        $html .= "border-top: 1px solid #ccc;";
        $html .= "padding-top: 20px;";
        $html .= "}";
        $html .= "";
        $html .= ".login-info p{";
        $html .= "margin-bottom: 10px;";
        $html .= "}";
        $html .= "";
        $html .= ".login-info p:last-child{";
        $html .= "margin-bottom: 0;";
        $html .= "}";
        $html .= "";
        $html .= ".btn{";
        $html .= "display: inline-block;";
        $html .= "background-color: #007bff;";
        $html .= "color: #fff;";
        $html .= "border: none;";
        $html .= "padding: 10px 20px;";
        $html .= "border-radius: 4px;";
        $html .= "text-decoration: none;";
        $html .= "font-size: 16px;";
        $html .= "cursor: pointer;";
        $html .= "}";
        $html .= "";
        $html .= ".btn:hover{";
        $html .= "background-color: #0069d9;";
        $html .= "}";
        $html .= "</style>";
        $html .= "</head>";
        $html .= "<body>";
        $html .= "<div class='container'>";
        $html .= "<center><h1>Bem vindo(a) ao nosso sistema ILIA-SIGE!</h1></center>";
        if ($interno != 1) {
            $html .= "<p>A sua inscrição foi confirmada com sucesso. Você pode acessar o sistema usando o seu e-mail e a senha gerada automaticamente pelo sistema.</p>";
            $html .= "<div class='login-info'>";
            $html .= "<p><strong>E-mail:</strong>" . $email . "</p>";
            $html .= "<p><strong>Senha:</strong>" . $senha . "</p>";
            $html .= "</div>";
        } else {
            $html .= "<p>A sua matricula foi efectuada com sucesso!</p>";
        }
        $html .= "<p style='text_align: justify;'>A sua matricula foi efectuada com sucesso. Agora pode acessar o ILIA-SIGE pelo www.ilia.ac.mz usando o seu e-mail e a senha gerada automaticamente pelo sistema</p>";
        $html .= "<p style='text_align: justify;'>Por favor gurade a sua senha em lugar seguro e não a compartilhe com outra pessoa, apenas com o seu encarregado de educação, porque as informações disponibilizadas no sistema são estritamente para si e seu encarregado.</p><br>";
        $html .= "<br><br>";
        $html .= "<p><strong> E-mail:</strong> " . $email . "</p>";
        $html .= "<p><strong> Senha:</strong> " . $senha . "</p>";
        $html .= "<center><p>Agradecemos novamente por se juntar a nós!</p></center>";
        $html .= "<center><p>-------------------------------------------</p></center>";
        $html .= "<center><p>Juntos por uma educação inclusiva</p></center>";
        $html .= "</div>";
        $html .= "</body>";
        $html .= "</html>";

        return $html;

    }




     public function corpo_email_boas_vindas($email,$senha){
        $html   ="";
        $html .= "<!DOCTYPE html>";
        $html .= "<html>";
        $html .= "<head>";
        $html .= "<style>";
        $html .= "body{";
        $html .= "font-family: helvetica, sans-serif;";
        $html .= "background-color: #f7f7f7;";
        $html .= "}";
        $html .= "";
        $html .= ".container{";
        $html .= "max-width: 600px;";
        $html .= "margin: 0 auto;";
        $html .= "background-color: #fff;";
        $html .= "box-shadow: 0 0 10px rgba(0, 0, 0, 1);";
        $html .= "border-radius: 8px;";
        $html .= "}";
        $html .= "";
        $html .= "h1{";
        $html .= "font-size: 24px;";
        $html .= "margin-top: 0;";
        $html .= "}";
        $html .= "";
        $html .= "p{";
        $html .= "font-size: 16px;";
        $html .= "line-height: 1.5;";
        $html .= "margin-bottom: 20px;";
        $html .= "}";
        $html .= "";
        $html .= ".login-info {";
        $html .= "border-top: 1px solid #ccc;";
        $html .= "padding-top: 20px;";
        $html .= "}";
        $html .= "";
        $html .= ".login-info p{";
        $html .= "margin-bottom: 10px;";
        $html .= "}";
        $html .= "";
        $html .= ".login-info p:last-child{";
        $html .= "margin-bottom: 0;";
        $html .= "}";
        $html .= "";
        $html .= ".btn{";
        $html .= "display: inline-block;";
        $html .= "background-color: #007bff;";
        $html .= "color: #fff;";
        $html .= "border: none;";
        $html .= "padding: 10px 20px;";
        $html .= "border-radius: 4px;";
        $html .= "text-decoration: none;";
        $html .= "font-size: 16px;";
        $html .= "cursor: pointer;";
        $html .= "}";
        $html .= "";
        $html .= ".btn:hover{";
        $html .= "background-color: #0069d9;";
        $html .= "}";
        $html .= "</style>";
        $html .= "</head>";
        $html .= "<body>";
        $html .= "<div class='container'>";
        $html .= "<center><h1>Bem vindo(a) ao nosso sistema ILIA-SIGE!</h1></center>";
        $html .= "<p>O seu cadastro foi efectuado com sucesso e agora pode acessar o ILIA-SIGE pelo www.ilia.ac.mz usando o seu e-mail e a senha gerada automaticamente pelo sistema</p>";
        $html .= "<p>Por gurade a sua senha em lugar seguro e não a compartilhe com outra pessoa, porque as informações disponibilizadas no sistema são estritamente para si. Esta senha poderá alterar assim que estiver logado.</p><br>";
        $html .= "<br><br>";
        $html .= "<p><strong> E-mail:</strong > " . $email . "</p>";
        $html .= "<p><strong> Senha:</strong> " . $senha . "</p>";
        $html .= "<center><p>Agradecemos novamente por se juntar a nós!</p></center>";
        $html .= "<center><p>-------------------------------------------</p></center>";
        $html .= "<center><p>Juntos por uma educação inclusiva</p></center>";
        $html .= "</div>";
        $html .= "</body>";
        $html .= "</html>";

        return $html;
    }


     public function pedido_reset_senha_usuario($usuario,$processo){
        $html   ="";
        $html .="   <!DOCTYPE html> ";
        $html .="   <html> ";
        $html .="   <head> ";
        $html .="   <title>Pedido de redefinição de senha</title> ";
        $html .="   <style> ";
        $html .="   body{ ";
        $html .="   font-family: Arial, sans-serif ";
        $html .="   background-color:#f7f7f7; ";
        $html .="   } ";
        $html .=" ";
        $html .="   .container{ ";
        $html .="   max-width:600px; ";
        $html .="   margin: 0 auto; ";
        $html .="   background-color:#fff; ";
        $html .="   box-shadow: 0 0 10px rgbO(0, 0, 0, 1); ";
        $html .="   border-radius: 8px; ";
        $html .="   } ";
        $html .=" ";
        $html .="   h1{ ";
        $html .="   font-size: 24px; ";
        $html .="   margin-top: 0; ";
        $html .="   } ";
        $html .=" ";
        $html .="   p{ ";
        $html .="   font-size: 16px; ";
        $html .="   line-height: 1.5px; ";
        $html .="   margin-bottom: 20px; ";
        $html .="  } ";
        $html  .=" ";
        $html  .="  .login-info { ";
        $html  .="   border-top: 1px solid #ccc; ";
        $html  .="   padding-top: 20px ";
        $html  .="  }";
        $html  .=" ";
        $html  .="  .login-info p{ ";
        $html  .="   margin-bottom: 10px; ";
        $html  .=" } ";
        $html  .=" ";
        $html  .="  .login-info p:last-child{ ";
        $html  .="  margin-bottom: 0; ";
        $html  .=" } ";
        $html  .=" ";
        $html  .="  btn{ ";
        $html  .="  display: inline-block ";
        $html  .="  background-color: # 007bff; ";
        $html  .="  color: #fff; ";
        $html  .="  border:none; ";
        $html  .="  padding: 10px 20px; ";
        $html  .="  border-radius: 4px; ";
        $html  .="  text-decoration: none; ";
        $html  .="  font-size: 16px; ";
        $html  .="  cursor: pointer; ";
        $html  .=" } ";
        $html  .=" ";
        $html .= "  .btn:hover{ ";
        $html .= "   background-color: #0069d9 ";
        $html .= "   } ";
        $html .= "  </style> ";
        $html .= "   </head> ";
        $html .= "   <body> ";
        $html .= "   <div class='container'> ";
        $html .= "   <h1>Olá!</h1> ";
        $html .= "   <p>Recebemos a sua solicitação de redefinição de senha e estamos prontos para ajudá-lo(a) a concluir o processo. Clina no link abaixo.</p> ";
        $html .= "   <p>Clique no botão abaixo para acessar o sistema</p> ";
        $html .= "   <a href='". self::url() . 'redefinir_senha?usuario='.$usuario.'&processo=' .$processo . "' class='btn' style='color:#fff;'>Redefinir senha</a> ";
        $html .= "   </br></br> ";
      
        $html .= "   <p>Atenciosamnte,</p> ";
        $html .= "   <p>Equipe da escola</p> ";
        $html .= "   </div>" ;
        $html .= "   </body> ";
        $html .= "   </html> ";
        $html .= " ";

        return $html;
    }

    public function valida_processo($id){
        $query = "SELECT * FROM `pedido_reset_senha_usuario` WHERE `processo` = ? AND `TIMESTAMPDIFF`(MINUTE,'created_)at',NOW()) < 15";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute($id);

        try
        {
            $i = 0;
            while ($rs = $stmt->fetch(PDO::FETCH_ASSOC))
             $i++;
             return $i;

        }catch(Exception $e)
        {
            $arr = array("success" => 1, $arr);
            echo json_encode($arr); //Ate aqui tudo Ok
            
        }
    }


    
   public function send_mail($destinatario_email, $destinatario_nome, $titulo, $corpo)
    {
        $query = "SELECT * FROM `aluno`";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([]);

        try
        {
            $emailInscricao = "";
            while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)){
            $id = md5($rs['id']);
            
             $emailInscricao .= "<td >".$rs['email']."</td>";
             

        }
            return $emailInscricao;

        }catch(Exception $e)
        {
            $arr = array(
                "success" => 0,
                "msg" => "Erro ao efectuar a operação." . $e
            );
            echo json_encode($arr); //Ate aqui tudo Ok
            
        }

        try{
        $mail = new PHPMailer(true);
        $mail->isSMTP();                                      //Indicar que usará SMTP
        $mail->Host            = 'smtp.gmail.com';            //Endereco do Servidor SMTP
        $mail->SMTPAuth        = true;                        //Habilitar autenticacao SMTP
        $mail->Username = 'dfazenda18@gmail.com';
        $mail->Password = 'Daniel2023!';                  //Senha SMTP
        $mail->SMTPSecure      = 'tls';                       //Habilitar criptografia TLS(porta 587)
        $mail->Port        = 587; //porta 465 ou  587         //ou SMTPS (porta 465)

        $mail->CharSet = 'utf-8';
        $mail->From = 'dfazenda18@gmail.com';
        $mail->FromName = "ILIA-SIGE";
        $mail->addAddress($destinatario_email, $destinatario_nome);
        $mail->addReplyTo("dfazenda18@gmail.com", "Reply");
        $mail->addBCC("colegioilia2021@gmail.com");
        $mail->isHTML(true);
        $mail->Subject = $titulo;
        $mail->Body = $corpo;
        try{
        $mail->send();
            }catch (Exception $e){
            $arr = array("success" => 0, "smg" => "Não conseguiu fazer o envio de e-mail. Por favor contactar o administrador.".$e);
            echo json_encode($arr);
            }
         }catch (Exception $e){
            $arr = array("success" => 0, "smg" => "Não conseguiu fazer o envio de e-mail. Por favor contactar o administrador.".$e);
            echo json_encode($arr);
            }
    } 



    public function valida_login($usuario, $senha)
    {
        $query = "SELECT * FROM `usuario` JOIN nivel_acesso ON nivel_acesso.idNivelAcesso = usuario.nivelAcesso WHERE `usuario` = ? ";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$usuario]);

        try
        {
            if ($rs = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                if (password_verify($senha, $rs['senha']))
                {
                    $_SESSION['activa'] = 1;
                    $_SESSION['id_usuario'] = $rs['id'];
                    $_SESSION['usuario'] = $rs['usuario'];
                    $_SESSION['nivelAcesso'] = $rs['nivelAcesso'];
                    $_SESSION['usuarioStamp'] = $rs['usuarioStamp'];
                    $_SESSION['temaPadrao'] = ($rs['temaPadrao'] == 0) ? '' : 'dark-mode';
                    if($rs['nivelAcesso'] == 1 || $rs['nivelAcesso'] == 2)
                         $query = "SELECT * FROM `funcionario`  WHERE `funcionarioStamp` = ? ";
                    elseif($rs['nivelAcesso'] == 3)
                        $query = "SELECT * FROM `professor`  WHERE `professorStamp` = ? ";
                    else
                        $query = "SELECT * FROM `aluno`  WHERE `alunoStamp` = ? ";
                        $stmt = $this->connect()->prepare($query);
                        $stmt->execute([$_SESSION['usuarioStamp']]);
                        if ($rs = $stmt->fetch(PDO::FETCH_ASSOC)){

                            $_SESSION['nome_usuario'] = $rs['nome'];
                            $_SESSION['id_entidade'] = md5($rs['id']);
                        }
                    
                    $arr = array("success" => 1, "msg" => "Login com sucesso.");
                    echo json_encode($arr);
                }
                else
                {
                    $arr = array( "success" => 0, "msg" => "Usuario e senha incorrecta");
                    echo json_encode($arr);
                }
            }
            else
            {
                $arr = array( "success" => 0, "msg" => "Usuario e senha incorrecta");
                echo json_encode($arr);
            }
        }
        catch(Exception $e)
        {
            $arr = array(
                "success" => 0,
                "msg" => "Nao consigui autenticar no sistema." . $e
            );
            echo json_encode($arr); //Ate aqui tudo Ok
            
        }
    }
    //Fim funcao validar usuario

      //Criando funciao para inscricao do aluno
    public function pedido_de_senha($usuario)
    {
        $sessao = new sessao();
        $usuario_logado = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : 0;
        $processo = rand() .'.'. Date('Ymd'); 
        $query = "INSERT INTO pedido_reset_senha_usuario(usuario, processo, created_by) VALUES (?,?,?)";
        $stmt = $this->connect()->prepare($query);
        try
        {
           

            if ($stmt->execute([$usuario, $processo, $usuario_logado])) {
               $sessao -> send_mail($usuario, "", "Redefinição de senha", $sessao->pedido_reset_senha_usuario($usuario, $processo));
                $arr = array("success" => 1, "msg" => "Email enviado com sucesso!" );

                echo json_encode($arr);

            }
            else
                {
                    $arr = array("success" => 0, "msg" => "Erro ao efectuar a operação.");
                    echo json_encode($arr);
                }

        } catch(Exception $e)
        {
            $arr = array(
                "success" => 0,
                "msg" => "Erro ao efectuar a operação." . $e
            );
            echo json_encode($arr); //Ate aqui tudo Ok
            
        }
    }
    
}

//Criando classe utilitario
class utilitarios extends conexao
{

   public function upload_ficheiro($ficheiro,$tipo){
    $extensao=explode('.', $ficheiro["name"]);
    $novo_nome=rand().'.'.$extensao[1];

    $caminhoDoFicheiro = ($tipo =='imagem') ? '../components/assets/uploads/fotos/'. $novo_nome : '../components/assets/uploads/docs/' . $novo_nome ;
    move_uploaded_file($ficheiro['tmp_name'], $caminhoDoFicheiro);
    return $caminhoDoFicheiro;
   }

    public function parametros()
    {
        $query = "SELECT * FROM `parametros` WHERE id = 1";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();

        try
        {

            return $rs = $stmt->fetch(PDO::FETCH_ASSOC);

        }catch(Exception $e)
        {
            $arr = array(
                "success" => 0,
                "msg" => "Erro ao efectuar a operação." . $e
            );
            echo json_encode($arr); //Ate aqui tudo Ok
            
        }
    }

    
}


//Verificar dados dos utilitarios e validar
class aluno extends conexao
{
         public function alterarEstado($id, $estado)
        {
            $usuario_logado = $_SESSION['id_usuario'];
            $query = "UPDATE aluno SET estado = ?, updated_by = ? " ;
            $query .= " WHERE md5(id) = ? ";
            $stmt = $this->connect()->prepare($query);
            try
            {
                if ($stmt->execute([$estado, $usuario_logado,  $id])) {
                        $arr = array("success" => 1, "msg" => "Estado alterado com sucesso.");
                         echo json_encode($arr);
                 }else { $arr = array("success" => 0, "msg" => "Erro ao carregar a foto!.");
                         echo json_encode($arr);
                }
             
     
            } catch(Exception $e){
                $arr = array(
                    "success" => 0,
                    "msg" => "Erro ao efectuar a operação." . $e
                );
                echo json_encode($arr); //Ate aqui tudo Ok
                
            }
        }

    public function buscarAluno($q)
    {
        $query = "SELECT *,(SELECT classe FROM matricula WHERE matricula.stampAluno = aluno.alunoStamp ORDER BY ano DESC LIMIT 1)classe FROM `aluno` WHERE `email` = ? OR `contacto` = ? OR `numeroDeDocumento` = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$q,$q,$q]);

        try
        {
           ($rs = $stmt->fetch(PDO::FETCH_ASSOC));
           if($rs){ 
            $arr = array("success" => 1, "msg" => $rs);
           }else{
            $arr = array("success" => 0, "msg" => "Aluno não encontrado");
           }
           echo json_encode($arr);

        }catch(Exception $e)
        {
            $arr = array("success" => 1, $arr);
            echo json_encode($arr); //Ate aqui tudo Ok
            
        }
    }

    public function consultarInscricao($q) 
    {
        $query = "SELECT *,(SELECT 1 FROM matricula WHERE matricula.stampAluno = inscricao.alunoStamp AND ano = ?) matriculado,(SELECT turma.nome FROM matricula JOIN turma ON turma.id = matricula.turma AND turma.classe = matricula.classe WHERE matricula.stampAluno = inscricao.alunoStamp) turma FROM `inscricao` WHERE `email` = ? OR `contacto` = ? OR `numeroDeDocumento` = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([Date('Y'),$q,$q,$q]);

        try
        {
           ($rs = $stmt->fetch(PDO::FETCH_ASSOC));
           if($rs){ 

            if($rs['matriculado']){
                $arr = array("success" => 1, "msg" => "Matricula já confirmada. A sua turma é: ".$rs['turma']);
            }else{
                $arr = array("success" => 0, "msg" => "A matricula ainda não foi confirmada!");
            }
            
           }else{
            $arr = array("success" => 0, "msg" => "Nenhuma inscrição feita para este aluno");
           }
           echo json_encode($arr);

        }catch(Exception $e)
        {
            $arr = array("success" => 1, $arr);
            echo json_encode($arr); //Ate aqui tudo Ok
            
        }
    }


    public function validarExistenciaDeEmail($email)
    {
        $query = "SELECT * FROM `aluno` WHERE `email` = ? ";
        $stmt = $this->connect()
            ->prepare($query);
        $stmt->execute([$email]);

        try
        {
            $i = 0;
            while ($rs = $stmt->fetch(PDO::FETCH_ASSOC))
             $i++;
            return $i;
        }catch(Exception $e)
        {
            $arr = array("success" => 0, "msg" => "Erro ao efectuar a operação." . $e);
            echo json_encode($arr); //Ate aqui tudo Ok
            
        }
    }

     public function validarExistenciaDeCelular($contacto)
      {
        $query = "SELECT * FROM `aluno` WHERE `contacto` = ? ";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$contacto]);

        try
        {
            $i = 0;
            while ($rs = $stmt->fetch(PDO::FETCH_ASSOC))
             $i++;
             return $i;
        }catch(Exception $e)
        {
            $arr = array(
                "success" => 0,
                "msg" => "Erro ao efectuar a operação." . $e
            );
            echo json_encode($arr); //Ate aqui tudo Ok
            
        }
        }

         public function validarExistenciaDenumeroDeDocumento($numeroDeDocumento)
         {
        $query = "SELECT * FROM `aluno` WHERE `numeroDeDocumento` = ? ";
        $stmt = $this->connect()
            ->prepare($query);
        $stmt->execute([$numeroDeDocumento]);

        try
        {
            $i = 0;
            while ($rs = $stmt->fetch(PDO::FETCH_ASSOC))
             $i++;
             return $i;
        }catch(Exception $e)
        {
            $arr = array(
                "success" => 0,
                "msg" => "Erro ao efectuar a operação." . $e
            );
            echo json_encode($arr); //Ate aqui tudo Ok
            
        }
    }



    //Validar inscricao do aluno

     public function validarExistenciaDeEmailNaInscricao($email, $ano)
    {
        $query = "SELECT * FROM `inscricao` WHERE `email` = ? AND `ano` = ?";
        $stmt = $this->connect()
            ->prepare($query);
        $stmt->execute([$email, $ano]);

        try
        {
            $i = 0;
            while ($rs = $stmt->fetch(PDO::FETCH_ASSOC))
             $i++;
            return $i;
        }catch(Exception $e)
        {
            $arr = array("success" => 0, "msg" => "Erro ao efectuar a operação." . $e);
            echo json_encode($arr); //Ate aqui tudo Ok
            
        }
    }

     public function validarExistenciaDeCelularNaInscricao($contacto, $ano)
      {
        $query = "SELECT * FROM `inscricao` WHERE `contacto` = ? AND `ano` = ?";
        $stmt = $this->connect()
            ->prepare($query);
        $stmt->execute([$contacto, $ano]);

        try
        {
            $i = 0;
            while ($rs = $stmt->fetch(PDO::FETCH_ASSOC))
             $i++;
             return $i;
        }catch(Exception $e)
        {
            $arr = array(
                "success" => 0,
                "msg" => "Erro ao efectuar a operação." . $e
            );
            echo json_encode($arr); //Ate aqui tudo Ok
            
        }
        }

         public function validarExistenciaDenumeroDeDocumentoNaInscricao($numeroDeDocumento, $ano)
         {
        $query = "SELECT * FROM `inscricao` WHERE `numeroDeDocumento` = ? AND `ano` = ?";
        $stmt = $this->connect()
            ->prepare($query);
        $stmt->execute([$numeroDeDocumento, $ano]);

        try
        {
            $i = 0;
            while ($rs = $stmt->fetch(PDO::FETCH_ASSOC))
             $i++;
             return $i;
        }catch(Exception $e)
        {
            $arr = array(
                "success" => 0,
                "msg" => "Erro ao efectuar a operação." . $e
            );
            echo json_encode($arr); //Ate aqui tudo Ok
            
        }
    }
      


    //Fim valisacao da inscricao do aluno
      
        
            
    //Criando funciao para inserir dados do aluno
    public function insert($nome, $dataDeNascimento, $tipoDeDocumento, $numeroDeDocumento, $localDeEmissao, $data_emissao_doc, $sexo, $morada, $email, $contacto, $foto)
    {
        $usuario_logado = $_SESSION['id_usuario'];
        $stamp = md5(rand()) .'.'. Date('Ymd') .'.'. $usuario_logado; 
        $query = "INSERT INTO aluno(alunoStamp, nome, dataDeNascimento, tipoDeDocumento, numeroDeDocumento, localDeEmissao, data_emissao_doc, sexo, morada, email, contacto, foto, created_by,
	updated_by) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($query);
        try
        {
            if(self::validarExistenciaDeEmail($email) == 0 && self::validarExistenciaDeCelular($contacto) == 0 && self::validarExistenciaDenumeroDeDocumento($numeroDeDocumento) == 0){

            if ($stmt->execute([$stamp, $nome, $dataDeNascimento, $tipoDeDocumento, $numeroDeDocumento, $localDeEmissao, $data_emissao_doc, $sexo, $morada, $email, $contacto, $foto, $usuario_logado, $usuario_logado])) {
                $arr = array("success" => 1, "msg" => "Aluno cadastrado com sucesso!."
                );

                echo json_encode($arr);
            }
            else
                {
                    $arr = array("success" => 0, "msg" => "Erro ao efectuar a operação.");
                    echo json_encode($arr);
                }

            }else{
                 $arr = array("success" => 0, "msg" => "O aluno já encontra-se cadastrado no sistema.");
                echo json_encode($arr);
            }
     
        } catch(Exception $e)
        {
            $arr = array(
                "success" => 0,
                "msg" => "Erro ao efectuar a operação." . $e
            );
            echo json_encode($arr); //Ate aqui tudo Ok
            
        }
    }

            
    //Criando funciao para inscricao do aluno
    public function insert_inscricao($nome, $dataDeNascimento, $tipoDeDocumento, $numeroDeDocumento, $localDeEmissao, $data_emissao_doc, $sexo, $nacionalidade, $naturalidade, $morada, $nomeEncarregado, $localDeTrabalho, $funcao, $email, $contacto, $contactoAlternativo, $foto,$classe,$interno,$notaInformativa,$anexoDocumento)
    {
        $sessao = new sessao();
        $usuario_logado = @$_SESSION['id_usuario'] ? $_SESSION['id_usuario'] : 0;
        $stamp = md5(rand()) .'.'. Date('Ymd') .'.'. $usuario_logado; 
        $query = "INSERT INTO inscricao(alunoStamp, nome, dataDeNascimento, tipoDeDocumento, numeroDeDocumento, localDeEmissao, data_emissao_doc, sexo, nacionalidade, naturalidade, morada, nomeEncarregado, localDeTrabalho, funcao, email, contacto, contactoAlternativo, foto, classe, interno, notaInformativa, anexoDocumento, created_by,
	        updated_by) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($query);
        try
        {
            if(self::validarExistenciaDeEmailNaInscricao($email, Date('Y')) == 0 && self::validarExistenciaDeCelularNaInscricao($contacto, Date('Y')) == 0 && self::validarExistenciaDenumeroDeDocumentoNaInscricao($numeroDeDocumento, Date('Y')) == 0){

            if ($stmt->execute([$stamp, $nome, $dataDeNascimento, $tipoDeDocumento, $numeroDeDocumento, $localDeEmissao, $data_emissao_doc, $sexo, $nacionalidade, $naturalidade, $morada, $nomeEncarregado, $localDeTrabalho, $funcao, $email, $contacto, $contactoAlternativo, $foto, $classe, $interno, $notaInformativa,$anexoDocumento, $usuario_logado, $usuario_logado])) {
               $sessao -> send_mail($email, $nome, "Inscrição", $sessao->mailBoasVindas($nome, 1500, 'Millennium', '55405237', 'Colegio Ilia', 'Magoanine B - CMC', 'colegio2002ilia@gmail.com', '+258 84 564 8546'));
                 // Use a função corpo_email_confirmacao_inscricao para gerar o HTML
                $htmlAlunoInscrito = $sessao->mailBoasVindas($nome, 1500, 'Millennium Bim', '55405237', 'Colegio Ilia', 'Magoanine B - CMC', 'colegio2002ilia@gmail.com', '+258 84 564 8546'); 
                $arr = array("success" => 1, "msg" => "Inscrição efectuada com sucesso!.", "htmlAlunoInscrito" => $htmlAlunoInscrito);
                echo json_encode($arr);
             
            }
            else
                {
                    $arr = array("success" => 0, "msg" => "Erro ao efectuar a operação.");
                    echo json_encode($arr);
                }

            }else{
                 $arr = array("success" => 0, "msg" => "O aluno já encontra-se inscrito no sistema para o ano actual.");
                echo json_encode($arr);
            }
     
        } catch(Exception $e)
        {
            $arr = array(
                "success" => 0,
                "msg" => "Erro ao efectuar a operação." . $e
            );
            echo json_encode($arr); //Ate aqui tudo Ok
            
        }
    }




      public function pedido_de_senha($usuario)
    {
        $sessao = new sessao();
        $usuario_logado = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : 0;
        $processo = rand() .'.'. Date('Ymd'); 
        $query = "INSERT INTO inscricao(alunoStamp, nome, dataDeNascimento, tipoDeDocumento, numeroDeDocumento, localDeEmissao, data_emissao_doc, sexo, morada, email, contacto, foto, classe, interno, notaInformativa, anexoDocumento, created_by,
            updated_by) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($query);
        try
        {
          
            if ($stmt->execute([$stamp, $nome, $dataDeNascimento, $tipoDeDocumento, $numeroDeDocumento, $localDeEmissao, $data_emissao_doc, $sexo, $morada, $email, $contacto, $foto, $classe, $interno, $notaInformativa,$anexoDocumento, $usuario_logado, $usuario_logado])) {
               $sessao -> send_mail($email, $nome, "Inscrição", $sessao->mailBoasVindas($nome, 1400, 'BIM', '1234569', 'Ilia-Sige', 'Magoanine B - CMC', 'colegioilia2021@gmail.com', '+258 84 564 8546'));
                $arr = array("success" => 1, "msg" => "Inscrição efectuada com sucesso!" );

                echo json_encode($arr);

            }
            else
                {
                    $arr = array("success" => 0, "msg" => "Erro ao efectuar a operação.");
                    echo json_encode($arr);
                }

           
     
        } catch(Exception $e)
        {
            $arr = array(
                "success" => 0,
                "msg" => "Erro ao efectuar a operação." . $e
            );
            echo json_encode($arr); //Ate aqui tudo Ok
            
        }
    }



  
        public function insert_matriculaVersaoOriginal($stamp, $turma, $classe, $nRecibo, $url_comprovativo, $valorMatricula, $valorMensalidade)
        {
            try {
        $sessao = new sessao();
        $usuario_logado = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : 0;
        $ano = date('Y');
        $query = "SELECT * FROM inscricao WHERE alunoStamp = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$stamp]);
        $nome = "";
        $email = "";
        $interno = 0;
       
        $senha = $sessao->gerarSenha();

        while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $nome = $rs['nome'];
            $email = $rs['email'];
            $interno = $rs['interno'];
        }

        $pdo = $this->connect();
        $pdo->beginTransaction();

        $query = "INSERT INTO `matricula`(`stampAluno`, `turma`, `classe`, `nRecibo`, `url_comprovativo`, `ano`, `valorMatricula`, `valorMensalidade`, `created_by`, `updated_by`) VALUES (?,?,?,?,?,?,?,?,?,?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$stamp, $turma, $classe, $nRecibo, $url_comprovativo, $ano, $valorMatricula, $valorMensalidade, $usuario_logado, $usuario_logado]);

        $query2 = "INSERT INTO aluno(alunoStamp, nome, dataDeNascimento, tipoDeDocumento, numeroDeDocumento, localDeEmissao, data_emissao_doc, sexo, morada, email, contacto, foto, created_by, updated_by) SELECT alunoStamp, nome, dataDeNascimento, tipoDeDocumento, numeroDeDocumento, localDeEmissao, data_emissao_doc, sexo, morada, email, contacto, foto, ?, ? FROM inscricao WHERE alunoStamp = ?";
        $stmt = $pdo->prepare($query2);
        $stmt->execute([$usuario_logado, $usuario_logado, $stamp]);

        if ($interno == 1) {
            
            $query = "INSERT INTO usuario(usuarioStamp, usuario, senha, nivelAcesso, created_by, updated_by) VALUES (?,?,?,?,?,?)";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$stamp, $email, password_hash($senha, PASSWORD_DEFAULT), 4, $usuario_logado, $usuario_logado]);
        }

        $sessao->send_mail($senha, $nome, 'Confirmação da inscrição', $sessao->corpo_email_confirmacao_inscricao($email, $senha, $interno));

        if ($pdo->inTransaction())
            $pdo->commit();

        $arr = array("success" => 1, "msg" => "Matrícula efetuada com sucesso.");
        echo json_encode($arr);
    } catch (Exception $e) {
        if ($pdo->inTransaction())
            $pdo->rollBack();

        $arr = array("success" => 0, "msg" => "Erro ao efetuar a operação: " . $e->getMessage());
        echo json_encode($arr);
    }
}



    public function insert_matricula($stamp, $turma, $classe, $nRecibo, $url_comprovativo, $valorMatricula, $valorMensalidade)
{
    try {
        $sessao = new sessao();
        $usuario_logado = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : 0;
        $ano = date('Y');
        $query = "SELECT * FROM inscricao WHERE alunoStamp = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$stamp]);
        $nome = "";
        $email = "";
        $interno = 0;
        $senha = $sessao->gerarSenha();

        while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $nome = $rs['nome'];
            $email = $rs['email'];
            $interno = $rs['interno'];
        }

        $pdo = $this->connect();
        $pdo->beginTransaction();

        $query = "INSERT INTO `matricula`(`stampAluno`, `turma`, `classe`, `nRecibo`, `url_comprovativo`, `ano`, `valorMatricula`, `valorMensalidade`, `created_by`, `updated_by`) VALUES (?,?,?,?,?,?,?,?,?,?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$stamp, $turma, $classe, $nRecibo, $url_comprovativo, $ano, $valorMatricula, $valorMensalidade, $usuario_logado, $usuario_logado]);

        $query2 = "INSERT INTO aluno(alunoStamp, nome, dataDeNascimento, tipoDeDocumento, numeroDeDocumento, localDeEmissao, data_emissao_doc, sexo, morada, email, contacto, foto, created_by, updated_by) SELECT alunoStamp, nome, dataDeNascimento, tipoDeDocumento, numeroDeDocumento, localDeEmissao, data_emissao_doc, sexo, morada, email, contacto, foto, ?, ? FROM inscricao WHERE alunoStamp = ?";
        $stmt = $pdo->prepare($query2);
        $stmt->execute([$usuario_logado, $usuario_logado, $stamp]);

        if ($interno == 1) {
            $query = "INSERT INTO usuario(usuarioStamp, usuario, senha, nivelAcesso, created_by, updated_by) VALUES (?,?,?,?,?,?)";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$stamp, $email, password_hash($senha, PASSWORD_DEFAULT), 4, $usuario_logado, $usuario_logado]);
        }

        // Use a função corpo_email_confirmacao_inscricao para gerar o HTML
        $htmlContent = $sessao->corpo_email_confirmacao_inscricao($email, $senha, $interno);

       
        if ($pdo->inTransaction()) {
        $pdo->commit();

        $arr = array("success" => 1, "msg" => "Matrícula efetuada com sucesso.", "htmlContent" => $htmlContent);
        echo json_encode($arr);
       }


    } catch (Exception $e) {
        if ($pdo->inTransaction()) {
            $pdo->rollBack();
        }

        $arr = array("success" => 0, "msg" => "Erro ao efetuar a operação: " . $e->getMessage());
        echo json_encode($arr);
    }
}


    //Criando funciao para actualizar dados do aluno
    public function update($id, $nome, $dataDeNascimento, $tipoDeDocumento, $numeroDeDocumento, $localDeEmissao, $data_emissao_doc, $sexo, $nacionalidade, $naturalidade, $morada, $nomeEncarregado, $localDeTrabalho, $funcao, $email, $contacto, $contactoAlternativo)
    {
        $usuario_logado = $_SESSION['id_usuario'];
        $query = "UPDATE aluno SET nome = ?, dataDeNascimento = ?, tipoDeDocumento = ?, numeroDeDocumento = ? " ;
        $query .= ", localDeEmissao = ?, data_emissao_doc = ?, sexo = ?, nacionalidade = ?, naturalidade = ?, morada = ?, nomeEncarregado = ?, localDeTrabalho = ?, funcao = ?, email = ?, contacto = ?, contactoAlternativo = ?, updated_by = ? " ;
        $query .= " WHERE md5(id) = ? ";
        $stmt = $this->connect()->prepare($query);
        try
        {
          if(self::validarExistenciaDeEmail($email) <= 1 && self::validarExistenciaDeCelular($contacto) <= 1 && self::validarExistenciaDenumeroDeDocumento($numeroDeDocumento) <= 1){

            if ($stmt->execute([$nome, $dataDeNascimento, $tipoDeDocumento, $numeroDeDocumento, $localDeEmissao, $data_emissao_doc, $sexo, $nacionalidade, $naturalidade, $morada, $nomeEncarregado, $localDeTrabalho, $funcao, $email, $contacto, $contactoAlternativo, $usuario_logado, $id])) {
                $arr = array(
                    "success" => 1,
                    "msg" => "Registo alterado com sucesso!."
                );

                echo json_encode($arr);
            }
            else
                {
                    $arr = array("success" => 0, "msg" => "Erro ao efectuar a operação.");
                    echo json_encode($arr);
                }

            }else{
                 $arr = array("success" => 0, "msg" => "O email, contacto ou nº do documento já registado para outro aluno no sistema.");
                echo json_encode($arr);
            }
     
        } catch(Exception $e)
        {
            $arr = array(
                "success" => 0,
                "msg" => "Erro ao efectuar a operação." . $e
            );
            echo json_encode($arr); //Ate aqui tudo Ok
            
        }
    }

    //Update aluno aluno inscrito
      public function update_inscrito($id, $nome, $dataDeNascimento, $tipoDeDocumento, $numeroDeDocumento, $localDeEmissao, $data_emissao_doc, $sexo, $nacionalidade, $naturalidade, $morada, $nomeEncarregado, $localDeTrabalho, $funcao, $email, $contacto, $contactoAlternativo, $classe)
    {
        $usuario_logado = $_SESSION['id_usuario'];
        $query = "UPDATE inscricao SET nome = ?, dataDeNascimento = ?, tipoDeDocumento = ?, numeroDeDocumento = ? " ;
        $query .= ", localDeEmissao = ?, data_emissao_doc = ?, sexo = ?, nacionalidade = ?, naturalidade = ?, morada=?, nomeEncarregado = ?, localDeTrabalho = ?, funcao = ?,  email = ?, contacto = ?, contactoAlternativo = ?, classe = ?, updated_by = ? " ;
        $query .= " WHERE md5(id) = ? ";
        $stmt = $this->connect()->prepare($query);
        try
        {
          if(self::validarExistenciaDeEmail($email) <= 1 && self::validarExistenciaDeCelular($contacto) <= 1 && self::validarExistenciaDenumeroDeDocumento($numeroDeDocumento) <= 1){

            if ($stmt->execute([$nome, $dataDeNascimento, $tipoDeDocumento, $numeroDeDocumento, $localDeEmissao, $data_emissao_doc, $sexo, $nacionalidade, $naturalidade, $morada, $nomeEncarregado, $localDeTrabalho, $funcao, $email, $contacto, $contactoAlternativo, $classe, $usuario_logado, $id])) {
                $arr = array(
                    "success" => 1,
                    "msg" => "Registo alterado com sucesso!."
                );

                echo json_encode($arr);
            }
            else
                {
                    $arr = array("success" => 0, "msg" => "Erro ao efectuar a operação.");
                    echo json_encode($arr);
                }

            }else{
                 $arr = array("success" => 0, "msg" => "O email, contacto ou nº do documento já registado para outro aluno no sistema.");
                echo json_encode($arr);
            }
     
        } catch(Exception $e)
        {
            $arr = array(
                "success" => 0,
                "msg" => "Erro ao efectuar a operação." . $e
            );
            echo json_encode($arr); //Ate aqui tudo Ok
            
        }
    }
    //UPDATE Perfil do Aluno
    public function updateDadosPerfil($id, $morada, $email, $contacto)
    {
        $usuario_logado = $_SESSION['id_usuario'];
        $query = "UPDATE inscricao SET morada=?, email = ?, contacto = ?, updated_by = ? " ;
        $query .= " WHERE md5(id) = ? ";
        $stmt = $this->connect()->prepare($query);
        try
        {
          if(self::validarExistenciaDeEmail($email) <= 1 && self::validarExistenciaDeCelular($contacto) <= 1){

            if ($stmt->execute([$morada, $email, $contacto, $usuario_logado, $id])) {
                $arr = array(
                    "success" => 1,
                    "msg" => "Registo alterado com sucesso!."
                );

                echo json_encode($arr);
            }
            else
                {
                    $arr = array("success" => 0, "msg" => "Erro ao efectuar a operação.");
                    echo json_encode($arr);
                }

            }else{
                 $arr = array("success" => 0, "msg" => "O email, contacto ou nº do documento já reistado para ouro aluno no sistema.");
                echo json_encode($arr);
            }
     
        } catch(Exception $e)
        {
            $arr = array(
                "success" => 0,
                "msg" => "Erro ao efectuar a operação." . $e
            );
            echo json_encode($arr); //Ate aqui tudo Ok
            
        }
    }



    //Criando funciao para actualizar a Foto do aluno
    public function updateFoto($id, $foto)
    {
        $usuario_logado = $_SESSION['id_usuario'];
        $query = "UPDATE aluno SET foto = ? " ;
        $query .= " WHERE md5(id) = ? ";
        $stmt = $this->connect()->prepare($query);
        try
        {
            if ($stmt->execute([$foto, $id])) {
                return 1;
             }else { $arr = array("success" => 0, "msg" => "Erro ao carregar a foto!.");
                echo json_encode($arr);
            }
         
 
        } catch(Exception $e){
            $arr = array(
                "success" => 0,
                "msg" => "Erro ao efectuar a operação." . $e
            );
            echo json_encode($arr); //Ate aqui tudo Ok
            
        }
    }



     public function listar($q)
    {
        $query = "SELECT aluno.*, CONCAT(classe.nome, '  ', turma.nome) turma FROM `aluno` JOIN matricula ON matricula.stampAluno = aluno.alunoStamp JOIN turma ON turma.id = matricula.turma JOIN classe ON classe.id = turma.classe";
        $query .=" WHERE (CASE WHEN ? = '' THEN matricula.ano ELSE md5(turma.id) END) = (CASE WHEN ? = '' THEN ? ELSE ? END)";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$q,$q,DATE('Y'),$q]);

        try
        {
            $html = "";
            while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)){
            $id = md5($rs['id']);
            $email = $rs['email'];
            $nome = $rs['nome'];
            $controladorEliminar = md5('eliminarAluno').'f';
            $controlador = md5('alterar_estado_aluno').'f';
            $estadoIcone = ($rs['estado'] == 'activo') ? '<i class="fa fa-toggle-on" ></i>': '<i class="fa fa-toggle-off"></i>';
            $estiloLinha = ($rs['estado'] == 'activo') ? 'opacity:1': 'opacity:0.6';
            $estadoBotao = ($rs['estado'] == 'activo') ? 'btn-success': 'btn-danger';
             $html .= "<tr style='".$estiloLinha."'>";
             $html .= "<td >".$rs['nome']."</td>";
             $html .= "<td >".$rs['contacto']."</td>";
             //$html .= "<td >".$rs['email']."</td>";
             $html .= "<td >".$da = date("d/m/Y", strtotime($rs['dataDeNascimento'])) ."</td>";
             $html .= "<td >".$rs['turma']."</td>";
             $html .= "<td>";
             $html .= "<button class='btn btn-sm ".$estadoBotao." estadoBotao' estado='".$rs['estado']."' controlador='".$controlador."' id='".$id ."' title='Alterar estado'>". $estadoIcone."</button> ";
             $html .= "<a href='verDadosAluno?q=".$id."' class='btn btn-sm btn-primary' title='Ver dados'><i class='fa fa-eye'></i></a> ";
            $html .= "<a class='btn btn-sm btn-danger eliminarAluno' controlador='".$controladorEliminar."' id='".$id."' nome='".$nome."  '  href='#'><i class='fa fa-trash mb-0' title='Excluir aluno'></i></a>&nbsp;";
             $html .= " </td>";
             $html .= " </tr>";

        }
            return $html;

        }catch(Exception $e)
        {
            $arr = array(
                "success" => 0,
                "msg" => "Erro ao efectuar a operação." . $e
            );
            echo json_encode($arr); //Ate aqui tudo Ok
            
        }
    }

      public function listarAlunos($q)
    {
        $query = "SELECT aluno.*, CONCAT(classe.nome, '  ', turma.nome) turma FROM `aluno` JOIN matricula ON matricula.stampAluno = aluno.alunoStamp JOIN turma ON turma.id = matricula.turma JOIN classe ON classe.id = turma.classe";
        $query .=" WHERE (CASE WHEN ? = '' THEN matricula.ano ELSE md5(turma.id) END) = (CASE WHEN ? = '' THEN ? ELSE ? END)";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$q,$q,DATE('Y'),$q]);

        try
        {
            $html = "";
            while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)){
            $id = md5($rs['id']);
            $email = $rs['email'];
            $nome = $rs['nome'];
            $controladorNota = md5('lancarNota').'f';
            $controlador = md5('alterar_estado_aluno').'f';
            $estadoIcone = ($rs['estado'] == 'activo') ? '<i class="fa fa-toggle-on" ></i>': '<i class="fa fa-toggle-off"></i>';
            $estiloLinha = ($rs['estado'] == 'activo') ? 'opacity:1': 'opacity:0.6';
            $estadoBotao = ($rs['estado'] == 'activo') ? 'btn-success': 'btn-danger';
             $html .= "<tr style='".$estiloLinha."'>";
             $html .= "<td >".$rs['nome']."</td>";
             $html .= "<td >".$rs['contacto']."</td>";
             //$html .= "<td >".$rs['email']."</td>";
             $html .= "<td >".$da = date("d/m/Y", strtotime($rs['dataDeNascimento'])) ."</td>";
             $html .= "<td >".$rs['turma']."</td>";
             $html .= "<td>";
             $html .= "<button class='btn btn-sm ".$estadoBotao." estadoBotao' estado='".$rs['estado']."' controlador='".$controlador."' id='".$id ."' title='Alterar estado'>". $estadoIcone."</button> ";
             $html .= "<a href='verDadosAluno?q=".$id."' class='btn btn-sm btn-primary' title='Ver dados'><i class='fa fa-eye'></i></a> ";
            $html .= "<a class='btn btn-sm btn-secondary lancarNota' controlador='".$controladorNota."' id='".$id."' nome='".$nome."  '  href='#'><i class='fa fa-pencil mb-0' title='Lançar nota'></i></a>&nbsp;";
             $html .= " </td>";
             $html .= " </tr>";

        }
            return $html;

        }catch(Exception $e)
        {
            $arr = array(
                "success" => 0,
                "msg" => "Erro ao efectuar a operação." . $e
            );
            echo json_encode($arr); //Ate aqui tudo Ok
            
        }
    }


    public function listarAlunosExcel($q)
    {
        $query = "SELECT aluno.*, CONCAT(classe.nome, '  ', turma.nome) turma FROM `aluno` JOIN matricula ON matricula.stampAluno = aluno.alunoStamp JOIN turma ON turma.id = matricula.turma JOIN classe ON classe.id = turma.classe";
        $query .=" WHERE (CASE WHEN ? = '' THEN matricula.ano ELSE md5(turma.id) END) = (CASE WHEN ? = '' THEN ? ELSE ? END)";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$q,$q,DATE('Y'),$q]);

        try
        {
            $html = "";
            while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)){
            $id = md5($rs['id']);
            $email = $rs['email'];
            $nome = $rs['nome'];
            $controladorEliminar = md5('eliminarAluno').'f';
            $controlador = md5('alterar_estado_aluno').'f';
            $estadoIcone = ($rs['estado'] == 'activo') ? '<i class="fa fa-toggle-on" ></i>': '<i class="fa fa-toggle-off"></i>';
            $estiloLinha = ($rs['estado'] == 'activo') ? 'opacity:1': 'opacity:0.6';
            $estadoBotao = ($rs['estado'] == 'activo') ? 'btn-success': 'btn-danger';
             $html .= "<tr style='".$estiloLinha."'>";
             $html .= "<td >".$rs['nome']."</td>";
             $html .= "<td >".$rs['contacto']."</td>";
             $html .= "<td >".$da = date("d/m/Y", strtotime($rs['dataDeNascimento'])) ."</td>";
             $html .= "<td >".$rs['turma']."</td>";
             $html .= "<td>";
             $html .= " </td>";
             $html .= " </tr>";

        }
            return $html;

        }catch(Exception $e)
        {
            $arr = array(
                "success" => 0,
                "msg" => "Erro ao efectuar a operação." . $e
            );
            echo json_encode($arr); //Ate aqui tudo Ok
            
        }
    }


   
   

    public function listar_alunos_inscritos()
    {
        $query = "SELECT inscricao. *, inscricao.nome nome_aluno, classe.nome nome_classe, classe.id id_classe  FROM `inscricao` JOIN classe ON classe.id = inscricao.classe WHERE alunoStamp NOT IN (SELECT stampAluno FROM matricula)";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([]);

        try
        {
            $html = "";
            while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)){
            $id = md5($rs['id']);
            $id_classe = $rs['id_classe'];
            $stamp = $rs['alunoStamp'];
            $nome = $rs['nome'];
            $controladorEliminar = md5('eliminarAlunoInscrito').'f';
            $controlador = md5('alterar_estado_aluno').'f';
            $controladorMatricula = md5('matricular_aluno').'f';
            $estadoIcone = ($rs['estado'] == 'activo') ? '<i class="fa fa-toggle-on" ></i>': '<i class="fa fa-toggle-off"></i>';
            $estiloLinha = ($rs['estado'] == 'activo') ? 'opacity:1': 'opacity:0.6';
            $estadoBotao = ($rs['estado'] == 'activo') ? 'btn-success': 'btn-danger';
             $html .= "<tr style='".$estiloLinha."'>";
             $html .= "<td >".$rs['nome_aluno']."</td>";
             $html .= "<td >".$rs['contacto']."</td>";
             $html .= "<td >".$rs['email']."</td>";
             $html .= "<td >".$da = date("d/m/Y", strtotime($rs['dataDeNascimento'])) ."</td>";
             $html .= "<td >".$rs['nome_classe']." Classe</td>";
             $html .= "<td>";
             $html .= "<button class='btn btn-sm ".$estadoBotao." estadoBotao' estado='".$rs['estado']."' controlador='".$controlador."' id='".$id ."' title='Alterar estado'>". $estadoIcone."</button> ";
             $html .= "<a href='verDadosInscrito?q=".$id."' class='btn btn-sm btn-primary' title='Ver dados'><i class='fa fa-eye'></i></a> ";
             $html .= "<button class='btn btn-sm btn-secondary matriculaBotao' nome='".$rs['nome_aluno']."' notaInformativa='" . str_replace('../','',$rs['notaInformativa'])."' anexoDocumento='" . str_replace('../','',$rs['anexoDocumento'])."' stamp='".$stamp."' classe='".$id_classe."' controlador='".$controladorMatricula."' id='".$id ."' interno='".$rs['interno']."' title='Matricular aluno'><i class='fa fa-user'></i></button> ";
             $html .= "<a class='btn btn-sm btn-danger eliminarAlunoInscrito' controlador='".$controladorEliminar."' id='".$id."' nome='".$nome."  '  href='#'><i class='fa fa-trash mb-0' title='Excluir aluno inscrito'></i></a>&nbsp;";
             $html .= " </td>";
             $html .= " </tr>";

            }
            return $html;

        }catch(Exception $e)
        {
            $arr = array(
                "success" => 0,
                "msg" => "Erro ao efectuar a operação." . $e
            );
            echo json_encode($arr); //Ate aqui tudo Ok
            
        }
    }

     public function verDadosAluno($id)
        {
        $query = "SELECT * FROM `aluno` WHERE md5(id) = ?";
        $stmt = $this->connect()
            ->prepare($query);
        $stmt->execute([$id]);

        try
        {

            return $rs = $stmt->fetch(PDO::FETCH_ASSOC);

        }catch(Exception $e)
        {
            $arr = array(
                "success" => 0,
                "msg" => "Erro ao efectuar a operação." . $e
            );
            echo json_encode($arr); //Ate aqui tudo Ok
            
        }
    }

      public function verDadosInscrito($id)
        {
        $query = "SELECT * FROM `inscricao` WHERE md5(id) = ?";
        $stmt = $this->connect()
            ->prepare($query);
        $stmt->execute([$id]);

        try
        {

            return $rs = $stmt->fetch(PDO::FETCH_ASSOC);

        }catch(Exception $e)
        {
            $arr = array(
                "success" => 0,
                "msg" => "Erro ao efectuar a operação." . $e
            );
            echo json_encode($arr); //Ate aqui tudo Ok
            
        }
    }


}


//Fim funccao aluno


//Criando funciao para inserir dados do funcionario
class funcionario extends conexao
{

        public function validarExistenciaDeEmail($email)
        {
            $query = "SELECT * FROM `funcionario` WHERE `email` = ? ";
            $stmt = $this->connect()
                ->prepare($query);
            $stmt->execute([$email]);
    
            try
            {
                $i = 0;
                while ($rs = $stmt->fetch(PDO::FETCH_ASSOC))
                 $i++;
                 return $i;
            }catch(Exception $e)
            {
                $arr = array(
                    "success" => 0,
                    "msg" => "Erro ao efectuar a operação." . $e
                );
                echo json_encode($arr); //Ate aqui tudo Ok
                
            }
        }
    
         public function validarExistenciaDeCelular($contacto)
        {
            $query = "SELECT * FROM `funcionario` WHERE `contacto` = ? ";
            $stmt = $this->connect()
                ->prepare($query);
            $stmt->execute([$contacto]);
    
            try
            {
               $i = 0;
                while ($rs = $stmt->fetch(PDO::FETCH_ASSOC))
                 $i++;
                 return $i;
            }catch(Exception $e){
                $arr = array(
                    "success" => 0,
                    "msg" => "Erro ao efectuar a operação." . $e
                );
                echo json_encode($arr); //Ate aqui tudo Ok
                
            }
        }
    
        public function validarExistenciaDenumeroDeDocumento($numeroDeDocumento)
        {
            $query = "SELECT * FROM `funcionario` WHERE `numeroDeDocumento` = ? ";
            $stmt = $this->connect()
                ->prepare($query);
            $stmt->execute([$numeroDeDocumento]);
    
            try
            {
                 $i = 0;
                while ($rs = $stmt->fetch(PDO::FETCH_ASSOC))
                 $i++;
                 return $i;
            }catch(Exception $e){
                $arr = array(
                    "success" => 0,
                    "msg" => "Erro ao efectuar a operação." . $e
                );
                echo json_encode($arr); //Ate aqui tudo Ok
                
            }
        }

        public function alterarEstado($id, $estado)
        {
            $usuario_logado = $_SESSION['id_usuario'];
            $query = "UPDATE funcionario SET estado = ?, updated_by = ? " ;
            $query .= " WHERE md5(id) = ? ";
            $stmt = $this->connect()->prepare($query);
            try
            {
                if ($stmt->execute([$estado, $usuario_logado,  $id])) {
                        $arr = array("success" => 1, "msg" => "Estado alterado com sucesso.");
                         echo json_encode($arr);
                 }else { $arr = array("success" => 0, "msg" => "Erro ao carregar a foto!.");
                         echo json_encode($arr);
                }
             
     
            } catch(Exception $e){
                $arr = array(
                    "success" => 0,
                    "msg" => "Erro ao efectuar a operação." . $e
                );
                echo json_encode($arr); //Ate aqui tudo Ok
                
            }
        }

     



    public function insert($nome, $dataDeNascimento, $tipoDeDocumento, $numeroDeDocumento, $localDeEmissao, $data_emissao_doc, $sexo, $morada, $email, $contacto, $foto)
     {
        $usuario_logado = $_SESSION['id_usuario'];
        $stamp = md5(rand()) .'.'. Date('Ymd') .'.'. $usuario_logado; 
        $query = "INSERT INTO funcionario(funcionarioStamp,nome, dataDeNascimento, tipoDeDocumento, numeroDeDocumento, localDeEmissao, data_emissao_doc, sexo, morada, email, contacto, foto, created_by,
    updated_by) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($query);
        try
        {
            if(self::validarExistenciaDeEmail($email) == 0 && self::validarExistenciaDeCelular($contacto) == 0 && self::validarExistenciaDenumeroDeDocumento($numeroDeDocumento) == 0){

            if ($stmt->execute([$stamp, $nome, $dataDeNascimento, $tipoDeDocumento, $numeroDeDocumento, $localDeEmissao, $data_emissao_doc, $sexo, $morada, $email, $contacto, $foto, $usuario_logado, $usuario_logado])) {
                $arr = array("success" => 1, "msg" => "Funcionario cadastrado com sucesso!." );

                echo json_encode($arr);
            }
            else
                {
                    $arr = array("success" => 0, "msg" => "Erro ao efectuar a operação.");
                    echo json_encode($arr);
                }

            }else{
                 $arr = array("success" => 0, "msg" => "O funcionario já encontra-se cadastrado no sistema.");
                echo json_encode($arr);
            }
     
        } catch(Exception $e)
        {
            $arr = array(
                "success" => 0,
                "msg" => "Erro ao efectuar a operação." . $e
            );
            echo json_encode($arr); //Ate aqui tudo Ok
            
        }
    }


    //Criando funciao para actualizar dados do funcionario
    public function update($id, $nome, $dataDeNascimento, $tipoDeDocumento, $numeroDeDocumento, $localDeEmissao, $data_emissao_doc, $sexo, $morada, $email, $contacto)
    {
        $usuario_logado = $_SESSION['id_usuario'];
        $query = "UPDATE funcionario SET nome = ?, dataDeNascimento = ?, tipoDeDocumento = ?, numeroDeDocumento = ? " ;
        $query .= ", localDeEmissao = ?, data_emissao_doc = ?, sexo = ?, morada=?, email = ?, contacto = ?, updated_by = ? " ;
        $query .= " WHERE md5(id) = ? ";
        $stmt = $this->connect()->prepare($query);
        try
        {
          if(self::validarExistenciaDeEmail($email) <= 1 && self::validarExistenciaDeCelular($contacto) <= 1 && self::validarExistenciaDenumeroDeDocumento($numeroDeDocumento) <= 1){

            if ($stmt->execute([$nome, $dataDeNascimento, $tipoDeDocumento, $numeroDeDocumento, $localDeEmissao, $data_emissao_doc, $sexo, $morada, $email, $contacto, $usuario_logado, $id])) {
                $arr = array(
                    "success" => 1,
                    "msg" => "Registo alterado com sucesso!."
                );

                echo json_encode($arr);
            }
            else
                {
                    $arr = array("success" => 0, "msg" => "Erro ao efectuar a operação.");
                    echo json_encode($arr);
                }

            }else{
                 $arr = array("success" => 0, "msg" => "O email, contacto ou nº do documento já reistado para ouro aluno no sistema.");
                echo json_encode($arr);
            }
     
        } catch(Exception $e)
        {
            $arr = array(
                "success" => 0,
                "msg" => "Erro ao efectuar a operação." . $e
            );
            echo json_encode($arr); //Ate aqui tudo Ok
            
        }
    }

    //UPDATE Perfil do Funcionario
      public function updateDadosPerfil($id, $morada, $email, $contacto)
        {
            $usuario_logado = $_SESSION['id_usuario'];
            $query = "UPDATE funcionario SET morada=?, email = ?, contacto = ?, updated_by = ? " ;
            $query .= " WHERE md5(id) = ? ";
            $stmt = $this->connect()->prepare($query);
            try
            {
              if(self::validarExistenciaDeEmail($email) <= 1 && self::validarExistenciaDeCelular($contacto) <= 1){
    
                if ($stmt->execute([$morada, $email, $contacto, $usuario_logado, $id])) {
                    $arr = array(
                        "success" => 1,
                        "msg" => "Registo alterado com sucesso!."
                    );
    
                    echo json_encode($arr);
                }
                else
                    {
                        $arr = array("success" => 0, "msg" => "Erro ao efectuar a operação.");
                        echo json_encode($arr);
                    }
    
                }else{
                     $arr = array("success" => 0, "msg" => "O email, contacto ou nº do documento já reistado para ouro aluno no sistema.");
                    echo json_encode($arr);
                }
         
            } catch(Exception $e)
            {
                $arr = array(
                    "success" => 0,
                    "msg" => "Erro ao efectuar a operação." . $e
                );
                echo json_encode($arr); //Ate aqui tudo Ok
                
            }
        }
    
    //Criando funciao para actualizar a Foto do funcionario
    public function updateFoto($id, $foto)
    {
        $usuario_logado = $_SESSION['id_usuario'];
        $query = "UPDATE funcionario SET foto = ? " ;
        $query .= " WHERE md5(id) = ? ";
        $stmt = $this->connect()->prepare($query);
        try
        {
            if ($stmt->execute([$foto, $id])) {
                return 1;
             }else { $arr = array("success" => 0, "msg" => "Erro ao carregar a foto!.");
                echo json_encode($arr);
            }
         
 
        } catch(Exception $e){
            $arr = array(
                "success" => 0,
                "msg" => "Erro ao efectuar a operação." . $e
            );
            echo json_encode($arr); //Ate aqui tudo Ok
            
        }
    }


    public function listarFuncionario()
    {
        $query = "SELECT * FROM `funcionario`";
        $stmt = $this->connect()
            ->prepare($query);
        $stmt->execute([]);

        try
        {
            $html = "";
            while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)){
                $id = md5($rs['id']);
                $email = $rs['email'];
                $stamp = $rs['funcionarioStamp'];
                $nome = $rs['nome'];
                $nivelAcesso = "";
                $controladorEliminar = md5('eliminarFuncionario').'f';
                $controlador = md5('alterar_estado_funcionario').'f';
                $controladorCriarUsuario = md5('criar_usuario').'f';
                $estadoIcone = ($rs['estado'] == 'activo') ? '<i class="fa fa-toggle-on" ></i>': '<i class="fa fa-toggle-off"></i>';
                $estiloLinha = ($rs['estado'] == 'activo') ? 'opacity:1': 'opacity:0.6';
                $estadoBotao = ($rs['estado'] == 'activo') ? 'btn-success': 'btn-danger';
                 $html .= "<tr style='".$estiloLinha."'>";
                 $html .= "<td >".$rs['nome']."</td>";
                 $html .= "<td >".$rs['contacto']."</td>";
                 $html .= "<td >".$rs['email']."</td>";
                $html .= "<td >".$da = date("d/m/Y", strtotime($rs['dataDeNascimento'])) ."</td>";
                 
                 $html .= "<td>";
                 $html .= "<button class='btn btn-sm ".$estadoBotao." estadoBotao' estado='".$rs['estado']."' controlador='".$controlador."' id='".$id ."' title='Alterar estado'>". $estadoIcone."</button> ";
                 $html .= "<a href='verDadosFuncionario?q=".$id."' class='btn btn-sm btn-primary' title='Ver dados'><i class='fa fa-eye'></i></a> ";
                 $html .= "<button class='btn btn-sm btn-secondary criarUsuario' controlador='".$controladorCriarUsuario."' stamp='".$stamp."' nome='".$nome."' email='".$email."' title='Criar Usuario' data-email='".$email."' data-stamp='".$stamp."'><i class='fa fa-user'></i></button>";
                 $html .= "<a class='btn btn-sm btn-danger eliminarFuncionario' controlador='".$controladorEliminar."' id='".$id."' nome='".$nome."  '  href='#'><i class='fa fa-trash mb-0' title='Excluir Funcionario'></i></a>&nbsp;";
                 $html .= " </td>";
                 $html .= " </tr>";
    
                }
            return $html;

        }catch(Exception $e)
        {
            $arr = array(
                "success" => 0,
                "msg" => "Erro ao efectuar a operação." . $e
            );
            echo json_encode($arr); //Ate aqui tudo Ok
            
        }
    }

     public function verDadosFuncionario($id)
    {
        $query = "SELECT * FROM `funcionario` WHERE md5(id) = ?";
        $stmt = $this->connect()
            ->prepare($query);
        $stmt->execute([$id]);

        try
        {

            return $rs = $stmt->fetch(PDO::FETCH_ASSOC);

        }catch(Exception $e)
        {
            $arr = array(
                "success" => 0,
                "msg" => "Erro ao efectuar a operação." . $e
            );
            echo json_encode($arr); //Ate aqui tudo Ok
            
        }
    }

     public function listarDisciplinas123()
     {
        $query = "SELECT * FROM `disciplina`";
 
         
         $stmt = $this->connect()->prepare($query);
         $stmt->execute([]);
 
         try
         {
             $html = "";
             while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)){
                 $id = md5($rs['id']);
                 $nome = $rs['nome'];
                 $controladorEditar = md5('alterarDisciplina').'f';
                $controladorEliminar = md5('eliminarDisciplina').'f';
                 $html .= "<div class='col-sm-6 col-md-6 col-lg-6 col-xl-3 mb-4'>";
                 $html .= "<div class='card'>";
                 $html .= "<div class='card-header pb-0 border-bottom-0 pb-12' style='margin-bottom:20px;'>";
                 $html .= "<h3 class='card-title' _msthash='3299504' _msttexthash='489853'>".$nome." </h3>";
                 $html .= "<div class='card-options'>";
                 $html .= "<a class='btn btn-sm btn-success' href='#'><i class='fa fa-eye mb-0'></i></a>&nbsp;";
                 $html .= "<a class='btn btn-sm btn-primary editarTurma' controlador='".$controladorEditar."' id='".$id."' nome='".$nome."'  href='#'><i class='fa fa-pencil mb-0' title='Editar Turma'></i></a>&nbsp;";
                $html .= "<a class='btn btn-sm btn-danger eliminarTurma' controlador='".$controladorEliminar."' id='".$id."' nome='".$nome."' href='#'><i class='fa fa-trash mb-0' title='Excluir Turma'></i></a>&nbsp;";
                 $html .= "</div>";
                 $html .= "</div>";
                 $html .= "</div>";
                 $html .= "</div>";
                
     
                 }

             return $html;
           
 
         }catch(Exception $e)
         {
             $arr = array(
                 "success" => 0,
                 "msg" => "Erro ao efectuar a operação." . $e
             );
             echo json_encode($arr); //Ate aqui tudo Ok
             
         }
     }





}
//Fim funcao funcionario

//Usuario

class usuario extends conexao
{

        public function validarExistenciaDeEmail($email)
        {
            $query = "SELECT * FROM `usuario` WHERE `usuario` = ? ";
            $stmt = $this->connect()
                ->prepare($query);
            $stmt->execute([$email]);
    
            try
            {
                $i = 0;
                while ($rs = $stmt->fetch(PDO::FETCH_ASSOC))
                 $i++;
                 return $i;
            }catch(Exception $e)
            {
                $arr = array(
                    "success" => 0,
                    "msg" => "Erro ao efectuar a operação." . $e
                );
                echo json_encode($arr); //Ate aqui tudo Ok
                
            }
        }
   
        public function alterarEstado($id, $estado)
        {
            $usuario_logado = $_SESSION['id_usuario'];
            $query = "UPDATE usuario SET estado = ?, updated_by = ? " ;
            $query .= " WHERE md5(id) = ? ";
            $stmt = $this->connect()->prepare($query);
            try
            {
                if ($stmt->execute([$estado, $usuario_logado,  $id])) {
                        $arr = array("success" => 1, "msg" => "Estado alterado com sucesso.");
                         echo json_encode($arr);
                 }else { $arr = array("success" => 0, "msg" => "Erro ao carregar a foto!.");
                         echo json_encode($arr);
                }
             
     
            } catch(Exception $e){
                $arr = array("success" => 0, "msg" => "Erro ao efectuar a operação." . $e);
                echo json_encode($arr); //Ate aqui tudo Ok
                
            }
        }


            public function redefinir_senha($usuario, $senha)
        {
            $usuario_logado = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] :0;
            $query = "UPDATE usuario SET senha = ?, updated_by = ? " ;
            $query .= " WHERE usuario = ? ";
            $stmt = $this->connect()->prepare($query);
            try
            {
                if ($stmt->execute([password_hash($senha,PASSWORD_DEFAULT), $usuario_logado,  $usuario])) {
                        $arr = array("success" => 1, "msg" => "Senha redefinida com sucesso."); 
                         echo json_encode($arr);
                 }else { $arr = array("success" => 0, "msg" => "Erro ao carregar a foto!.");
                         echo json_encode($arr);
                }
             
     
            } catch(Exception $e){
                $arr = array(
                    "success" => 0,
                    "msg" => "Erro ao efectuar a operação." . $e
                );
                echo json_encode($arr); //Ate aqui tudo Ok
                
            }
        }





        public function alterar_tema()
        {
            $usuario_logado = $_SESSION['id_usuario'];
            $query = "UPDATE usuario 
                      SET temaPadrao = (CASE WHEN temaPadrao = 0 THEN 1 ELSE 0 END) 
                      WHERE id = ?";

            try {
                $stmt = $this->connect()->prepare($query);
                $stmt->execute([$usuario_logado]);

                if ($stmt->rowCount() > 0) {
                    $query = "SELECT temaPadrao FROM usuario WHERE id = ?";
                    $stmt = $this->connect()->prepare($query);
                    $stmt->execute([$usuario_logado]);

                    if ($rs = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $_SESSION['temaPadrao'] = ($rs['temaPadrao'] == 0) ? '' : 'dark-mode';
                        $arr = array("success" => 1, "msg" => "Tema alterado com sucesso.");
                        echo json_encode($arr);
                    } else {
                        $arr = array("success" => 0, "msg" => "Erro ao efetuar a operação!.");
                        echo json_encode($arr);
                    }
                } else {
                    $arr = array("success" => 0, "msg" => "Erro ao efetuar a operação!.");
                    echo json_encode($arr);
                }
            } catch (PDOException $e) {
                $arr = array(
                    "success" => 0,
                    "msg" => "Erro ao efetuar a operação: " . $e->getMessage()
                );
                echo json_encode($arr);
            }
        }

        public function alterar_senha($senha)
        {
            $usuario_logado = $_SESSION['id_usuario']; 
            $query = "UPDATE usuario SET senha = ?";
            $query .= " WHERE id = ? ";
            $stmt = $this->connect()->prepare($query);
            try {
                          
              if ($stmt->execute([password_hash($senha,PASSWORD_DEFAULT),$usuario_logado])) { 
                        $arr = array("success" => 1, "msg" => "A sua senha foi alterada com sucesso.");
                        echo json_encode($arr);
                    } else {
                        $arr = array("success" => 0, "msg" => "Erro ao efetuar a operação!.");
                        echo json_encode($arr);
                    }
              
            } catch (PDOException $e) {
                $arr = array(
                    "success" => 0,
                    "msg" => "Erro ao efetuar a operação: " . $e->getMessage()
                );
                echo json_encode($arr);
            }
        }



    public function insertUsuario($usuario, $nivelAcesso, $stamp)
     {
        //$usuario = new usuario();
        //$sessao = new $sessao();
        //$senha =$sessao->gerarSenha();
        $usuario_logado = $_SESSION['id_usuario'];
       $query = "INSERT INTO usuario(usuarioStamp,usuario,senha, nivelAcesso, created_by,updated_by) VALUES (?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($query);
        try
        {
            if(self::validarExistenciaDeEmail($usuario) == 0 ){

            if ($stmt->execute([$stamp, $usuario, password_hash('', PASSWORD_DEFAULT), $nivelAcesso,  $usuario_logado, $usuario_logado])) {
                //$sessao->send_mail($usuario,'','Activação de conta',$sessao->corpo_mail_boas_vindas($usuario,$senha));
                $arr = array("success" => 1, "msg" => "Usuário criado com sucesso!." );

                echo json_encode($arr);
            }
            else
                {
                    $arr = array("success" => 0, "msg" => "Erro ao efectuar a operação.");
                    echo json_encode($arr);
                }

            }else{
                 $arr = array("success" => 0, "msg" => "O usuário já encontra-se cadastrado no sistema.");
                echo json_encode($arr);
            }
     
        } catch(Exception $e)
        {
            $arr = array("success" => 0, "msg" => "Erro ao efectuar a operação." . $e);
            echo json_encode($arr); //Ate aqui tudo Ok
            
        }
    }


    public function listar()
    {
        $query = "SELECT usuario.id, usuario.usuarioStamp,usuario.usuario,nivel_acesso.nomeNivelAcesso,usuario.estado,Entidade.nome FROM `usuario` JOIN nivel_acesso ON nivel_acesso.idNivelAcesso = usuario.nivelAcesso INNER JOIN funcionario Entidade ON Entidade.funcionarioStamp = usuario.usuarioStamp WHERE usuario.usuarioStamp <> '' ";//<> '' significa diferente de vazio
        $query .= " UNION ALL ";
        $query .= " SELECT usuario.id, usuario.usuarioStamp,usuario.usuario,nivel_acesso.nomeNivelAcesso,usuario.estado,Entidade.nome FROM `usuario` JOIN nivel_acesso ON nivel_acesso.idNivelAcesso = usuario.nivelAcesso INNER JOIN professor Entidade ON Entidade.professorStamp = usuario.usuarioStamp WHERE usuario.usuarioStamp <> '' ";
        $query .= " UNION ALL ";
        $query .= " SELECT usuario.id, usuario.usuarioStamp,usuario.usuario,nivel_acesso.nomeNivelAcesso,usuario.estado,Entidade.nome FROM `usuario` JOIN nivel_acesso ON nivel_acesso.idNivelAcesso = usuario.nivelAcesso INNER JOIN aluno Entidade ON Entidade.alunoStamp = usuario.usuarioStamp WHERE usuario.usuarioStamp <> '' ";
        $stmt = $this->connect()
            ->prepare($query);
        $stmt->execute([]);

        try
        {
            $html = "";
            while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)){
                $id = md5($rs['id']);
                $usuario = $rs['usuario'];
                $nome = $rs['nome'];
                $controlador = md5('alterar_estado_usuario').'f';
                $controladorEliminar = md5('eliminarUsu').'f';
                $controlador2 = md5('pedido_de_senha').'f';
                $estadoIcone = ($rs['estado'] == 'activo') ? '<i class="fa fa-toggle-on" ></i>': '<i class="fa fa-toggle-off"></i>';
                $estiloLinha = ($rs['estado'] == 'activo') ? 'opacity:1': 'opacity:0.6';
                $estadoBotao = ($rs['estado'] == 'activo') ? 'btn-success': 'btn-danger';
                 $html .= "<tr style='".$estiloLinha."'>";
                 $html .= "<td >".$rs['nome']."</td>";
                 $html .= "<td >".$rs['usuario']."</td>";
                 $html .= "<td >".$rs['nomeNivelAcesso']."</td>";
                 $html .= "<td>";
                 $html .= "<button class='btn btn-sm ".$estadoBotao." estadoBotao' estado='".$rs['estado']."' controlador='".$controlador."' id='".$id ."' title='Alterar estado'>". $estadoIcone."</button> ";
                 $html .= "<button class='btn btn-sm btn-secondary redefinir_senha_usuario' controlador='".$controlador2."' usuario='".$usuario ."' title='Redefinir Senha'><i class='fa fa-key' ></i></button> ";
                 $html .= "<a class='btn btn-sm btn-danger eliminarUsuario' controlador='".$controladorEliminar."' id='".$id."' nome='".$nome."  '  href='#'><i class='fa fa-trash mb-0' title='Excluir Funcionario'></i></a>&nbsp;";
                $html .= " </tr>";
    
                }
            return $html;

        }catch(Exception $e)
        {
            $arr = array(
                "success" => 0,
                "msg" => "Erro ao efectuar a operação." . $e
            );
            echo json_encode($arr); //Ate aqui tudo Ok
            
        }
    }

     public function verDadosFuncionario($id)
    {
        $query = "SELECT * FROM `funcionario` WHERE md5(id) = ?";
        $stmt = $this->connect()
            ->prepare($query);
        $stmt->execute([$id]);

        try
        {

            return $rs = $stmt->fetch(PDO::FETCH_ASSOC);

        }catch(Exception $e)
        {
            $arr = array(
                "success" => 0,
                "msg" => "Erro ao efectuar a operação." . $e
            );
            echo json_encode($arr); //Ate aqui tudo Ok
            
        }
    }
}

//Fim Usuario


//Criando funciao para iserir dados do professor
class professor extends conexao
{
    public function validarExistenciaDeEmail($email)
        {

            $query = "SELECT * FROM `professor` WHERE `email` = ? ";
            $stmt = $this->connect()
                ->prepare($query);
            $stmt->execute([$email]);
    
            try
            {
               $i = 0;
                 while ($rs = $stmt->fetch(PDO::FETCH_ASSOC))
                $i++;
                return $i;
            }catch(Exception $e)
            {
                $arr = array(
                    "success" => 0,
                    "msg" => "Erro ao efectuar a operação." . $e
                );
                echo json_encode($arr); //Ate aqui tudo Ok
                
            }
        }
    
         public function validarExistenciaDeCelular($contacto)
        {
            $query = "SELECT * FROM `professor` WHERE `contacto` = ? ";
            $stmt = $this->connect()
                ->prepare($query);
            $stmt->execute([$contacto]);
    
            try
            {
                $i = 0;
                while ($rs = $stmt->fetch(PDO::FETCH_ASSOC))
                 $i++;
                 return $i;
            }catch(Exception $e)
            {
                $arr = array(
                    "success" => 0,
                    "msg" => "Erro ao efectuar a operação." . $e
                );
                echo json_encode($arr); //Ate aqui tudo Ok
                
            }
        }

    
        public function validarExistenciaDenumeroDeDocumento($numeroDeDocumento)
        {
            $query = "SELECT * FROM `professor` WHERE `numeroDeDocumento` = ? ";
            $stmt = $this->connect()
                ->prepare($query);
            $stmt->execute([$numeroDeDocumento]);
    
            try
            {
               $i = 0;
                while ($rs = $stmt->fetch(PDO::FETCH_ASSOC))
                 $i++;
                 return $i;
            }catch(Exception $e)
            {
                $arr = array(
                    "success" => 0,
                    "msg" => "Erro ao efectuar a operação." . $e
                );
                echo json_encode($arr); //Ate aqui tudo Ok
                
            }
        }

        public function alterarEstado($id, $estado)
        {
            $usuario_logado = $_SESSION['id_usuario'];
            $query = "UPDATE professor SET estado = ?, updated_by = ? " ;
            $query .= " WHERE md5(id) = ? ";
            $stmt = $this->connect()->prepare($query);
            try
            {
                if ($stmt->execute([$estado, $usuario_logado,  $id])) {
                        $arr = array("success" => 1, "msg" => "Estado alterado com sucesso.");
                         echo json_encode($arr);
                 }else { $arr = array("success" => 0, "msg" => "Erro ao carregar a foto!.");
                         echo json_encode($arr);
                }
             
     
            } catch(Exception $e){
                $arr = array(
                    "success" => 0,
                    "msg" => "Erro ao efectuar a operação." . $e
                );
                echo json_encode($arr); //Ate aqui tudo Ok
                
            }
        }

     
        

    public function insert($nome, $dataDeNascimento, $tipoDeDocumento, $numeroDeDocumento, $localDeEmissao, $data_emissao_doc, $sexo, $morada, $email, $contacto, $foto)
    {
        $usuario = new usuario();
        $sessao = new sessao();
        $usuario_logado = $_SESSION['id_usuario'];
        $stamp = md5(rand()) .'.'. Date('Ymd') .'.'. $usuario_logado; 
        $senha =$sessao->gerarSenha();
        $query = "INSERT INTO professor(professorStamp ,nome, dataDeNascimento, tipoDeDocumento, numeroDeDocumento, localDeEmissao, data_emissao_doc, sexo, morada, email, contacto, foto, created_by,
    updated_by) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $query2 = "INSERT INTO usuario(usuarioStamp,usuario,senha, nivelAcesso, created_by,updated_by) VALUES (?,?,?,?,?,?)";
    $pdo = $this->connect();
    $pdo->beginTransaction();
        try
        {
            if($usuario->validarExistenciaDeEmail($email) == 0 && self::validarExistenciaDeCelular($contacto) == 0 && self::validarExistenciaDenumeroDeDocumento($numeroDeDocumento) == 0){
            $stmt = $pdo->prepare($query);
            $stmt->execute([$stamp, $nome, $dataDeNascimento, $tipoDeDocumento, $numeroDeDocumento, $localDeEmissao, $data_emissao_doc, $sexo, $morada, $email, $contacto, $foto, $usuario_logado, $usuario_logado]);
            $stmt = $pdo->prepare($query2);
            $stmt->execute([$stamp, $email, password_hash($senha, PASSWORD_DEFAULT), 3,  $usuario_logado, $usuario_logado]);
               
            // Use a função corpo_email_confirmacao_inscricao para gerar o HTML
            $htmlProfessor = $sessao->corpo_email_boas_vindas($email, $senha);    
            if($pdo->inTransaction())
            $pdo->commit();
            $arr = array("success" => 1, "msg" => "Matrícula efetuada com sucesso.", "htmlProfessor" => $htmlProfessor);
            echo json_encode($arr);

           
            }else{
                if($pdo->inTransaction())
                     $pdo->rollBack();
                 $arr = array("success" => 0, "msg" => "O professor já encontra-se cadastrado no sistema.");
                echo json_encode($arr);
            }
     
        } catch(Exception $e){
            if($pdo->inTransaction())
                 $pdo->rollBack();
            $arr = array("success" => 0, "msg" => "Erro ao efectuar a operação." . $e);
            echo json_encode($arr); //Ate aqui tudo Ok
            
        }
    }

    //Criando funciao para actualizar dados do professor
    public function update($id, $nome, $dataDeNascimento, $tipoDeDocumento, $numeroDeDocumento, $localDeEmissao, $data_emissao_doc, $sexo, $morada, $email, $contacto)
    {
        $usuario_logado = $_SESSION['id_usuario'];
        $query = "UPDATE professor SET nome = ?, dataDeNascimento = ?, tipoDeDocumento = ?, numeroDeDocumento = ? " ;
        $query .= ", localDeEmissao = ?, data_emissao_doc = ?, sexo = ?, morada=?, email = ?, contacto = ?, updated_by = ? " ;
        $query .= " WHERE md5(id) = ? ";
        $stmt = $this->connect()->prepare($query);
        try
        {
          if(self::validarExistenciaDeEmail($email) <= 1 && self::validarExistenciaDeCelular($contacto) <= 1 && self::validarExistenciaDenumeroDeDocumento($numeroDeDocumento) <= 1){

            if ($stmt->execute([$nome, $dataDeNascimento, $tipoDeDocumento, $numeroDeDocumento, $localDeEmissao, $data_emissao_doc, $sexo, $morada, $email, $contacto, $usuario_logado, $id])) {
                $arr = array(
                    "success" => 1,
                    "msg" => "Registo alterado com sucesso!."
                );

                echo json_encode($arr);
            }
            else
                {
                    $arr = array("success" => 0, "msg" => "Erro ao efectuar a operação.");
                    echo json_encode($arr);
                }

            }else{
                 $arr = array("success" => 0, "msg" => "O email, contacto ou nº do documento já reistado para ouro aluno no sistema.");
                echo json_encode($arr);
            }
     
        } catch(Exception $e)
        {
            $arr = array(
                "success" => 0,
                "msg" => "Erro ao efectuar a operação." . $e
            );
            echo json_encode($arr); //Ate aqui tudo Ok
            
        }
    }

    //UPDATE Perfil do Professor
    public function updateDadosPerfil($id, $morada, $email, $contacto)
    {
        $usuario_logado = $_SESSION['id_usuario'];
        $query = "UPDATE professor SET morada=?, email = ?, contacto = ?, updated_by = ? " ;
        $query .= " WHERE md5(id) = ? ";
        $stmt = $this->connect()->prepare($query);
        try
        {
          if(self::validarExistenciaDeEmail($email) <= 1 && self::validarExistenciaDeCelular($contacto) <= 1){

            if ($stmt->execute([$morada, $email, $contacto, $usuario_logado, $id])) {
                $arr = array(
                    "success" => 1,
                    "msg" => "Registo alterado com sucesso!."
                );

                echo json_encode($arr);
            }
            else
                {
                    $arr = array("success" => 0, "msg" => "Erro ao efectuar a operação.");
                    echo json_encode($arr);
                }

            }else{
                 $arr = array("success" => 0, "msg" => "O email, contacto ou nº do documento já reistado para ouro aluno no sistema.");
                echo json_encode($arr);
            }
     
        } catch(Exception $e)
        {
            $arr = array(
                "success" => 0,
                "msg" => "Erro ao efectuar a operação." . $e
            );
            echo json_encode($arr); //Ate aqui tudo Ok
            
        }
    }

    //Criando funciao para actualizar a Foto do professor
    public function updateFoto($id, $foto)
    {
        $usuario_logado = $_SESSION['id_usuario'];
        $query = "UPDATE professor SET foto = ? " ;
        $query .= " WHERE md5(id) = ? ";
        $stmt = $this->connect()->prepare($query);
        try
        {
            if ($stmt->execute([$foto, $id])) {
                return 1;
             }else { $arr = array("success" => 0, "msg" => "Erro ao carregar a foto!.");
                echo json_encode($arr);
            }
         
 
        } catch(Exception $e){
            $arr = array(
                "success" => 0,
                "msg" => "Erro ao efectuar a operação." . $e
            );
            echo json_encode($arr); //Ate aqui tudo Ok
            
        }
    }

    // Listar dados do professor
    public function listarProfessor()
    {
        $query = "SELECT * FROM `professor`";
        $stmt = $this->connect()
            ->prepare($query);
        $stmt->execute([]);

        try
        {
            $html = "";
            while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)){
                $id = $rs['id'];
                $email = $rs['email'];
                $stamp = $rs['professorStamp'];
                $nome = $rs['nome'];
                $controladorEliminar = md5('eliminarProfessor').'f';
                $controlador = md5('alterar_estado_professor').'f';
                $estadoIcone = ($rs['estado'] == 'activo') ? '<i class="fa fa-toggle-on" ></i>': '<i class="fa fa-toggle-off"></i>';
                $estiloLinha = ($rs['estado'] == 'activo') ? 'opacity:1': 'opacity:0.6';
                $estadoBotao = ($rs['estado'] == 'activo') ? 'btn-success': 'btn-danger';
                 $html .= "<tr style='".$estiloLinha."'>";
                 $html .= "<td >".$rs['nome']."</td>";
                 $html .= "<td >".$rs['contacto']."</td>";
                 $html .= "<td >".$rs['email']."</td>";
                 $html .= "<td >".$da = date("d/m/Y", strtotime($rs['dataDeNascimento'])) ."</td>";
                 $html .= "<td>";
                 $html .= "<button class='btn btn-sm ".$estadoBotao." estadoBotao' estado='".$rs['estado']."' controlador='".$controlador."' id='".$id ."' title='Alterar estado'>". $estadoIcone."</button> ";
                 $html .= "<a href='verDadosProfessor?q=".$id."' class='btn btn-sm btn-primary' title='Ver dados'><i class='fa fa-eye'></i></a>";
                 $html .= "<a class='btn btn-sm btn-danger eliminarProfessor' controlador='".$controladorEliminar."' id='".$id."' nome='".$nome."  '  href='#'><i class='fa fa-trash mb-0' title='Excluir professor'></i></a>&nbsp;";
                 $html .= " </td>";
                 $html .= " </tr>";
    
                }
            return $html;

        }catch(Exception $e)
        {
            $arr = array("success" => 0,"msg" => "Erro ao efectuar a operação." . $e);
            echo json_encode($arr); //Ate aqui tudo Ok
            
        }
    }


     public function verDadosProfessor($id)
    {
        $query = "SELECT * FROM `professor` WHERE md5(id) = ?";
        $stmt = $this->connect()
            ->prepare($query);
        $stmt->execute([$id]);

        try
        {

            return $rs = $stmt->fetch(PDO::FETCH_ASSOC);

        }catch(Exception $e)
        {
            $arr = array(
                "success" => 0,
                "msg" => "Erro ao efectuar a operação." . $e
            );
            echo json_encode($arr); //Ate aqui tudo Ok
            
        }
    }
}
//Fim funcao professor

//Criando funciao para inserir dados de TURMAS 
class gestaoInterna extends conexao
{
    public function totalAlunos()
    {
        $query = "SELECT * FROM `aluno` ";
        $stmt = $this->connect()
            ->prepare($query);
        $stmt->execute([]);

        try
        {

            return $rs = $stmt->rowCount();

        }catch(Exception $e)
        {
            $arr = array(
                "success" => 0,
                "msg" => "Erro ao efectuar a operação." . $e
            );
            echo json_encode($arr); //Ate aqui tudo Ok
            
        }
    }
    public function totalUsuarios()
    {
        $query = "SELECT * FROM `usuario` ";
        $stmt = $this->connect()
            ->prepare($query);
        $stmt->execute([]);

        try
        {

            return $rs = $stmt->rowCount();

        }catch(Exception $e)
        {
            $arr = array(
                "success" => 0,
                "msg" => "Erro ao efectuar a operação." . $e
            );
            echo json_encode($arr); //Ate aqui tudo Ok
            
        }
    }
    public function totalProfessores()
    {
        $query = "SELECT * FROM `professor` ";
        $stmt = $this->connect()
            ->prepare($query);
        $stmt->execute([]);

        try
        {

            return $rs = $stmt->rowCount();

        }catch(Exception $e)
        {
            $arr = array(
                "success" => 0,
                "msg" => "Erro ao efectuar a operação." . $e
            );
            echo json_encode($arr); //Ate aqui tudo Ok
            
        }
    }
    public function totalFuncionarios()
    {
        $query = "SELECT * FROM `funcionario` ";
        $stmt = $this->connect()
            ->prepare($query);
        $stmt->execute([]);

        try
        {

            return $rs = $stmt->rowCount();

        }catch(Exception $e)
        {
            $arr = array(
                "success" => 0,
                "msg" => "Erro ao efectuar a operação." . $e
            );
            echo json_encode($arr); //Ate aqui tudo Ok
            
        }
    }

    public function totalClasses()
    {
        $query = "SELECT * FROM `classe` ";
        $stmt = $this->connect()
            ->prepare($query);
        $stmt->execute([]);

        try
        {

            return $rs = $stmt->rowCount();

        }catch(Exception $e)
        {
            $arr = array(
                "success" => 0,
                "msg" => "Erro ao efectuar a operação." . $e
            );
            echo json_encode($arr); //Ate aqui tudo Ok
            
        }
    }
    public function totalTurmas($classe)
    {
        $classe = ($classe) ? $classe : 0;
        $query = "SELECT * FROM `turma` WHERE (CASE WHEN ? > 0 THEN classe ELSE '' END) = (CASE WHEN ? > 0 THEN ? ELSE '' END)";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$classe,$classe,$classe]);

        try
        {

            return $rs = $stmt->rowCount();

        }catch(Exception $e)
        {
            $arr = array(
                "success" => 0,
                "msg" => "Erro ao efectuar a operação." . $e
            );
            echo json_encode($arr); //Ate aqui tudo Ok
            
        }
    }

    public function coleta_matricula() {
    try {
        $usuario_logado = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : 0;

        // Construir a consulta SQL para somar os valores de todos os meses
        $query = "SELECT SUM(`valorMatricula`)  as total_matricula FROM matricula";

        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row['total_matricula'];
    } catch (Exception $e) {
        // Trate exceções aqui, se necessário
        return 0; // Retorne 0 em caso de erro
    }
}
public function coleta_de_fevereiro() {
    try {
        $usuario_logado = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : 0;

        // Construir a consulta SQL para somar os valores de todos os meses
        $query = "SELECT SUM(`Fevereiro`)  as total_fevereiro FROM pagar_mensalidade";

        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row['total_fevereiro'];
        
    } catch (Exception $e) {
        // Trate exceções aqui, se necessário
        return 0; // Retorne 0 em caso de erro
    }

}
public function coleta_de_marco() {
    try {
        $usuario_logado = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : 0;
        $query = "SELECT SUM(`Marco`)  as total_marco FROM pagar_mensalidade";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total_marco'];
         } catch (Exception $e) {
         return 0; // Retorne 0 em caso de erro
    }
}
public function coleta_de_abril() {
    try {
        $usuario_logado = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : 0;
        $query = "SELECT SUM(`Abril`)  as total_abril FROM pagar_mensalidade";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total_abril'];
         } catch (Exception $e) {
         return 0; // Retorne 0 em caso de erro
    }
}
public function coleta_de_maio() {
    try {
        $usuario_logado = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : 0;
        $query = "SELECT SUM(`Maio`)  as total_maio FROM pagar_mensalidade";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total_maio'];
         } catch (Exception $e) {
         return 0; // Retorne 0 em caso de erro
    }
}
public function coleta_de_junho() {
    try {
        $usuario_logado = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : 0;
        $query = "SELECT SUM(`Junho`)  as total_junho FROM pagar_mensalidade";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total_junho'];
         } catch (Exception $e) {
         return 0; // Retorne 0 em caso de erro
    }
}
public function coleta_de_julho() {
    try {
        $usuario_logado = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : 0;
        $query = "SELECT SUM(`Julho`)  as total_julho FROM pagar_mensalidade";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total_julho'];
         } catch (Exception $e) {
         return 0; // Retorne 0 em caso de erro
    }
}
public function coleta_de_agosto() {
    try {
        $usuario_logado = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : 0;
        $query = "SELECT SUM(`Agosto`)  as total_agosto FROM pagar_mensalidade";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total_agosto'];
         } catch (Exception $e) {
         return 0; // Retorne 0 em caso de erro
    }
}
public function coleta_de_setembro() {
    try {
        $usuario_logado = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : 0;
        $query = "SELECT SUM(`Setembro`)  as total_setembro FROM pagar_mensalidade";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total_setembro'];
         } catch (Exception $e) {
         return 0; // Retorne 0 em caso de erro
    }
}
public function coleta_de_outubro() {
    try {
        $usuario_logado = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : 0;
        $query = "SELECT SUM(`Outubro`)  as total_outubro FROM pagar_mensalidade";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total_outubro'];
         } catch (Exception $e) {
         return 0; // Retorne 0 em caso de erro
    }
}
public function coleta_de_novembro() {
    try {
        $usuario_logado = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : 0;
        $query = "SELECT SUM(`Novembro`)  as total_novembro FROM pagar_mensalidade";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total_novembro'];
         } catch (Exception $e) {
         return 0; // Retorne 0 em caso de erro
    }
}
public function coleta_de_dezembro() {
    try {
        $usuario_logado = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : 0;
        $query = "SELECT SUM(`Dezembro`)  as total_dezembro FROM pagar_mensalidade";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total_dezembro'];
         } catch (Exception $e) {
         return 0; // Retorne 0 em caso de erro
    }
}



  public function coleta_mensalidade_por_mes() {
    try {
       $usuario_logado = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : 0;
       $nomeMes = date('F');
       if($nomeMes == 'February' ){
        $query = "SELECT SUM(`Fevereiro`)  as total_mensal FROM pagar_mensalidade";
         $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total_mensal'];
       }elseif($nomeMes == 'March'){
        $query = "SELECT SUM(`Marco`)  as total_mensal FROM pagar_mensalidade";
         $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total_mensal'];
       }elseif($nomeMes == 'April'){
        $query = "SELECT SUM(`Abril`)  as total_mensal FROM pagar_mensalidade";
         $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total_mensal'];
       }elseif($nomeMes == 'May'){
        $query = "SELECT SUM(`Maio`)  as total_mensal FROM pagar_mensalidade";
         $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total_mensal'];
       }elseif($nomeMes == 'June'){
        $query = "SELECT SUM(`Junho`)  as total_mensal FROM pagar_mensalidade";
         $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total_mensal'];
       }elseif($nomeMes == 'July'){
        $query = "SELECT SUM(`Julho`)  as total_mensal FROM pagar_mensalidade";
         $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total_mensal'];
       }elseif($nomeMes == 'August'){
        $query = "SELECT SUM(`Agosto`)  as total_mensal FROM pagar_mensalidade";
         $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total_mensal'];
       }elseif($nomeMes == 'September'){
        $query = "SELECT SUM(`Setembro`)  as total_mensal FROM pagar_mensalidade";
         $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total_mensal'];
       }elseif($nomeMes == 'October'){
        $query = "SELECT SUM(`Outubro`)  as total_mensal FROM pagar_mensalidade";
         $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total_mensal'];
       }elseif($nomeMes == 'November'){
        $query = "SELECT SUM(`Novembro`)  as total_mensal FROM pagar_mensalidade";
         $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total_mensal'];
       }elseif($nomeMes == 'December'){
        $query = "SELECT SUM(`Dezembro`)  as total_mensal FROM pagar_mensalidade";
         $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total_mensal'];
       }else{
        return 0;
       }

    } catch (Exception $e) {
        // Trate exceções aqui, se necessário
        return 0; // Retorne 0 em caso de erro
    }
}


/*public function coleta_mensalidade() {
    try {
        $usuario_logado = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : 0;

        // Construir a consulta SQL para somar os valores de todos os meses
        $query = "SELECT SUM(`Fevereiro`) + SUM(`Marco`) + SUM(`Abril`) + SUM(`Maio`) + SUM(`Junho`) + SUM(`Julho`) + SUM(`Agosto`) + SUM(`Setembro`) + SUM(`Outubro`) + SUM(`Novembro`) + SUM(`Dezembro`) as total_mensalidade FROM pagar_mensalidade";

        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row['total_mensalidade'];
    } catch (Exception $e) {
        // Trate exceções aqui, se necessário
        return 0; // Retorne 0 em caso de erro
    }
}*/

public function soma_valores_pagamento() {
    try {
        // Construir a consulta SQL para somar os valores das colunas 'Fevereiro', 'Marco', etc.
        $query = "SELECT SUM(Fevereiro + Marco + Abril + Maio + Junho + Julho + Agosto + Setembro + Outubro + Novembro + Dezembro) as total_pagamento FROM pagar_mensalidade";

        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row['total_pagamento'];
    } catch (Exception $e) {
        // Trate exceções aqui, se necessário
        return 0; // Retorne 0 em caso de erro
    }
}


public function soma_multa_mensalidade() {
    try {
        // Construir a consulta SQL para somar os valores da coluna 'multa'
        $query = "SELECT SUM(multa) as total_multa FROM mensalidade";

        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row['total_multa'];
    } catch (Exception $e) {
        // Trate exceções aqui, se necessário
        return 0; // Retorne 0 em caso de erro
    }
}

public function coleta_mensalidade() {
    $soma_mensalidade = $this->soma_valores_pagamento();
    $soma_multa = $this->soma_multa_mensalidade();

    // Soma total
    $total = $soma_mensalidade + $soma_multa;

    return $total;
}



public function coleta_total_anual() {
    $totalMatricula = $this->coleta_matricula();
    $totalMensalidade = $this->coleta_mensalidade();

    // Somar os resultados das duas funções
    $somatorio = $totalMatricula + $totalMensalidade;

    return $somatorio;
}



 public function listarSalas()
     {
        $query = "SELECT * FROM `sala` ORDER BY nome";
 
         
         $stmt = $this->connect()->prepare($query);
         $stmt->execute([]);
 
         try
         {
             $html = "";
             while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)){
                 $id = $rs['id'];
                 $nome = $rs['nome'];
                 $controladorEditar = md5('alterarSala').'f';
                 $controladorEliminar = md5('eliminarSala').'f';
                 $html .= "<div class='col-sm-6 col-md-6 col-lg-6 col-xl-3 mb-4'>";
                 $html .= "<div class='card'>";
                 $html .= "<div class='card-header pb-0 border-bottom-0 pb-12' style='margin-bottom:20px;'>";
                 $html .= "<h3 class='card-title' _msthash='3299504' _msttexthash='489853'> Sala: ".$nome." </h3>";
                 $html .= "<div class='card-options'>";
                 $html .= "<a class='btn btn-sm btn-success editarSala' controlador='".$controladorEditar."' id='".$id."' nome='".$nome."'  href='#'><i class='fa fa-pencil mb-0' title='Editar Turma'></i></a>&nbsp;";
                $html .= "<a class='btn btn-sm btn-danger eliminarSala' controlador='".$controladorEliminar."' id='".$id."' nome='".$nome."' href='#'><i class='fa fa-trash mb-0' title='Excluir Sala'></i></a>&nbsp;";
                 $html .= "</div>";
                 $html .= "</div>";
                 $html .= "</div>";
                 $html .= "</div>";
                
     
                 }

             return $html;
           
 
         }catch(Exception $e)
         {
             $arr = array(
                 "success" => 0,
                 "msg" => "Erro ao efectuar a operação." . $e
             );
             echo json_encode($arr); //Ate aqui tudo Ok
             
         }
     }



 public function listarDisciplinas()
     {
        $query = "SELECT * FROM `disciplina`";
 
         
         $stmt = $this->connect()->prepare($query);
         $stmt->execute([]);
 
         try
         {
             $html = "";
             while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)){
                 $id = md5($rs['id']);
                 $nome = $rs['nome'];
                 $controladorEditar = md5('alterarDisciplina').'f';
                $controladorEliminar = md5('eliminarDisciplina').'f';
                 $html .= "<div class='col-sm-6 col-md-6 col-lg-6 col-xl-3 mb-4'>";
                 $html .= "<div class='card'>";
                 $html .= "<div class='card-header pb-0 border-bottom-0 pb-12' style='margin-bottom:20px;'>";
                 $html .= "<h3 class='card-title' _msthash='3299504' _msttexthash='489853'>".$nome." </h3>";
                 $html .= "<div class='card-options'>";
                 $html .= "<a class='btn btn-sm btn-success' href='#'><i class='fa fa-eye mb-0'></i></a>&nbsp;";
                 $html .= "<a class='btn btn-sm btn-primary editarTurma' controlador='".$controladorEditar."' id='".$id."' nome='".$nome."'  href='#'><i class='fa fa-pencil mb-0' title='Editar Turma'></i></a>&nbsp;";
                $html .= "<a class='btn btn-sm btn-danger eliminarTurma' controlador='".$controladorEliminar."' id='".$id."' nome='".$nome."' href='#'><i class='fa fa-trash mb-0' title='Excluir Turma'></i></a>&nbsp;";
                 $html .= "</div>";
                 $html .= "</div>";
                 $html .= "</div>";
                 $html .= "</div>";
                
     
                 }

             return $html;
           
 
         }catch(Exception $e)
         {
             $arr = array(
                 "success" => 0,
                 "msg" => "Erro ao efectuar a operação." . $e
             );
             echo json_encode($arr); //Ate aqui tudo Ok
             
         }
     }

public function mensalidadeOld($q)
{
     $query = "SELECT aluno.*, CONCAT(classe.nome, '  ', turma.nome) turma, matricula.stampAluno, matricula.valorMatricula, matricula.valorMensalidade
              FROM `aluno` 
              JOIN matricula ON matricula.stampAluno = aluno.alunoStamp 
              JOIN turma ON turma.id = matricula.turma 
              JOIN classe ON classe.id = turma.classe";
    $query .= " WHERE (CASE WHEN ? = '' THEN matricula.ano ELSE md5(turma.id) END) = (CASE WHEN ? = '' THEN ? ELSE ? END)";
    $stmt = $this->connect()->prepare($query);
    $stmt->execute([$q, $q, DATE('Y'), $q]);

    $html = ""; // Inicializa a variável $html
        $anoAtual = date('Y');
        $mesAtual = date('n');
        $mes_a_frequentar = $mesAtual;  // Pode precisar ajustar conforme sua lógica

    try {
        while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $id = md5($rs['id']);
            $idAluno = $rs['id'];
            $email = $rs['email'];
            $nome = $rs['nome'];
            $classe = $rs['turma'];
            $valorMensalidade = $rs['valorMensalidade'];
            $stampAluno = $rs['stampAluno'];
            $valorMatricula = $rs['valorMatricula'];
            $controladorMensalidadeDetalhes = md5('MensalidadeDetalhes').'f';
            $controladorMensalidade = md5('pagarMensalidade').'f';
            $controladorEliminarMensalidade = md5('eliminarMensalidade').'f';
            $estadoIcone = ($rs['estado'] == 'activo') ? '<i class="fa fa-toggle-on"></i>' : '<i class="fa fa-toggle-off"></i>';
            $estiloLinha = ($rs['estado'] == 'activo') ? 'opacity:1' : 'opacity:0.6';
            $estadoBotao = ($rs['estado'] == 'activo') ? 'btn-success' : 'btn-danger';
            $html .= "<tr style='".$estiloLinha."'>";
            $html .= "<td class='bg-warning' title='Nome do aluno' style='font-size: 10px;height:10px;width:30px;'> ".$rs['nome']."</td>";
            $html .= "<td style='height:10px; width:10px; font-size: 10px;' class='bg-secondary' title='Classe do aluno' >".$rs['turma']."</td>";
            $html .= "<td style='height:10px; width:5px; font-size: 10px;' class='bten btn-success btn-sm ' title='Valor da matrícula'  controlador='".$controladorMensalidade."' id='".$id."' nome='".$nome."' stampAluno='".$stampAluno."' valorMatricula='".$valorMatricula."'>".$rs['valorMatricula']."</td>";

            $queryMeses = "SELECT * FROM pagar_mensalidade WHERE stampAluno = ?";
            $stmtMeses = $this->connect()->prepare($queryMeses);
            $stmtMeses->execute([$rs['stampAluno']]);
            $mesesData = $stmtMeses->fetch(PDO::FETCH_ASSOC);

            // Iterar pelos meses e adicionar botões
            $mesesDoAno = ['Fevereiro', 'Marco', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
            foreach ($mesesDoAno as $mes) {
                $nomeMes = $mes;
                $valorMes = $mesesData[$mes];
                $multa = 0; // Inicializar multa como 0

                if ($valorMes > 0) {
                    // Mês pago, exibir valor no botão verde
                    $html .= "<td class='btn btn-success w-2 eliminarMensalidade' title='Anular mensalidade' style='font-size: 10px;height:15px;width:30px;' data-controlador='".$controladorEliminarMensalidade."' id='".$id."' nome='".$nome."' nomeMes='".$nomeMes."' stampAluno='".$stampAluno."' valorMensalidade='".$valorMensalidade."' valorMes='".$valorMes."'>".$valorMes."</td>";
                } else {
                    // Mês não pago, calcular e exibir multa
                  $dataLimitePagamento = new DateTime(date("Y-m-d", strtotime("{$anoAtual}-{$mes_a_frequentar}-02")));
                    $dataAtual = new DateTime(date("Y-m-d"));

                    // Verificar se a data atual está após o dia 2 do mês a frequentar
                    if ($dataAtual > $dataLimitePagamento) {
                        // Calcular o número total de dias de atraso
                        $diferencaDias = $dataAtual->diff($dataLimitePagamento)->days;

                        // Calcular o número de dias de atraso após o dia 2
                        $diasDeAtraso = $diferencaDias;

                        // Calcular o número de dias de atraso completos (excluindo o dia 2)
                        $diasDeAtrasoCompletos = max(0, $diasDeAtraso - 1);

                        // Calcular o número de dias de atraso restantes para atingir 7 dias completos
                        $diasRestantes = $diasDeAtrasoCompletos % 7;
                        $multa = $diasDeAtraso * 0.10 * $valorMensalidade;
                        // Se já passaram 7 dias completos, calcular a multa
                        if ($diasRestantes == 0) {
                            $periodosDe7Dias = $diasDeAtrasoCompletos / 7;
                            //$multa = $diasDeAtraso * 0.10 * $valorMensalidade;
                        }
                    }

                    // Exibir botão com a multa
                    $html .= "<td class='btn btn-danger w-2 pagarMensalidade' title='Pagar mensalidade com multa' style='font-size: 10px;height:15px;width:30px;' controlador='".$controladorMensalidade."' id='".$idAluno."' nome='".$nome."' classe='".$classe."' stampAluno='".$stampAluno."' valorMensalidade='".$valorMensalidade."' multa='".$multa."' diasDeAtraso='".$diasDeAtraso."'><i class='ion-close'></i></></td>";
                }
            }

              $querySum = "SELECT
            (mesesPagos.montante + matricula.valorMatricula) AS totalPago
            FROM (
                SELECT
                    stampAluno,
                    (Fevereiro + Marco + Abril + Maio + Junho + Julho + Agosto + Setembro + Outubro + Novembro + Dezembro) AS montante
                FROM pagar_mensalidade
                WHERE stampAluno = ?
            ) AS mesesPagos
            JOIN matricula ON mesesPagos.stampAluno = matricula.stampAluno";
        
        $stmtSum = $this->connect()->prepare($querySum);
        $stmtSum->execute([$rs['stampAluno']]);
        $sumData = $stmtSum->fetch(PDO::FETCH_ASSOC);
        
        $totalPago = $sumData['totalPago'];
        $html .= "<td class='bten btn-success btn-sm w-2' title='Valor da matrícula' style='font-size: 10px;height:10px;width:20px;' controlador='".$controladorMensalidade."' id='".$id."' nome='".$nome."' stampAluno='".$stampAluno."' valorMatricula='".$valorMatricula." '>$totalPago</td>";

         $html .= "<td class='btn btn-primary w-2 MensalidadeDetalhes' title='Ver detalhes' style='height:14px;width:30px;' data-controlador='".$controladorMensalidadeDetalhes."' data-id='".$id."' data-nome='".$nome."' data-nomeMes='".$nomeMes."' data-stampAluno='".$stampAluno."' data-valorMensalidade='".$valorMensalidade."' data-valorMes='".$valorMes."' onclick='redirectToMensalidadeDetalhes(\"$stampAluno\")' ><i class='fa fa-eye'></i></td>";
                     echo "
                    <script>
                        function redirectToMensalidadeDetalhes(stampAluno) {
                            window.location.href = 'mensalidade_detalhes.php?stampAluno=' + stampAluno;
                        }
                    </script>";  
        }

        return $html;


    } catch (Exception $e) {
        $arr = array(
            "success" => 0,
            "msg" => "Erro ao efetuar a operação." . $e
        );
        echo json_encode($arr);
    }
}


public function mensalidade($q)
{
    $query = "SELECT aluno.*, CONCAT(classe.nome, '  ', turma.nome) turma, matricula.stampAluno, matricula.valorMatricula, matricula.valorMensalidade
              FROM `aluno` 
              JOIN matricula ON matricula.stampAluno = aluno.alunoStamp 
              JOIN turma ON turma.id = matricula.turma 
              JOIN classe ON classe.id = turma.classe";
    $query .= " WHERE (CASE WHEN ? = '' THEN matricula.ano ELSE md5(turma.id) END) = (CASE WHEN ? = '' THEN ? ELSE ? END)";
    $stmt = $this->connect()->prepare($query);
    $stmt->execute([$q, $q, DATE('Y'), $q]);

    $html = ""; // Inicializa a variável $html

    try
    {
        while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)){

            $id = md5($rs['id']);
            $idAluno = $rs['id'];
            $email = $rs['email'];
            $nome = $rs['nome'];
            $classe = $rs['turma'];
            $valorMensalidade = $rs['valorMensalidade'];
            $stampAluno = $rs['stampAluno'];
            $valorMatricula = $rs['valorMatricula'];
            $controladorMensalidadeDetalhes = md5('MensalidadeDetalhes').'f';
            $controladorMensalidade = md5('pagarMensalidade').'f';
            $controladorEliminarMensalidade = md5('eliminarMensalidade').'f';
            $estadoIcone = ($rs['estado'] == 'activo') ? '<i class="fa fa-toggle-on"></i>' : '<i class="fa fa-toggle-off"></i>';
            $estiloLinha = ($rs['estado'] == 'activo') ? 'opacity:1' : 'opacity:0.6';
            $estadoBotao = ($rs['estado'] == 'activo') ? 'btn-success' : 'btn-danger';
            $html .= "<tr style='".$estiloLinha."'>";
            $html .= "<td class='bg-warning' title='Nome do aluno' style='font-size: 10px;height:10px;width:30px;'> ".$rs['nome']."</td>";
            $html .= "<td style='height:10px; width:10px; font-size: 10px;' class='bg-secondary' title='Classe do aluno' >".$rs['turma']."</td>";
            $html .= "<td style='height:10px; width:5px; font-size: 10px;' class='bten btn-success btn-sm ' title='Valor da matrícula'  controlador='".$controladorMensalidade."' id='".$id."' nome='".$nome."' stampAluno='".$stampAluno."' valorMatricula='".$valorMatricula."'>".$rs['valorMatricula']."</td>";

            $queryMeses = "SELECT * FROM pagar_mensalidade WHERE stampAluno = ?";
            $stmtMeses = $this->connect()->prepare($queryMeses);
            $stmtMeses->execute([$rs['stampAluno']]);
            $mesesData = $stmtMeses->fetch(PDO::FETCH_ASSOC);

            // Iterar pelos meses e adicionar botões
            $mesesDoAno = ['Fevereiro', 'Marco', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
            foreach ($mesesDoAno as $mes) {
                $nomeMes = $mes;
                $valorMes = $mesesData[$mes];
                if ($valorMes > 0) {
                    // Mês pago, exibir valor no botão verde
                    //$html .= "<td class='btn btn-success w-3 eliminarMensalidade' title='Anular mensalidade' controlador='".$controladorEliminarMensalidade."' id='".$id."' nome='".$nome."' stampAluno='".$stampAluno."' valorMensalidade='".$valorMensalidade."'>".$valorMes."</td>";
                     //$html .= "<td class='btn btn-success w-3 MensalidadeDetalhes' title='Anular mensalidade' data-controlador='".$controladorMensalidadeDetalhes."' data-id='".$id."' data-nome='".$nome."' data-nomeMes='".$nomeMes."' data-stampAluno='".$stampAluno."' data-valorMensalidade='".$valorMensalidade."' data-valorMes='".$valorMes."'>".$valorMes."</td>";
                    $html .= "<td class='btn btn-success w-2 eliminarMensalidade' title='Anular mensalidade' style='font-size: 10px;height:15px;width:30px;' data-controlador='".$controladorEliminarMensalidade."' id='".$id."' nome='".$nome."' nomeMes='".$nomeMes."' stampAluno='".$stampAluno."' valorMensalidade='".$valorMensalidade."' valorMes='".$valorMes."'>".$valorMes."</td>";
                    
                } else {
                    // Mês não pago, exibir "N.pag" no botão vermelho
                    $html .= "<td class='btn btn-danger w-2 pagarMensalidade' title='Pagar mensalidade' style='font-size: 10px;height:15px;width:30px;'  controlador='".$controladorMensalidade."' id='".$idAluno."' nome='".$nome."' classe='".$classe."' stampAluno='".$stampAluno."' valorMensalidade='".$valorMensalidade."'>x</td>";
             }


            }


  $querySum = "SELECT
            (mesesPagos.montante + matricula.valorMatricula) AS totalPago
            FROM (
                SELECT
                    stampAluno,
                    (Fevereiro + Marco + Abril + Maio + Junho + Julho + Agosto + Setembro + Outubro + Novembro + Dezembro) AS montante
                FROM pagar_mensalidade
                WHERE stampAluno = ?
            ) AS mesesPagos
            JOIN matricula ON mesesPagos.stampAluno = matricula.stampAluno";
        
        $stmtSum = $this->connect()->prepare($querySum);
        $stmtSum->execute([$rs['stampAluno']]);
        $sumData = $stmtSum->fetch(PDO::FETCH_ASSOC);
        
        $totalPago = $sumData['totalPago'];
        $html .= "<td class='bten btn-success btn-sm w-2' title='Valor da matrícula' style='font-size: 10px;height:10px;width:20px;' controlador='".$controladorMensalidade."' id='".$id."' nome='".$nome."' stampAluno='".$stampAluno."' valorMatricula='".$valorMatricula." '>$totalPago</td>";

         $html .= "<td class='btn btn-primary w-2 MensalidadeDetalhes' title='Ver detalhes' style='height:14px;width:30px;' data-controlador='".$controladorMensalidadeDetalhes."' data-id='".$id."' data-nome='".$nome."' data-nomeMes='".$nomeMes."' data-stampAluno='".$stampAluno."' data-valorMensalidade='".$valorMensalidade."' data-valorMes='".$valorMes."' onclick='redirectToMensalidadeDetalhes(\"$stampAluno\")' ><i class='fa fa-eye'></i></td>";
                     echo "
                    <script>
                        function redirectToMensalidadeDetalhes(stampAluno) {
                            window.location.href = 'mensalidade_detalhes.php?stampAluno=' + stampAluno;
                        }
                    </script>";         
        }

        return $html;

    } catch (Exception $e) {
        $arr = array(
            "success" => 0,
            "msg" => "Erro ao efetuar a operação." . $e
        );
        echo json_encode($arr);
    }
}


public function mensalidadeDetalhes($stampAluno)
{
    $query = "
        SELECT m.*, a.nome AS nomeAluno
        FROM `mensalidade` m
        LEFT JOIN `aluno` a ON m.stampAluno = a.alunoStamp
        WHERE m.stampAluno = ?
        ORDER BY nomeMes ASC
    ";

    $stmt = $this->connect()->prepare($query);
    $stmt->execute([$stampAluno]);

    try
    {

        $html = "";
        

        while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)){
            $html .= "<tr >";
            $nome = $rs['nomeAluno'];
            $html .= "<td >".$rs['nomeMes']."</td>";
            $html .= "<td >".$rs['valorMensalidade']."</td>";
            $html .= "<td >".$rs['tipoPagamento']."</td>";
            $html .= "<td >".$rs['nrDoRecibo']."</td>";
            $html .= "<td >".$rs['dataDeDeposito']."</td>";
            $html .= "<td >".$rs['diasDeAtraso']."</td>";
            $html .= "<td >".$rs['multa']."</td>";
            $html .= "<td >".$rs['created_at']."</td>";
            $html .= " </tr>";
        }
        echo @$nome;
        return $html;

    } catch(Exception $e) {
        $arr = array(
            "success" => 0,
            "msg" => "Erro ao efetuar a operação." . $e
        );
        echo json_encode($arr);
    }
}


public function mensalidadeDoAluno($q)
{
    $query = "SELECT aluno.*, CONCAT(classe.nome, '  ', turma.nome) turma, matricula.stampAluno, matricula.valorMatricula, matricula.valorMensalidade
              FROM `aluno` 
              JOIN matricula ON matricula.stampAluno = aluno.alunoStamp 
              JOIN turma ON turma.id = matricula.turma 
              JOIN classe ON classe.id = turma.classe";
    $query .= " WHERE (CASE WHEN ? = '' THEN matricula.ano ELSE md5(turma.id) END) = (CASE WHEN ? = '' THEN ? ELSE ? END)";
    $stmt = $this->connect()->prepare($query);
    $stmt->execute([$q, $q, DATE('Y'), $q]);

    $html = ""; // Inicializa a variável $html

    try {
        while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $id = md5($rs['id']);
            $email = $rs['email'];
            $nome = $rs['nome'];
            $valorMensalidade = $rs['valorMensalidade'];
            $stampAluno = $rs['stampAluno'];
            $alunoStamp = $rs['alunoStamp'];
            $valorMatricula = $rs['valorMatricula'];
            $controladorMensalidade = md5('pagarMensalidade').'f';
            $controladorEliminarMensalidade = md5('eliminarMensalidade').'f';
            $estadoIcone = ($rs['estado'] == 'activo') ? '<i class="fa fa-toggle-on"></i>' : '<i class="fa fa-toggle-off"></i>';
            $estiloLinha = ($rs['estado'] == 'activo') ? 'opacity:1' : 'opacity:0.6';
            $estadoBotao = ($rs['estado'] == 'activo') ? 'btn-success' : 'btn-danger';

            // Verifique se o email atual é igual ao email do aluno logado
            if ($email == @$_SESSION['usuario']) {
                $html .= "<tr style='" . $estiloLinha . "'>";
                $html .= "<td class='bg-warning' title='Nome do aluno'>" . $rs['nome'] . "</td>";
                $html .= "<td class='bg-secondary' title='Classe do aluno'>" . $rs['turma'] . "</td>";
                $html .= "<td class='bten btn-success btn-sm w-3 ' title='Valor da matrícula' controlador='" . $controladorMensalidade . "' id='" . $id . "' nome='" . $nome . "' stampAluno='" . $stampAluno . "' valorMatricula='" . $valorMatricula . "'>" . $rs['valorMatricula'] . "</td>";

               
            $queryMeses = "SELECT * FROM pagar_mensalidade WHERE stampAluno = ?";
            $stmtMeses = $this->connect()->prepare($queryMeses);
            $stmtMeses->execute([$rs['stampAluno']]);
            $mesesData = $stmtMeses->fetch(PDO::FETCH_ASSOC);

            // Iterar pelos meses e adicionar botões
            $mesesDoAno = ['Fevereiro', 'Marco', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
            foreach ($mesesDoAno as $mes) {
                $nomeMes = $mes;
                $valorMes = $mesesData[$mes];
                if ($valorMes > 0) {
                    // Mês pago, exibir valor no botão verde
                    //$html .= "<td class='btn btn-success w-3 eliminarMensalidade' title='Anular mensalidade' controlador='".$controladorEliminarMensalidade."' id='".$id."' nome='".$nome."' stampAluno='".$stampAluno."' valorMensalidade='".$valorMensalidade."'>".$valorMes."</td>";
                    $html .= "<td class='btn btn-success w-3 ' title='Anular mensalidade' data-controlador='".$controladorEliminarMensalidade."' data-id='".$id."' data-nome='".$nome."' data-nomeMes='".$nomeMes."' data-stampAluno='".$stampAluno."' data-valorMensalidade='".$valorMensalidade."' data-valorMes='".$valorMes."'>".$valorMes."</td>";

                } else {
                    // Mês não pago, exibir "N.pag" no botão vermelho
                    $html .= "<td class='btn btn-danger w-3 ' title='Pagar mensalidade' controlador='".$controladorMensalidade."' id='".$id."' nome='".$nome."' stampAluno='".$stampAluno."' valorMensalidade='".$valorMensalidade."'>N.pag</td>";
                }

            }

           $querySum = "SELECT
            (mesesPagos.montante + matricula.valorMatricula) AS totalPago
            FROM (
                SELECT
                    stampAluno,
                    (Fevereiro + Marco + Abril + Maio + Junho + Julho + Agosto + Setembro + Outubro + Novembro + Dezembro) AS montante
                FROM pagar_mensalidade
                WHERE stampAluno = ?
            ) AS mesesPagos
            JOIN matricula ON mesesPagos.stampAluno = matricula.stampAluno";
        
        $stmtSum = $this->connect()->prepare($querySum);
        $stmtSum->execute([$rs['stampAluno']]);
        $sumData = $stmtSum->fetch(PDO::FETCH_ASSOC);
        
        $totalPago = $sumData['totalPago'];
        $html .= "<td class='bten btn-primary btn-sm w-3' title='Valor colectado' controlador='".$controladorMensalidade."' id='".$id."' nome='".$nome."' stampAluno='".$stampAluno."' valorMatricula='".$valorMatricula." '>$totalPago</td>";
            }
        }

        return $html;
    } catch (Exception $e) {
        $arr = array("success" => 0, "msg" => "Erro ao efetuar a operação." . $e);
        echo json_encode($arr);
    }
}




public function pagarMensalidade($stampAluno,$nomeMes,$tipoPagamento,$nrDoRecibo,$dataDeDeposito,$url_comprovativo, &$valorMensalidade,$diasDeAtraso,$multa)
{
    
    try {
        $sessao = new sessao();
        $usuario_logado = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : 0;

        // Iniciar transação
        $pdo = $this->connect();
        $pdo->beginTransaction();

        // Verificar se já existe uma entrada para o aluno na tabela
        $queryVerificarAluno = "SELECT * FROM `pagar_mensalidade` WHERE `stampAluno` = ?";
        $stmtVerificarAluno = $pdo->prepare($queryVerificarAluno);
        $stmtVerificarAluno->execute([$stampAluno]);
        $row = $stmtVerificarAluno->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            // Já existe uma entrada para o aluno, verificar se o mês foi pago ou o número do recibo já existe
            if ($row[$nomeMes] > 0 || $row['nrDoRecibo'] == $nrDoRecibo) {
                // O mês já foi pago ou o número do recibo é igual, não permitir o pagamento
                $pdo->rollBack();
                $arr = array("success" => 0, "msg" => "Não é possível pagar o mês de $nomeMes. O mês já foi pago ou o número do recibo já existe.");
                echo json_encode($arr);
                return;
            }

            // Verificar se o mês anterior foi pago
            $mesAnterior = "";
            $meses = ["Fevereiro", "Marco", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"];
            $indiceMes = array_search($nomeMes, $meses);

            if ($indiceMes > 0) {
                $mesAnterior = $meses[$indiceMes - 1];

                if ($row[$mesAnterior] <= 0) {
                    // O mês anterior não está pago, não permitir o pagamento do mês atual
                    $pdo->rollBack();
                    $arr = array("success" => 0, "msg" => "Não é possível pagar o mês de $nomeMes. O mês anterior ($mesAnterior) não está pago.");
                    echo json_encode($arr);
                    return;
                }
            }

            // Atualizar a entrada existente com os novos dados de pagamento
            $queryAtualizar = "UPDATE `pagar_mensalidade` SET
                `$nomeMes` = ?,
                `tipoPagamento` = ?,
                `nrDoRecibo` = ?,
                `dataDeDeposito` = ?,
                `url_comprovativo` = ?,
                `updated_by` = ?
            WHERE `stampAluno` = ?";

            $stmtAtualizar = $pdo->prepare($queryAtualizar);
            $paramsAtualizar = [$valorMensalidade, $tipoPagamento, $nrDoRecibo, $dataDeDeposito, $url_comprovativo, $usuario_logado, $stampAluno];

            if ($stmtAtualizar->execute($paramsAtualizar)) {
                // Commit da transação
                $pdo->commit();

                // Inserir dados na tabela "mensalidade"
                $queryInserirMensalidade = "INSERT INTO mensalidade (stampAluno, nomeMes, tipoPagamento, nrDoRecibo, dataDeDeposito, url_comprovativo,valorMensalidade, diasDeAtraso, multa) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmtInserirMensalidade = $pdo->prepare($queryInserirMensalidade);
                $paramsInserirMensalidade = [$stampAluno, $nomeMes, $tipoPagamento, $nrDoRecibo, $dataDeDeposito, $url_comprovativo,$valorMensalidade,$diasDeAtraso,$multa];

                if ($stmtInserirMensalidade->execute($paramsInserirMensalidade)) {
                    $arr = array("success" => 1, "msg" => "Mensalidade paga com sucesso.");
                    echo json_encode($arr);
                } else {
                    // Rollback em caso de falha na inserção em "mensalidade"
                    $pdo->rollBack();

                    $arr = array("success" => 0, "msg" => "Erro ao efetuar a operação de inserção em 'mensalidade'.");
                    echo json_encode($arr);
                }
            } else {
                // Rollback em caso de falha na atualização em "pagar_mensalidade"
                $pdo->rollBack();

                $arr = array("success" => 0, "msg" => "Erro ao efetuar a operação de atualização em 'pagar_mensalidade'.");
                echo json_encode($arr);
            }
        } else {
            // Não existe uma entrada para o aluno, criar uma nova entrada

            // Verificar se o mês anterior foi pago
            $mesAnterior = "";
            $meses = ["Fevereiro", "Marco", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"];
            $indiceMes = array_search($nomeMes, $meses);

            if ($indiceMes > 0) {
                $mesAnterior = $meses[$indiceMes - 1];

                // Verificar se o mês anterior foi pago
                $queryVerificarMesAnterior = "SELECT `$mesAnterior` FROM `pagar_mensalidade` WHERE `stampAluno` = ?";
                $stmtVerificarMesAnterior = $pdo->prepare($queryVerificarMesAnterior);
                $stmtVerificarMesAnterior->execute([$stampAluno]);
                $valorMesAnterior = $stmtVerificarMesAnterior->fetchColumn();

                if ($valorMesAnterior <= 0) {
                    // O mês anterior não está pago, não permitir o pagamento do mês atual
                    $pdo->rollBack();
                    $arr = array("success" => 0, "msg" => "Não é possível pagar o mês de $nomeMes. O mês anterior ($mesAnterior) não está pago.");
                    echo json_encode($arr);
                    return;
                }
            }

            // O mês atual ainda não foi pago, inserir uma nova entrada na tabela pagar_mensalidade
            $queryInserir = "INSERT INTO `pagar_mensalidade` (`stampAluno`, `$nomeMes`, `nomeMes`, `tipoPagamento`, `nrDoRecibo`, `url_comprovativo`, `created_by`, `updated_by`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmtInserir = $pdo->prepare($queryInserir);
            $paramsInserir = [$stampAluno, $valorMensalidade, $nomeMes, $tipoPagamento, $nrDoRecibo, $url_comprovativo, $usuario_logado, $usuario_logado];

            if ($stmtInserir->execute($paramsInserir)) {
                // Commit da transação
                $pdo->commit();

                // Inserir dados na tabela "mensalidade"
                $queryInserirMensalidade = "INSERT INTO mensalidade (stampAluno, nomeMes, tipoPagamento, nrDoRecibo, dataDeDeposito, url_comprovativo, valorMensalidade, diasDeAtraso, multa) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmtInserirMensalidade = $pdo->prepare($queryInserirMensalidade);
                $paramsInserirMensalidade = [$stampAluno, $nomeMes, $tipoPagamento, $nrDoRecibo, $dataDeDeposito, $url_comprovativo, $valorMensalidade, $diasDeAtraso, $multa];

                if ($stmtInserirMensalidade->execute($paramsInserirMensalidade)) {
                    $arr = array("success" => 1, "msg" => "Mensalidade paga com sucesso.");
                    echo json_encode($arr);
                } else {
                    // Rollback em caso de falha na inserção em "mensalidade"
                    $pdo->rollBack();

                    $arr = array("success" => 0, "msg" => "Erro ao efetuar a operação de inserção em 'mensalidade'.");
                    echo json_encode($arr);
                }
            } else {
                // Rollback em caso de falha na inserção em "pagar_mensalidade"
                $pdo->rollBack();

                $arr = array("success" => 0, "msg" => "Erro ao efetuar a operação de inserção em 'pagar_mensalidade'.");
                echo json_encode($arr);
            }
        }
    } catch (Exception $e) {
        // Rollback em caso de erro
        if ($pdo->inTransaction()) {
            $pdo->rollBack();
        }

        $arr = array("success" => 0, "msg" => "Erro ao efetuar a operação: " . $e->getMessage());
        echo json_encode($arr);
    }
}


    //Funcao para atribuir professor a turma, a sala e a discina que leciona
    public function atribuirProfessor($professorStamp, $professor, $disciplina, $classe, $turma, $sala)
        {
           $usuario_logado = $_SESSION['id_usuario'];
           $query = "INSERT INTO atribuir_professor(professorStamp, professor, disciplina, classe, turma, sala, created_by, updated_by) VALUES (?,?,?,?,?,?,?,?)";
           $stmt = $this->connect()->prepare($query);
           try
           {
             if ($stmt->execute([$professorStamp, $professor, $disciplina, $classe, $turma, $sala, $usuario_logado, $usuario_logado])) {
                   $arr = array("success" => 1, "msg" => "Professor atribuido com sucesso!." );
   
                   echo json_encode($arr);
               }
               else
                   {
                       $arr = array("success" => 0, "msg" => "Erro ao efectuar a operação.");
                       echo json_encode($arr);
                   }
   
               }catch(Exception $e)
               {
                   $arr = array(
                       "success" => 0, "msg" => "Erro ao efectuar a operação." . $e);
                   echo json_encode($arr); //Ate aqui tudo Ok
                   
               }
        
           }


        //Fim inserirClasse
        public function insertDisciplina($nome)
        {
           $usuario_logado = $_SESSION['id_usuario'];
           $query = "INSERT INTO disciplina(nome, created_by, updated_by) VALUES (?,?,?)";
           $stmt = $this->connect()->prepare($query);
           try
           {
             if ($stmt->execute([$nome, $usuario_logado, $usuario_logado])) {
                   $arr = array("success" => 1, "msg" => "Cadastrado com sucesso!." );
   
                   echo json_encode($arr);
               }
               else
                   {
                       $arr = array("success" => 0, "msg" => "Erro ao efectuar a operação.");
                       echo json_encode($arr);
                   }
   
               }catch(Exception $e)
               {
                   $arr = array(
                       "success" => 0, "msg" => "Erro ao efectuar a operação." . $e);
                   echo json_encode($arr); //Ate aqui tudo Ok
                   
               }
        
           } 
               public function insertClass($nome)
        {
           $usuario_logado = $_SESSION['id_usuario'];
           $query = "INSERT INTO classe(nome, created_by, updated_by) VALUES (?,?,?)";
           $stmt = $this->connect()->prepare($query);
           try
           {
             if ($stmt->execute([$nome, $usuario_logado, $usuario_logado])) {
                   $arr = array("success" => 1, "msg" => "Classe inserida com sucesso!." );
   
                   echo json_encode($arr);
               }
               else
                   {
                       $arr = array("success" => 0, "msg" => "Erro ao efectuar a operação.");
                       echo json_encode($arr);
                   }
   
               }catch(Exception $e)
               {
                   $arr = array(
                       "success" => 0, "msg" => "Erro ao efectuar a operação." . $e);
                   echo json_encode($arr); //Ate aqui tudo Ok
                   
               }
        
           } 


           public function insertTurma($nome,$classe,$nrMinAluno, $nrMaxAluno,$ano)
           {
              $usuario_logado = $_SESSION['id_usuario'];
              $query = "INSERT INTO turma(nome, classe, nrMinAluno, nrMaxAluno, ano, created_by, updated_by) VALUES (?,?,?,?,?,?,?)";
              $stmt = $this->connect()->prepare($query);
              try
              {
                if ($stmt->execute([$nome, $classe, $nrMinAluno, $nrMaxAluno, $ano, $usuario_logado, $usuario_logado])) {
                      $arr = array("success" => 1, "msg" => "Funcionario cadastrado com sucesso!." );
      
                      echo json_encode($arr);
                  }
                  else
                      {
                          $arr = array("success" => 0, "msg" => "Erro ao efectuar a operação.");
                          echo json_encode($arr);
                      }
      
                  }catch(Exception $e)
                  {
                      $arr = array("success" => 0, "msg" => "Erro ao efectuar a operação." . $e);
                      echo json_encode($arr); //Ate aqui tudo Ok
                      
                  }
           
              }

           

              public function editarTurma($nome,$turma)
           {
              $usuario_logado = $_SESSION['id_usuario'];
              $query = "UPDATE turma SET nome = ?,updated_by = ? WHERE md5(id) = ?";
              $stmt = $this->connect()->prepare($query);
              try
              {
                if ($stmt->execute([$nome, $usuario_logado, $turma])) {
                      $arr = array("success" => 1, "msg" => "operação efectuada com sucesso!." );
      
                      echo json_encode($arr);
                  }
                  else
                      {
                          $arr = array("success" => 0, "msg" => "Erro ao efectuar a operação.");
                          echo json_encode($arr);
                      }
      
                  }catch(Exception $e)
                  {
                      $arr = array("success" => 0, "msg" => "Erro ao efectuar a operação." . $e);
                      echo json_encode($arr); //Ate aqui tudo Ok
                      
                  }
           
              } 


             public function editarClasse($nome, $classe)
              {
                  $usuario_logado = $_SESSION['id_usuario'];
                  $query = "UPDATE classe SET nome = ?, updated_by = ? WHERE md5(id) = ?";
                  $stmt = $this->connect()->prepare($query);
                  try {
                      $id = md5($id); // Assuming that $classe contains the class ID.
                      if ($stmt->execute([$nome, $usuario_logado, $classe])) {
                          $arr = array("success" => 1, "msg" => "Operação efetuada com sucesso!");
                          echo json_encode($arr);
                      } else {
                          $arr = array("success" => 0, "msg" => "Erro ao efetuar a operação.");
                          echo json_encode($arr);
                      }
                  } catch (Exception $e) {
                      $arr = array("success" => 0, "msg" => "Erro ao efetuar a operação." . $e);
                      echo json_encode($arr);
                  }
              } 

      public function insertSala($nome)
        {
           $usuario_logado = $_SESSION['id_usuario'];
           $query = "INSERT INTO sala(nome, created_by, updated_by) VALUES (?,?,?)";
           $stmt = $this->connect()->prepare($query);
           try
           {
             if ($stmt->execute([$nome, $usuario_logado, $usuario_logado])) {
                   $arr = array("success" => 1, "msg" => "Sala inserida com sucesso!." );
   
                   echo json_encode($arr);
               }
               else
                   {
                       $arr = array("success" => 0, "msg" => "Erro ao efectuar a operação.");
                       echo json_encode($arr);
                   }
   
               }catch(Exception $e)
               {
                   $arr = array(
                       "success" => 0, "msg" => "Erro ao efectuar a operação." . $e);
                   echo json_encode($arr); //Ate aqui tudo Ok
                   
               }
        
           } 
            public function editarSala($nome, $id)
              {
                  $usuario_logado = $_SESSION['id_usuario'];
                  $query = "UPDATE sala SET nome = ?, updated_by = ? WHERE md5(id) = ?";
                  $stmt = $this->connect()->prepare($query);
                  try {
                      $id = md5($id); // Assuming that $classe contains the class ID.
                      if ($stmt->execute([$nome, $usuario_logado, $id])) {
                          $arr = array("success" => 1, "msg" => "Operação efetuada com sucesso!");
                          echo json_encode($arr);
                      } else {
                          $arr = array("success" => 0, "msg" => "Erro ao efetuar a operação.");
                          echo json_encode($arr);
                      }
                  } catch (Exception $e) {
                      $arr = array("success" => 0, "msg" => "Erro ao efetuar a operação." . $e);
                      echo json_encode($arr);
                  }
              } 

           
              
            public function eliminarTurma($turma)
              {
                  $usuario_logado = $_SESSION['id_usuario'];
                  $query = "SELECT COUNT(*) total FROM `matricula` WHERE md5(turma) = ?";
                  $stmt = $this->connect()->prepare($query);
                  $stmt->execute([$turma]);
                  try
                  {
                      $rs = $stmt->fetch(PDO::FETCH_ASSOC);
                      if ($rs['total'] > 0) {
                          $arr = array("success" => 2, "msg" => "Não é possível eliminar essa turma porque contém alunos.");
                          echo json_encode($arr);
                      } else {
                          $query = "DELETE FROM turma WHERE md5(id) = ?";
                          try {
                              $stmt = $this->connect()->prepare($query);
                              if ($stmt->execute([$turma])) {
                                  $arr = array("success" => 1, "msg" => 'Operação efetuada com sucesso.');
                                  echo json_encode($arr);
                              } else {
                                  $arr = array("success" => 0, "msg" => "Erro ao efetuar a operação.");
                                  echo json_encode($arr);
                              }
                          } catch (Exception $e) {
                              $arr = array("success" => 0, "msg" => "Erro ao efetuar a operação." . $e);
                              echo json_encode($arr);
                          }
                      }
                  } catch (Exception $e) {
                      $arr = array("success" => 0, "msg" => "Erro ao efetuar a operação." . $e);
                      echo json_encode($arr);
                  }
              }

              public function eliminarClasse($classe)
              {
                  $usuario_logado = $_SESSION['id_usuario'];
                  $query = "SELECT COUNT(*) as total FROM `turma` WHERE md5(classe) = md5(?)";
                  $stmt = $this->connect()->prepare($query);
                  try {
                      $stmt->execute([$classe]);
                      $rs = $stmt->fetch(PDO::FETCH_ASSOC);
                      if ($rs['total'] > 0) {
                          $arr = array("success" => 2, "msg" => "Não é possível eliminar essa classe porque atribuida turmas.");
                          echo json_encode($arr);
                      } else {
                          $query = "DELETE FROM classe WHERE md5(id) = md5(?)";
                          try {
                              $stmt = $this->connect()->prepare($query);
                              if ($stmt->execute([$classe])) {
                                  $arr = array("success" => 1, "msg" => 'Operação efetuada com sucesso.');
                                  echo json_encode($arr);
                              } else {
                                  $arr = array("success" => 0, "msg" => "Erro ao efetuar a operação.");
                                  echo json_encode($arr);
                              }
                          } catch (Exception $e) {
                              $arr = array("success" => 0, "msg" => "Erro ao efetuar a operação." . $e);
                              echo json_encode($arr);
                          }
                      }
                  } catch (Exception $e) {
                      $arr = array("success" => 0, "msg" => "Erro ao efetuar a operação." . $e);
                      echo json_encode($arr);
                  }
              }

                public function eliminarMensalidade($stampAluno, $nomeMes)
            {
                try {
                    // Iniciar transação
                    $pdo = $this->connect();
                    $pdo->beginTransaction();

                    // Montar a query DELETE
                    $queryDeleteMensalidade = "DELETE FROM mensalidade WHERE stampAluno = :stampAluno AND nomeMes = :nomeMes";
                    $stmtDeleteMensalidade = $pdo->prepare($queryDeleteMensalidade);

                    if ($stmtDeleteMensalidade->execute([':stampAluno' => $stampAluno, ':nomeMes' => $nomeMes])) {
                        // Montar a query UPDATE
                        $queryUpdatePagarMensalidade = "UPDATE pagar_mensalidade SET $nomeMes = 0 WHERE stampAluno = :stampAluno";
                        $stmtUpdatePagarMensalidade = $pdo->prepare($queryUpdatePagarMensalidade);

                        if ($stmtUpdatePagarMensalidade->execute([':stampAluno' => $stampAluno])) {
                            // Commit da transação se ambas as operações forem bem-sucedidas
                            $pdo->commit();

                            $arr = array("success" => 1, "msg" => 'Operação efetuada com sucesso.');
                            echo json_encode($arr);
                        } else {
                            throw new Exception("Erro ao atualizar pagar_mensalidade");
                        }
                    } else {
                        throw new Exception("Erro ao excluir mensalidade");
                    }
                } catch (Exception $e) {
                    // Rollback em caso de erro
                    if ($pdo->inTransaction()) {
                        $pdo->rollBack();
                    }

                    $arr = array("success" => 0, "msg" => "Erro ao efetuar a operação: " . $e->getMessage());
                    echo json_encode($arr);
                }
            }

                                    public function eliminarSala($id)
              {
                  $usuario_logado = $_SESSION['id_usuario'];
                  $query = "DELETE FROM sala WHERE id = ?";
                  try {
                      $stmt = $this->connect()->prepare($query);
                      if ($stmt->execute([$id])) {
                          $arr = array("success" => 1, "msg" => 'Operação efetuada com sucesso.');
                          echo json_encode($arr);
                      } else {
                          $arr = array("success" => 0, "msg" => "Erro ao efetuar a operação.");
                          echo json_encode($arr);
                      }
                  } catch (Exception $e) {
                      $arr = array("success" => 0, "msg" => "Erro ao efetuar a operação." . $e);
                      echo json_encode($arr);
                  }
                }
              
              
              //FUNCAO PARA ELIMINAR ALUNO
          
              public function eliminarFuncionario($id)
              {
                  $usuario_logado = $_SESSION['id_usuario'];
                  $query = "DELETE FROM funcionario WHERE md5(id) = ?";
                  try {
                      $stmt = $this->connect()->prepare($query);
                      if ($stmt->execute([$id])) {
                          $arr = array("success" => 1, "msg" => 'Operação efetuada com sucesso.');
                          echo json_encode($arr);
                      } else {
                          $arr = array("success" => 0, "msg" => "Erro ao efetuar a operação.");
                          echo json_encode($arr);
                      }
                  } catch (Exception $e) {
                      $arr = array("success" => 0, "msg" => "Erro ao efetuar a operação." . $e);
                      echo json_encode($arr);
                  }
                }

                 public function eliminarUsuario($id)
              {
                  $usuario_logado = $_SESSION['id_usuario'];
                  $query = "DELETE FROM funcionario WHERE md5(id) = ?";
                  try {
                      $stmt = $this->connect()->prepare($query);
                      if ($stmt->execute([$id])) {
                          $arr = array("success" => 1, "msg" => 'Operação efetuada com sucesso.');
                          echo json_encode($arr);
                      } else {
                          $arr = array("success" => 0, "msg" => "Erro ao efetuar a operação.");
                          echo json_encode($arr);
                      }
                  } catch (Exception $e) {
                      $arr = array("success" => 0, "msg" => "Erro ao efetuar a operação." . $e);
                      echo json_encode($arr);
                  }
                }

                public function eliminarProfessor($id)
                {
                    $usuario_logado = $_SESSION['id_usuario'];
                    $query = "SELECT COUNT(*) as total FROM `usuario` WHERE md5(id) = md5(?)";
                    $stmt = $this->connect()->prepare($query);
                    try {
                        $stmt->execute([$id]);
                        $rs = $stmt->fetch(PDO::FETCH_ASSOC);
                        if ($rs['total'] > 0) {
                            $arr = array("success" => 2, "msg" => "Elimine primeiro esse professor como usuário do sistema.");
                            echo json_encode($arr);
                        } else {
                            $query = "DELETE FROM professor WHERE md5(id) = md5(?)";
                            try {
                                $stmt = $this->connect()->prepare($query);
                                if ($stmt->execute([$id])) {
                                    $arr = array("success" => 1, "msg" => 'Operação efetuada com sucesso.');
                                    echo json_encode($arr);
                                } else {
                                    $arr = array("success" => 0, "msg" => "Erro ao efetuar a operação.");
                                    echo json_encode($arr);
                                }
                            } catch (Exception $e) {
                                $arr = array("success" => 0, "msg" => "Erro ao efetuar a operação." . $e);
                                echo json_encode($arr);
                            }
                        }
                    } catch (Exception $e) {
                        $arr = array("success" => 0, "msg" => "Erro ao efetuar a operação." . $e);
                        echo json_encode($arr);
                    }
                }



                    public function eliminarAluno($id)
                    {
                        $connection = $this->connect(); // Armazena a conexão em uma variável
                        $connection->beginTransaction(); // Inicia a transação

                        try {
                            // Obter o aluno a ser eliminado
                            $queryObterAluno = "SELECT alunoStamp FROM aluno WHERE md5(id) = md5(?)";
                            $stmtObterAluno = $connection->prepare($queryObterAluno);
                            $stmtObterAluno->execute([$id]);
                            $alunoStamp = $stmtObterAluno->fetchColumn();

                            // Excluir o aluno da tabela aluno
                            $queryDeleteAluno = "DELETE FROM aluno WHERE md5(id) = md5(?)";
                            $stmtDeleteAluno = $connection->prepare($queryDeleteAluno);

                            if ($stmtDeleteAluno->execute([$id])) {
                                // Excluir o aluno associado da tabela usuario usando o alunoStamp
                                $queryDeleteUsuario = "DELETE FROM usuario WHERE usuarioStamp = ?";
                                $stmtDeleteUsuario = $connection->prepare($queryDeleteUsuario);

                                try {
                                    $stmtDeleteUsuario->execute([$alunoStamp]);
                                    $connection->commit(); // Confirma a transação

                                    $arr = array("success" => 1, "msg" => 'Operação efetuada com sucesso.');
                                    echo json_encode($arr);
                                } catch (Exception $e) {
                                    $connection->rollback(); // Reverte a transação em caso de erro
                                    $arr = array("success" => 0, "msg" => "Erro ao efetuar a operação." . $e);
                                    echo json_encode($arr);
                                }
                            } else {
                                $connection->rollback(); // Reverte a transação em caso de erro
                                $arr = array("success" => 0, "msg" => "Erro ao efetuar a operação.");
                                echo json_encode($arr);
                            }
                        } catch (Exception $e) {
                            $connection->rollback(); // Reverte a transação em caso de erro
                            $arr = array("success" => 0, "msg" => "Erro ao efetuar a operação." . $e);
                            echo json_encode($arr);
                        }
                    }

                    public function listarClasses()
              {
                  $query = "SELECT *, (SELECT COUNT(*) FROM turma WHERE turma.classe = classe.id) total_turmas FROM `classe` ";
                  $stmt = $this->connect()->prepare($query);
                  $stmt->execute([]);
          
                  try
                  {
                      $html = "";
                      while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)){
                          $id = $rs['id'];
                          $nome = $rs['nome'];
                          $controladorEditar = md5('alterarClasse').'f';
                          $controladorEliminar = md5('eliminarClasse').'f';
                          $total_turmas = $rs['total_turmas'];
                          $html .= "<div class='col-sm-6 col-md-6 col-lg-6 col-xl-3'>";
                          $html .= "<div class='card'>";
                          $html .= "<div class='card-header pb-0 border-bottom-0'>";
                          $html .= "<h3 class='card-title' _msthash='3299504' _msttexthash='489853'>".$nome."ª Classe</h3>";
                          $html .= "<div class='card-options'>";
                          $html .= "<a class='btn btn-sm btn-success' href='turmas?q=".$id."'><i class='fa fa-eye mb-0' title='Ver Turmas'></i></a>&nbsp";
                          $html .= "<a class='btn btn-sm btn-primary editarClasse' controlador='".$controladorEditar."' id='".$id."' nome='".$nome."' href='#'><i class='fa fa-pencil mb-0' title='Editar Classe'></i></a>&nbsp;";
                          $html .= "<a class='btn btn-sm btn-danger eliminarClasse' controlador='".$controladorEliminar."' id='".$id."' nome='".$nome."' href='#'><i class='fa fa-trash mb-0' title='Excluir Classe'></i></a>&nbsp;";
                          $html .= "</div>";
                          $html .= "</div>";
                          $html .= "<div class='card-body pt-0'>";
                          $html .= "<h6 class='d-inline-blockquoter-footer' _msthash='3299712' _msttexthash='37609'> ".$total_turmas." Turmas</h6>";
                          $html .= "</div>";
                          $html .= "</div>";
                          $html .= "</div>";
                         
              
                          }
                      return $html;
          
                  }catch(Exception $e)
                  {
                      $arr = array("success" => 0, "msg" => "Erro ao efectuar a operação." . $e);
                      echo json_encode($arr); //Ate aqui tudo Ok
                      
                  }
              }

              public function listaDeClassesSelect($q)
              {
                  //$query = "SELECT * FROM `classe` WHERE (CASE WHEN $q = '' THEN '' ELSE id END) = (CASE WHEN $q = '' THEN '' else ? END)";
                  $query = "SELECT * FROM `classe` ORDER BY id DESC";
                  $stmt = $this->connect()->prepare($query);
                  $stmt->execute([$q]);
          
                  try
                  {
                      $html = "<option value='' selected='' disabled=''>Selecioone a classe </option>";
                      while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)){
                          $id = $rs['id'];
                          $nome = $rs['nome'];
                          $selected = ($q == $id) ? 'selected' : '';
                          $html .= "<option ".$selected." value='".$id."' >".$nome."</option>";
                                              
              
                          }
                      return $html;
          
                  }catch(Exception $e)
                  {
                      $arr = array("success" => 0, "msg" => "Erro ao efectuar a operação." . $e);
                      echo json_encode($arr); //Ate aqui tudo Ok
                      
                  }
              }

            public function listaDeProfessorSelect($q)
                {
                    $query = "SELECT * FROM `professor` ORDER BY id DESC";
                    $stmt = $this->connect()->prepare($query);
                    $stmt->execute([$q]);

                    try {
                        $html = "<option value='' selected='' disabled=''>Selecione o professor </option>";
                        while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $id = $rs['id'];
                            $professorStamp = $rs['professorStamp'];
                            $nome = $rs['nome'];
                            $selected = ($q) ? 'selected' : '';
                            $html .= "<option ".$selected." value='".$nome."' data-professorStamp='".$professorStamp."'>".$nome."</option>";
                        }
                        return $html;

                    } catch (Exception $e) {
                        $arr = array("success" => 0, "msg" => "Erro ao efetuar a operação." . $e);
                        echo json_encode($arr);
                    }
                }

                  public function listaDeDisciplinaSelect($q)
              {
                  //$query = "SELECT * FROM `classe` WHERE (CASE WHEN $q = '' THEN '' ELSE id END) = (CASE WHEN $q = '' THEN '' else ? END)";
                  $query = "SELECT * FROM `disciplina` ORDER BY id DESC";
                  $stmt = $this->connect()->prepare($query);
                  $stmt->execute([$q]);
          
                  try
                  {
                      $html = "<option value='' selected='' disabled=''>Disciplina a leccionar </option>";
                      while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)){
                          $id = $rs['id'];
                          $nome = $rs['nome'];
                          $selected = ($q) ? 'selected' : '';
                          $html .= "<option ".$selected." value='".$nome."' >".$nome."</option>";
                                              
              
                          }
                      return $html;
          
                  }catch(Exception $e)
                  {
                      $arr = array("success" => 0, "msg" => "Erro ao efectuar a operação." . $e);
                      echo json_encode($arr); //Ate aqui tudo Ok
                      
                  }
              }


                   public function listaDeSalaSelect($q)
              {
                  //$query = "SELECT * FROM `classe` WHERE (CASE WHEN $q = '' THEN '' ELSE id END) = (CASE WHEN $q = '' THEN '' else ? END)";
                  $query = "SELECT * FROM `sala` ORDER BY id DESC";
                  $stmt = $this->connect()->prepare($query);
                  $stmt->execute([$q]);
          
                  try
                  {
                      $html = "<option value='' selected='' disabled=''>Selecione a sala </option>";
                      while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)){
                          $id = $rs['id'];
                          $nome = $rs['nome'];
                          $selected = ($q) ? 'selected' : '';
                          $html .= "<option ".$selected." value='".$nome."' >".$nome."</option>";
                                              
              
                          }
                      return $html;
          
                  }catch(Exception $e)
                  {
                      $arr = array("success" => 0, "msg" => "Erro ao efectuar a operação." . $e);
                      echo json_encode($arr); //Ate aqui tudo Ok
                      
                  }
              }
      


              public function listaDeTurmasSelect($q)
              {
                  $query = "SELECT * FROM `turma` WHERE (CASE WHEN ? = 0 THEN 0 ELSE classe END) = (CASE WHEN ? = 0 THEN 0 ELSE ? END)";
                  $stmt = $this->connect()->prepare($query);
                  $stmt->execute([$q,$q,$q]);
          
                  try
                  {
                      $html = "<option value='' selected='' disabled='' >Selecioone </option> ";
                      while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)){
                          $id = $rs['id'];
                          $nome = $rs['nome'];
                          $numeroAlunos = "0";
                          $html .= "<option value='".$id."' >".$nome."</option>";
                                              
              
                          }
                      $arr = array("success" => 1, "msg" => $html);
                      echo json_encode($arr); //Ate aqui tudo Ok
          
                  }catch(Exception $e)
                  {
                      $arr = array("success" => 0, "msg" => "Erro ao efectuar a operação." . $e);
                      echo json_encode($arr); //Ate aqui tudo Ok
                      
                  }
              }

         public function listarDetalhesTurma($classe,$turma)
    {
        $query = "SELECT * FROM `atribuir_professor` WHERE classe = ? AND turma = ?";
        $stmt = $this->connect()
            ->prepare($query);
        $stmt->execute([$classe,$turma]);

        try
        {
            $html = "";
            while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)){
                $id = $rs['id'];
                $professor = $rs['professor'];
                $disciplina = $rs['disciplina'];
                $classe = $rs['classe'];
                $turma = $rs['turma'];
                $sala = $rs['sala'];
                 $html .= "<tr >";
                 $html .= "<td >".$rs['professor']."</td>";
                 $html .= "<td >".$rs['disciplina']."</td>";
                 $html .= "<td >".$rs['classe']."</td>";
                 $html .= "<td >".$rs['turma']."</td>";
                 $html .= "<td >".$rs['sala']."</td>";
                 $html .= " </tr>";
    
                }
            return $html;

        }catch(Exception $e)
        {
            $arr = array("success" => 0,"msg" => "Erro ao efectuar a operação." . $e);
            echo json_encode($arr); //Ate aqui tudo Ok
            
        }
    }



              
    public function listarTurmas($classe) 
    {
   
    $query = "SELECT turma.*,turma.nome nomeDaTurma,classe.nome nomeDaClasse, (SELECT COUNT(*) FROM matricula WHERE matricula.turma = turma.id) tutal_alunos FROM `turma` JOIN classe ON classe.id = turma.classe ";
    $query .=" WHERE (CASE WHEN ? = '' THEN '' ELSE classe END) = (CASE WHEN ? = '' THEN '' ELSE ? END)";
 
  
    $stmt = $this->connect()->prepare($query);
        $stmt->execute([$classe,$classe,$classe]);

        try
        {
            $html = "";
            while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)){
                $id = md5($rs['id']);
                $nome = $rs['nomeDaTurma'];
                $classe = $rs['nomeDaClasse'];
                $total_alunos = $rs['tutal_alunos'];
                $ano = $rs['ano'];
                $turma = $nome;
                $nrMinAluno = $rs['nrMinAluno'];
                $nrMaxAluno = $rs['nrMaxAluno'];
                $vagas_disponiveis = $nrMaxAluno - $total_alunos;
               
                $controladorEditar = md5('alterarTurma').'f';
                $controladorProfessor = md5('atribuirProfessor').'f';
                $controladorEliminar = md5('eliminarTurma').'f';
                $html .= "<div class='col-sm-6 col-md-6 col-lg-6 col-xl-3'>";
                $html .= "<div class='card'>";
                if($total_alunos > 0){
                  $html .= "
                  <div class='alert alert-warning' role='alert'>
                  <span class='alert-inner--icon'><i class='fe fe-info'></i></span>
                  <span class='alert-inner--text text-danger'><strong class='text-secondary'>Vagas</strong> dispoiniveis: ".$vagas_disponiveis."</span>
                  </div>
                  ";  
            }else{
                $html .= "
                  <div class='alert alert-warning' role='alert'>
                  <span class='alert-inner--icon'><i class='fe fe-info'></i></span>
                  <span class='alert-inner--text text-danger'><strong class='text-secondary'>Vagas</strong> dispoiniveis: ".$nrMaxAluno."</span>
                  </div>
                  "; 
            }
                $html .= "<div class='card-header pb-0 border-bottom-0'>";
                $html .= "<h3 class='card-title' _msthash='3299504' _msttexthash='489853'>".$classe."  ".$nome. " </h3>";
                $html .= "<div class='card-options'>";
                $html .= "<a class='btn btn-sm btn-success' href='alunos?q=".$id."'><i class='fa fa-eye mb-0' title='Ver lista de alunos'></i></a>&nbsp;";
                $html .= "<a class='btn btn-sm btn-primary' href='detalhes_turma?classe=".$classe."&turma=".$turma."'><i class='fa fa-eye mb-0' title='Ver detalhes da turma'></i></a>&nbsp;";
                $html .= "<a class='btn btn-sm btn-warning editarTurma' controlador='".$controladorEditar."' id='".$id."' nome='".$nome."' ano='".$ano."' href='#'><i class='fa fa-pencil mb-0' title='Editar Turma'></i></a>&nbsp;";
                $html .= "<a class='btn btn-sm btn-secondary atribuirProfessor' controlador='".$controladorProfessor."' id='".$id."' turma='".$turma."' classe='".$classe."' href='#' data-turma='".$turma."' data-classe='".$classe."'><i class='fa fa-user mb-0' title='Atribuir professor'></i></a>&nbsp;";
                $html .= "<a class='btn btn-sm btn-danger eliminarTurma' controlador='".$controladorEliminar."' id='".$id."' nome='".$nome."  ' ano='".$ano."' href='#'><i class='fa fa-trash mb-0' title='Excluir Turma'></i></a>&nbsp;";
                $html .= "</div>";
                $html .= "</div>";
                $html .= "<div class='card-body pt-0'>";
                $html .= "<h6 class='d-inline-blockquoter-footer' _msthash='3299712' _msttexthash='37609'> ".$total_alunos." Alunos</h6>";
                $html .= "</div>";
                $html .= "</div>";
                $html .= "</div>";
                  
                }

                
            return $html;

        }catch(Exception $e)
        {
            $arr = array(
                "success" => 0,
                "msg" => "Erro ao efectuar a operação." . $e
            );
            echo json_encode($arr); //Ate aqui tudo Ok
            
        }
     }

       public function listarTurmaSimples($classe) 
    {
   
    $query = "SELECT turma.*,turma.nome nomeDaTurma,classe.nome nomeDaClasse, (SELECT COUNT(*) FROM matricula WHERE matricula.turma = turma.id) tutal_alunos FROM `turma` JOIN classe ON classe.id = turma.classe ";
    $query .=" WHERE (CASE WHEN ? = '' THEN '' ELSE classe END) = (CASE WHEN ? = '' THEN '' ELSE ? END)";
 
  
    $stmt = $this->connect()->prepare($query);
        $stmt->execute([$classe,$classe,$classe]);

        try
        {
            $html = "";
            while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)){
                $id = md5($rs['id']);
                $nome = $rs['nomeDaTurma'];
                $classe = $rs['nomeDaClasse'];
                $total_alunos = $rs['tutal_alunos'];
                $ano = $rs['ano'];
                $turma = $nome;             
                $html .= "<div class='col-sm-6 col-md-6 col-lg-6 col-xl-3'>";
                $html .= "<div class='card'>";
                $html .= "<div class='card-header pb-0 border-bottom-0'>";
                $html .= "<h3 class='card-title' _msthash='3299504' _msttexthash='489853'>".$classe."  ".$nome. " </h3>";
                $html .= "<div class='card-options'>";
                $html .= "<a class='btn btn-sm btn-success' href='alunos?q=".$id."'><i class='fa fa-eye mb-0' title='Ver lista de alunos'></i></a>&nbsp;";
                $html .= "<a class='btn btn-sm btn-primary' href='detalhes_turma?classe=".$classe."&turma=".$turma."'><i class='fa fa-eye mb-0' title='Ver detalhes da turma'></i></a>&nbsp;";
                $html .= "</div>";
                $html .= "</div>";
                $html .= "<div class='card-body pt-0'>";
                $html .= "<h6 class='d-inline-blockquoter-footer' _msthash='3299712' _msttexthash='37609'> ".$total_alunos." Alunos</h6>";
                $html .= "</div>";
                $html .= "</div>";
                $html .= "</div>";
                  
                }

                
            return $html;

        }catch(Exception $e)
        {
            $arr = array(
                "success" => 0,
                "msg" => "Erro ao efectuar a operação." . $e
            );
            echo json_encode($arr); //Ate aqui tudo Ok
            
        }
     }



      

    }






?>