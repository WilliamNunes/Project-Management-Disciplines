<?php

class TransController extends AppController {

  public $helpers = array('Html', 'Form');
  public $components = array('Flash');

  public function solic(){
    $this->set('tipos', $this->Tran->Tipo->find('all', array('order' => array('Tipo.nome ASC'))));
  }

  public function consolic($id){
    $codcliente = $this->Session->read('Cliente');

      if (empty($this->request->data)) {
        $tipos = $this->Tran->Tipo->findById($id);
        $this->set('tipo', $tipos);
      }
      else{
        $this->request->data['Tran']['tipo_id'] = $id;
        $this->request->data['Tran']['cliente_id'] = $codcliente[0]['Cliente']['id'] ;

        if ($this->Tran->save($this->request->data)) {
        $this->Flash->set('Transação efetuada com Sucesso !');
        $this->redirect(array('action' => 'listagem'));
        }
      }
  }

  public function listagem() {
    $id = $this->Session->read('Cliente');

    $this->set('trans', $this->Tran->find('all',
    array('conditions'=> array('Cliente.id' => $id[0]['Cliente']['id']), 'order' => array('Tran.data DESC','Tipo.nome ASC' )), array('recursive' => 2)));
  }
}

?>
