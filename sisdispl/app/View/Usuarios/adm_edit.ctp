<?php
echo $this->Html->css('home.css');
echo $this->assign('title','Administrativo');
echo $this->Html->script('valida-cadastro.js');
?>
<?php $id = $this->Session->read('Usuario'); ?>

<nav class="navbar navbar-fixed-top navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand">SisDispl</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo Router::url('/usuarios/adm_geral'); ?>">Início<span class="sr-only">(current)</span></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><?php echo $this->Html->link('Sair', array('controller' => 'usuarios', 'action' => 'logout'),
                                    array('confirm' => 'Deseja mesmo sair ???'));?></li>
      </ul>
    </div>
  </div>
</nav>
<div class="col-md-3">
  <div class="container-fluid">
    <br/><p class="lead"><strong> Área Administrativa !</strong></p>
    <h5><p class="lead">Bem Vindo(a): <?php echo $this->Flash->render();?></p><h5><br/>
    <div class="list-group">
        <a href="<?php echo Router::url(array('controller' => 'usuarios', 'action' => 'adm_geral')); ?>" class="active list-group-item">Área Administrativa</a>
        <div class="list-group">
          <a class="active list-group-item">Meu Login/Senha</a>
          <a href="<?php echo Router::url(array('controller' => 'usuarios', 'action' => 'adm_aluno')); ?>" class="list-group-item">Edit/Del - Alunos</a>
          <a href="<?php echo Router::url(array('controller' => 'usuarios', 'action' => 'adm_requisito')); ?>" class="list-group-item">Add/Edit/Del - Requisitos</a>
          <a href="<?php echo Router::url(array('controller' => 'usuarios', 'action' => 'adm_curriculo')); ?>" class="list-group-item">Add/Edit/Del - Curriculos</a>
          <a href="<?php echo Router::url(array('controller' => 'usuarios', 'action' => 'adm_disciplina')); ?>" class="list-group-item">Add/Edit/Del - Disciplinas</a>
          <a href="<?php echo Router::url(array('controller' => 'usuarios', 'action' => 'adm_curso')); ?>" class="list-group-item">Add/Edit/Del - Cursos</a>
        </div>
    </div>
  </div>
</div>
<div class="form-top container top-content form-top row">
  <div class="row">
    <br/>
    <div class="col-md-7 col-sm-offset-1">
      <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title"><center>Editar Perfil</center></h3>
      </div>
      <div class="panel-body">
        <?php echo $this->Form->create('Usuario');?>
        <p><center><strong><h4>Dados Pessoais:</h4></strong></center>
          <strong>Nome:</strong><?php echo $this->Form->username('nome', array('placeholder' => 'Digite seu nome...', 'rule' => 'notEmpty', 'required' => true ,
                                                                              'value' => $usuarios[0]['Usuario']['nome'], 'class' => 'form-text form-control', 'label' => '')); ?><br/>
           <strong>Login:</strong><?php echo $this->Form->username('login', array('placeholder' => 'Apenas numeros...', 'rule' => 'notEmpty', 'required' => true ,
                                                                              'value' => $usuarios[0]['Usuario']['login'],'class' => 'form-text form-control', 'label' => '')); ?><br/>
           <strong>Senha:</strong><?php echo $this->Form->username('senha', array('placeholder' => 'Digite uma senha..', 'rule' => 'notEmpty', 'required' => true ,
                                                                              'value' => $usuarios[0]['Usuario']['senha'], 'class' => 'form-password form-control', 'label' => '')); ?><br/>
           <br/><?php echo $this->Form->submit('Salvar !', array('class' => 'btn btn-success') );?>
           <br/><center><a href="<?php echo Router::url(array('controller' => 'usuarios', 'action' => 'adm_geral')); ?>">Voltar</a></center>
           <br/><br/><center><?php echo $this->Html->link('Deletar Usuário', array('controller' => 'usuarios', 'action' => 'delet'),
                                       array('confirm' => 'Deseja mesmo deletar esse usuário?'));?>
          </center>
        </p>
      </div>
    </div>
  </div>
</div>
