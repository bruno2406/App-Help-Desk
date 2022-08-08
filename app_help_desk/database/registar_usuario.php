<?php 

    require_once "../config/auth.php";
    session_start();

    //Guardando os dados no banco de dados

    $nome = isset($_POST['nome'])?$_POST['nome']:""; 
    $sobrenome = isset($_POST['sobrenome'])?$_POST['sobrenome']:""; 
    $email = isset($_POST['email'])?$_POST['email']:""; 
    $senha = isset($_POST['senha'])?$_POST['senha']:""; 

    $query = "INSERT INTO `usuarios`(`nome`, `sobrenome`, `email`, `senha`) VALUES 
    (?,?,?,?)";

    $stmt = $conexao->prepare($query);
    $stmt->bindValue(1, $nome);
    $stmt->bindValue(2, $sobrenome);
    $stmt->bindValue(3, $email);
    $stmt->bindValue(4, $senha);

    if($stmt->execute()) {
            $content = http_build_query(array(
            'email' => $email,
            'senha' => $senha,
            ));

            $context = stream_context_create(array(
            'http' => array(
            'method' => 'POST',
            'content' => $content,
            )
            ));

            $result = file_get_contents('../index.php', null, $context);
        header('location: ../index.php?status=1');
    } else {
        header('location: ../index.php?status=2');
    }

    

?>