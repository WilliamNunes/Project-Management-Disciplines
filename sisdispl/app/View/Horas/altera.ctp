<?php
echo $this->Html->css('home.css');
echo $this->Html->script('valida-cadastro.js');
echo $this->assign('title','Horas');
?>

<nav class="navbar navbar-fixed-top navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand">SisDispl</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo Router::url('/alunos/index'); ?>">Início<span class="sr-only">(current)</span></a></li>
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
    </br></br><li><a href="<?php echo Router::url('/alunos/editar'); ?>"><span>Editar Perfil</span></a></li></br>
    <li><a href="<?php echo Router::url('/requisitos/index'); ?>"><span>Disciplínas que posso me matricular</span></a></li></br>
    <li class="active"><a><span>Sessão Horas Extras/Estagio</span></a></li></br>
    <li><a href="<?php echo Router::url('/curriculos/index'); ?>"><span>Matriz Curricular</span></a></br></br></br></br></li>
  </ul>
</div>
<div id="center">
  <br/>
  <div class="col-sm-10 col-sm-offset-1 text">
    <div class="panel panel-danger">
      <div class="panel-heading">
        <h3 class="panel-title"><center>Gerênciamento Horas Extras/Estagio</center></h3>
      </div>
      <div class="panel-body">
        <h4><strong><center>Dados:</center></strong></h4><br/>
        <?php $id = $this->Session->read('Aluno'); ?>
        <table class="table table-hover table-condensed">
          <thead>
            <tr class="info">
              <th width="8%"></th>
              <th>Aluno</th>
              <?php if($estagiook == TRUE){ ?><th>Horas Estágio</th><?php } ?>
              <th>Horas Atividades Extras</th>
              <?php if (($id[0]['Aluno']['curso_id'] != 1) and ($id[0]['Aluno']['curso_id'] != 3)){
                echo "<th> Horas TCC</th>";} ?>
            </tr>
          </thead>
          <tbody>
            <?php echo $this->Form->create('Hora');?>
            <tr>
              <td>
                &nbsp<center><?php echo $this->Form->submit('Salvar', array('class' => 'btn btn-info') );?></center>
              </td>
              <td>
                <br/><h4><?php echo $horas[0]['Aluno']['nome'] ?></h4>
              </td>
              <?php if($estagiook == TRUE){ ?>
              <td>
                <?php echo $this->Form->input('horas_estag', array(
                'value' => $horas[0]['Hora']['horas_estag'], 'class' => 'form-text form-control', 'label' => '')); ?><br/>
              </td>
              <?php } ?>
              <td>
                <?php echo $this->Form->input('horas_atvidade', array(
                'value' => $horas[0]['Hora']['horas_atvidade'], 'class' => 'form-text form-control', 'label' => '')); ?><br/>
              </td>
              <?php if (($id[0]['Aluno']['curso_id'] != 1) and ($id[0]['Aluno']['curso_id'] != 3)){
                echo "<td>";
                echo $this->Form->input('horas_tcc', array(
                'value' => $horas[0]['Hora']['horas_tcc'], 'class' => 'form-password form-control', 'label' => ''));
                echo "</td>"; }?><br/>
          </tbody>
        </table>
        <br/><center><a href="<?php echo Router::url(array('controller' => 'horas', 'action' => 'index')); ?>">Voltar</a></center>
        <br/>
        <br/><center><?php echo $this->Html->link('Deletar Registro',
                                    array('controller' => 'horas', 'action' => 'delet', $horas[0]['Hora']['id'] ),
                                    array('confirm' => 'Deseja mesmo deletar esse Registro?'));?>
         </center>
      </div>
    </div>
  </div>
</div>
</div>
