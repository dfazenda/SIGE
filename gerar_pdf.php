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

    // Consulta SQL para trazer os dados desejados
    $query = "SELECT 
    aluno.nome AS nome_aluno,
    classe.nome AS classe_aluno,
    turma.nome AS turma_aluno,
    mensalidade.nomeMes,
    mensalidade.tipoPagamento,
    mensalidade.nrDoRecibo,
    mensalidade.valorMensalidade
    FROM aluno
    JOIN matricula ON matricula.stampAluno = aluno.alunoStamp
    JOIN turma ON turma.id = matricula.turma
    JOIN classe ON classe.id = turma.classe
    LEFT JOIN mensalidade ON mensalidade.stampAluno = matricula.stampAluno
    WHERE mensalidade.nrDoRecibo = :nrDoRecibo;
";

    // Preparar a consulta
    $stmt = $conn->prepare($query);
    $recibo = $nrDoRecibo;
    $data = date("d/m/Y");
    $usuario = @$_SESSION['nome_usuario'];
    // Substituir o parâmetro :nrDoRecibo pelo valor de $nrDoRecibo
    $stmt->bindParam(":nrDoRecibo", $nrDoRecibo, PDO::PARAM_STR);

    // Executar a consulta
    $stmt->execute();

    // Verificar se algum registro foi encontrado
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        // Você pode acessar os dados do aluno e das mensalidades aqui
        $nomeAluno = $row['nome_aluno'];
        $classeAluno = $row['classe_aluno'];
        $turmaAluno = $row['turma_aluno'];
        $nomeMes = $row['nomeMes'];
        $tipoPagamento = $row['tipoPagamento'];
        $valorMensalidade = $row['valorMensalidade'];

        $mensalidade = number_format($valorMensalidade, 2, ',', '.');
        // Inclua a biblioteca TCPDF
        require_once('pages/tcpdf/tcpdf.php');

        // Crie um novo objeto TCPDF
        $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

        // Defina o título do documento
        $pdf->SetTitle('Recibo');

        // Adicione uma página
        $pdf->AddPage();

        // Defina a fonte e o tamanho do texto
        $pdf->SetFont('helvetica', '', 9);

        // Conteúdo HTML que será convertido em PDF
     $content = "
        <center>
        <img src='components/assets/images/brand/logo.jpg' ><br>
        <b>Colégio ILIA</b><br>
        Bairro de Magoanine B - CMC, 283<br>
        NUIT: 300152341<br>
        Contacto: 843454804<br>
        E-mail: colegio2002ilia@gmail.com<br><br>
        </center>

        <b>Maputo</b><br>
        Recibo nº: 00 $nrDoRecibo <br><br>
        Nome do aluno: $nomeAluno<br>
        Classe: $classeAluno<br>
        Recebemos o valor de $mensalidade MT referente ao pagamento de mensalidade de $nomeMes.<br>
        Método de pagamento: $tipoPagamento<br><br>
               
        Maputo, $data<br><br>
        Operador: $usuario<br>
        --------------------------------------------<br>
        Processado por Computador<br>
      _____________________________________________________________________________________________
    ";

    // Create a PDF with three sections, each with a height of 99mm
    $html = "";
    for ($i = 0; $i < 3; $i++) {
        $html .= "
            <div style='border: 1px solid grey; border-radius: 5px; margin-top: -50px; padding: 0px; height: 99mm;'>
                $content
            </div><br>";
    }

        // Escreva o HTML no PDF
        $pdf->writeHTML($html, true, false, true, false, '');

        // Saída do PDF para o navegador ou arquivo
        $pdf->Output('recibo.pdf', 'D'); // "D" para fazer o download do arquivo

        exit();
    } else {
        echo "Recibo não encontrado!";
    }
}
?>
