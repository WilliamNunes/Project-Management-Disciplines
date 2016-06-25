  <?php
  include "config.php";

  $nome = trim($_POST['nome']);
  $login  = trim($_POST['login']);
  $senha = trim($_POST['senha']);

  $sql_login_check = mysql_query( "SELECT COUNT(id) FROM clientes WHERE login='$login'");

  $lReg = mysql_fetch_array($sql_login_check);

      $login_check = $lReg[0];

          if ($login_check > 0){
              echo "<div class='col-dm-4 col-dm-offset-6 text'>
                              <strong><center>Este email já está sendo utilizado.</center></strong>
                    </div>";
          include "cadastro.php";
          }
          else {
            $sql = mysql_query("INSERT INTO clientes(nome,login,senha)
            VALUES('$nome', '$login', '$senha')");

            if (!$sql){
              echo "Ocorreu um erro ao criar sua conta, entre em contato.";
            }else{
              
              echo "<div class='container'>
                       <div class='row'>
                          <div class='col-md-3'>
                                <p><strong>Seu cadastro foi efetuado com sucesso!</strong><br/>
                        Faça o login para continuar!<br/></p>
                         </div>
                       </div>
                     </div>";
              include "login.php";
            }
          }
  ?>
