<?php
if (isset($_GET['id'])) {
    include 'database.php';

    $idLivro = intval($_GET['id']);
    $apagar = $conexao->prepare("DELETE FROM livros WHERE id = ?");
    $apagar->execute([$idLivro]);
}

header("Location: index.php");
exit;
?>
