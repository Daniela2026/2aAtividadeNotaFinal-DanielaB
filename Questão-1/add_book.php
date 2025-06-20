<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'database.php';

    $titulo = $_POST['titulo'] ?? '';
    $autor = $_POST['autor'] ?? '';
    $ano = $_POST['ano'] ?? '';

    if ($titulo && $autor && $ano) {
        $inserir = $conexao->prepare("INSERT INTO livros (titulo, autor, ano) VALUES (?, ?, ?)");
        $inserir->execute([$titulo, $autor, $ano]);
    }
}

header("Location: index.php");
exit;
?>
