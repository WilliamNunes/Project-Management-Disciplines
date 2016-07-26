<div class="col-md-3">
  <br/><p class="lead"><strong> Área Administrativa !</strong></p>
  <div class="list-group">
      <a class=" active list-group-item">Área Administrativa</a>
      <div class="list-group">
        <a href="<?php echo Router::url(array('controller' => 'exames', 'action' => 'listexam')); ?>" class="list-group-item">Exames Solicitados</a>
        <a href="<?php echo Router::url(array('controller' => 'pacientes', 'action' => 'listpac')); ?>" class="list-group-item">Pacientes</a>
        <a href="<?php echo Router::url(array('controller' => 'exames', 'action' => 'listageral')); ?>" class="list-group-item">Total Exames Solic.</a>
        <a href="<?php echo Router::url(array('controller' => 'procedimentos', 'action' => 'procgeral')); ?>" class="list-group-item">Add/Edit/Del - Procedimentos</a>
        <a href="<?php echo Router::url(array('controller' => 'exames', 'action' => 'examgeral')); ?>" class="list-group-item">Edit/Del - Exames</a>
      </div>
  </div>
</div>
<div class="form-top container top-content form-top row">
  <div class="row">
    <br/>
    <div class="col-md-4 col-sm-offset-2">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <center><h3 class="panel-title">Informativo</h3></center>
        </div>
        <div class="panel-body">
          <p><center>Escolha uma das opções do menu ao lado</center></p>
        </div>
      </div>
    </div>
  </div>
</div>
