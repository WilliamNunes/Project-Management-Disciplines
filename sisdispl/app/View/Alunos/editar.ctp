<?php
echo $this->Html->css('home.css');
echo $this->Html->script('valida-cadastro.js');
echo $this->assign('title','Editar Perfil');
?>

<nav class="navbar navbar-fixed-top navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand">SisDispl</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo Router::url('index'); ?>">Início<span class="sr-only">(current)</span></a></li>
        <li><a href="<?php echo Router::url('/alunos/sobre'); ?>">Sobre</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><?php echo $this->Html->link('Sair', array('controller' => 'alunos', 'action' => 'logout'),
                                    array('confirm' => 'Deseja mesmo sair ???'));?></li>
      </ul>
    </div>
  </div>
</nav>
<div id="left" class="navbar-fixed navbar-inverse">
  <ul class="nav navbar-nav"></br>
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand">BEM VINDO(A) !</a>
        <div class="container-fluid">
          <h5><?php echo $this->Flash->render();?><h5>
          </div>
        </div>
      </div>
    </br></br><li class="active"><a ><span>Editar Perfil&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span></a></li></br>
    <li ><a href="<?php echo Router::url('/requisitos/index'); ?>"><span>Disciplínas que posso me matricular</span></a></li></br>
    <li><a href="<?php echo Router::url('/horas/index'); ?>"><span>Sessão Horas Extras/Estagio</span></a></li></br>
    <li><a href="<?php echo Router::url('/curriculos/index'); ?>"><span>Matriz Curricular</span></a></br></br></br></br></li>
  </ul>
</div>
<div id="center">
  <br/>
  <div class="col-sm-6 col-sm-offset-3 text">
    <div class="panel panel-danger">
      <div class="panel-heading">
        <h3 class="panel-title"><center>Editar Perfil</center></h3>
      </div>
      <div class="panel-body">
        <?php echo $this->Form->create('Aluno',  array('onsubmit' => 'return enviardados();'));?>
        <p><center><strong><h4>Dados Pessoais:</h4></strong></center>
          <strong>Nome:</strong><?php echo $this->Form->username('nome', array('placeholder' => 'Digite seu nome...', 'rule' => 'notEmpty', 'required' => true ,
                                                                              'value' => $alunos[0]['Aluno']['nome'], 'class' => 'form-text form-control', 'label' => '')); ?><br/>
           <strong>Matrícula:</strong><?php echo $this->Form->username('login', array('placeholder' => 'Apenas numeros...', 'rule' => 'notEmpty', 'required' => true ,
                                                                              'value' => $alunos[0]['Aluno']['login'],'class' => 'form-text form-control', 'label' => '')); ?><br/>
           <strong>Senha:</strong><?php echo $this->Form->username('senha', array('placeholder' => 'Digite uma senha..', 'rule' => 'notEmpty', 'required' => true ,
                                                                              'value' => $alunos[0]['Aluno']['senha'], 'class' => 'form-password form-control', 'label' => '')); ?><br/>
           <strong>Curso:</strong><?php echo $this->Form->input('curso_id', array('options' => array('Escolha uma opção','Sistemas de Informação', 'Engenharia de Produção', 'Engenharia da Computação', 'Engenharia Elétrica'), 'value' => $alunos[0]['Aluno']['curso_id'], 'required' => true,  'label' => '')); ?><br/>
           <br/><?php echo $this->Form->submit('Salvar !', array('class' => 'btn btn-info') );?>
           <br/><center><a href="<?php echo Router::url(array('controller' => 'alunos', 'action' => 'index')); ?>">Voltar</a></center>
           <br/><br/><center><?php echo $this->Html->link('Deletar Usuário', array('controller' => 'alunos', 'action' => 'delet'),
                                       array('confirm' => 'Deseja mesmo deletar esse usuário?'));?>
          </center>
        </p>
      </div>
    </div>
  </div>
</div>
