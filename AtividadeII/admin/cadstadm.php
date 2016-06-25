  <!DOCTYPE html>
  <html>
  <head>

      <meta charset="utf-8">

      <title> Cadastrar Adm - CatDog  </title>

      <link href="../css/bootstrap.min.css" rel="stylesheet">
      <link href="../css/catdog.css" rel="stylesheet">
      <link href="../css/form-elements.css" rel="stylesheet">
      <link href="../css/stylelogin.css" rel="stylesheet">

      <script src="../js/jquery-1.12.3.js"></script>
      <script src="../js/jquery.validate.js"></script>
      <script src="../js/validadm.js"></script>

      <style type="text/css">
      label.error {
        color: red;
      }
      h4{
        color:#ffffff;
      }
      </style>

      <?php session_start(); ?>

  </head>
  <body style="background:#ffffff">
          <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
              <div class="container">
                <div class="navbar-header">
                  <div class="navbar-brand">
                    <img src="../imagens/logo.png" height="45px" width="115px"/>
                  </div>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                </div>
              </div>
          </nav>
          <div class="container">
              <div class="col-md-2">
                  <div>
                      <p class="lead"><strong>Área Administrativa</strong></p>
                      <p>lojavirtual@catdog.com.br</p>
                      <p>(31) 3853-1313</p>
                  </div>
                </div>
                <div class="col-dm-2">
                  <div class="col-sm-6 col-sm-offset-1">
                    <div class="form-top">
                      <div>
                        <h3><strong>Identificação</strong></h3>
                        <p>Conecte-se ou crie uma conta</p>
                        <p> Por favor, complete os seus dados:</p>
                      </div>
                    </div>
                    <div class="form-bottom form">
                      <form name="form" id="form" method="post" class="login-form" action="cadstraradm.php">
                        <div class="form-group">
                          <p><h3>Nome:<h3/></p>
                          <input type="text" name="nome" placeholder="Digite seu nome" class="form-username form-control" id="nome">
                        </div>
                        <div class="form-group">
                          <p><h3>Login:<h3/></p>
                          <input type="text" name="login" placeholder="Digite seu login" class="form-username form-control" id="login">
                        </div>
                        <div class="form-group">
                          <p><h3>Senha:</h3></p>
                          <input type="password" name="senha" placeholder="Digite a sua senha" class="form-password form-control" id="senha">
                        </div>
                        <div class="form-group">
                          <p><h3>Tipo de usuario:</h3></p>
                          <select name="tipo">
                  					<option value="1">&nbsp Administrador &nbsp</option>
                  					<option value="2">&nbsp Operador &nbsp</option>
                  				</select>
                        </div>
                        <br/><br/>
                        <div class="col-sm-4">
                        <button type="submit" class="btn">Cadastrar</button>
                        </div>
                        <br/><br/><br/>
                      </form>
                    </div>
                  </div>
              </div>
          </div>
    </body>
  </html>