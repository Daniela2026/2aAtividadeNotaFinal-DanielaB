<?php
if (isset($_GET['id'])) {
    include 'database.php';

    $id = intval($_GET['id']);
    $sql = "UPDATE tarefas SET concluida = 1 WHERE id = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->execute([$id]);
}

header("Location: index.php");
exit;
?>
