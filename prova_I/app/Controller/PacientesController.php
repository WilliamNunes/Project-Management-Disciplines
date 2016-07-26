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

  public function editar(){
    $id = $this->Session->read('Paciente');
    $paciente = $this->Paciente->find('all', array('conditions'=> array('Paciente.id' => $id[0]['Paciente']['id'])));

    if (empty($this->request->data)) {

      $this->set('pacientes', $this->Paciente->find('all', array('conditions'=> array('Paciente.id' => $id[0]['Paciente']['id']))));

    }else {
      $this->request->data['Paciente']['id'] = $id[0]['Paciente']['id'];

      if($this->request->data['Paciente']['login'] != $paciente[0]['Paciente']['login']){
          if($this->Paciente->find('all', array('conditions'=> array('Paciente.login' => $this->request->data['Paciente']['login'])))){
            echo "<script language='javascript'>window.alert('Login já está sendo utilizado !!!')</script>";
            $this->set('pacientes', $this->Paciente->find('all', array('conditions'=> array('Paciente.id' => $id[0]['Paciente']['id']))));
          }else{
            // Persistir os dados
            if ($this->Paciente->save($this->request->data)) {
              $pc = $this->validar();
              $this->Session->write('Paciente', $pc);
              $this->Flash->set('Usuário editado com sucesso !!!');
              $this->redirect(array('action' => 'editar'));
            }
          }
        }else{
          // Persistir os dados
          if ($this->Paciente->save($this->request->data)) {
            $pc = $this->validar();
            $this->Session->write('Paciente', $pc);
            $this->Flash->set('Usuário editado com sucesso !!!');
            $this->redirect(array('action' => 'editar'));
          }
        }
      }
    }

  public function index_cadastro(){

    if (empty($this->request->data)) {

    }

    else{
      if($this->Paciente->find('all', array('conditions'=> array('Paciente.login' => $this->request->data['Paciente']['login'])))){
        echo "<script language='javascript'>window.alert('Login já está sendo utilizado !!!')</script>";
        $this->set('pacientes', $this->request->data);
      }else{
        // Persistir os dados
        if ($this->Paciente->save($this->request->data)) {
            $this->Flash->set('Você foi cadastrado com sucesso ! Faça login !!!');
            $this->redirect(array('action' => 'index_login'));
        }
      }
    }
  }

  public function delet(){
    $id = $this->Session->read('Paciente');

    $this->Paciente->delete($id[0]['Paciente']['id']);

    $this->Flash->set('Paciente excluído com Sucesso !');
    $this->redirect(array('action' => 'logout'));
  }

}
 ?>
