<?php
class CurriculosController extends AppController {
    public $helpers = array('Html', 'Form');
    public $components = array('Flash');

    public function index(){
      $id = $this->Session->read('Aluno');
      $this->set('curriculos', $this->Curriculo->find('all', array('conditions' => array('Curriculo.curso_id' => $id[0]['Aluno']['curso_id']),'order' => array('Curriculo.periodo ASC'))));
    }
}
?>
