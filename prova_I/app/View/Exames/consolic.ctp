<div class="col-md-3">
  <br/><p class="lead"><strong> Área do Paciente !</strong></p>
  <div class="list-group">
      <a href="<?php echo Router::url(array('controller' => 'pacientes', 'action' => 'geral')); ?>" class="active list-group-item">Área do Paciente</a>
      <div class="list-group">
        <a class="active list-group-item">Solicitar Exame</a>
        <a href="<?php echo Router::url(array('controller' => 'exames', 'action' => 'listagem')); ?>" class="list-group-item">Exames Solicitados</a>
      </div>
  </div>
</div>
<div class="form-top container top-content form-top row">
<div class="row">
  <br/>
  <div class="col-md-6 col-sm-offset-1">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <center><h3 class="panel-title">Confirme a data para a realização do exame</h3></center>
      </div>
      <div class="panel-body">
        <?php
        echo $procedimento['Procedimento']['nome'];?>
        &nbsp&nbsp&nbsp&nbsp
        R$<?php echo $procedimento['Procedimento']['preco'];
        echo $this->Form->create('Exame');?>
        &nbsp&nbsp&nbsp&nbsp
        <?php  echo $this->Form->input('data', array('label' => ' Informe a Data para exame:&nbsp&nbsp ', 'rule' => 'notEmpty', 'required' => true ,'placeholder' => 'Ex: 20-12-1999', 'class' => 'form-text'));?>
        <?php
              $this->Form->hidden('paciente_id');
              $this->Form->hidden('procedimento_id'); ?>
        <br/><?php echo $this->Form->submit('Salvar',  array('class' => 'btn btn-success')); ?>
        <center><a href="<?php echo Router::url(array('controller' => 'exames', 'action' => 'solic')); ?>">Voltar</a></center>
      </div>
    </div>
  </div>
</div>
