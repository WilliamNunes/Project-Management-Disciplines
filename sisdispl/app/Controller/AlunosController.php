<?php
class AlunosController extends AppController {

  public $helpers = array('Form');
  public $components = array('Flash');

  public function index(){
  }

  public function validar() {
      $aluno = $this->Aluno->findAllByLoginAndSenha($this->data['Aluno']['login'], $this->data['Aluno']['senha']);
      if (!empty($aluno)) {
        return $aluno;
      }else{
        return false;
      }
  }

  public function index_login(){
  }

  public function login() {
      if(!empty($this->data['Aluno']['login'])) {

        $aluno = $this->validar();
        if ($aluno != false) {
          $nome = $this->Aluno->find('all', array('conditions'=> array('Aluno.login' => $this->data['Aluno']['login'])));
          $this->Flash->set($nome[0]['Aluno']['nome']);
          $this->Session->write('Aluno', $aluno);
          $this->redirect('index');
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
    $this->redirect(array('action' => 'index_login'));
    exit();
  }

  public function sobre(){
  }

  public function index_cadastro(){
    if (empty($this->request->data)){
    }
    else{
      if($this->Aluno->find('all', array('conditions'=> array('Aluno.login' => $this->request->data['Aluno']['login'])))){
        echo "<script language='javascript'>window.alert('Matrícula já cadastrada !!!')</script>";
        $this->set('alunos', $this->request->data);
      }else{
        if ($this->Aluno->save($this->request->data)) {
            $this->Flash->set('Você foi cadastrado com sucesso ! Faça login !!!');
            $this->redirect(array('action' => 'index_login'));
        }
      }
    }
  }

  public function editar(){
    $id = $this->Session->read('Aluno');
    $aluno = $this->Aluno->find('all', array('conditions'=> array('Aluno.id' => $id[0]['Aluno']['id'])));

    if (empty($this->request->data)) {
      $this->set('alunos', $this->Aluno->find('all', array('conditions'=> array('Aluno.id' => $id[0]['Aluno']['id']))));
    }else {
      $this->request->data['Aluno']['id'] = $id[0]['Aluno']['id'];
      if($this->request->data['Aluno']['login'] != $aluno[0]['Aluno']['login']){
          if($this->Aluno->find('all', array('conditions'=> array('Aluno.login' => $this->request->data['Aluno']['login'])))){
            echo "<script language='javascript'>window.alert('Matricula já está cadastrada !!!')</script>";
            $this->set('alunos', $this->Aluno->find('all', array('conditions'=> array('Aluno.id' => $id[0]['Aluno']['id']))));
          }else{
            if ($this->Aluno->save($this->request->data)) {
              $al = $this->validar();
              $this->Session->write('Aluno', $al);
              $this->Flash->set('Usuário editado com sucesso !!!');
              $this->redirect(array('action' => 'editar'));
            }
          }
        }else{
          if ($this->Aluno->save($this->request->data)) {
            $al = $this->validar();
            $this->Session->write('Aluno', $al);
            $this->Flash->set('Usuário editado com sucesso !!!');
            $this->redirect(array('action' => 'editar'));
          }
      }
    }
  }

  public function delet(){
    $id = $this->Session->read('Aluno');
    $this->Aluno->delete($id[0]['Aluno']['id']);
    $this->Flash->set('Aluno excluído com Sucesso !');
    $this->redirect(array('action' => 'logout'));
  }
}
?>
