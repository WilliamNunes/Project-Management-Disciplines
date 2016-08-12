<div class="col-md-3">
  <br/><p class="lead"><strong> Área Administrativa !</strong></p>
  <div class="list-group">
    <a href="<?php echo Router::url(array('controller' => 'administradores', 'action' => 'index')); ?>" class=" active list-group-item">Área Administrativa</a>
      <div class="list-group">
        <a class="active list-group-item">Lista Clientes</a>
      </div>
  </div>
</div>
<div class="form-top container top-content form-top row">
  <div class="row">
    <br/>
      <div class="col-md-6 col-sm-offset-1">
        <h4><strong><center>Clientes</center></strong></h4><br/>
        <table class="table table-hover">
          <thead>
            <tr>
              <th>id</th>
              <th>Nome</th>
              <th>Login</th>
              <th>Senha</th>
            </tr>
          </thead>
          <tbody>
              <?php foreach ($clientes as $p): ?>
                <tr>
                  <td>
                    <?php echo $p['Cliente']['id']; ?>
                  </td>
                  <td>
                    <?php echo $p['Cliente']['nome']; ?>
                  </td>
                  <td>
                    <?php echo $p['Cliente']['login']; ?>
                  </td>
                  <td>
                    <?php echo $p['Cliente']['senha']; ?>
                  </td>
                </tr>
              <?php endforeach; ?>
          </tbody>
          </table>
      </div>
    </div>
