<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">

    <title>Conta - PetShop - CatDog </title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/catdog.css" rel="stylesheet">
    <link href="../css/form-elements.css" rel="stylesheet">
    <link href="../css/stylelogin.css" rel="stylesheet">
    <script src="../js/jquery-1.12.3.js"></script>
    <script src="../js/jquery.validate.js"></script>
    <script src="../js/valida.js"></script>

    <?php
      session_start();
      if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
          unset($_SESSION['login']);
          unset($_SESSION['senha']);
          header('location:login.php');
          $expressao = false;

      }else{
          $logado = $_SESSION['login'];
          $expressao = true;
        }

    ?>
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
                    <?php if ($expressao == true): ?>
                    <ul class="nav navbar-nav navbar-right">
                      <li><a href="logout.php">Sair</a></li>
                    <?php endif; ?>
                    </ul>
            </div>
        </div>

    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <p class="lead"><strong>Pet Shop</strong></p>
                <div class="list-group">
                    <a href="meuspedidos.php" class="list-group-item">Meus Pedidos</a>
                    <li class="active">
                      <a class="list-group-item">Minha Conta</a>
                    </li>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 form-box">
                  <div class="form-top">
                    <div class="form-top-left">
                      <h3><strong>Dados Pessoais</strong></h3>
                    </div>
                  </div>
                  <div class="form-bottom">
                    <form id="form" name="form" class="login-form" method="post" action="editar.php">
                      <div class="form-group">
                        <p><strong>Nome:</strong></p>
                        <?php
                        echo "<input type='text' name='nome' value='".$_SESSION['nome']."' class='form-username form-control' id='nome'>";
                        ?>
                      </div>
                      <div class="form-group">
                        <p><strong>E-mail:</strong></p>
                        <?php
                        echo "<input type='email' name='login' value='".$_SESSION['login']."' class='form-username form-control' id='login'>";
                         ?>
                      </div>
                      <div class="form-group">
                        <p><strong>Senha:</strong></p>
                        <?php
                        echo "<input type='text' name='senha' value='".$_SESSION['senha']."' class='form-password form-control' id='senha'>";
                         ?>
                      </div>
                      <br/><button type="submit" class="btn">Salvar</button>
                    </form>
                  </div>
                </div>
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
