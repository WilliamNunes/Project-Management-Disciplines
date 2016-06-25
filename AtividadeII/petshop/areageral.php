  <!DOCTYPE html>
  <html>
    <head>

      <meta charset="utf-8">

      <title>PetShop - CatDog </title>

      <link href="../css/bootstrap.min.css" rel="stylesheet">
      <script src="../js/jquery-1.12.3.js"></script>
      <script src="../js/bootstrap.min.js"></script>
      <link href="../css/catdog.css" rel="stylesheet">

      <?php
      session_start();

      if(!isset($_SESSION['carrinho'])){
         $_SESSION['carrinho'] = array();
      }

      if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
  	       unset($_SESSION['login']);
  	       unset($_SESSION['senha']);
           echo "<div class='container'>
                    <div class='row'>
                        <div class='col-md-3'>
                            <p>Bem vindo <strong>Visitante </strong>!<br/></p>
                        </div>
                    </div>
                  </div>  ";
                  $expressao = false;
  	    }
        else{
          $logado = $_SESSION['login'];
          $nome = $_SESSION['nome'];
          echo "<div class='container'>
                   <div class='row'>
                      <div class='col-md-3'>
                            <p>Bem vindo <strong>".$nome."</strong> !<br/></p>
                     </div>
                   </div>
                 </div>";
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
                      <li class="active">
                          <a>Home</a>
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
                  </ul>
                  <?php endif; ?>

                  <?php if ($expressao == false): ?>
                  <ul class="nav navbar-nav navbar-right">
                    <li><a href="login.php">Faça seu login ou cadastre-se</a></li>
                  </ul>
                  <?php endif; ?>

                </div>
            </div>
        </nav>
        <div class="container">
          <div class="row">

              <div class="col-md-3">
                  <p class="lead"><strong>Pet Shop</strong></p>
                  <div class="list-group">
                      <a href="meuspedidos.php" class="list-group-item">Meus Pedidos</a>
                      <a href="minhaconta.php" class="list-group-item">Minha Conta</a>
                  </div>
              </div>

              <div class="col-md-9">
                  <div class="row carousel-holder">
                      <div class="col-md-12">
                          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                              <ol class="carousel-indicators">
                                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                  <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                  <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                              </ol>
                              <div class="carousel-inner">
                                  <div class="item active">
                                      <a href="http://www.bayerpet.com.br/pet-lover/adote-amigo/home/" target="_blank" ><img class="slide-img" src="../imagens/adote.jpg" alt=""></a>
                                  </div>
                                  <div class="item">
                                    <a href="http://www.adotacao.com.br/" target="_blank" ><img class="slide-image" src="../imagens/adotefocinho.jpg" alt=""></a>
                                  </div>
                                  <div class="item">
                                    <a href="http://www.adoteumfocinho.com.br/v1/index.asp" target="_blank" ><img class="slide-image" src="../imagens/adotacao.jpg" alt=""></a>
                                  </div>
                              </div>
                              <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                  <span class="glyphicon glyphicon-chevron-left"></span>
                              </a>
                              <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                  <span class="glyphicon glyphicon-chevron-right"></span>
                              </a>
                          </div>
                      </div>
                  </div>
                  <div class='row'>
                      <?php
                        include "config.php";
                        $consulta = mysql_query( "SELECT * FROM produtos") or die(mysql_error());
                        while ($registro = mysql_fetch_assoc($consulta)){
                          echo "<div class='col-sm-4 col-lg-4 col-md-4'>
                                  <div class='thumbnail'>
                                    <img height='5px' width='5px' src='".$registro['imagem']."'>
                                    <div class='caption'>
                                    <div>
                                    <br/><h4 class='pull-right'>$".$registro['preco']."</h4>
                                      <a href='detalhesprod.php?acao=add&id=".$registro['id']."'>".$registro['nome']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a>
                                      </div>
                                      <div class='ratings'>
                                        <br/><a href='carrinho.php?acao=add&id=".$registro['id']."'><button class='btn btn-success'>Adicionar ao carrinho</button></a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            ";
                          }
                      ?>
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
