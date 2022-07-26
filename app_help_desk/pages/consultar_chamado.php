<?php  
  require_once "../config/validador_acesso.php";
  require_once "../config/auth.php";
?>

<?php   

  $id_usuario = $_SESSION['id'];
  
  if($_SESSION['id_perfil'] == 2){
    $query = "SELECT * FROM chamados WHERE id_usuario = '". $id_usuario. "'";
    $stmt = $conexao->query($query);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $chamados[] = $result;
  }else {
    $query = "SELECT * FROM chamados LEFT JOIN usuarios ON (chamados.id_usuario = usuarios.id_usuario)";
    $stmt = $conexao->query($query);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    /*echo "<pre>";
    print_r($result);
    echo "</pre>";*/
  }

?>

 <html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
    
    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="../ref/img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <ul class="navbar-nav">
        <li class="nav-item ">
          <a class="nav-link" href="../config/logoff.php">SAIR</a>
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">

              <?php foreach($result as $key => $chamado) { ?>
                
                <div class="card mb-3 bg-light">
                  <div class="card-body">
                    <?php if($_SESSION['id_perfil'] == 1) { ?>
                    <p class="card-text"><?php echo 'ID: '. $chamado['id_usuario']. ' Usuário: '. $chamado['nome']. ' '. $chamado['sobrenome']; ?></p>
                    <?php } ?>
                    <h5 class="card-title"><?php echo $chamado['titulo']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $chamado['categoria']; ?></h6>
                    <p class="card-text"><?php echo $chamado['descricao']; ?></p>
                  </div>
                </div>
                
              <?php } ?>

              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>