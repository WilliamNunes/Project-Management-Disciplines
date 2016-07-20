<div class="col-md-3">
  <br/><p class="lead"><strong> Área do Paciente !</strong></p>
  <div class="list-group">
      <a href="<?php echo Router::url(array('controller' => 'pacientes', 'action' => 'geral')); ?>" class="active  list-group-item">Área do Paciente</a>
      <div class="list-group">
        <a href="<?php echo Router::url(array('controller' => 'exames', 'action' => 'solic')); ?>" class="list-group-item">Solicitar Exame</a>
        <a class="active list-group-item">Exames Solicitados</a>
      </div>
  </div>
</div>
<div class="form-top container top-content form-top row">
<div class="row">
  <br/>
    <div class="col-md-6 col-sm-offset-1">
        <h4><strong><center>Exames Solicitados</center></strong></h4><br/>
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Paciente</th>
              <th>Procedimento</th>
              <th>Data</th>
            </tr>
          </thead>
          <tbody>
            <?php
             $qtdexam = 0;
             $qtdvalor = 0;

            foreach ($exames as $e):
              $qtdexam = $qtdexam + 1;
              $qtdvalor += $e['Procedimento']['preco']; ?>
              <tr>
                <td>
                  <?php echo $e['Paciente']['nome']; ?>
                </td>
                <td>
                  <?php echo $e['Procedimento']['nome']; ?>
                </td>
                <td>
                  <?php echo $e['Exame']['data']; ?>
                </td>
              </tr>
            <?php endforeach; ?>
            <tr><td colspan="3"></td></tr>
              <tr class="success">
              <td>Total Procedimentos:</td><td><?php echo $qtdexam; ?></td><td></td>
            </tr>
            <tr class="success">
              <td>Valor Total:</td><td> R$ <?php echo $qtdvalor; ?></td>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>
      </div>
