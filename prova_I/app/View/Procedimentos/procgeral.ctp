<div class="col-md-3">
  <br/><p class="lead"><strong> Área Administrativa !</strong></p>
  <div class="list-group">
      <a href="<?php echo Router::url(array('controller' => 'administradores', 'action' => 'index')); ?>" class="active list-group-item">Área Administrativa</a>
      <div class="list-group">
        <a href="<?php echo Router::url(array('controller' => 'exames', 'action' => 'listexam')); ?>" class="list-group-item">Exames Solicitados</a>
        <a href="<?php echo Router::url(array('controller' => 'pacientes', 'action' => 'listpac')); ?>" class="list-group-item">Pacientes</a>
        <a href="<?php echo Router::url(array('controller' => 'exames', 'action' => 'listageral')); ?>" class="list-group-item">Total Exames Solic.</a>
        <a class="active list-group-item">Add/Edit/Del - Procedimentos</a>
        <a href="<?php echo Router::url(array('controller' => 'exames', 'action' => 'examgeral')); ?>" class="list-group-item">Edit/Del - Exames</a>
      </div>
  </div>
</div>
<div class="form-top container top-content form-top row">
  <div class="row">
    <br/>
    <div class="col-md-7 col-sm-offset-1">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <center><h3 class="panel-title">Adicione um Procedimento</h3></center>
        </div>
        <div class="panel-body">
          <p><center>
            <div class="form-bottom">
              <?php echo $this->Form->create('Procedimento', array('url' => 'cadastro' ));?>
              <div class="form-group">
                <br/><p><h4><strong>Informe o Nome do novo procedimento no campo abaixo:</strong></h4></p>
                <?php echo $this->Form->input('nome', array('placeholder' => 'Digite o nome...', 'required' => true , 'class' => 'form-text form-control', 'label' => '')); ?>
              </div>
              <div class="form-group">
                <br/><p><h4><strong>Informe o Preço do novo procedimento no campo abaixo:</strong></h4></p>
                <?php echo $this->Form->input('preco', array('placeholder' => 'Digite o preço...', 'required' => true , 'class' => 'form-text form-control', 'label' => ''));?>
              </div>
              <br/><?php echo $this->Form->submit('Cadastrar', array('class' => 'btn btn-success')); ?>
            </div>
          </center></p>
        </div>
      </div>
      <div class="panel panel-primary">
        <div class="panel-heading">
          <center><h3 class="panel-title">Edite/Delete um Procedimento</h3></center>
        </div>
        <div class="panel-body">
          <p><center><table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th></th>
                <th>id</th>
                <th>Nome</th>
                <th>Preço</th>
              </tr>
            </thead>
            <tbody>

      <?php foreach ($procedimentos as $p): ?>
        <tr>
          <td><center><a href=" <?php echo Router::url(array('controller' => 'procedimentos', 'action' => 'edit', $p['Procedimento']['id'])); ?>" >Editar</a></center></td>
          <td><?php echo $p['Procedimento']['id']; ?></td>
          <td>
            <?php echo $p['Procedimento']['nome']; ?>
          </td>
          <td>
            <?php echo $p['Procedimento']['preco']; ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
    </table></center></p>
        </div>
      </div>
    </div>
  </div>
</div>
