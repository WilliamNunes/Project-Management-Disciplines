    <!DOCTYPE html>
    <html>
    <head>

        <meta charset="utf-8">

        <title>Carrinho - PetShop - CatDog </title>

        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/catdog.css" rel="stylesheet">
        <link href="../css/form-elements.css" rel="stylesheet">
        <link href="../css/stylelogin.css" rel="stylesheet">

        <?php
        session_start();
        if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
    	       unset($_SESSION['login']);
    	       unset($_SESSION['senha']);
             echo "<div class='container'>
                      <div class='row'>
                          <div class='col-md-3'>
                              <p>Bem vindo <strong>Visitante </strong> !<br/></p>
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
                              <p>Bem vindo <strong>".$nome."</strong>!<br/></p>
                       </div>
                     </div>
                   </div>";
                   $expressao = true;
          }


          if(!isset($_SESSION['carrinho'])){
             $_SESSION['carrinho'] = array();
          }

          //adiciona produto
          if(isset($_GET['acao'])){

             //ADICIONAR NO CARRINHO
             if($_GET['acao'] == 'add'){
                $id = intval($_GET['id']);
                if(!isset($_SESSION['carrinho'][$id])){
                   $_SESSION['carrinho'][$id] = 1;
                }else{
                   $_SESSION['carrinho'][$id] += 1;
                }
                header("location:carrinho.php");
             }

             //REMOVER DO CARRINHO
             if($_GET['acao'] == 'del'){
                $id = intval($_GET['id']);
                if(isset($_SESSION['carrinho'][$id])){
                   unset($_SESSION['carrinho'][$id]);
                }
                header("location:carrinho.php");
             }

             //ALTERAR QUANTIDADE
             if($_GET['acao'] == 'up'){
               $id = intval($_GET['id']);
               if(!isset($_SESSION['carrinho'][$id])){
                  $_SESSION['carrinho'][$id] = 1;
               }else{
                  $_SESSION['carrinho'][$id] += 1;
               }
               header("location:carrinho.php");
             }
             if($_GET['acao'] == 'down'){
               $id = intval($_GET['id']);
               if($_SESSION['carrinho'][$id] != 1){
                  $_SESSION['carrinho'][$id] -= 1;
               }
               header("location:carrinho.php");
             }
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
                        <li class="active">
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
                        <a href="minhaconta.php"  class="list-group-item">Minha Conta</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-8 form-box">
                      <div class="form-top">
                        <div class="form-top-left">
                          <h3><strong>Meu Carrinho</strong></h3>
                        </div>
                      </div>
                      <div class="form-bottom">
                        <table class="table table-bordered table-hover">
                          <thead>
                            <tr class="active">
                              <th>Produto</th>
                              <th>Preço</th>
                              <th>Quantidade</th>
                              <th>SubTotal</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            if(count($_SESSION['carrinho']) != 0){

                                require("config.php");
                                $total = 0;
                                foreach($_SESSION['carrinho'] as $id => $qtd){
                                  $sql   = "SELECT *  FROM produtos WHERE id= '$id'";
                                  $qr    = mysql_query($sql) or die(mysql_error());
                                  $ln    = mysql_fetch_assoc($qr);

                                  $nome  = $ln['nome'];
                                  $preco = number_format($ln['preco'], 2, ',', '.');
                                  $sub   = number_format($ln['preco'] * $qtd, 2, ',', '.');

                                  $total += $ln['preco'] * $qtd;
                                  $total = number_format($total, 2, ',', '.');
                                  echo "<tr class='active'>
                                          <td>".$nome."</td>
                                          <td>R$ ".$preco."</td>
                                          <td><center>".$qtd."</center><center>&nbsp<a href='?acao=up&id=".$id."'><input type='button' class=' btn btn-success' name='add' value='+'/></a>
                                          &nbsp<a href='?acao=down&id=".$id."'><input type='button' class=' btn btn-danger' name='rem' value='-'/></a><center></td>
                                          <td>R$ ".$sub."</td>
                                          <td><a href='?acao=del&id=".$id."'><input type='button' class=' btn btn-danger' name='remover' value='Remover'/></a></td>
                                        </tr>";
                                      }
                                  echo "<tr class='active'>
                                        <td colspan='4'>Total</td>
                                        <td>R$ ".$total."</td>
                                        </tr>";
                                      }
                              ?>
                        </tbody>
                      </table>
                      <a href="areageral.php"><button class='active btn btn-primary'>Continuar Comprando</button></a> <a href="finalizarcompra.php"><button class='active btn btn-success' href=>Finalizar Compra</button></a>
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
