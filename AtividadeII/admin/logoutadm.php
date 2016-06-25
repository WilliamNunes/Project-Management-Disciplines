<?php
session_start();

if(isset($_SESSION['login'])){
  session_destroy();

  echo "<script>alert('Você saiu!');top.location.href='loginadm.php';</script>";
  exit();
}
else {
  echo "<script>alert('Você não está logado!');top.location.href='loginadm.php';</script>";
  exit();
}

 ?>
