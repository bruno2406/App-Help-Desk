<?php  

    require_once "../config/auth.php";
    session_start();
    $id_usuario = $_SESSION['id'];

    //Guardando os dados no banco de dados
    $titulo = strtoupper(isset($_POST['titulo'])?$_POST['titulo']:""); 
    $categoria = strtoupper(isset($_POST['categoria'])?$_POST['categoria']:""); 
    $descricao = strtoupper(isset($_POST['descricao'])?$_POST['descricao']:""); 

    $query = "INSERT INTO `chamados`(`titulo`, `categoria`, `descricao`, `id_usuario`) VALUES 
    (?,?,?,?)";

    $stmt = $conexao->prepare($query);
    $stmt->bindValue(1, $titulo);
    $stmt->bindValue(2, $categoria);
    $stmt->bindValue(3, $descricao);
    $stmt->bindValue(4, $id_usuario);

    if($stmt->execute()) {

        //Guardando os dados em um arquivo
        //estamos trabalhando na montagem do texto
        str_replace('#', '-', $_POST['titulo']);
        str_replace('#', '-', $_POST['categoria']);
        str_replace('#', '-', $_POST['descricao']);

        $texto = $_SESSION['id']. '#'. implode('#', $_POST). PHP_EOL;

        //abrindo o arquivo
        $arquivo = fopen('../../app_help_desk private/arquivo.hd', 'a');
        //escrevendo o texto
        fwrite($arquivo, $texto);
        //fechando o arquivo
        fclose($arquivo);

        header('location: ../pages/abrir_chamado.php?status=1');
    } else {
        //header('location: ../pages/abrir_chamado.php?status=2');
    }

    

?>