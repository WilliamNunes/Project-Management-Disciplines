<?php echo $this->Html->script('valida-cadastro.js'); ?>

<div class="col-md-6 col-sm-offset-4">
  <div class="form-top">
    <div class="form-top-left">
      <h2><strong>Identificação</strong></h2>
      <p><h4>Cadastre-se !</h4></p>
      <p> Por favor, complete os seus dados:</p>
    </div>
    <br/><h4><?php echo $this->Flash->render(); ?></h4>
  </div>
  <div class="form-bottom">
    <?php echo $this->Form->create('Usuario', array('url' => 'adm_cadastro' ));?>
      <div class="form-group">
        <br/><p><h4><strong>Informe seu Nome no campo abaixo:</strong></h4></p>
        <?php echo $this->Form->username('nome', array('placeholder' => 'Digite seu nome...', 'rule' => 'notEmpty', 'required' => true , 'class' => 'form-text form-control', 'label' => '')); ?>
      </div>
      <div class="form-group">
        <br/><p><h4><strong>Informe um Login no campo abaixo:</strong></h4></p>
        <?php echo $this->Form->username('login', array('placeholder' => 'Digite seu login..', 'rule' => 'notEmpty', 'required' => true , 'class' => 'form-text form-control', 'label' => '')); ?>
      </div>
      <div class="form-group">
        <br/><p><h4><strong>Informe uma Senha no campo abaixo:</strong></h4></p>
        <?php echo $this->Form->password('senha', array('placeholder' => 'Digite a sua senha..', 'rule' => 'notEmpty', 'required' => true , 'class' => 'form-password form-control', 'label' => ''));?>
      </div>
      <br/><?php echo $this->Form->submit('Cadastrar', array('class' => 'btn btn-success')); ?>
      <br/><center><a href="<?php echo Router::url(array('controller' => 'usuarios', 'action' => 'adm_login')); ?>">Página de Login</a></center>
  </div>
</div>
