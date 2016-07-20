<?php

class PacientesController extends AppController {

    public $helpers = array('Form');
    public $components = array('Flash');

  public function geral() {
    $this->set('pacientes', $this->Paciente->find('all'));
  }

  public function validar() {
      $paciente = $this->Paciente->findAllByLoginAndSenha(
              $this->data['Paciente']['login'],
              $this->data['Paciente']['senha']);
      if (!empty($paciente)) {
        return $paciente;
      } else {
        return false;
      }
  }

  public function index_login(){

  }

  public function login() {

      if(!empty($this->data['Paciente']['login'])) {

        $paciente = $this->validar();
        if ($paciente != false) {
          $this->Flash->set('Acesso realizado com sucesso!');
          $this->Session->write('Paciente', $paciente);
          $this->redirect('/pacientes/geral');
          exit();
        } else {
            $this->Flash->set('Usuário e/ou Senha inválidos!');
            $this->redirect(array('action' => 'index_login'));
            exit();
        }
      } else {
        $this->redirect(array('action' => 'index_login'));
        exit();
      }

  }
  public function logout() {
    $this->Session->destroy();
    $this->Flash->set('Atividades encerradas com sucesso!');
    $this->redirect(Router::url('http://localhost/prova_I/'));
    exit();
  }

  public function listpac(){
    $this->set('pacientes', $this->Paciente->find('all', array('order' => array('Paciente.nome ASC'))));
  }

}
 ?>
