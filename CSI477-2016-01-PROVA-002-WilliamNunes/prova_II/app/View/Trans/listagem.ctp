<div class="col-md-3">
  <br/><p class="lead"><strong> Área do Cliente !</strong></p>
  <div class="list-group">
      <a href="<?php echo Router::url(array('controller' => 'clientes', 'action' => 'geral')); ?>" class="active  list-group-item">Área do Cliente</a>
      <div class="list-group">
        <a href="<?php echo Router::url(array('controller' => 'trans', 'action' => 'solic')); ?>" class="list-group-item">Solicitar Transação</a>
        <a class="active list-group-item">Transações Efetuadas</a>
      </div>
  </div>
</div>
<div class="form-top container top-content form-top row">
<div class="row">
  <br/>
    <div class="col-md-6 col-sm-offset-1">
        <h4><strong><center>Transações Efetuadas</center></strong></h4><br/>
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Cliente</th>
              <th><center>Tipo Trans.</center></th>
              <th><center>Data</center></th>
              <th><center>Valor</center></th>
              <th><center>Natureza Trans.</center></th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($trans as $e): ?>
              <tr>
                <td>
                  <?php echo $e['Cliente']['nome']; ?>
                </td>
                <td>
                  <center><?php echo $e['Tipo']['nome']; ?></center>
                </td>
                <td>
                  <center><?php echo $e['Tran']['data']; ?></center>
                </td>
                <td>
                  <center><?php echo $e['Tran']['valor']; ?></center>
                </td>
                <td>
                  <center><?php if($e['Tran']['credito'] == 0){
                          echo "Débito";
                        }else{
                          echo "Crédito";
                  } ?></center>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      </div>
