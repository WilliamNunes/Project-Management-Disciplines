  <?php
  session_start();

  include "config.php";

  $nome = trim($_POST['nome']);
  $login  = trim($_POST['login']);
  $senha = trim($_POST['senha']);

  $sql_login_check = mysql_query( "SELECT COUNT(id) FROM clientes WHERE login='$login'");
  $lReg = mysql_fetch_array($sql_login_check);
  $login_check = $lReg[0];
  if ($login_check > 0){
      echo "<script>alert('Este email já está sendo utilizado !');top.location.href='minhaconta.php';</script>";
}else{
  $consulta = mysql_query( "SELECT id FROM clientes WHERE login='$_SESSION[login]' AND senha='$_SESSION[senha]'");
  $registro = mysql_fetch_assoc($consulta);
  $id = $registro['id'];
  $sql = mysql_query("UPDATE clientes SET nome='$nome', login='$login', senha='$senha' WHERE id='$id'");

  if(mysql_affected_rows() > 0){

    unset($_SESSION['login']);
    unset($_SESSION['senha']);

    echo "<div class='container'>
             <div class='row'>
                <div class='col-md-3'>
                      <p><strong>Seu cadastro foi editado com sucesso!</strong><br/>
                      Faça o login para continuar!<br/></p>
               </div>
             </div>
           </div>";
    include "login.php";

  }else{
    if(($nome == trim($_POST['nome'])) && ($login == trim($_POST['login'])) && ($senha == trim($_POST['senha']))){
        echo "<div class='container'>
                 <div class='row'>
                    <div class='col-md-3'>
                          <p><strong>Não foi alterado nenhum dado!</strong><br/></p>
                   </div>
                 </div>
               </div>";
        include "minhaconta.php";
      }
    echo "Ocorreu um erro ao editar sua conta, entre em contato.";
  }
}
?>
