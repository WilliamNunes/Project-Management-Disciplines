  <?php
  session_start();

  if(isset($_SESSION['login'])){
      unset($_SESSION['login']);
      unset($_SESSION['senha']);

      echo "<script>alert('Você saiu!');top.location.href='areageral.php';</script>";
      exit();
  }
  else {
    echo "<script>alert('Você não está logado!');top.location.href='areageral.php';</script>";
    exit();
  }

   ?>
