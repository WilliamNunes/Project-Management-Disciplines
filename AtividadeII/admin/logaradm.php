<?php
  session_start();

  include "config.php";

  $login = $_POST['login'];
  $senha = $_POST['senha'];

  $result = mysql_query("SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'");
  $usuario = mysql_fetch_assoc($result);

  if(mysql_num_rows ($result) > 0 ){
    $_SESSION['login'] = $login;
    $_SESSION['senha'] = $senha;
    $_SESSION['tipo'] = $usuario['tipo'];
    $_SESSION['id'] = $usuario['id'];
    $_SESSION['nome'] = $usuario['nome'];
    header("location:administrativo.php");
  }
  else{
  	unset ($_SESSION['login']);
  	unset ($_SESSION['senha']);
      echo "<div class='col-dm-4 col-dm-offset-6 text'>
                    <strong><center>E-mail ou senha inválidos.</center></strong>
            </div>";

      include "login.php";
  }
  ?>
