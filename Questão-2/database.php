<?php

try {
    $conexao = new PDO("sqlite:tarefas.db");
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "CREATE TABLE IF NOT EXISTS tarefas (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        descricao TEXT NOT NULL,
        vencimento TEXT NOT NULL,
        concluida INTEGER DEFAULT 0
    )";

    $conexao->exec($sql);
} catch (PDOException $e) {
    die("Erro ao conectar ao banco: " . $e->getMessage());
}
?>
