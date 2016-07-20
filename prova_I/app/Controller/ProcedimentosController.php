<?php

class ProcedimentosController extends AppController {

  public $helpers = array('Html');

  public function index() {
    $this->set('procedimentos', $this->Procedimento->find('all', array('order' => array('Procedimento.nome ASC'))));
  }

}
?>
