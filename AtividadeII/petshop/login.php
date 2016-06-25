  <!DOCTYPE html>
  <html>
  <head>

      <meta charset="utf-8">

      <title> Login - PetShop - CatDog  </title>

      <link href="../css/bootstrap.min.css" rel="stylesheet">
      <link href="../css/catdog.css" rel="stylesheet">
      <link href="../css/form-elements.css" rel="stylesheet">
      <link href="../css/stylelogin.css" rel="stylesheet">
      <script src="../js/jquery-1.12.3.js"></script>
      <script src="../js/jquery.validate.js"></script>
      <script src="../js/valida.js"></script>

      <?php session_start(); ?>

  </head>
    <body>
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
          <div class="container">

              <div class="navbar-header">
                <div class="navbar-brand">
                  <img src="../imagens/logo.png" height="45px" width="115px"/>
                </div>
              </div>
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav">
                      <li>
                          <a href="areageral.php">Home</a>
                      </li>
                      <li>
                          <a href="contato.php">Contato</a>
                      </li>
                      <li>
                        <a href="carrinho.php">Meu carrinho:&nbsp<?php $aux = sizeof($_SESSION['carrinho']); echo $aux; ?>&nbspIten(s)</a>
                      </li>
                  </ul>
              </div>
          </div>
      </nav>
      <div class="container">
          <div class="row">
              <div class="col-md-3">
                  <p class="lead"><strong>Pet Shop</strong></p>
              </div>
          </div>
          <div class="row">
              <div class="col-sm-6 col-sm-offset-3 form-box">
                <div class="form-top">
                  <div class="form-top-left">
                    <h3><strong>Identificação</strong></h3>
                    <p><h4>Conecte-se ou crie uma conta</h4></p>
                    <p> Por favor, complete os seus dados:</p>
                  </div>
                </div>
                <div class="form-bottom">
                  <form name="form" id="form" method="post" class="login-form" action="logar.php">
                    <div class="form-group">
                      <p>Acesse com seu e-mail</p>
                      <input type="email" name="login" placeholder="Digite o seu e-mail" class="form-username form-control" id="login">
                    </div>
                    <div class="form-group">
                      <p>Já possui um cadastro? Digite sua senha no campo abaixo</p>
                      <input type="password" name="senha" placeholder="Digite a sua senha" class="form-password form-control" id="senha">
                    </div>
                    <div class="form-group">
                      <br/><p><a href="cadastro.php"/><strong>Não, essa é a minha primeira compra</strong></p></a>
                      <br/>
                    </div>
                    <button type="submit" class="btn">Continuar</button>
                  </form>
                </div>
              </div>
          </div>
          <div class="container">
            <hr>
            <footer>
              <div class="row">
                <div class="col-lg-12">
                  <p><h4>lojavirtual@catdog.com.br</h4></p>
                  <p><h4>(31) 3853-1313</h4></p>
                </div>
            </div>
        </footer>
    </div>
  </body>

  </html>
