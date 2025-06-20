<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'database.php';

    $descricao = trim($_POST['descricao'] ?? '');
    $vencimento = $_POST['vencimento'] ?? '';

    if ($descricao && $vencimento) {
        $sql = "INSERT INTO tarefas (descricao, vencimento) VALUES (?, ?)";
        $stmt = $conexao->prepare($sql);
        $stmt->execute([$descricao, $vencimento]);
    }
}

header("Location: index.php");
exit;
?>

