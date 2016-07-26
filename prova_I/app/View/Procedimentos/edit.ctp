<div class="col-md-3">
  <br/><p class="lead"><strong> Área Administrativa !</strong></p>
  <div class="list-group">
      <a href="<?php echo Router::url(array('controller' => 'administradores', 'action' => 'index')); ?>" class=" active list-group-item">Área Administrativa</a>
      <div class="list-group">
        <a href="<?php echo Router::url(array('controller' => 'exames', 'action' => 'listexam')); ?>" class="list-group-item">Exames Solicitados</a>
        <a href="<?php echo Router::url(array('controller' => 'pacientes', 'action' => 'listpac')); ?>" class="list-group-item">Pacientes</a>
        <a href="<?php echo Router::url(array('controller' => 'exames', 'action' => 'listageral')); ?>" class="list-group-item">Total Exames Solic.</a>
        <a href="<?php echo Router::url(array('controller' => 'procedimentos', 'action' => 'procgeral')); ?>" class="active list-group-item">Add/Edit/Del Procedimentos</a>
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
          <center><h3 class="panel-title">Procedimento: <?php echo $procedimentos[0]['Procedimento']['nome'] ?></h3></center>
        </div>
        <div class="panel-body">
          <h4><strong><center>Dados:</center></strong></h4><br/>
          <table class="table table-hover table-condensed">
            <thead>
              <tr>
                <th width= "10%"></th>
                <th>id</th>
                <th>Nome</th>
                <th width= "15%">Preço</th>
              </tr>
            </thead>
            <tbody>
              <?php echo $this->Form->create('Procedimento');?>
              <tr>
                <td>
                  <br/><center><?php echo $this->Form->submit('Salvar', array('class' => 'btn btn-success') );?></center>
                </td>
                <td>
                  <br/><center><?php echo $procedimentos[0]['Procedimento']['id'] ?></center><br/>
                </td>
                <td>
                  <?php echo $this->Form->input('nome', array('placeholder' => 'Digite o nome...', 'rule' => 'notEmpty', 'required' => true ,
                  'value' => $procedimentos[0]['Procedimento']['nome'],'class' => 'form-text form-control', 'label' => '')); ?><br/>
                </td>
                <td>
                  <?php echo $this->Form->input('preco', array('placeholder' => 'Digite o preço..', 'rule' => 'notEmpty', 'required' => true ,
                  'value' => $procedimentos[0]['Procedimento']['preco'], 'class' => 'form-password form-control', 'label' => '')); ?><br/>
                </td>
            </tbody>
          </table>
          <br/><center><a href="<?php echo Router::url(array('controller' => 'procedimentos', 'action' => 'procgeral')); ?>">Voltar</a></center>
          <br/>
          <br/><center><?php echo $this->Html->link('Deletar Procedimento',
                                      array('controller' => 'procedimentos', 'action' => 'delet', $procedimentos[0]['Procedimento']['id'] ),
                                      array('confirm' => 'Deseja mesmo deletar esse Procedimento?'));?>
           </center>
        </div>
      </div>
    </div>
  </div>
</div>
