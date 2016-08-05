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
          <center><h3 class="panel-title">Edite/Delete um Curso do Sistema</h3></center>
        </div>
        <div class="panel-body">
          <p><center><table class="table table-hover">
            <thead>
              <tr>
                <th width="5%">id</th>
                <th width="10%"><center>Código</center></th>
                <th><center>Nome</center></th>
                <th width="13%"><center>Horas Discpl. Obgr.</center></th>
                <th width="13%"><center>Horas Discpl. Elet.</center></th>
                <th width="13%"><center>Horas Atividades</center></th>
              </tr>
            </thead>
            <tbody>
              <?php echo $this->Form->create('Usuario');?>
              <tr>
                <td>
                  <br/><?php echo $curso[0]['Curso']['id']; ?>
                  <?php echo $this->Form->hidden('id', array('value' => $curso[0]['Curso']['id']));  ?>
                </td>
                <td>
                  <?php echo $this->Form->username('codigo', array('placeholder' => 'AJM', 'class' => 'form-text form-control', 'label' => '','rule' => 'notEmpty', 'required' => true, 'value' => $curso[0]['Curso']['codigo'])); ?>
                </td>
                <td>
                  <?php echo $this->Form->username('nome', array('placeholder' => 'Informe o nome do curso...', 'class' => 'form-text form-control', 'label' => '','rule' => 'notEmpty', 'required' => true, 'value' => $curso[0]['Curso']['nome'])); ?>
                </td>
                <td>
                  <?php echo $this->Form->number('horas_displ_obrig', array('placeholder' => '0', 'class' => 'form-text form-control', 'label' => '','rule' => 'notEmpty', 'required' => true, 'value' => $curso[0]['Curso']['horas_displ_obrig'])); ?>
                </td>
                <td>
                  <?php echo $this->Form->number('horas_displ_eletv', array('placeholder' => '0', 'class' => 'form-text form-control', 'label' => '','rule' => 'notEmpty', 'required' => true, 'value' => $curso[0]['Curso']['horas_displ_eletv'])); ?>
                </td>
                <td>
                  <?php echo $this->Form->number('horas_atvs', array('placeholder' => '0', 'class' => 'form-text form-control', 'label' => '','rule' => 'notEmpty', 'required' => true, 'value' => $curso[0]['Curso']['horas_atvs'])); ?>
                </td>
              </tr>
            </tbody>
          </table>
          <br/><?php echo $this->Form->submit('Salvar', array('class' => 'btn btn-success')); ?><br/></center></p>
          <br/><center><a href="<?php echo Router::url(array('controller' => 'usuarios', 'action' => 'adm_curso')); ?>">Voltar</a></center>
          <br/><p><center><?php echo $this->Html->link('Deletar Curso', array('controller' => 'usuarios', 'action' => 'cursodelet', $curso[0]['Curso']['id']),
                                      array('confirm' => 'Deseja mesmo deletar esse Curso?'));?>
          </p></center>
        </div>
      </div>
    </div>
  </div>
</div>
