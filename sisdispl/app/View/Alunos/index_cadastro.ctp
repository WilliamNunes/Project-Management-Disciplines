<?php
  echo $this->Html->css('stylelogin.css');
  echo $this->Html->css('fonte.roboto.css');
  echo $this->Html->css('font-awesome.css');
  echo $this->Html->css('form-elements.css');
  echo $this->Html->script('valida-cadastro.js');
  echo $this->assign('title','Cadastro');
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
    <h4>...Ou volte e efetue <a href="<?php echo Router::url('/alunos/index_login'); ?>"><strong>Login !</strong></h4></a>
    <h4><?php echo $this->Flash->render();?> </h4>
    <div class="row">
      <div class="col-sm-6 col-sm-offset-3 form-box">
        <div class="form-top">
          <div class="form-top-left">
            <h3>Cadastre-se no sistema</h3>
            <p>Informe os dados solicitados:</p>
          </div>
        </div>
        <div class="form-bottom">
          <?php echo $this->Form->create('Aluno', array('url' => 'index_cadastro', 'onsubmit' => 'return enviardados();'));?>
          <div class="form-group">
            <p>Informe seu Nome no campo abaixo:</p>
            <?php echo $this->Form->username('nome', array('placeholder' => 'Digite seu nome...', 'rule' => 'notEmpty', 'required' => true , 'class' => 'form-text form-control', 'label' => '')); ?>
          </div>
          <div class="form-group">
            <br/><p>Informe sua Matrícula no campo abaixo:</p>
            <?php echo $this->Form->username('login', array('placeholder' => 'Apenas numeros...', 'rule' => 'notEmpty', 'required' => true , 'class' => 'form-text form-control', 'label' => '')); ?>
          </div>
          <div class="form-group">
            <br/><p>Informe uma Senha no campo abaixo:</p>
            <?php echo $this->Form->password('senha', array('placeholder' => 'Digite uma senha...', 'rule' => 'notEmpty', 'required' => true , 'class' => 'form-password form-control', 'label' => ''));?>
          </div>
          <div class="form-group">
            <br/><p>Informe seu Curso no campo abaixo:</p>
            <?php echo $this->Form->input('curso_id', array('options' => array('Escolha uma opção','Sistemas de Informação', 'Engenharia de Produção', 'Engenharia da Computação', 'Engenharia Elétrica'), 'rule' => 0, 'required' => true, 'label' => ''));?>
          </div>
          <br/><?php echo $this->Form->submit('Cadastrar!', array('class' => 'btn btn-info') );?>
        </div>
      </div>
    </div>
  </div>
</div>
