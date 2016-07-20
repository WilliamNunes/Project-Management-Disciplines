<?php

class ExamesController extends AppController {

  public $helpers = array('Html', 'Form');
  public $components = array('Flash');

  var $qtdexam = 0;
  var $qtdvalor = 0;
  var $procedimentos;

  public function solic(){
    $this->set('procedimentos', $this->Exame->Procedimento->find('all', array('order' => array('Procedimento.nome ASC'))));
  }

  public function listagem() {
    $id = $this->Session->read('Paciente');

    $this->set('exames', $this->Exame->find('all',
    array('conditions'=> array('Paciente.id' => $id[0]['Paciente']['id']), 'order' => array('Exame.data DESC','Procedimento.nome ASC' )),
    array('recursive' => 2)));
  }

  public function consolic($id){
    $codpaci = $this->Session->read('Paciente');

      if (empty($this->request->data)) {
        $procedimentos = $this->Exame->Procedimento->findById($id);
        $this->set('procedimento', $procedimentos);
      }
      else{
        $this->request->data['Exame']['procedimento_id'] = $id;
        $this->request->data['Exame']['paciente_id'] = $codpaci[0]['Paciente']['id'] ;

        if ($this->Exame->save($this->request->data)) {
        $this->Flash->set('Exame gravado com Sucesso !');
        $this->redirect(array('action' => 'listagem'));
        }
      }

  }
  public function listexam(){
    $this->set('exames', $this->Exame->find('all', array('order' => array('Exame.data DESC'), array('recursive' => 2))));
  }

  public function listageral(){
    $this->set('exames', $this->Exame->find('all', array('recursive' => 2), array('order' => array('Paciente.nome ASC', 'Procedimento.nome ASC'))));
  }

  public function todosproc($id){

    $this->set('exames', $this->Exame->find('all',
    array('conditions'=> array('Procedimento.id' => $id), 'order' => array('Exame.data DESC','Procedimento.nome ASC' )),
    array('recursive' => 2)));

  }

  public function todospacient($id){

    $this->set('exames', $this->Exame->find('all',
    array('conditions'=> array('Paciente.id' => $id), 'order' => array('Exame.data DESC','Procedimento.nome ASC' )),
    array('recursive' => 2)));

  }

}
?>
