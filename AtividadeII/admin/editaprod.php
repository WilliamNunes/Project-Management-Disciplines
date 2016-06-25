<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">

    <title>Administrativo - CatDog</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/catdog.css" rel="stylesheet">
    <link href="../css/stylelogin.css" rel="stylesheet">
    <script src="../js/jquery-1.12.3.js"></script>
    <script src="../js/jquery.validate.js"></script>
    <script src="../js/validadm.js"></script>

    <script  type="text/javascript">
    function confirmar(){
      var decisao = window.confirm('Tem certeza de que deseja alterar ou deletar esse produto ?');
      if (decisao){
        return true;
      }else{
        return false;
      }
    }
    </script>

    <style type="text/css">
    label.error {
      color: red;
    }
    h4{
    color:#ffffff;
    }
    </style>

    <?php
    session_start();

    if((!isset ($_SESSION['login']) == true) or (!isset ($_SESSION['senha']) == true) or (!isset ($_SESSION['tipo']) == true)){
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        unset($_SESSION['tipo']);

        header('location:loginadm.php');
        $expressao = false;

    }else{
        $nome = $_SESSION['nome'];
        $tipo = $_SESSION['tipo'];
        $expressao = true;

        $id = intval($_GET['id']);
      }
      ?>
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
                    <ul class="nav navbar-nav">
                        <li>
                        </li>
                        </ul>
                        <?php if ($expressao == true): ?>
                        <ul class="nav navbar-nav navbar-right">
                          <li><a>Bem vindo <?php echo $nome; ?> &nbsp!</a></li>
                          <li><a href="logoutadm.php">Sair</a></li>
                        <?php endif; ?>
                        </ul>
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
                <div class="col-sm-10">
                  <nav class="navbar navbar-inverse">
                      <div class="navbar-brand nav">
                          <h4>Editar Produto</h4>
                      </div>
                  </nav>
                  <div class="form-top">
                    <form class="login-form" id="formII" name="formII" onsubmit="return confirmar()" enctype="multipart/form-data" method="post" action="editarprod.php">
                    <br/><br/><table class="table table-bordered">
                      <thead>
                        <tr class="active">
                          <th width="9%">Id:</th>
                          <th width="37%">Nome:</th>
                          <th width="13%">Preço:</th>
                          <th width="30%">Imagem:</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          include "config.php";
                          $consulta = mysql_query( "SELECT *  FROM produtos WHERE id= '$id'") or die(mysql_error());
                          $registro = mysql_fetch_assoc($consulta)
                        ?>
                          <tr class="active">
                            <th>
                              <br/><input type="text" name="id" value="<?php echo $registro['id']; ?>" class="form-control" readonly="true" id="id">
                            </th>
                            <th>
                              <br/><input type="text" name="nome" value="<?php echo $registro['nome']; ?>" <?php if ($tipo != 1): echo "readonly='true'"; endif; ?>class="form-username form-control" id="nome">
                            </th>
                            <th>
                              <br/><input type="text" name="preco" value="<?php echo $registro['preco']; ?>" class="form-username form-control" id="preco">
                            </th>
                            <th>
                              <input type="text" name="imagem" value="<?php echo $registro['imagem']; ?>" class="form-username form-control" id="imagem">
                              <input name="arquivo" size="20" type="file"/>
                            </th>
                            <th width="5%">
                            <center><input type="submit" class="btn btn-success" name="save" value="Salvar"/>
                              <input type="submit" class="btn btn-danger" name="del" value="Delete"/>
                            </center>
                            </th>
                          </tr>
                        </tbody>
                      </table>
                    </form>
                      <a href="administrativo.php"><button type="button" class="btn btn-primary">Voltar</button></a>
                  </div>
                </div>
            </div>
        </div>
    </body>
</html>
