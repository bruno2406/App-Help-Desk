<?php

    $dsn = "mysql:host=localhost;dbname=xapp_help_desk";
    $usuario = "root";
    $senha = "";

    try {
        $conexao = new PDO($dsn, $usuario, $senha);
    } catch (PDOException $e) {
        echo 'Erro: '.$e->getCode().' Mensagem: '.$e->getMessage();
        //Registrar Erro
    }

?>