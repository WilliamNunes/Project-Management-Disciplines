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
          <a class="active list-group-item">Edit/Del - Alunos</a>
          <a href="<?php echo Router::url(array('controller' => 'usuarios', 'action' => 'adm_requisito')); ?>" class="list-group-item">Add/Edit/Del - Requisitos</a>
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
        <center><h3 class="panel-title">Edite/Delete um Aluno do Sistema</h3></center>
      </div>
      <div class="panel-body">
        <p><center><table class="table table-hover">
          <thead>
            <tr>
              <th width= "5%"></th>
              <th width= "2%"></th>
              <th width= "5%">id</th>
              <th>Nome</th>
              <th>Login</th>
              <th>Curso</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($alunos as $al): ?>
              <tr>
                <td>
                  <a href=" <?php echo Router::url(array('controller' => 'usuarios', 'action' => 'adm_aluno_edit', $al['Aluno']['id'])); ?>" >Editar</a>
                </td>
                <td>

                </td>
                <td>
                  <?php echo $al['Aluno']['id']; ?>
                </td>
                <td>
                  <?php echo $al['Aluno']['nome']; ?>
                </td>
                <td>
                  <?php echo $al['Aluno']['login']; ?>
                </td>
                <td>
                  <?php echo $al['Curso']['codigo']; ?>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table></center></p>
      </div>
    </div>
  </div>
</div>
