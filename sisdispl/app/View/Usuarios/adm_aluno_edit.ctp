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
              <th width= "5%">id</th>
              <th>Nome</th>
              <th>Login</th>
              <th width= "15%">Senha</th>
              <th>Curso</th>
            </tr>
          </thead>
          <tbody>
              <?php echo $this->Form->create('Usuario');?>
              <tr>
                <td>
                  <?php echo $this->Form->submit('Salvar', array('class' => 'btn btn-success') );?>
                </td>
                <td>
                  <br/><?php echo $aluno[0]['Aluno']['id']; ?>
                  <?php echo $this->Form->hidden('id', array('value' => $aluno[0]['Aluno']['id']));  ?>
                </td>
                <td>
                  <?php echo $this->Form->username('nome', array('placeholder' => 'Digite o nome...', 'rule' => 'notEmpty', 'required' => true ,
                                                                                      'value' => $aluno[0]['Aluno']['nome'], 'class' => 'form-text form-control', 'label' => '')); ?>
                </td>
                <td>
                  <?php echo $this->Form->number('login', array('placeholder' => 'Digite o login...', 'rule' => 'notEmpty', 'required' => true ,
                                                                                      'value' => $aluno[0]['Aluno']['login'], 'class' => 'form-text form-control', 'label' => '')); ?>
                </td>
                <td>
                  <?php echo $this->Form->password('senha', array('placeholder' => 'Digite a senha...', 'rule' => 'notEmpty', 'required' => true ,
                                                                                      'value' => $aluno[0]['Aluno']['senha'], 'class' => 'form-text form-control', 'label' => '')); ?>
                </td>
                <td>
                  <br/><?php echo $this->Form->select('curso_id', $cursos, array('empty' => 'Selecione:', 'rule' => 'notEmpty', 'required' => true, 'value' => $aluno[0]['Aluno']['curso_id'])); ?>
                </td>
              </tr>
          </tbody>
        </table></center></p>
        <br/><center><a href="<?php echo Router::url(array('controller' => 'usuarios', 'action' => 'adm_aluno')); ?>">Voltar</a></center>
        <br/><p><center><?php echo $this->Html->link('Deletar Aluno', array('controller' => 'usuarios', 'action' => 'alunodelet', $aluno[0]['Aluno']['id']),
                                    array('confirm' => 'Deseja mesmo deletar esse Aluno?'));?>
        </p></center>
      </div>
    </div>
  </div>
</div>
