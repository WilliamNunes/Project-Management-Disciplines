  <?php
  session_start();

  include "config.php";

  $login = $_POST['login'];
  $senha = $_POST['senha'];

  $result = mysql_query("SELECT id FROM clientes WHERE login = '$login' AND senha = '$senha'");
  $id = mysql_fetch_assoc($result);

  if(mysql_num_rows ($result) > 0 ){
    $_SESSION['login'] = $login;
    $_SESSION['senha'] = $senha;
    $consulta = mysql_query("SELECT nome FROM clientes WHERE login = '$login' AND senha = '$senha'");
    $registro = mysql_fetch_assoc($consulta);
    $_SESSION['nome'] = $registro['nome'];
    header("location:areageral.php");
  }
  else{
  	unset ($_SESSION['login']);
  	unset ($_SESSION['senha']);
      echo "<div class='col-dm-4 col-dm-offset-6 text'>
                    <strong><center>E-mail ou senha não correspondem.</center></strong>
            </div>";
      include "login.php";
  }

  ?>
