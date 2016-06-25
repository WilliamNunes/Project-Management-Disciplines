  <?php

  error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

  define('BD_USER', 'sispetshop');
  define('BD_PASS', '123456');
  define('BD_NAME', 'petshop');
  $conexao = mysql_connect("localhost", BD_USER, BD_PASS, BD_NAME) or die(mysql_error());
  mysql_select_db(BD_NAME) or die(mysql_error());

  ?>
