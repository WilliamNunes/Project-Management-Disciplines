<?php
echo $this->Html->css('home.css');
echo $this->assign('title','Matriz Curricular');
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
    <li><a href="<?php echo Router::url('/horas/index'); ?>"><span>Sessão Horas Extras/Estagio</span></a></li></br>
    <li class="active"><a><span>Matriz Curricular&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span></a></br></br></br></br></li>
  </ul>
</div>
<div id="center">
  <br/>
  <div class="col-sm-10 col-sm-offset-1 text">
    <div class="panel panel-danger">
      <div class="panel-heading">
        <h3 class="panel-title"><center>Matriz Curricular: <i><?php echo $curriculos[0]['Curso']['nome'] ?></i> </center></h3>
      </div>
      <div class="panel-body">
        <table class="table table-hover">
          <h4><strong><center>Obrigatórias</center></strong></h4>
          <thead>
            <tr>
              <th width= "10%">Código</th>
              <th>Disciplina</th>
              <th width= "8%">Carg.Hr</th>
              <th width= "5%">Período</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ($curriculos as $c):
              if ($c['Curriculo']['periodo'] != NULL){?>
              <tr <?php if($c['Curriculo']['periodo'] % 2 == 0){echo "class='success'";}else{echo"class='info'";} ?>>
                <td>
                  <?php echo $c['Disciplina']['codigo']; ?>
                </td>
                <td>
                  <?php echo $c['Disciplina']['nome']; ?>
                </td>
                <td>
                  <?php echo $c['Disciplina']['carga_hora']; ?>
                </td>
                <td>
                  <?php echo $c['Curriculo']['periodo']; ?>
                </td>
              </tr>
            <?php } endforeach; ?>
          </tbody>
        </table>
        <table class="table table-hover">
        <br/><h4><strong><center>Atividades</center></strong></h4>
        <thead>
          <tr>
            <th width= "10%">Codigo</th>
            <th>Disciplina</th>
            <th width= "8%">Carg.Hr</th>
            <th width= "5%">Período</th>
          </tr>
        </thead>
        <tbody>
          <?php
            foreach ($curriculos as $c):
            if (($c['Curriculo']['periodo'] == NULL) and ($c['Curriculo']['obrigatoria'] == TRUE)){?>
            <tr <?php if($c['Curriculo']['periodo'] % 2 == 0){echo "class='success'";}else{echo"class='info'";} ?>>
              <td>
                <?php echo $c['Disciplina']['codigo']; ?>
              </td>
              <td>
                <?php echo $c['Disciplina']['nome']; ?>
              </td>
              <td>
                <?php echo $c['Disciplina']['carga_hora']; ?>
              </td>
              <td>
                <?php echo $c['Curriculo']['periodo']; ?>
              </td>
            </tr>
          <?php } endforeach; ?>
        </tbody>
        </table>
        <table class="table table-hover">
        <br/><h4><strong><center>Eletivas</center></strong></h4>
        <thead>
          <tr>
            <th width= "10%">Codigo</th>
            <th>Disciplina</th>
            <th width= "8%">Carg.Hr</th>
            <th width= "5%">Período</th>
          </tr>
        </thead>
        <tbody>
          <?php
            foreach ($curriculos as $c):
            if (($c['Curriculo']['periodo'] == NULL) and ($c['Curriculo']['obrigatoria'] != TRUE)){?>
            <tr>
              <td>
                <?php echo $c['Disciplina']['codigo']; ?>
              </td>
              <td>
                <?php echo $c['Disciplina']['nome']; ?>
              </td>
              <td>
                <?php echo $c['Disciplina']['carga_hora']; ?>
              </td>
              <td>
                <?php echo $c['Curriculo']['periodo']; ?>
              </td>
            </tr>
          <?php } endforeach; ?>
        </tbody>
        </table>
        <br/><br/>
        <table class="table table-hover success">
          <tr class="success">
            <td>
              <p><strong>Componentes Curriculares Exigidos para
                Integralização no Curso</strong></p>
            </td>
            <td>
              <p><strong>Carga Horaria</strong></p>
            </td>
          </tr>
          <tr class="success">
            <td>
              <p>Disciplinas Obrigatórias</p>
            </td>
            <td>
            <?php echo $curriculos[0]['Curso']['horas_displ_obrig'] ?>
            </td>
          <tr class="success">
            <td>
              <p>Disciplinas Eletivas</p>
            </td>
            <td>
              <?php echo $curriculos[0]['Curso']['horas_displ_eletv'] ?>
            </td>
          </tr>
          <tr class="success">
            <td>
              <p>Atividades Curriculares</p>
            </td>
            <td>
              <?php echo $curriculos[0]['Curso']['horas_atvs'] ?>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>
