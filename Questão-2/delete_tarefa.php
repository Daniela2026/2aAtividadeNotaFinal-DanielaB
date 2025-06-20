<?php
if (isset($_GET['id'])) {
    include 'database.php';

    $id = intval($_GET['id']);
    $sql = "DELETE FROM tarefas WHERE id = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->execute([$id]);
}

header("Location: index.php");
exit;
?>
