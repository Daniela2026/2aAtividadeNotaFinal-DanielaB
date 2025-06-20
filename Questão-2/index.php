<?php
include 'database.php';

$sql = "SELECT * FROM tarefas ORDER BY vencimento ASC";
$stmt = $conexao->query($sql);
$tarefas = $stmt->fetchAll(PDO::FETCH_ASSOC);

$ativas = array_filter($tarefas, fn($t) => $t['concluida'] == 0);
$concluidas = array_filter($tarefas, fn($t) => $t['concluida'] == 1);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./estilos.css" />

        <title>Minhas Tarefas</title>
    </head>
    <body>
        <h1>Lista de Tarefas</h1>

        <h3>Adicionar Nova Tarefa</h3>
        <form method="POST" action="add_tarefa.php">
            <p>Descrição:<br>
            <input type="text" name="descricao" required></p>

            <p>Data de Vencimento:<br>
            <input type="date" name="vencimento" required></p>

            <p><button type="submit">Adicionar</button></p>
        </form>

        <hr>

        <h3>Tarefas Pendentes</h3>
        <?php if (count($ativas) > 0): ?>
            <ul>
            <?php foreach ($ativas as $t): ?>
                <li>
                    <?= htmlspecialchars($t['descricao']) ?> — vence em <?= $t['vencimento'] ?>
                    [<a href="update_tarefa.php?id=<?= $t['id'] ?>">Concluir</a>]
                    [<a href="delete_tarefa.php?id=<?= $t['id'] ?>">Excluir</a>]
                </li>
            <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Nenhuma tarefa pendente!</p>
        <?php endif; ?>

        <h3>Tarefas Concluídas</h3>
        <?php if (count($concluidas) > 0): ?>
            <ul>
            <?php foreach ($concluidas as $t): ?>
                <li>
                    <?= htmlspecialchars($t['descricao']) ?> — concluída em <?= $t['vencimento'] ?>
                    [<a href="delete_tarefa.php?id=<?= $t['id'] ?>">Excluir</a>]
                </li>
            <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Nenhuma tarefa concluída ainda.</p>
        <?php endif; ?>
    </body>
    </html>
