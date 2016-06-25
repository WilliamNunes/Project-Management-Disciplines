  <!DOCTYPE html>
  <html>
  <head>

      <meta charset="utf-8">

      <title>Pedidos - PetShop - CatDog </title>

      <link href="../css/bootstrap.min.css" rel="stylesheet">
      <link href="../css/catdog.css" rel="stylesheet">
      <link href="../css/form-elements.css" rel="stylesheet">
      <link href="../css/stylelogin.css" rel="stylesheet">

      <?php
        session_start();

        if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
          unset($_SESSION['login']);
          unset($_SESSION['senha']);
          header('location:login.php');
          $expressao = false;
        }

        $logado = $_SESSION['login'];
        $expressao = true;

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
                <li class="active">
                  <a class="list-group-item">Meus Pedidos</a>
                </li>
                  <a href="minhaconta.php"  class="list-group-item">Minha Conta</a>
              </div>
          </div>
          <div class="row">
              <div class="col-sm-8 form-box">
                <div class="form-top">
                  <div class="form-top-left">
                    <h3><strong>Meus Pedidos</strong></h3>
                  </div>
                </div>
                <div class="form-bottom">
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr class="active">
                        <th>Produto</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                        <th>Data</th>
                      </tr>
                      <tr class="active">
                      </tr>
                    </thead>
                    <tbody>
                      <?php

                        require("config.php");

                        $login = trim($_SESSION['login']);
                        $senha = trim($_SESSION['senha']);

                        $result = mysql_query("SELECT id FROM clientes WHERE login = '$login' AND senha = '$senha'") or die(mysql_error());
                        $consulta = mysql_fetch_assoc($result);
                        $cliente_id = trim($consulta['id']);

                        $result = mysql_query("SELECT compras.*, produtos.nome AS nome_prod FROM compras INNER JOIN produtos ON (compras.produto_id = produtos.id) WHERE compras.cliente_id = $cliente_id ") or die(mysql_error());
                        while ($pedidos = mysql_fetch_assoc($result)){
                        echo "<tr class='active'>
                                  <td>".$pedidos['nome_prod']."</td>
                                  <td>R$ ".$pedidos['preco']."</td>
                                  <td>".$pedidos['quantidade']."</td>
                                  <td>".$pedidos['data']."</td>
                              </tr>";
                        }
                      ?>

                    </tbody>
                  </table>
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
