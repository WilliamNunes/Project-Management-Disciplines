<?php
echo $this->Html->css('home.css');
echo $this->Html->script('valida-cadastro.js');
echo $this->assign('title','Disciplinas Matrícula');
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
    <li class="active"><a><span>Disciplínas que posso me matricular</span></a></li></br>
    <li><a href="<?php echo Router::url('/horas/index'); ?>"><span>Sessão Horas Extras/Estagio</span></a></li></br>
    <li><a href="<?php echo Router::url('/curriculos/index'); ?>"><span>Matriz Curricular</span></a></br></br></br></br></li>
  </ul>
</div>
<div id="center">
  <br/>
  <div class="col-sm-10 col-sm-offset-1 text">
    <div class="panel panel-danger">
      <div class="panel-heading">
        <h3 class="panel-title"><center>Gerênciamento de disciplínas que posso me matricular</center></h3>
      </div>
      <div class="panel-body">
        <table class="table table-hover table-condensed">
          <h4><strong><center>Obrigatórias</center></strong></h4>
          <thead>
            <tr>
              <th colspan="2" width= "5%"><center>Aprovação</center></th>
              <th width= "10%"><center>Código</center></th>
              <th><center>Disciplina</center></th>
              <th width= "8%">Carg.Hr</th>
              <th width= "5%">Período</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $ok[0] = FALSE;
            $i = $discpsem[0]['Curriculo']['periodo'];
            foreach ($discpsem as $sem) {

              if ($i != $sem['Curriculo']['periodo']){ ?>
                <tr><th colspan="6"></th></tr>
                <?php $i = $sem['Curriculo']['periodo'];  }

              if($sem['Curriculo']['periodo'] != null){
                $l=0;
                foreach ($aprovadas as $ap) {
                  if($sem['Disciplina']['id'] == $ap['Aprovada']['disciplina_id']){
                  $ok[$l] = TRUE;
                }else {
                  $ok[$l] = FALSE;
                }
                 $l++;}
              ?>
            <tr <?php if(in_array(TRUE, $ok)){echo "class='success'";}else{echo "class='warning'";}?>>
              <th>
                <?php if(!in_array(TRUE, $ok)){ ?><center><a href=" <?php echo Router::url(array('controller' => 'requisitos', 'action' => 'add', $sem['Disciplina']['id'])); ?>" ><button class="btn btn-success">&#10004</button></a></center> <?php }else{?> <br/><center>&#10004</center> <?php } ?>
              </th>
              <th>
                <?php if(in_array(TRUE, $ok)){  ?><center><a href=" <?php echo Router::url(array('controller' => 'requisitos', 'action' => 'remove', $sem['Disciplina']['id'])); ?>" ><button class='btn btn-danger'>&#10060</button></a></center> <?php }else{ ?> <br/><center>&#10060</center> <?php } ?>
              </th>
              <th>
                <br/><center><?php echo $sem['Disciplina']['codigo']; ?></center>
              </th>
              <th>
                <br/><?php echo $sem['Disciplina']['nome']; ?>
              </th>
              <th>
                <br/><center><?php echo $sem['Disciplina']['carga_hora']; ?></center>
              </th>
              <th>
                <br/><center><?php echo $sem['Curriculo']['periodo']; ?></center>
              </th>
            </tr>
            <tr>
            <?php
            }
          } ?>
          </tbody>
        </table>
        <table class="table table-hover table-condensed">
        <br/><h4><strong><center>Atividades</center></strong></h4>
        <thead>
          <tr>
            <th width= "10%">Codigo</th>
            <th><center>Disciplina</center></th>
            <th width= "8%">Carg.Hr</th>
            <th width= "5%">Período</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $ok[0] = FALSE;
          foreach ($discpsem as $sem) {

            if(($sem['Curriculo']['periodo'] == null) && ($sem['Curriculo']['obrigatoria'] == TRUE)){
              $l=0;
              foreach ($aprovadas as $ap) {
                if($sem['Disciplina']['id'] == $ap['Aprovada']['disciplina_id']){
                $ok[$l] = TRUE;
              }else {
                $ok[$l] = FALSE;
              }
               $l++;}
            ?>
            <tr>
              <td>
                <strong><?php echo $sem['Disciplina']['codigo']; ?></strong>
              </td>
              <td>
                <strong><?php echo $sem['Disciplina']['nome']; ?></strong>
              </td>
              <td>
                <center><strong><?php echo $sem['Disciplina']['carga_hora']; ?></strong></center>
              </td>
              <td>
                <?php echo $sem['Curriculo']['periodo']; ?>
              </td>
            </tr>
            <?php
            }
          } ?>
        </tbody>
      </table>
      <table class="table table-hover">
      <br/><h4><strong><center>Eletivas</center></strong></h4>
        <thead>
          <tr>
            <th colspan="2" width= "5%"><center>Aprovação</center></th>
            <th width= "10%"><center>Código</center></th>
            <th><center>Disciplina</center></th>
            <th width= "8%">Carg.Hr</th>
            <th width= "5%">Período</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $ok[0] = FALSE;
          foreach ($discpsem as $sem) {

            if(($sem['Curriculo']['periodo'] == null) && ($sem['Curriculo']['obrigatoria'] != TRUE)){
              $l=0;
              foreach ($aprovadas as $ap) {
                if($sem['Disciplina']['id'] == $ap['Aprovada']['disciplina_id']){
                $ok[$l] = TRUE;
              }else {
                $ok[$l] = FALSE;
              }
               $l++;}
            ?>
            <tr <?php if(in_array(TRUE, $ok)){echo "class='success'";}else{echo "class='warning'";}?>>
              <th>
                <?php if(!in_array(TRUE, $ok)){ ?><center><a href=" <?php echo Router::url(array('controller' => 'requisitos', 'action' => 'add', $sem['Disciplina']['id'])); ?>" ><button class="btn btn-success">&#10004</button></a></center> <?php }else{?> <br/><center>&#10004</center> <?php } ?>
              </th>
              <th>
                <?php if(in_array(TRUE, $ok)){  ?><center><a href=" <?php echo Router::url(array('controller' => 'requisitos', 'action' => 'remove', $sem['Disciplina']['id'])); ?>" ><button class='btn btn-danger'>&#10060</button></a></center> <?php }else{ ?> <br/><center>&#10060</center> <?php } ?>
              </th>
              <th>
                <br/><center><?php echo $sem['Disciplina']['codigo']; ?></center>
              </th>
              <th>
                <br/><?php echo $sem['Disciplina']['nome']; ?>
              </th>
              <th>
                <br/><center><?php echo $sem['Disciplina']['carga_hora']; ?></center>
              </th>
              <th>
                <br/><center><?php echo $sem['Curriculo']['periodo']; ?></center>
              </th>
            </tr>
            <tr>
            <?php
            }
          } ?>
        </tbody>
      </table>
      </div>
    </div>
  </div>
</div>
