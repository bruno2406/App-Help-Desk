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
        
        $query = "SELECT * FROM usuarios";
        $stmt = $conexao->query($query);
    
        foreach($conexao->query($query) as $key => $result) {
            if ($result['email'] == $_POST['email'] && $result['senha'] == $_POST['senha']) {
                
                $_SESSION['autenticado'] = 'SIM';
                $_SESSION['id'] = $result['id_usuario'];
                $_SESSION['id_perfil'] = $result['id_perfil'];
                header("location: ../pages/home.php");
            } else {
                $_SESSION['autenticado'] = 'NAO';
                header("location: ../index.php?login=erro");
            }
        }
        header('location: ../pages/home.php');
    } else {
        header('location: ../pages/registrar_usuario.php?registrar=erro');
    }

    

?>