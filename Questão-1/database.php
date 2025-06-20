<?php
$arquivoBanco = 'livros.db';
$conexao = new PDO("sqlite:" . $arquivoBanco);

$sqlTabela = "CREATE TABLE IF NOT EXISTS livros (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    titulo TEXT NOT NULL,
    autor TEXT NOT NULL,
    ano INTEGER NOT NULL
)";
$conexao->exec($sqlTabela);
?>
