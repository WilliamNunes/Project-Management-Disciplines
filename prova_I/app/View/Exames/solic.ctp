<div class="col-md-3">
  <br/><p class="lead"><strong> Área do Paciente !</strong></p>
  <div class="list-group">
      <a href="<?php echo Router::url(array('controller' => 'pacientes', 'action' => 'geral')); ?>" class="active list-group-item">Área do Paciente</a>
      <div class="list-group">
        <a class="active list-group-item">Solicitar Exame</a>
        <a href="<?php echo Router::url(array('controller' => 'exames', 'action' => 'listagem')); ?>" class="list-group-item">Exames Solicitados</a>
        <a href="<?php echo Router::url(array('controller' => 'pacientes', 'action' => 'editar')); ?>" class="list-group-item">Editar perfil</a>
      </div>
  </div>
</div>
<div class="form-top container top-content form-top row">
<div class="row">
  <br/>
    <div class="col-md-7 col-sm-offset-1">
        <h4><strong><center>Faça o requerimento do seu exame</center></strong></h4><br/>
        <table class="table table-hover">
          <thead>
            <tr>
              <th></th>
              <th>Procedimento</th>
              <th>Preço</th>
            </tr>
          </thead>
          <tbody>
              <?php foreach ($procedimentos as $p): ?>
                <tr>
                  <td>
                    <center><a href=" <?php echo Router::url(array('controller' => 'exames', 'action' => 'consolic', $p['Procedimento']['id'])); ?>" ><button class='btn btn-primary'>Solicitar</button></a></center>
                  </td>
                  <td>
                    <?php echo $p['Procedimento']['nome']; ?>
                  </td>
                  <td>
                    <?php echo $p['Procedimento']['preco']; ?>
                  </td>
                </tr>
              <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      </div>
