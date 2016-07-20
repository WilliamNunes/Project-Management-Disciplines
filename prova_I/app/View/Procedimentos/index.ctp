<div class="col-md-3">
  <br/><p class="lead"><strong> Área Geral !</strong></p>
  <div class="list-group">
      <a href="<?php echo Router::url(array('controller' => 'pacientes', 'action' => 'geral')); ?>" class="list-group-item">Área Paciente</a>
      <a href="<?php echo Router::url(array('controller' => 'administradores', 'action' => 'index')); ?>" class="list-group-item">Área Administrador</a>
  </div>
</div>
<div class="form-top container top-content form-top row">
<div class="row">
  <br/>
    <div class="col-md-6 col-sm-offset-1">
      <h4><strong><center>Procedimentos</center></strong></h4><br/>
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>Nome</th>
            <th>Preço</th>
          </tr>
        </thead>
        <tbody>

  <?php foreach ($procedimentos as $p): ?>
    <tr>
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
