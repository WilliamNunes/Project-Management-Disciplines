<div class="col-md-3">
  <br/><p class="lead"><strong> Área do Cliente !</strong></p>
  <div class="list-group">
      <a href="<?php echo Router::url(array('controller' => 'clientes', 'action' => 'geral')); ?>" class="active list-group-item">Área do Cliente</a>
      <div class="list-group">
        <a class="active list-group-item">Solicitar Transação</a>
        <a href="<?php echo Router::url(array('controller' => 'trans', 'action' => 'listagem')); ?>" class="list-group-item">Transações Efetuadas</a>
      </div>
  </div>
</div>
<div class="form-top container top-content form-top row">
<div class="row">
  <br/>
    <div class="col-md-7 col-sm-offset-1">
        <h4><strong><center>Faça a solicitação da sua transação</center></strong></h4><br/>
        <table class="table table-hover">
          <thead>
            <tr>
              <th width="20%"></th>
              <th><center>TRANSAÇÃO</center></th>
            </tr>
          </thead>
          <tbody>
              <?php foreach ($tipos as $p): ?>
                <tr>
                  <td>
                    <center><a href=" <?php echo Router::url(array('controller' => 'trans', 'action' => 'consolic', $p['Tipo']['id'])); ?>" ><button class='btn btn-primary'>Solicitar</button></a></center>
                  </td>
                  <td>
                    <?php echo $p['Tipo']['nome']; ?>
                  </td>
               </tr>
              <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      </div>
