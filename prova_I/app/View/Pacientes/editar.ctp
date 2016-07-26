<div class="col-md-3">
  <br/><p class="lead"><strong> Área do Paciente !</strong></p>
  <div class="list-group">
      <a href="<?php echo Router::url(array('controller' => 'pacientes', 'action' => 'geral')); ?>" class="active list-group-item">Área do Paciente</a>
      <div class="list-group">
        <a href="<?php echo Router::url(array('controller' => 'exames', 'action' => 'solic')); ?>" class="list-group-item">Solicitar Exame</a>
        <a href="<?php echo Router::url(array('controller' => 'exames', 'action' => 'listagem')); ?>"class="list-group-item">Exames Solicitados</a>
        <a class="active list-group-item">Editar perfil</a>

      </div>
  </div>
</div>
<div class="form-top container top-content form-top row">
<div class="row">
  <br/>
    <div class="col-md-6 col-sm-offset-1">
        <h4><strong><center>Dados do Paciente</center></strong></h4><br/>
          <p><?php echo $this->Form->create('Paciente');?>
            <strong>Nome:</strong><?php echo $this->Form->input('nome', array('placeholder' => 'Digite seu nome...', 'rule' => 'notEmpty', 'required' => true ,
                                                                            'value' => $pacientes[0]['Paciente']['nome'], 'class' => 'form-text form-control', 'label' => '')); ?><br/>
         <strong>Login:</strong><?php echo $this->Form->input('login', array('placeholder' => 'Digite o login...', 'rule' => 'notEmpty', 'required' => true ,
                                                                            'value' => $pacientes[0]['Paciente']['login'],'class' => 'form-text form-control', 'label' => '')); ?><br/>
         <strong>Senha:</strong><?php echo $this->Form->input('senha', array('placeholder' => 'Digite uma senha..', 'rule' => 'notEmpty', 'required' => true ,
                                                                            'value' => $pacientes[0]['Paciente']['senha'], 'class' => 'form-password form-control', 'label' => '')); ?><br/>
         <br/><?php echo $this->Form->submit('Salvar !', array('class' => 'btn btn-success') );?>
         <br/><center><a href="<?php echo Router::url(array('controller' => 'pacientes', 'action' => 'geral')); ?>">Voltar</a></center>
         <br/><br/><br/>
         <br/><center><?php echo $this->Html->link('Deletar Usuário',
                                     array('controller' => 'pacientes', 'action' => 'delet'),
                                     array('confirm' => 'Deseja mesmo deletar esse usuário?'));?>
          </center>
       </p>
   </div>
 </div>
