<?php
App::import('Controller', 'Aprovadas');
App::import('Controller', 'Curriculos');
class RequisitosController extends AppController {
    public $helpers = array('Html', 'Form');
    public $components = array('Flash');

    public function index(){
      $Aprovadas = new AprovadasController();
      $Curriculos = new CurriculosController();
      $id = $this->Session->read('Aluno');

      $requisitos = $this->Requisito->find('all', array('conditions'=> array('Requisito.curso_id' => $id[0]['Aluno']['curso_id'])));
      $aprovadas = $Aprovadas->Aprovada->find('all', array('conditions'=> array('Aprovada.aluno_id' => $id[0]['Aluno']['id'])));
      $curriculos = $Curriculos->Curriculo->find('all', array('conditions'=> array('Curriculo.curso_id' => $id[0]['Aluno']['curso_id'])));

      $totalhora = 0;
      foreach ($aprovadas as $ap) {
        $totalhora += $ap['Disciplina']['carga_hora'];
      }

      $l = 0;
      $match = null;
      $discpsem = null;
      for ($i = 0; $i<sizeof($curriculos); $i++) {
        $m=0;
        $ant = 0;
        foreach ($requisitos as $req) {
          if(($curriculos[$i]['Disciplina']['id'] != $req['Requisito']['disciplina_id'])){
            $match[$m] = FALSE;
          }
          else {
            $match[$m] = TRUE;
            if($ant != $req['Requisito']['disciplina_id']){
              $quaisreq = $this->Requisito->find('all', array('conditions'=> array('Requisito.disciplina_id' => $curriculos[$i]['Disciplina']['id'])));
              if ($quaisreq != NULL){
                $w = 0;
                for ($a = 0; $a<sizeof($quaisreq); $a++){
                  if(($quaisreq[$a]['Requisito']['requi_discipl_id'] == NULL) && ($quaisreq[$a]['Requisito']['requi_hora'] <= $totalhora)){
                    $reqaprov[$w] = TRUE;
                  }
                  elseif ($Aprovadas->Aprovada->find('all', array('conditions'=> array('Aprovada.aluno_id' => $id[0]['Aluno']['id'], 'Aprovada.disciplina_id' => $quaisreq[$a]['Requisito']['requi_discipl_id'])))){
                    $reqaprov[$w] = TRUE;
                  }else{
                    $reqaprov[$w] = FALSE;
                  }
                  $w++;
                }
                if(!in_array(FALSE,$reqaprov,true)){
                  $discpsem[$l] = $curriculos[$i];
                  $l++;
                }
              }
            }
            $ant = $req['Requisito']['disciplina_id'];
          }
          $m++;
        }
        if(!in_array(TRUE, $match, true)){
          $discpsem[$l] = $curriculos[$i];
          $l++;
        }
      }

      $this->set('requisitos', $requisitos);
      $this->set('discpsem', $discpsem);
      $this->set('aprovadas', $aprovadas);
      $this->set('curriculos', $curriculos);

    }

    public function add($materia){
      $Aprovadas = new AprovadasController();
      $id = $this->Session->read('Aluno');

      $data['Aprovada']['aluno_id'] = $id[0]['Aluno']['id'];
      $data['Aprovada']['disciplina_id'] = $materia;

      $Aprovadas->Aprovada->save($data);
      $this->redirect(array('action' => 'index'));
    }

    public function remove($materia){
      $Aprovadas = new AprovadasController();
      $id = $this->Session->read('Aluno');

      $idaprv = $Aprovadas->Aprovada->find('all', array('conditions'=> array('Aprovada.aluno_id' => $id[0]['Aluno']['id'], 'Aprovada.disciplina_id' => $materia)));

      $Aprovadas->Aprovada->delete($idaprv[0]['Aprovada']['id']);
      $this->redirect(array('action' => 'index'));
    }
}
?>
