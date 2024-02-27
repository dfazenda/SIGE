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

if (isset($_POST['classe']) && isset($_POST['turma'])) {
    $classe = $_POST['classe'];
    $turma = $_POST['turma'];

    // Consulta SQL para listar os alunos de acordo com a classe e a turma
    $query = "SELECT 
    aluno.nome AS nome_aluno,
    classe.nome AS classe_aluno,
    turma.nome AS turma_aluno
    FROM aluno
    JOIN matricula ON matricula.stampAluno = aluno.alunoStamp
    JOIN turma ON turma.id = matricula.turma
    JOIN classe ON classe.id = turma.classe
    WHERE classe.nome = :classe AND turma.nome = :turma;";

    // Preparar a consulta
    $stmt = $conn->prepare($query);

    // Substituir os parâmetros :classe e :turma pelos valores selecionados
    $stmt->bindParam(":classe", $classe, PDO::PARAM_STR);
    $stmt->bindParam(":turma", $turma, PDO::PARAM_STR);

    // Executar a consulta
    $stmt->execute();

    // Verificar se algum registro foi encontrado
    $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Crie um objeto PHPExcel
    require_once 'pages/Classes/PHPExcel.php';
    $excel = new PHPExcel();

    // Defina o título das colunas
    $excel->setActiveSheetIndex(0)
          ->setCellValue('A1', 'Nome do aluno')
          ->setCellValue('B1', 'Classe')
          ->setCellValue('C1', 'Turma');

    // Inicie a linha na qual os dados serão inseridos
    $linha = 2;

    // Preencha os dados dos alunos nas colunas correspondentes
    foreach ($alunos as $aluno) {
        $excel->getActiveSheet()
              ->setCellValue('A' . $linha, $aluno['nome_aluno'])
              ->setCellValue('B' . $linha, $aluno['classe_aluno'])
              ->setCellValue('C' . $linha, $aluno['turma_aluno']);
        $linha++;
    }

    // Crie o arquivo Excel no servidor
    $excelFilePath = 'lista_de_alunos.xlsx';
    $writer = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    $writer->save($excelFilePath);

    // Envie o arquivo Excel como um download
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="lista_de_alunos.xlsx"');
    header('Pragma: no-cache');
    readfile($excelFilePath);

    // Exclua o arquivo Excel após o envio
    unlink($excelFilePath);
    exit();
}
?>
