<?php
App::import('Controller', 'Clientes');

class AdministradoresController extends AppController {

  public $helpers = array('Form');

  public function index() {

  }

  public function listcli(){
    $Clientes = new ClientesController();
    $clientes = $Clientes->Cliente->find('all', array('order' => array('Cliente.nome ASC')));
    $this->set('clientes', $clientes);
  }

}
 ?>
