<?php
echo $this->Html->css('home.css');
echo $this->assign('title','Sobre');
?>

<nav class="navbar navbar-fixed-top navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand">SisDispl</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo Router::url('/alunos'); ?>">Início</a></li>
        <li class="active"><a>Sobre<span class="sr-only">(current)</span></a></li>
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
    </br></br><li><a href="<?php echo Router::url('/alunos/editar'); ?>"><span>Editar Perfil</span></a></li></br>
    <li><a href="<?php echo Router::url('/requisitos/index'); ?>"><span>Disciplínas que posso me matricular</span></a></li></br>
    <li><a href="<?php echo Router::url('/horas/index'); ?>"><span>Sessão Horas Extras/Estagio</span></a></li></br>
    <li><a href="<?php echo Router::url('/curriculos/index'); ?>"><span>Matriz Curricular</span></a></br></br></br></br></li>
  </ul>
</div>
<div id="center">
  <br/>
  <div class="col-sm-6 col-sm-offset-3 text">
    <div class="panel panel-danger">
      <div class="panel-heading">
        <h3 class="panel-title"><center> SisDispl - Sistema de Gerênciamento de matrículas</center></h3>
      </div>
      <div class="panel-body">
        <p><strong>O </strong>SisDispl <strong>é um sistema de gerênciamento que auxilia o aluno durante sua graduação na administração das disciplinas aprovadas
        e horas gerais cursadas, além de relacionar com as disciplinas que estão disponíveis para cursar, dado a questão de varias disciplinas possuirem pre-requisitos.
        <br/><br/>Também é feita a relação das horas de atividades que lhe faltam
        cursar estando disponíveis para entrada de dados quando alcançado também o seu pré-requisito. Sua interface amigável e intuitiva
        melhora a experiência do aluno e sua familiarização rápida com o sistema. </strong></p>
      </div>
    </div>
  </div>
</div>
<br/><br/><br/><br/><br/><br/><br/><br/>
