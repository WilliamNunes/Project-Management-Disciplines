<?php
App::import('Controller', 'Curriculos');
App::import('Controller', 'Aprovadas');
App::import('Controller', 'Requisitos');
class HorasController extends AppController {
    public $helpers = array('Html', 'Form');
    public $components = array('Flash');

    public function index(){
      $Curriculos = new CurriculosController();
      $Aprovadas = new AprovadasController();
      $Requisitos = new RequisitosController();

      $id = $this->Session->read('Aluno');

      $horas = $this->Hora->find('all', array('conditions'=> array('Aluno.id' => $id[0]['Aluno']['id'])), array('recursive' => 2));

      $disp = $Curriculos->Curriculo->find('all', array('conditions'=> array('Curriculo.curso_id' => $id[0]['Aluno']['curso_id'], 'Curriculo.periodo' => NULL, 'Curriculo.obrigatoria'=> TRUE)));
      $toeletiva = $Curriculos->Curriculo->find('all', array('conditions'=> array('Curriculo.curso_id' => $id[0]['Aluno']['curso_id'], 'Curriculo.periodo' => NULL, 'Curriculo.obrigatoria'=> FALSE)));

      $aprov = NULL;
      $qtdhoraselet = 0;
      foreach ($toeletiva as $dp) {
        if($Aprovadas->Aprovada->find('all', array('conditions'=> array('Aprovada.aluno_id' => $id[0]['Aluno']['id'], 'Aprovada.disciplina_id' => $dp['Disciplina']['id'])))){
        $aprov = $Aprovadas->Aprovada->find('all', array('conditions'=> array('Aprovada.aluno_id' => $id[0]['Aluno']['id'], 'Aprovada.disciplina_id' => $dp['Disciplina']['id'])));
        $qtdhoraselet += $aprov[0]['Disciplina']['carga_hora'];
        }
      }

      $aprovadas = $Aprovadas->Aprovada->find('all', array('conditions'=> array('Aprovada.aluno_id' => $id[0]['Aluno']['id'])));
      $totalhora = 0;
      foreach ($aprovadas as $ap) {
        $totalhora += $ap['Disciplina']['carga_hora'];
      }

      $estagio = $Curriculos->Curriculo->find('all', array('conditions'=> array('Curriculo.curso_id' => $id[0]['Aluno']['curso_id'], 'Curriculo.periodo' => NULL, 'Curriculo.obrigatoria'=> TRUE, 'Disciplina.nome' => 'ESTAGIO SUPERVISIONADO')));
      $reqhora = $Requisitos->Requisito->find('all', array('conditions'=> array('Requisito.disciplina_id' => $estagio[0]['Disciplina']['id'])));

      $estagiook = FALSE;
      if ($reqhora[0]['Requisito']['requi_hora'] <= $totalhora){
        $estagiook = TRUE;
      }

      $this->set('estagiook', $estagiook);

      $this->set('totalhora', $totalhora);

      $this->set('qtdhoraselet', $qtdhoraselet);

      $this->set('disciplinas', $disp);

      $this->set('horas', $horas);
    }

    public function registra(){
      $id = $this->Session->read('Aluno');
      if (empty($this->request->data)) {
      }else{
        $this->request->data['Hora']['aluno_id'] = $id[0]['Aluno']['id'];
        if ($this->Hora->save($this->request->data)) {
            $this->Flash->set('Item cadastrado com sucesso !');
            $this->redirect(array('action' => 'index'));
        }
      }
    }

    public function altera($id){
      $Curriculos = new CurriculosController();
      $Aprovadas = new AprovadasController();
      $Requisitos = new RequisitosController();

      $cod = $this->Session->read('Aluno');

      $aprovadas = $Aprovadas->Aprovada->find('all', array('conditions'=> array('Aprovada.aluno_id' => $cod[0]['Aluno']['id'])));
      $totalhora = 0;
      foreach ($aprovadas as $ap) {
        $totalhora += $ap['Disciplina']['carga_hora'];
      }

      $estagio = $Curriculos->Curriculo->find('all', array('conditions'=> array('Curriculo.curso_id' => $cod[0]['Aluno']['curso_id'], 'Curriculo.periodo' => NULL, 'Curriculo.obrigatoria'=> TRUE, 'Disciplina.nome' => 'ESTAGIO SUPERVISIONADO')));
      $reqhora = $Requisitos->Requisito->find('all', array('conditions'=> array('Requisito.disciplina_id' => $estagio[0]['Disciplina']['id'])));

      $estagiook = FALSE;
      if ($reqhora[0]['Requisito']['requi_hora'] <= $totalhora){
        $estagiook = TRUE;
      }

      $this->set('estagiook', $estagiook);

      if (empty($this->request->data)) {
        $this->set('horas', $this->Hora->find('all', array('conditions'=> array('Hora.id' => $id))));
      }else {

      $this->request->data['Hora']['id'] = $id;
        if ($this->Hora->save($this->request->data)) {
            $this->Flash->set('Registro editado com sucesso !!!');
            $this->set('horas', $this->Hora->find('all', array('conditions'=> array('Hora.id' => $id))));
            $this->redirect(array('action' => 'index'));
          }
        }
    }

  public function delet($id){
    $this->Hora->delete($id);

    $this->Flash->set('Registro excluído com Sucesso !');
    $this->redirect(array('action' => 'index'));
  }
}
?>
