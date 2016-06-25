  <!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">

      <title>Contato - CatDog </title>

      <link href="../css/bootstrap.min.css" rel="stylesheet">
      <link href="../css/catdog.css" rel="stylesheet">

      <?php
      session_start();

      if(!isset($_SESSION['carrinho'])){
         $_SESSION['carrinho'] = array();
      }

      if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
  	       unset($_SESSION['login']);
  	       unset($_SESSION['senha']);
           $expressao = false;
  	    }
        else{
          $logado = $_SESSION['login'];
          $nome = $_SESSION['nome'];
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
                <li class="active">
                    <a >Contato</a>
                </li>
                <li>
                    <a href="carrinho.php">Meu carrinho:&nbsp<?php  $aux = sizeof($_SESSION['carrinho']); echo $aux; ?>&nbspIten(s)</a>
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
        <div class="col-md-2">
          <div>
            <p class="lead"><strong>Pet Shop</strong></p>
            <p><h4>lojavirtual@catdog.com.br</h4></p>
            <p><h4>(31) 3853-1313</h4></p>
          </div>
        </div>
        <div class="col-dm-2">
          <div class="col-sm-6 col-sm-offset-1">
            <div class="form-top">
              <div class="form-top-left">
                <p>O universo dos pets vem ganhando cada vez mais espaço no Brasil.
                  A oferta de pet shops do Brasil e produtos é imensa e cresce a cada dia.
                  Seguindo sempre a tendência mundial, esses espaços contam com uma série de serviços e itens
                  que tornam a vida dos animais de estimação e seus donos muito mais divertida e com mais praticidade.
                  São remédios, produtos para beleza e cuidado dos animais. Tudo pensado para fornecer o melhor bem-estar,
                  para garantir a qualidade de vida todos os dias na vida do seu pet.</p>

                  <p>A internet veio para auxiliar ainda mais nessa missão. O CatDog, por exemplo, oferece um ambiente inovador
                    na hora de comprar o que há de melhor para o seu bichinho. Todo o ambiente online é pensado para facilitar a
                    compra e fornecer a melhor experiência para os clientes.</p>
              </div>
            </div>
          </div>
      </div>
  </div>
</body>
</html>
