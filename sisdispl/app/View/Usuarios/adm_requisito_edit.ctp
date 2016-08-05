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
          <a href="<?php echo Router::url(array('controller' => 'usuarios', 'action' => 'adm_edit')); ?>" class="list-group-item">Meu Login/Senha</a>
          <a href="<?php echo Router::url(array('controller' => 'usuarios', 'action' => 'adm_aluno')); ?>" class="list-group-item">Edit/Del - Alunos</a>
          <a class="active list-group-item">Add/Edit/Del - Requisitos</a>
          <a href="<?php echo Router::url(array('controller' => 'usuarios', 'action' => 'adm_curriculo')); ?>" class="list-group-item">Add/Edit/Del - Curriculos</a>
          <a href="<?php echo Router::url(array('controller' => 'usuarios', 'action' => 'adm_disciplina')); ?>" class="list-group-item">Add/Edit/Del - Disciplinas</a>
          <a href="<?php echo Router::url(array('controller' => 'usuarios', 'action' => 'adm_curso')); ?>" class="list-group-item">Add/Edit/Del - Cursos</a>
        </div>
    </div>
  </div>
</div>
<div class="form-top container top-content">
<br/>
<div class="col-sm-9">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <center><h3 class="panel-title">Edite/Delete um Requisito de disciplina do Sistema</h3></center>
      </div>
      <div class="panel-body">
        <p><center><table class="table table-hover">
          <thead>
            <tr>
              <th width= "5%"></th>
              <th width= "5%"><center>id</center></th>
              <th><center>Disciplina</center></th>
              <th><center>Pré-requisito Discpl</center></th>
              <th width="18%";>Pré-requisito Hora</th>
              <th><center>Curso</center></th>
            </tr>
          </thead>
          <tbody>
            <?php echo $this->Form->create('Usuario');?>
            <tr>
              <td>
                <?php echo $this->Form->submit('Salvar', array('class' => 'btn btn-success') );?>
              </td>
              <td><center>
                <br/><?php echo $requisito[0]['Requisito']['id']; ?>
                <?php echo $this->Form->hidden('id', array('value' => $requisito[0]['Requisito']['id']));  ?>
              </center></td>
              <td><center>
                <br/><?php echo $this->Form->select('disciplina_id', $disciplinas, array('empty' => 'Selecione:', 'rule' => 'notEmpty', 'required' => true, 'value' => $requisito[0]['Requisito']['disciplina_id'])); ?>
              </center></td>
              <td><center>
                <br/><?php echo $this->Form->select('requi_discipl_id', $disciplinas, array('empty' => 'Nenhuma', 'value' => $requisito[0]['Requisito']['requi_discipl_id'])); ?>
              </center></td>
              <td width= "15%">
                <?php echo $this->Form->number('requi_hora', array('placeholder' => '0', 'value' => $requisito[0]['Requisito']['requi_hora'], 'class' => 'form-text form-control', 'label' => '')); ?>
              </td>
              <td><center>
                <br/><?php echo $this->Form->select('curso_id', $cursos, array('empty' => 'Selecione um curso:', 'rule' => 'notEmpty', 'required' => true , 'value' => $requisito[0]['Requisito']['curso_id'] )); ?>
              </center></td>
            </tr>
          </tbody>
        </table></center></p>
        <br/><center><a href="<?php echo Router::url(array('controller' => 'usuarios', 'action' => 'adm_requisito')); ?>">Voltar</a></center>
        <br/><p><center><?php echo $this->Html->link('Deletar Requisito', array('controller' => 'usuarios', 'action' => 'requisitodelet', $requisito[0]['Requisito']['id']),
                                    array('confirm' => 'Deseja mesmo deletar esse Requisito?'));?>
        </p></center>
      </div>
    </div>
  </div>
</div>
