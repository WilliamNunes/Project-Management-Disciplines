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
          <a href="<?php echo Router::url(array('controller' => 'usuarios', 'action' => 'adm_requisito')); ?>" class="list-group-item">Add/Edit/Del - Requisitos</a>
          <a href="<?php echo Router::url(array('controller' => 'usuarios', 'action' => 'adm_curriculo')); ?>" class="list-group-item">Add/Edit/Del - Curriculos</a>
          <a href="<?php echo Router::url(array('controller' => 'usuarios', 'action' => 'adm_disciplina')); ?>" class="list-group-item">Add/Edit/Del - Disciplinas</a>
          <a class="active list-group-item">Add/Edit/Del - Cursos</a>
        </div>
    </div>
  </div>
</div>
<div class="form-top container top-content">
<br/>
  <div class="col-sm-9">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <center><h3 class="panel-title">Adicione um Curso ao Sistema</h3></center>
      </div>
      <div class="panel-body">
        <p><center><table>
          <?php echo $this->Form->create('Usuario');?>
          <tr>
            <td width="8%";>
              <p><strong>Código:</strong></p>
            </td>
            <td width="10%">
              <?php echo $this->Form->username('codigo', array('placeholder' => 'Ex.: AJM', 'class' => 'form-text form-control', 'label' => '','rule' => 'notEmpty', 'required' => true)); ?>
            </td>
            <td width="10%";>&nbsp</td>
            <td width="10%">
              <p><strong>Horas Atvs.:</strong></p>
            </td>
            <td width="9%">
              <?php echo $this->Form->number('horas_atvs', array('placeholder' => '0', 'class' => 'form-text form-control', 'label' => '','rule' => 'notEmpty', 'required' => true)); ?>
            </td>
            <td width="9%">&nbsp</td>
            <td width="9%">&nbsp</td>
          </tr>
          <tr>
            <td>
              <p><strong><br/>Nome:</strong></p>
            </td>
            <td colspan="6">
              <br/><?php echo $this->Form->username('nome', array('placeholder' => 'Informe o nome do curso...', 'class' => 'form-text form-control', 'label' => '','rule' => 'notEmpty', 'required' => true)); ?>
            </td>
            </tr>
          <tr>
            <td>
              <p><strong><br/>Horas Discpl. Obg.:</strong></p>
            </td>
            <td>
              <?php echo $this->Form->number('horas_displ_obrig', array('placeholder' => '0', 'class' => 'form-text form-control', 'label' => '','rule' => 'notEmpty', 'required' => true)); ?>
            </td>
            <td width="10%";>&nbsp</td>
            <td>
              <p><strong><br/>Horas Discpl. Eletv.:</strong></p>
            </td>
            <td>
              <?php echo $this->Form->number('horas_displ_eletv', array('placeholder' => '0', 'class' => 'form-text form-control', 'label' => '','rule' => 'notEmpty', 'required' => true)); ?>
            </td>
          </tr>
          </tbody>
          </table>
          <br/><?php echo $this->Form->submit('Cadastrar', array('class' => 'btn btn-success')); ?></center></p></center></p>
      </div>
    </div>
    <div class="panel panel-primary">
      <div class="panel-heading">
        <center><h3 class="panel-title">Edite/Delete um Curso do Sistema</h3></center>
      </div>
      <div class="panel-body">
        <p><center><table class="table table-hover">
          <thead>
            <tr>
              <th></th>
              <th>id</th>
              <th>Código</th>
              <th>Nome</th>
              <th>Horas Discpl. Obgr.</th>
              <th>Horas Discpl. Elet.</th>
              <th>Horas Atividades</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($curso as $c): ?>
              <tr>
                <td>
                  <a href=" <?php echo Router::url(array('controller' => 'usuarios', 'action' => 'adm_curso_edit', $c['Curso']['id'])); ?>" >Editar</a>
                </td>
                <td>
                  <?php echo $c['Curso']['id']; ?>
                </td>
                <td>
                  <?php echo $c['Curso']['codigo']; ?>
                </td>
                <td>
                  <?php echo $c['Curso']['nome']; ?>
                </td>
                <td>
                  <?php echo $c['Curso']['horas_displ_obrig']; ?>
                </td>
                <td>
                  <?php echo $c['Curso']['horas_displ_eletv']; ?>
                </td>
                <td>
                  <?php echo $c['Curso']['horas_atvs']; ?>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table></center></p>
      </div>
    </div>
  </div>
</div>
