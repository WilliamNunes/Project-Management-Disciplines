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

    if($_POST["save"]) {

      $endereco = explode("/",$uploaddir,-1);
      $uploaddir = "..";

      for ($i=1; $i < sizeof($endereco) ; $i++) {
        $uploaddir = $uploaddir."/".$endereco[$i];
      }

      $uploaddir = $uploaddir."/";
      $uploadfile = $uploaddir.$_FILES['arquivo']['name'];

      if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploadfile)){

          $sql = mysql_query("UPDATE produtos SET nome='$nome', preco='$preco', imagem='$uploadfile' WHERE id='$id'") or die(mysql_error());

          if (!$sql){
            echo "<script>alert('Esse produto não pode ser editado - Erro no Banco de dados !!!');top.location.href='administrativo.php';</script>";
          }else{
            echo "<script>alert('Produto editado com sucesso !');top.location.href='administrativo.php';</script>";
          }
      }else{
            echo "<script>alert('Imagem não foi substituida !!!');</script>";
            $sql = mysql_query("UPDATE produtos SET nome='$nome', preco='$preco' WHERE id='$id'") or die(mysql_error());

            if (!$sql){
              echo "<script>alert('Esse produto não pode ser editado - Erro no Banco de dados !!!');top.location.href='administrativo.php';</script>";
            }else{
              echo "<script>alert('Produto editado com sucesso !');top.location.href='administrativo.php';</script>";
            }
      }
    }

    if($_POST["del"]) {

      $result = mysql_query("SELECT * FROM compras WHERE produto_id = '$id'") or die(mysql_error());
      if(mysql_num_rows ($result) > 0 ){
        echo "<script>alert('Esse produto possui compras não pode ser excluído !!!');top.location.href='administrativo.php';</script>";
      }else{
        $sql = mysql_query("DELETE FROM produtos WHERE id='$id'") or die(mysql_error());
        unlink($_POST['imagem']);
        echo "<script>alert('Esse produto foi excluído !!!');top.location.href='administrativo.php';</script>";
      }
    }
  }
  ?>
