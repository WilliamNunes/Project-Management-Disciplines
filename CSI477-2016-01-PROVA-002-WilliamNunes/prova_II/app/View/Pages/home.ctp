<div class="col-md-3">
    <p class="lead"><strong> Bem Vindo(a) !</strong></p>
    </br></br></br></br>
</div>
<div class="form-top container top-content form-top row">
  <div class="row">
    <br/>
    <div class="col-md-8">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <center><h3 class="panel-title">Menu SisFinan</h3></center>
        </div>
        <div class="panel-body">
          <div class="col-md-4">
            <p><a href="<?php echo Router::url(array('controller' => 'tipos', 'action' => 'index')); ?>"
               class="btn btn-default btn-lg">Tipos de Transações</a></p>
            <center>Clique para listar os tipos de transações possíveis</center>
          </div>
          <div class="col-md-3 col-sm-offset-1">
            <center><p><a href="<?php echo Router::url(array('controller' => 'clientes', 'action' => 'geral')); ?>"
              class="btn btn-default btn-lg">Cliente</a></p></center>
            <center>Clique para entrar na área reservada para clientes</center>
          </div>
          <div class="col-md-3 col-md-offset-1 ">
            <p><a href="<?php echo Router::url(array('controller' => 'administradores', 'action' => 'index')); ?>"
               class="btn btn-default btn-lg">Administrador</a></p>
            <center>Clique para entrar na área do administrador</center>
          </div>
        </div>
      </div>
    </div>
  </div>
