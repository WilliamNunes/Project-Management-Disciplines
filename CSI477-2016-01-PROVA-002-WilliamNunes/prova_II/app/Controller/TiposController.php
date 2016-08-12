<?php

class TiposController extends AppController {

  public $helpers = array('Html');

  public function index() {
    $this->set('tipos', $this->Tipo->find('all', array('order' => array('Tipo.nome ASC'))));
  }

}
?>
