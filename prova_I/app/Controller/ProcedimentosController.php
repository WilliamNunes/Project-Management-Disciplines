<?php

class ProcedimentosController extends AppController {

  public $helpers = array('Html');

  public function index() {
    $this->set('procedimentos', $this->Procedimento->find('all', array('order' => array('Procedimento.nome ASC'))));
  }

  public function procgeral(){
    $this->set('procedimentos', $this->Procedimento->find('all', array('order' => array('Procedimento.id ASC'))));
  }

  public function cadastro(){

    if($this->Procedimento->find('all', array('conditions'=> array('Procedimento.nome' => $this->request->data['Procedimento']['nome'], 'Procedimento.preco' => $this->request->data['Procedimento']['preco'])))){
      $this->Flash->set('Procedimento já existe !!!');
      $this->redirect(array('action' => 'procgeral'));
    }else{
      // Persistir os dados
      if ($this->Procedimento->save($this->request->data)) {
          $this->Flash->set('Procedimento cadastrado com sucesso !!!');
          $this->redirect(array('action' => 'procgeral'));
      }
    }
  }


  public function edit($id){

    if (empty($this->request->data)) {
      $this->set('procedimentos', $this->Procedimento->find('all', array('conditions'=> array('Procedimento.id' => $id))));
    }else {
      $this->request->data['Procedimento']['id'] = $id;

        if($this->Procedimento->find('all', array('conditions'=> array('Procedimento.nome' => $this->request->data['Procedimento']['nome'], 'Procedimento.preco' => $this->request->data['Procedimento']['preco'])))){
          echo "<script language='javascript'>window.alert('Procedimento já existe !!!')</script>";
          $this->set('procedimentos', $this->Procedimento->find('all', array('conditions'=> array('Procedimento.id' => $id))));
        }else{
          // Persistir os dados
          if ($this->Procedimento->save($this->request->data)) {
              $this->Flash->set('Procedimento editado com sucesso !!!');
              $this->set('procedimentos', $this->Procedimento->find('all', array('conditions'=> array('Procedimento.id' => $id))));
            }
        }
    }
  }

  public function delet($id){
    $this->Procedimento->delete($id);

    $this->Flash->set('Procedimento excluído com Sucesso !');
    $this->redirect(array('action' => 'procgeral'));

  }
}
?>
