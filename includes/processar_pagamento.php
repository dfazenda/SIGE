
<?php
require_once 'Pagamento.class.php';

$pagamento = new Pagamento();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $alunoId = $_POST['aluno_id'];
    $mes = $_POST['mes'];
    $comprovante = $_FILES['comprovante']['name'];

    // Salvar comprovante de pagamento
    $pagamento->salvarPagamento($alunoId, $mes, $comprovante);

    header('Location: confirmacao_pagamento.php?aluno_id=' . $alunoId . '&mes=' . $mes);
    exit;
} elseif (isset($_GET['cancelar_pagamento'])) {
    $pagamentoId = $_GET['cancelar_pagamento'];

    // Cancelar pagamento
    $pagamento->cancelarPagamento($pagamentoId);

    header('Location: confirmacao_pagamento.php?cancelado=true');
    exit;
}
?>




