<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">

    <title>PetShop - CatDog </title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/jquery-1.12.3.js"></script>
    <link href="../css/stylelogin.css" rel="stylesheet">
    <script src="../js/bootstrap.min.js"></script>
    <link href="../css/catdog.css" rel="stylesheet">

    <style type="text/css">
    h4{
    color:#ffffff;
    }
    .form-bottom {
    background: rgb(255, 255, 255);
    }
    </style>


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

      $id = intval($_GET['id']);

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
            <div class="col-dm-2">
              <div class="col-sm-6 col-sm-offset-1">

                        <?php
                          include "config.php";
                          $consulta = mysql_query( "SELECT * FROM produtos WHERE id='$id'") or die(mysql_error());
                          $registro = mysql_fetch_assoc($consulta);
                        ?>

                        <div class="form-bottom">
                          <nav class="navbar navbar-inverse">
                              <div class="navbar-brand nav">
                                  <h4><?php echo $registro['nome']; ?></h4>
                              </div>
                          </nav>
                    			<h5><strong><center></center></strong></h5><br/>
                    			<center><img src="<?php echo $registro['imagem'] ?>" height="220px" width="300px"/></center><br/>
                    			<p><strong><center><h3 class='pull-left'>$<?php echo $registro['preco']; ?></h3></center></strong></p><br/>
                          <br/><br/><br/><?php  echo "<a href='carrinho.php?acao=add&id=".$registro['id']."'>"?><button class='btn btn-success'>Adicionar ao carrinho</button></a>
                            <a href="areageral.php"><button class='active btn btn-primary'>Voltar</button></a>
                          <br/>
                    		</div>
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
