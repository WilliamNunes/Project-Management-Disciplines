<div class="col-md-6 col-sm-offset-4">
    <div class="form-top">
        <div class="form-top-left">
          <h2><strong>Identificação</strong></h2>
          <p><h4>Conecte-se !</h4></p>
          <p> Por favor, complete os seus dados:</p>
        </div>
      </div>
      <div class="form-bottom">
        <?php echo $this->Form->create('Cliente', array('url' => 'login' ));?>
          <div class="form-group">
            <br/><h4><strong>Informe o seu Login no campo abaixo:</strong></h4>
            <?php echo $this->Form->username('login', array('placeholder' => 'Digite seu login..', 'rule' => 'notEmpty', 'required' => true , 'class' => 'form-text form-control', 'label' => 'login')); ?>
          </div>
          <div class="form-group">
            <br/><p><h4><strong>Informe sua Senha no campo abaixo:</strong></h4></p>
            <?php echo $this->Form->password('senha', array('placeholder' => 'Digite a sua senha..', 'rule' => 'notEmpty', 'required' => true , 'class' => 'form-password form-control', 'label' => 'senha'));?>
            </div>
          <br/><?php echo $this->Form->submit('Continuar', array('class' => 'btn btn-success') ); ?>
      </div>
    </div>
