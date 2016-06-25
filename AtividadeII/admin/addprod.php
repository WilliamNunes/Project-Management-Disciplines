  <?php

  session_start();

  include "config.php";

  if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
      unset($_SESSION['login']);
      unset($_SESSION['senha']);
      header('location:loginadm.php');

  }else{
    $id = trim($_POST['id']);
    $nome = trim($_POST['nome']);
    $preco  = trim($_POST['preco']);
    $uploaddir = trim($_POST['imagem']);

    $uploadfile = $uploaddir.$_FILES['arquivo']['name'];

    if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploadfile)){

          $sql = mysql_query("INSERT INTO produtos(nome,preco,imagem) VALUES('$nome', '$preco', '$uploadfile')") or die(mysql_error());
          if (!$sql){

            echo "<script>alert('Esse produto não pode ser adicionado - Erro no Banco de Dados !!!');top.location.href='administrativo.php';</script>";

          }else{

            echo "<script>alert('Produto adicionado com sucesso !');top.location.href='administrativo.php';</script>";

          }

    }else {

      echo "<script>alert('Esse produto não pode ser adicionado - Imagem não pode ser enviada !!!');top.location.href='administrativo.php';</script>";

    }
  }
  ?>
