  <?php
  session_start();

  include "config.php";

  if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
      unset($_SESSION['login']);
      unset($_SESSION['senha']);

      echo "<script>alert('Faça login ou cadastre-se para finalizar!');top.location.href='login.php';</script>";
  }else{

    $tam = sizeof($_SESSION['carrinho']);

      if ($tam == 0) {
        echo "<script>alert('Carrinho Vazio!');top.location.href='carrinho.php';</script>";
      }else{

        $login = trim($_SESSION['login']);
        $senha = trim($_SESSION['senha']);
        $result = mysql_query("SELECT id FROM clientes WHERE login = '$login' AND senha = '$senha'") or die(mysql_error());
        $consulta = mysql_fetch_assoc($result);
        $cliente_id = trim($consulta['id']);
        $today = trim(date("d.m.y"));

        foreach($_SESSION['carrinho'] as $id => $qtd){

            $pegpreco = mysql_query("SELECT preco FROM produtos WHERE id= '$id'") or die(mysql_error());
            $ln    = mysql_fetch_assoc($pegpreco);
            $preco = $ln['preco'];

            $sql = mysql_query("INSERT INTO compras(cliente_id, produto_id, quantidade, preco, data)
            VALUES ('$cliente_id', '$id', '$qtd', '$preco', '$today')") or die(mysql_error());

          }
            if (!$sql){
              echo "Ocorreu um erro ao finalizar sua compra, entre em contato.";
            }else {
              foreach($_SESSION['carrinho'] as $id => $qtd){
              unset($_SESSION['carrinho'][$id]);
              }
              echo "<script>alert('Compra efetuada com sucesso!');top.location.href='meuspedidos.php';</script>";
            }
        }
      }
  ?>
