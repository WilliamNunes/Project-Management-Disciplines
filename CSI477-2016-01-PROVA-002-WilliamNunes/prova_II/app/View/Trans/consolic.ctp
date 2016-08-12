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
  <div class="col-md-6 col-sm-offset-1">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <center><h3 class="panel-title">Confirme algumas informação para completar a transação</h3></center>
      </div>
      <div class="panel-body">
        <center><h2><strong><?php echo $tipo['Tipo']['nome'];?></h2></strong></center>
        <?php echo $this->Form->create('Tran');?>
        &nbsp&nbsp&nbsp&nbsp
        <p><h4>Informe a data:<h4></p>
        <?php  echo $this->Form->input('data', array('label' => '', 'rule' => 'notEmpty', 'required' => true ,'placeholder' => 'Ex: 20-12-1999', 'class' => 'form-text'));?>

        <br/><p><h4>Informe o valor:</h4></p>
        <?php  echo $this->Form->float('valor', array('rule' => 'notEmpty', 'required' => true ,'placeholder' => 'Digite um valor...', 'class' => 'form-text'));?>
        <br/><br/><p><h4>Natureza da operação:</h4></p>
        <?php echo $this->Form->select('credito', array('débito', 'crédito') ,array('empty' => 'Sem Informação', 'rule' => 'notEmpty', 'required' => true )); ?>
        <?php
              $this->Form->hidden('cliente_id');
              $this->Form->hidden('tipo_id'); ?>
        <br/><br/><br/><?php echo $this->Form->submit('Salvar',  array('class' => 'btn btn-success')); ?>
        <center><a href="<?php echo Router::url(array('controller' => 'trans', 'action' => 'solic')); ?>">Voltar</a></center>
      </div>
    </div>
  </div>
</div>
