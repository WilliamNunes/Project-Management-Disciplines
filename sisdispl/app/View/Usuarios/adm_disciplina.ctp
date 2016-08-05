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
          <a class="active list-group-item">Add/Edit/Del - Disciplinas</a>
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
        <center><h3 class="panel-title">Adicione uma Disciplina ao Sistema</h3></center>
      </div>
      <div class="panel-body">
        <p><center><table>
          <?php echo $this->Form->create('Usuario');?>
          <tr>
            <td width="7%";>
              <p><strong>Código:</strong></p>
            </td>
            <td width="10%">
              <?php echo $this->Form->username('codigo', array('placeholder' => 'Ex.: CEA000', 'class' => 'form-text form-control', 'label' => '','rule' => 'notEmpty', 'required' => true)); ?>
            </td>
            <td width="10%";>&nbsp</td>
            <td width="10%">
              <p><strong>Carga Hor.:</strong></p>
            </td>
            <td width="9%">
              <?php echo $this->Form->number('carga_hora', array('placeholder' => '0', 'class' => 'form-text form-control', 'label' => '','rule' => 'notEmpty', 'required' => true)); ?>
            </td>
            <td width="9%">&nbsp</td>
            <td width="9%">&nbsp</td>
          </tr>
          <tr>
            <td>
              <p><strong><br/>Nome:</strong></p>
            </td>
            <td colspan="6">
              <br/><?php echo $this->Form->username('nome', array('placeholder' => 'Informe o nome da disciplina...', 'class' => 'form-text form-control', 'label' => '','rule' => 'notEmpty', 'required' => true)); ?>
            </td>
            </tr>
          <tr>
            <td>
              <p><strong><br/>Curso:</strong></p>
            </td>
            <td>
              <br/><?php echo $this->Form->select('curso_id', $cursos, array('empty' => 'Nenhum')); ?>
            </td>
          </tr>
          </tbody>
          </table>
          <br/><?php echo $this->Form->submit('Cadastrar', array('class' => 'btn btn-success')); ?><br/></center></p></center></p>
      </div>
    </div>
    <div class="panel panel-primary">
      <div class="panel-heading">
        <center><h3 class="panel-title">Edite/Delete uma Disciplina do Sistema</h3></center>
      </div>
      <div class="panel-body">
        <p><center><table class="table table-hover">
          <thead>
            <tr>
              <th></th>
              <th></th>
              <th>id</th>
              <th>Código</th>
              <th>Nome</th>
              <th>Carga Hor.</th>
              <th>Curso</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($disciplina as $dp): ?>
              <tr>
                <td>
                  <a href=" <?php echo Router::url(array('controller' => 'usuarios', 'action' => 'adm_disciplina_edit', $dp['Disciplina']['id'])); ?>" >Editar</a>
                </td>
                <td>
                </td>
                <td>
                  <?php echo $dp['Disciplina']['id']; ?>
                </td>
                <td>
                  <?php echo $dp['Disciplina']['codigo']; ?>
                </td>
                <td>
                  <?php echo $dp['Disciplina']['nome']; ?>
                </td>
                <td>
                  <?php echo $dp['Disciplina']['carga_hora']; ?>
                </td>
                <td>
                  <?php echo $dp['Curso']['codigo']; ?>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
