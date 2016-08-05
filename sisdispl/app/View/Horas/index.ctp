<?php
echo $this->Html->css('home.css');
echo $this->Html->script('valida-cadastro.js');
echo $this->assign('title','Horas');
?>
<?php $id = $this->Session->read('Aluno'); ?>

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
        <center><p><strong><h4>Relatório:</h4></strong></p></center>

        <table class="table table-hover">
          <thead>
            <tr>
              <th width="15%"></th>
              <th width= "18%">Horas Cursadas</th>
              <th width= "18%">Horas que Faltam</th>
            </tr>
          </thead>
          <tbody>
          <tr>
            <td>
              <p>Estágio:</p>
            </td>
            <td>
              <?php $totalestag = 0;
              foreach ($horas as $h) {
                $totalestag += $h['Hora']['horas_estag'];
                }
                echo $totalestag; ?>
            </td>
            <td>
              <?php foreach ($disciplinas as $d) {
                if(($d['Disciplina']['codigo'] == 'ATV021') or ($d['Disciplina']['codigo'] == 'ATV025') or ($d['Disciplina']['codigo'] == 'ATV500')){
                  if($d['Disciplina']['carga_hora'] - $totalestag < 0){
                    echo "0";
                  }else {
                    echo ($d['Disciplina']['carga_hora'] - $totalestag);
                  }
                }
              } ?>
            </td>
          </tr>
          <tr>
            <td>
            <p>Eletivas:</p>
            </td>
            <td>
              <?php echo $qtdhoraselet;?>
            </td>
            <td>
            <?php if($id[0]['Curso']['horas_displ_eletv'] - $qtdhoraselet < 0){
              echo "0";
            }else {
              echo ($id[0]['Curso']['horas_displ_eletv'] - $qtdhoraselet);
            }    ?>
            </td>
          </tr>
          <tr>
            <td>
              <p>Atividades extras:</p>
            </td>
            <td>
              <?php $totalatv = 0;
              foreach ($horas as $h) {
                $totalatv += $h['Hora']['horas_atvidade'];
                }
                echo $totalatv; ?>
            </td>
            <td>
              <?php foreach ($disciplinas as $d) {
                if($d['Disciplina']['codigo'] == 'ATV100'){
                  if($d['Disciplina']['carga_hora'] - $totalatv < 0){
                    echo "0";
                  }else {
                    echo ($d['Disciplina']['carga_hora'] - $totalatv);
                  }
                  }
                } ?>
            </td>
          </tr>
          <?php if (($id[0]['Aluno']['curso_id'] != 1) and ($id[0]['Aluno']['curso_id'] != 3)){
            if($totalhora >= 2100){?>
          <?php echo
          "<tr>
            <td>
              TCC:
            </td>
          <td>";
          $totaltcc = 0;
          foreach ($horas as $h) {
            $totaltcc += $h['Hora']['horas_tcc'];
            }
            echo $totaltcc;
            echo
            "</td>
          <td>";
           foreach ($disciplinas as $d) {
            if(($d['Disciplina']['codigo'] == 'AT600') or ($d['Disciplina']['codigo'] == 'ATV030')){
              if($d['Disciplina']['carga_hora'] - $totaltcc < 0){
                echo "0";
              }else {
                echo ($d['Disciplina']['carga_hora'] - $totaltcc);
              }
            }
          } ?>
          <?php echo "</td>
        </tr>";}} ?>
        </table>
        <center><p><strong><h4>Cadastrar Horas:</h4></strong></p></center>
        <center><p>Informe a quantidade de horas cursadas relativas ao campo designado abaixo:</p></center>
        <br/><?php echo $this->Form->create('Hora', array('url' => 'registra'));?>
        <div class="col-sm-12">
          <div class="col-sm-3">
            <p><strong><h4>Estágio:</h4><strong><p/>
          </div>
          <div class="col-sm-4 col-sm-offset-1">
            <p><strong><h4>Atividades extras:</h4><strong><p/>
          </div>
          <?php if (($id[0]['Aluno']['curso_id'] != 1) and ($id[0]['Aluno']['curso_id'] != 3)){ ?>
          <?php echo
          "<div class='col-sm-1'>
            <p><strong><h4>&nbspTCC:</h4><strong><p/>
          </div>";} ?>
        </div>
        <div class="col-sm-12">
          <?php if($estagiook == TRUE){ ?>
          <div class="col-sm-3">
            <?php echo $this->Form->username('horas_estag', array('placeholder' => 'Digite o valor...', 'class' => 'form-text form-control', 'label' => '')); ?>
          </div>
          <?php }else{ ?>
          <div class="col-sm-3">
            <br/>Pré-requisito requerido
          </div>
          <?php } ?>
          <div class="col-sm-3 col-sm-offset-1">
            <?php echo $this->Form->username('horas_atvidade', array('placeholder' => 'Digite o valor...', 'class' => 'form-text form-control', 'label' => '')); ?>
          </div>
          <?php if (($id[0]['Aluno']['curso_id'] != 1) and ($id[0]['Aluno']['curso_id'] != 3)){ ?>
          <?php echo "<div class='col-sm-3 col-sm-offset-1'>"; ?>
            <?php echo $this->Form->username('horas_tcc', array('placeholder' => 'Digite o valor...', 'class' => 'form-text form-control', 'label' => '')); ?>
          <?php echo "</div>";} ?>
        </div>
        <div class="col-sm-12">
        </br></br>
        <div class="col-sm-8 col-sm-offset-2 ">
          <?php echo $this->Form->submit('Salvar!', array('class' => 'btn btn-info'));?></br>
        </div>
        </div>
        <div class="col-sm-12">
          <br><center><p><strong><h4>Lançamentos:</h4></strong></p></center>
          <table class="table table-hover">
            <thead>
              <tr class="info">
                <th></th>
                <th>Aluno</th>
                <th>Horas Estágio</th>
                <th>Horas Atividades Extras</th>
                <?php if (($id[0]['Aluno']['curso_id'] != 1) and ($id[0]['Aluno']['curso_id'] != 3)){
                  echo "<th> Horas TCC</th>";} ?>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($horas as $h): ?>
                <tr class="success">
                  <td>

                    <!--<?php//echo $this->Form->create('Hora', array('url' => 'altera'));
                        //echo $this->Form->hidden('id', array('value' => $h['Hora']['id']));
                      //echo $this->Form->submit('Editar!', array('class' => 'btn btn-info') )
                    ?>-->
                    <center><a href=" <?php echo Router::url(array('controller' => 'horas', 'action' => 'altera', $h['Hora']['id'])); ?>" >Editar</a></center>
                  </td>
                  <td>
                    <?php echo $h['Aluno']['nome']; ?>
                  </td>
                  <td>
                    <?php echo $h['Hora']['horas_estag']; ?>
                  </td>
                  <td>
                    <?php echo $h['Hora']['horas_atvidade']; ?>
                  </td>
                  <?php if (($id[0]['Aluno']['curso_id'] != 1) and ($id[0]['Aluno']['curso_id'] != 3)){
                    echo "<td>";
                    echo $h['Hora']['horas_tcc'];
                    echo"</td>";} ?>
                </tr>
              <?php endforeach; ?>
          </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
