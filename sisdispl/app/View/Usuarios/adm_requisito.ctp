<?php
echo $this->Html->css('home.css');
echo $this->assign('title','Administrativo');
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
          <center><h3 class="panel-title">Adicione um Requisito de disiciplina ao Sistema</h3></center>
        </div>
        <div class="panel-body">
          <p>Aqui você altera o Pré-requisito de uma determinada matéria adicionando uma matéria ou uma carga de hora dependente.</p>
          <p>Informe corretamente os campos abaixo:</p><br/>
          <p><center><table>
            <tbody>
              <?php echo $this->Form->create('Usuario');?>
              <tr>
                <td width="15%";>
                  <p><strong>Disciplina:</strong></p>
                </td>
                <td>
                  <?php echo $this->Form->select('disciplina_id', $disciplinas, array('empty' => 'Selecione Disciplina:', 'rule' => 'notEmpty', 'required' => true)); ?>
                </td>
                <td width="15%";>&nbsp</td>
                <td width="15%";>
                  <p><strong>Pré-requisito Disciplina:</strong></p>
                </td>
                <td>
                  <?php echo $this->Form->select('requi_discipl_id', $disciplinas, array('empty' => 'Nenhuma Disciplina')); ?>
                </td>
              </tr>
              <tr>
                <td width="15%";>
                  <p><strong><br/>Pré-requisito Hora:</strong></p>
                </td>
                <td width="15%";>
                  <br/><?php echo $this->Form->number('requi_hora', array('placeholder' => '0', 'class' => 'form-text form-control', 'label' => '')); ?>
                </td>
                <td width="15%";>&nbsp</td>
                <td width="15%";>
                  <p><strong><br/>Curso:</strong></p>
                </td>
                <td>
                  <br/><?php echo $this->Form->select('curso_id', $cursos, array('empty' => 'Selecione um curso:', 'rule' => 'notEmpty', 'required' => true)); ?>
                </td>
              </tr>
            </tbody>
          </table>
          <br/><?php echo $this->Form->submit('Cadastrar', array('class' => 'btn btn-success')); ?><br/>
        </div>
      </div>
  </div>
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
              <th></th>
              <th width= "5%">id</th>
              <th>Disciplina</th>
              <th>Pré-requisito Discpl</th>
              <th>Pré-requisito Hora</th>
              <th width= "5%">Curso</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($requisito as $req): ?>
            <tr>
              <td>
                <a href=" <?php echo Router::url(array('controller' => 'usuarios', 'action' => 'adm_requisito_edit', $req['Requisito']['id'])); ?>" >Editar</a>
              </td>
              <td>

              </td>
              <td>
                <?php echo $req['Requisito']['id']; ?>
              </td>
              <td>
                <?php echo $req['Disciplina']['codigo']; ?>
              </td>
              <td>
                <?php echo $req['Disciplina_requi']['codigo']; ?>
              </td>
              <td>
                <?php echo $req['Requisito']['requi_hora']; ?>
              </td>
              <td>
                <?php echo $req['Curso']['codigo']; ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
