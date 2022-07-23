<?php 

    session_start();

    //estamos trabalhando na montagem do texto
    str_replace('#', '-', $_POST['titulo']);
    str_replace('#', '-', $_POST['categoria']);
    str_replace('#', '-', $_POST['descricao']);

    $texto = $_SESSION['id']. '#'. implode('#', $_POST). PHP_EOL;

    //abrindo o arquivo
    $arquivo = fopen('../app_help_desk private/arquivo.hd', 'a');
    //escrevendo o texto
    fwrite($arquivo, $texto);
    //fechando o arquivo
    fclose($arquivo);

    //echo $texto;
    header('location: abrir_chamado.php');

?>