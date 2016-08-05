<?php
  echo $this->Html->css('stylelogin.css');
  echo $this->Html->css('fonte.roboto.css');
  echo $this->Html->css('font-awesome.css');
  echo $this->Html->css('form-elements.css');
  echo $this->assign('title','Login');
?>
<div class="top-content">
  <div class="container">
    <div class="row">
      <div class="col-sm-8 col-sm-offset-2 text ">
        <h1><strong>SisDispl</strong> - Sistema Gerênciador de Disciplinas</h1>
        <div class="description">
          <p>
            Planeje, fique por dentro, organize-se ! Aqui você pode acompanhar o andamento do seu curso.
            É <strong>FÁCIL</strong> e <strong>RÁPIDO</strong> e te acompanha até o fim da graduação!
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="inner-bg">
  <div class="container">
    <div class= "social-login">
      <h4>...É novo por aqui ? <a href="<?php echo Router::url('/alunos/index_cadastro'); ?>"><strong>Cadastre-se !</strong></h4></a>
    </div>
    <h4><?php echo $this->Flash->render(); ?></h4>
    <div class="row">
      <div class="col-sm-6 col-sm-offset-3 form-box">
        <div class="form-top">
          <div class="form-top-left">
            <h3>Entre no sistema</h3>
            <p>Digite sua matrícula e senha para efetuar log in:</p>
          </div>
        </div>
        <div class="form-bottom">
          <?php echo $this->Form->create('Aluno', array('url' => 'login' ));?>
          <div class="form-group">
            <p>Informe sua Matrícula no campo abaixo:</p>
            <?php echo $this->Form->username('login', array('placeholder' => 'Apenas numeros...', 'rule' => 'notEmpty', 'required' => true , 'class' => 'form-text form-control', 'label' => 'login')); ?>
          </div>
          <div class="form-group">
            <br/><p>Informe sua Senha no campo abaixo:</p>
            <?php echo $this->Form->password('senha', array('placeholder' => 'Digite a sua senha..', 'rule' => 'notEmpty', 'required' => true , 'class' => 'form-password form-control', 'label' => 'senha'));?>
          </div>
          <br/><?php echo $this->Form->submit('Entrar!', array('class' => 'btn btn-info') );?>
        </div>
      </div>
    </div>
  </div>
</div>
