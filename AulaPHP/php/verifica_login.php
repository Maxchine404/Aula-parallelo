<?php

$host = 'localhost';
        $db = 'Senai_php';
        $user = 'MaxineADM';
        $pass = '123456';
        $port = 3307; // Porta MySQL correta
        // Inclui o arquivo da classe Database que criamos para conectar dentro da pasta php
        require_once 'connection.php';
        // Cria uma instância da classe Database
        $database = new Database($host, $db, $user, $pass, $port);
        // Chama o método connect para estabelecer a conexão
        $database->connect();
        // Obtém a instância PDO para realizar consultas
        $pdo = $database->getConnection();

    $email = htmlspecialchars($_GET["email"]);
    $senha = htmlspecialchars($_GET["senha"]);


    // Verifica se a variável $pdo, que deve ser uma instância de PDO, está definida e é válida
    if ($pdo) {
        try {
            // Prepara uma consulta SQL para selecionar as colunas 'id' e 'nome' da tabela 'usuario'
            $stmt = $pdo->prepare("select * from senai_php.contato where nome = '$email' and senha = 'jdjsjdjdj'");
            
            // Executa a consulta preparada
            $stmt->execute();
            
            // Busca todos os resultados da consulta em um array associativo
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            // Verifica se há algum resultado na consulta
            if ($resultados) {
               echo("Logado!");
                
            } else {
                // Caso não haja resultados, exibe uma mensagem indicando que nenhum registro foi encontrado
                echo "Não logado.<br>";
            }
    }
?>