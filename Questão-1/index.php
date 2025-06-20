
<?php
include 'database.php';

$dados = $conexao->query("SELECT * FROM livros ORDER BY id DESC");
$lista = $dados->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./estilos.css" />
    <title>Minha Livraria</title>
</head>
<body>
    <h2>Livros Cadastrados</h2>

    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th><th>Título</th><th>Autor</th><th>Ano</th><th>Ações</th>
        </tr>
        <?php foreach ($lista as $livro): ?>
        <tr>
            <td><?= $livro['id'] ?></td>
            <td><?= htmlspecialchars($livro['titulo']) ?></td>
            <td><?= htmlspecialchars($livro['autor']) ?></td>
            <td><?= $livro['ano'] ?></td>
            <td><a href="delete_book.php?id=<?= $livro['id'] ?>">Excluir</a></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>Novo Livro</h2>
    <form method="POST" action="add_book.php">
        <p>Título: <input type="text" name="titulo" required></p>
        <p>Autor: <input type="text" name="autor" required></p>
        <p>Ano: <input type="number" name="ano" required></p>
        <p><button type="submit">Cadastrar</button></p>
    </form>
</body>
</html>
