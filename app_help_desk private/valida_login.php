<?php
	session_start();
	require_once "auth.php";


	//variável que verifica se a autenticação foi realizada
	$usuario_autenticado = false;
	$usuario_id = null;
	$usuario_perfil_id = null;

	$query = "SELECT * FROM usuarios";
	$stmt = $conexao->query($query);

	foreach($conexao->query($query) as $key => $result) {
		if ($result['email'] == $_POST['email'] && $result['senha'] == $_POST['senha']) {

			$usuario_autenticado = true;
			$usuario_id = $result['id_usuario'];
			$usuario_perfil_id = $result['id_perfil'];
		}
	}

	if ($usuario_autenticado) {
		$_SESSION['autenticado'] = 'SIM';
		$_SESSION['id'] = $usuario_id;
		$_SESSION['id_perfil'] = $usuario_perfil_id;
		header("location: ../pages/home.php");
	} else {
		$_SESSION['autenticado'] = 'NAO';
		header("location: ../index.php?login=erro");
	}

  ?>