<?php

class ClientesController extends AppController {

    public $helpers = array('Form');
    public $components = array('Flash');

  public function geral() {
    $this->set('clientes', $this->Cliente->find('all'));
  }

  public function validar() {
      $cliente = $this->Cliente->findAllByLoginAndSenha(
              $this->data['Cliente']['login'],
              $this->data['Cliente']['senha']);
      if (!empty($cliente)) {
        return $cliente;
      } else {
        return false;
      }
  }

  public function index_login(){

  }

  public function login() {

      if(!empty($this->data['Cliente']['login'])) {

        $cliente = $this->validar();
        if ($cliente != false) {
          $this->Flash->set('Acesso realizado com sucesso!');
          $this->Session->write('Cliente', $cliente);
          $this->redirect('/clientes/geral');
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
    $this->redirect(Router::url('http://localhost/prova_II/'));
    exit();
  }
}
?>
