<div class="col-md-3">
  <br/><p class="lead"><strong> Área Administrativa !</strong></p>
  <div class="list-group">
    <a href="<?php echo Router::url(array('controller' => 'administradores', 'action' => 'index')); ?>" class=" active list-group-item">Área Administrativa</a>
      <div class="list-group">
        <a href="<?php echo Router::url(array('controller' => 'exames', 'action' => 'listexam')); ?>" class="list-group-item">Exames Solicitados</a>
        <a href="<?php echo Router::url(array('controller' => 'pacientes', 'action' => 'listpac')); ?>" class="list-group-item">Pacientes</a>
        <a href="<?php echo Router::url(array('controller' => 'exames', 'action' => 'listageral')); ?>" class="active list-group-item">Total Exames Solic.</a>
      </div>
  </div>
</div>
<div class="form-top container top-content form-top row">
  <div class="row">
    <br/>
    <div class="col-md-6 col-sm-offset-1">
      <div class="panel panel-primary">
        <div class="panel-heading">

          <center><h3 class="panel-title">Exames do(a) Paciente: <?php echo $exames[0]['Paciente']['nome'] ?></h3></center>
        </div>
        <div class="panel-body">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>id</th>
                <th>Procedimento</th>
                <th>Data</th>
                <th>Preço</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $qtdexam = 0;
              $qtdvalor = 0;
              foreach ($exames as $e):
                $qtdexam += 1; $qtdvalor += $e['Procedimento']['preco'];
                ?>
                <tr>
                  <td>
                    <?php echo $e['Exame']['id']; ?>
                  </td>
                  <td>
                    <?php echo $e['Procedimento']['nome']; ?>
                  </td>
                  <td>
                    <?php echo $e['Exame']['data']; ?>
                  </td>
                  <td>
                    <?php echo $e['Procedimento']['preco']; ?>
                  </td>
                </tr>
              <?php endforeach; ?>
              <tr><td colspan="4"></td></tr>
                <tr class="success">
                <td colspan="2">Total Procedimentos:</td><td colspan="2"><?php echo $qtdexam; ?></td>
              </tr>
                <tr class="success">
                <td colspan="2">Valor Total:</td><td colspan="2"> R$ <?php echo $qtdvalor; ?></td>
                </tr>
          </tbody>
          </table>
          <center><a href="<?php echo Router::url(array('controller' => 'exames', 'action' => 'listageral')); ?>">Voltar</a></center>
        </div>
      </div>
    </div>
  </div>
