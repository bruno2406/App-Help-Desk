<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../config/css/style.css">

    <style>
      .card-login {
        padding: 30px 0 0 0;
        width: 350px;
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
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-login col-5">
          <div class="card">
            <div class="card-header">
              Criar Conta
            </div>
            <div class="card-body">
              <form class="criar_conta" action="../database/registar_usuario.php" method="post">
                <div class="form-row">
                  <div class="form-group">
                    <input required id="nome" name="nome" type="text">
                    <span>Nome</span>
                  </div>
                  <div class="form-group">
                    <input required name="sobrenome" type="text" class="form-control">
                    <span>Sobrenome</span>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group">
                    <input required autocomplete="off" id="email" name="email" type="email" class="form-control" onkeyup="verificar_email()">
                    <span>E-mail</span>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group">
                    <input required autocomplete="off" id="senha" name="senha" type="text" class="form-control" onkeydown="verificar_senha()">
                    <span>Senha</span>
                  </div>
                  <div class="form-group">
                    <input required autocomplete="off" id="confirma_senha" name="confirma_senha" type="text" class="form-control" onkeydown="confirma_senha()">
                    <span>Confirma Senha</span>
                  </div>
                </div>

                <?php 
                  if(isset($_GET['registrar']) && $_GET['registrar'] == 'erro') {
                ?>

               <div class="text-danger">
                Campo(s) Inválido(s)
               </div>

                <?php } ?>
                <button class="btn btn-lg btn-info btn-block" type="submit">Criar Conta</button>
              </form>
            </div>
          </div>
        </div>
    </div>
  </body>

  <script src="../config/js/jquery-3.6.0.min.js"></script>
  <script src="../config/js/registrar_usuario.js"></script>
  <script>

   

  </script>
</html>