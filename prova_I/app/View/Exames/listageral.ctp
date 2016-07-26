<div class="col-md-3">
  <br/><p class="lead"><strong> Área Administrativa !</strong></p>
  <div class="list-group">
    <a href="<?php echo Router::url(array('controller' => 'administradores', 'action' => 'index')); ?>" class=" active list-group-item">Área Administrativa</a>
      <div class="list-group">
        <a href="<?php echo Router::url(array('controller' => 'exames', 'action' => 'listexam')); ?>"class="list-group-item">Exames Solicitados</a>
        <a href="<?php echo Router::url(array('controller' => 'pacientes', 'action' => 'listpac')); ?>"class="list-group-item">Pacientes</a>
        <a class="active list-group-item">Total Exames Solic.</a>
        <a href="<?php echo Router::url(array('controller' => 'procedimentos', 'action' => 'procgeral')); ?>" class="list-group-item">Add/Edit/Del Procedimentos</a>
        <a href="<?php echo Router::url(array('controller' => 'exames', 'action' => 'examgeral')); ?>" class="list-group-item">Edit/Del - Exames</a>
      </div>
  </div>
</div>
<div class="form-top container top-content form-top row">
  <div class="row">
    <br/>
      <div class="col-md-6 col-sm-offset-1">
        <h4><strong><center>Total Exames Solicitados</center></strong></h4><br/>
        <p><center><h4>Navegue clicando sobre procedimento ou paciente para mais detalhes</h4></center></p>
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Procedimento</th>
              <th>Paciente</th>
            </tr>
          </thead>
          <tbody>
              <?php foreach ($exames as $e): ?>
                <tr>
                  <td>
                    <?php echo $this->Html->link($e['Procedimento']['nome'], array('controller' => 'exames',
                      'action' => 'todosproc', $e['Procedimento']['id']));?>
                  </td>
                  <td>
                    <?php echo $this->Html->link($e['Paciente']['nome'], array('controller' => 'exames',
                      'action' => 'todospacient', $e['Paciente']['id'])); ?>
                  </td>
                </tr>
              <?php endforeach; ?>
          </tbody>
          </table>
      </div>
    </div>
