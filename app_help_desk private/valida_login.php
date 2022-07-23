<?php
	session_start();


	//variável que verifica se a autenticação foi realizada
	$usuario_autenticado = false;
	$usuario_id = null;
	$usuario_perfil_id = null;

	$perfis = array(1 => 'Administrativo', 2 => 'Usuário');

	//usuários do Sistema
	$usuariaos_app = array(
		array('id' => 1, 'email' => 'adm@gmail.com', 'senha' => '123456', 'perfil_id' => 1),
		array('id' => 2, 'email' => 'user@gmail.com', 'senha' => '123456', 'perfil_id' => 1),
		array('id' => 3, 'email' => 'jose@gmail.com', 'senha' => '123456', 'perfil_id' => 2),
		array('id' => 4, 'email' => 'maria@gmail.com', 'senha' => '123456', 'perfil_id' => 2)
	);


	foreach ($usuariaos_app as $user) {
		if ($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']) {

			$usuario_autenticado = true;
			$usuario_id = $user['id'];
			$usuario_perfil_id = $user['perfil_id'];
		} 
	}

	if ($usuario_autenticado) {
		echo 'usuário autenticado';
		$_SESSION['autenticado'] = 'SIM';
		$_SESSION['id'] = $usuario_id;
		$_SESSION['perfil_id'] = $usuario_perfil_id;
		header("location: home.php");
	} else {
		$_SESSION['autenticado'] = 'NAO';
		header("location: index.php?login=erro");
	}

  ?>