<?php
App::import('Controller', 'Curriculos');
App::import('Controller', 'Alunos');
App::import('Controller', 'Requisitos');
App::import('Controller', 'Cursos');
App::import('Controller', 'Disciplinas');
class UsuariosController extends AppController {
  public $helpers = array('Form');
  public $components = array('Flash');

  public function validar() {
      $usuario = $this->Usuario->findAllByLoginAndSenha($this->data['Usuario']['login'], $this->data['Usuario']['senha']);
      if (!empty($usuario)) {
        return $usuario;
      }else{
        return false;
      }
  }

  public function adm_login(){
    if (empty($this->request->data)) {
    }
    else{
      if(!empty($this->data['Usuario']['login'])) {
        $usuario = $this->validar();
        if ($usuario != false) {
          $this->Flash->set('Acesso realizado com sucesso!');
          $this->Session->write('Usuario', $usuario);
          $this->redirect('/usuarios/adm_geral');
          exit();
        }else{
            $this->Flash->set('Usuário e/ou Senha inválidos!');
            $this->redirect(array('action' => 'adm_login'));
            exit();
        }
      }else{
        $this->redirect(array('action' => 'adm_login'));
        exit();
      }
    }
  }

  public function adm_cadastro(){
    if (empty($this->request->data)) {
    }
    else{
      if($this->Usuario->find('all', array('conditions'=> array('Usuario.login' => $this->request->data['Usuario']['login'])))){
        echo "<script language='javascript'>window.alert('Login já está sendo utilizado !!!')</script>";
        $this->set('usuarios', $this->request->data);
      }else{
        // Persistir os dados
        if ($this->Usuario->save($this->request->data)) {
            $this->Flash->set('Você foi cadastrado com sucesso ! Faça login !!!');
            $this->redirect(array('action' => 'adm_login'));
        }
      }
    }
  }

  public function adm_geral(){
  }

  public function adm_edit(){
    $id = $this->Session->read('Usuario');
    $usuario = $this->Usuario->find('all', array('conditions'=> array('Usuario.id' => $id[0]['Usuario']['id'])));

    if (empty($this->request->data)) {
      $this->set('usuarios', $this->Usuario->find('all', array('conditions'=> array('Usuario.id' => $id[0]['Usuario']['id']))));
    }else{
      $this->request->data['Usuario']['id'] = $id[0]['Usuario']['id'];
      if($this->request->data['Usuario']['login'] != $usuario[0]['Usuario']['login']){
          if($this->Usuario->find('all', array('conditions'=> array('Usuario.login' => $this->request->data['Usuario']['login'])))){
            echo "<script language='javascript'>window.alert('Login já está sendo utilizado !!!')</script>";
            $this->set('usuarios', $this->Usuario->find('all', array('conditions'=> array('Usuario.id' => $id[0]['Usuario']['id']))));
          }else{
            if ($this->Usuario->save($this->request->data)) {
              $this->Flash->set('Usuário editado com sucesso !!!');
              $this->redirect(array('action' => 'adm_edit'));
            }
          }
        }else{
          if ($this->Usuario->save($this->request->data)) {
            $this->Flash->set('Usuário editado com sucesso !!!');
            $this->redirect(array('action' => 'adm_edit'));
          }
        }
      }
  }

  public function adm_aluno(){
    $Alunos = new AlunosController();
    $alunos = $Alunos->Aluno->find('all', array('order' => array('Aluno.nome ASC')));
    $this->set('alunos', $alunos);
  }

  public function adm_aluno_edit($id){
    $Alunos = new AlunosController();
    $aluno = $Alunos->Aluno->find('all', array('conditions'=> array('Aluno.id' => $id)));

    if (empty($this->request->data)) {
      $this->set('aluno', $aluno);

      $cursos = $Alunos->Aluno->Curso->find('list', array('fields' => array('id', 'codigo')));
      $this->set('cursos', $cursos);

    }else{
      $dados['Aluno']['id'] = $this->request->data['Usuario']['id'];
      $dados['Aluno']['nome'] = $this->request->data['Usuario']['nome'];
      $dados['Aluno']['login'] = $this->request->data['Usuario']['login'];
      $dados['Aluno']['senha'] = $this->request->data['Usuario']['senha'];
      $dados['Aluno']['curso_id'] = $this->request->data['Usuario']['curso_id'];

      if($this->request->data['Usuario']['login'] != $aluno[0]['Aluno']['login']){
          if($Alunos->Aluno->find('all', array('conditions'=> array('Aluno.login' => $this->request->data['Usuario']['login'])))){
            echo "<script language='javascript'>window.alert('Matricula já está cadastrada !!!')</script>";
            $this->set('aluno', $Alunos->Aluno->find('all', array('conditions'=> array('Aluno.id' => $id))));
            $this->set('cursos', $Alunos->Aluno->Curso->find('list', array('fields' => array('id', 'codigo'))));
          }else{
            if ($Alunos->Aluno->save($dados)) {
                $this->Flash->set('Aluno editado com sucesso !!!');
                $this->set('aluno', $Alunos->Aluno->find('all', array('conditions'=> array('Aluno.id' => $id))));
                $this->set('cursos', $Alunos->Aluno->Curso->find('list', array('fields' => array('id', 'codigo'))));
              }
          }
      }else{
        if ($Alunos->Aluno->save($dados)) {
            $this->Flash->set('Aluno editado com sucesso !!!');
            $this->set('aluno', $Alunos->Aluno->find('all', array('conditions'=> array('Aluno.id' => $id))));
            $this->set('cursos', $Alunos->Aluno->Curso->find('list', array('fields' => array('id', 'codigo'))));
          }
      }
    }
  }

  public function alunodelet($id){
    $Alunos = new AlunosController();

    $Alunos->Aluno->delete($id);

    $this->Flash->set('Aluno excluído com Sucesso !');
    $this->redirect(array('action' => 'adm_aluno'));
  }

  public function adm_requisito(){
    $Requisitos = new RequisitosController();

    $this->set('requisito', $Requisitos->Requisito->find('all', array('order' => array('Requisito.id ASC'))));
    $this->set('cursos', $Requisitos->Requisito->Curso->find('list', array('fields' => array('id', 'codigo'))));
    $this->set('disciplinas', $Requisitos->Requisito->Disciplina->find('list', array('fields' => array('id', 'codigo'))));


      if (!empty($this->request->data)) {
        $dados['Requisito']['disciplina_id'] = $this->request->data['Usuario']['disciplina_id'];
        $dados['Requisito']['requi_discipl_id'] = $this->request->data['Usuario']['requi_discipl_id'];
        $dados['Requisito']['requi_hora'] = $this->request->data['Usuario']['requi_hora'];
        $dados['Requisito']['curso_id'] = $this->request->data['Usuario']['curso_id'];

        if ($this->request->data['Usuario']['disciplina_id'] == $this->request->data['Usuario']['requi_discipl_id']) {
          echo "<script language='javascript'>window.alert('Uma disciplina não pode ser pré-requisito dela mesma !!!')</script>";
          $this->set('requisito', $Requisitos->Requisito->find('all', array('order' => array('Requisito.id ASC'))));
          $this->set('cursos', $Requisitos->Requisito->Curso->find('list', array('fields' => array('id', 'codigo'))));
          $this->set('disciplinas', $Requisitos->Requisito->Disciplina->find('list', array('fields' => array('id', 'codigo'))));
        }else{
          if ($Requisitos->Requisito->save($dados)) {
              $this->set('requisito', $Requisitos->Requisito->find('all', array('order' => array('Requisito.id ASC'))));
              $this->set('cursos', $Requisitos->Requisito->Curso->find('list', array('fields' => array('id', 'codigo'))));
              $this->set('disciplinas', $Requisitos->Requisito->Disciplina->find('list', array('fields' => array('id', 'codigo'))));
              $this->Flash->set('Requisito adicionado com sucesso !!!');
              $this->redirect(array('action' => 'adm_requisito'));
            }
      }
    }
  }

  public function adm_requisito_edit($id){
    $Requisitos = new RequisitosController();

    if (empty($this->request->data)) {

      $this->set('requisito', $Requisitos->Requisito->find('all', array('conditions'=> array('Requisito.id' => $id))));
      $this->set('cursos', $Requisitos->Requisito->Curso->find('list', array('fields' => array('id', 'codigo'))));
      $this->set('disciplinas', $Requisitos->Requisito->Disciplina->find('list', array('fields' => array('id', 'codigo'))));

    }else{
      $dados['Requisito']['id'] = $this->request->data['Usuario']['id'];
      $dados['Requisito']['disciplina_id'] = $this->request->data['Usuario']['disciplina_id'];
      $dados['Requisito']['requi_discipl_id'] = $this->request->data['Usuario']['requi_discipl_id'];
      $dados['Requisito']['requi_hora'] = $this->request->data['Usuario']['requi_hora'];
      $dados['Requisito']['curso_id'] = $this->request->data['Usuario']['curso_id'];

      if ($this->request->data['Usuario']['disciplina_id'] == $this->request->data['Usuario']['requi_discipl_id']) {
        echo "<script language='javascript'>window.alert('Uma disciplina não pode ser pré-requisito dela mesma !!!')</script>";
        $this->set('requisito', $Requisitos->Requisito->find('all', array('conditions'=> array('Requisito.id' => $id))));
        $this->set('cursos', $Requisitos->Requisito->Curso->find('list', array('fields' => array('id', 'codigo'))));
        $this->set('disciplinas', $Requisitos->Requisito->Disciplina->find('list', array('fields' => array('id', 'codigo'))));
      }else{
        if ($Requisitos->Requisito->save($dados)) {
            $this->Flash->set('Requisito editado com sucesso !!!');
            $this->set('requisito', $Requisitos->Requisito->find('all', array('conditions'=> array('Requisito.id' => $id))));
            $this->set('cursos', $Requisitos->Requisito->Curso->find('list', array('fields' => array('id', 'codigo'))));
            $this->set('disciplinas', $Requisitos->Requisito->Disciplina->find('list', array('fields' => array('id', 'codigo'))));
        }
      }
    }
  }

  public function requisitodelet($id){
    $Requisitos = new RequisitosController();

    $Requisitos->Requisito->delete($id);

    $this->Flash->set('Requisito excluído com Sucesso !');
    $this->redirect(array('action' => 'adm_requisito'));
  }

  public function adm_curriculo(){
    $Curriculos = new CurriculosController();

    $this->set('curriculo', $Curriculos->Curriculo->find('all', array('order' => array('Curriculo.id ASC'))));
    $this->set('cursos', $Curriculos->Curriculo->Curso->find('list', array('fields' => array('id', 'codigo'))));
    $this->set('disciplinas', $Curriculos->Curriculo->Disciplina->find('list', array('fields' => array('id', 'codigo'))));

    if (!empty($this->request->data)) {
      $dados['Curriculo']['disciplina_id'] = $this->request->data['Usuario']['disciplina_id'];
      $dados['Curriculo']['obrigatoria'] = $this->request->data['Usuario']['obrigatoria'];
      if($this->request->data['Usuario']['periodo'] != NULL){
        $dados['Curriculo']['periodo'] = ($this->request->data['Usuario']['periodo'] + 1);
      }else{
        $dados['Curriculo']['periodo'] = $this->request->data['Usuario']['periodo'];
      }
      $dados['Curriculo']['curso_id'] = $this->request->data['Usuario']['curso_id'];

      if ($Curriculos->Curriculo->save($dados)) {
        $this->set('curriculo', $Curriculos->Curriculo->find('all', array('order' => array('Curriculo.id ASC'))));
        $this->set('cursos', $Curriculos->Curriculo->Curso->find('list', array('fields' => array('id', 'codigo'))));
        $this->set('disciplinas', $Curriculos->Curriculo->Disciplina->find('list', array('fields' => array('id', 'codigo'))));
        $this->Flash->set('Campo adicionado com sucesso !!!');
        $this->redirect(array('action' => 'adm_curriculo'));
        }
    }
  }

  public function adm_curriculo_edit($id){
    $Curriculos = new CurriculosController();

    if(empty($this->request->data)){
      $this->set('curriculo', $Curriculos->Curriculo->find('all', array('conditions'=> array('Curriculo.id' => $id))));
      $this->set('cursos', $Curriculos->Curriculo->Curso->find('list', array('fields' => array('id', 'codigo'))));
      $this->set('disciplinas', $Curriculos->Curriculo->Disciplina->find('list', array('fields' => array('id', 'codigo'))));

    }else{
      $dados['Curriculo']['id'] = $this->request->data['Usuario']['id'];
      $dados['Curriculo']['disciplina_id'] = $this->request->data['Usuario']['disciplina_id'];
      $dados['Curriculo']['obrigatoria'] = $this->request->data['Usuario']['obrigatoria'];
      if($this->request->data['Usuario']['periodo'] != NULL){
        $dados['Curriculo']['periodo'] = ($this->request->data['Usuario']['periodo'] + 1);
      }else{
        $dados['Curriculo']['periodo'] = $this->request->data['Usuario']['periodo'];
      }
      $dados['Curriculo']['curso_id'] = $this->request->data['Usuario']['curso_id'];


      if ($Curriculos->Curriculo->save($dados)) {
          $this->Flash->set('Campo editado com sucesso !!!');
          $this->set('curriculo', $Curriculos->Curriculo->find('all', array('conditions'=> array('Curriculo.id' => $id))));
          $this->set('cursos', $Curriculos->Curriculo->Curso->find('list', array('fields' => array('id', 'codigo'))));
          $this->set('disciplinas', $Curriculos->Curriculo->Disciplina->find('list', array('fields' => array('id', 'codigo'))));
        }

    }
  }

  public function curriculodelet($id){
    $Curriculos = new CurriculosController();

    $Curriculos->Curriculo->delete($id);

    $this->Flash->set('Campo excluído com Sucesso !');
    $this->redirect(array('action' => 'adm_curriculo'));
  }

  public function adm_disciplina(){
    $Disciplinas = new DisciplinasController();

    $this->set('disciplina', $Disciplinas->Disciplina->find('all', array('order' => array('Disciplina.nome ASC'))));
    $this->set('cursos', $Disciplinas->Disciplina->Curso->find('list', array('fields' => array('id', 'codigo'))));

    if (!empty($this->request->data)) {
      $dados['Disciplina']['codigo'] = $this->request->data['Usuario']['codigo'];
      $dados['Disciplina']['nome'] = $this->request->data['Usuario']['nome'];
      $dados['Disciplina']['carga_hora'] = $this->request->data['Usuario']['carga_hora'];
      $dados['Disciplina']['curso_id'] = $this->request->data['Usuario']['curso_id'];

      if(($Disciplinas->Disciplina->find('all', array('conditions'=> array('Disciplina.codigo' => $this->request->data['Usuario']['codigo']))))
      || ($Disciplinas->Disciplina->find('all', array('conditions'=> array('Disciplina.nome' => $this->request->data['Usuario']['nome']))))){
        echo "<script language='javascript'>window.alert('Código ou Nome de disciplina já existente !!!')</script>";
        $this->set('usuarios', $this->request->data);
      }else{
        if ($Disciplinas->Disciplina->save($dados)) {
            $this->set('curriculo', $Disciplinas->Disciplina->find('all', array('order' => array('Disciplina.nome ASC'))));
            $this->set('cursos', $Disciplinas->Disciplina->Curso->find('list', array('fields' => array('id', 'codigo'))));
            $this->Flash->set('Disciplina adicionada com sucesso !!!');
            $this->redirect(array('action' => 'adm_disciplina'));
          }
      }
    }
  }

  public function adm_disciplina_edit($id){
    $Disciplinas = new DisciplinasController();
    $disciplina = $Disciplinas->Disciplina->find('all', array('conditions'=> array('Disciplina.id' => $id)));

    if(empty($this->request->data)){
      $this->set('disciplina', $disciplina);
      $this->set('cursos', $Disciplinas->Disciplina->Curso->find('list', array('fields' => array('id', 'codigo'))));

    }else{
      $dados['Disciplina']['id'] = $this->request->data['Usuario']['id'];
      $dados['Disciplina']['codigo'] = $this->request->data['Usuario']['codigo'];
      $dados['Disciplina']['nome'] = $this->request->data['Usuario']['nome'];
      $dados['Disciplina']['carga_hora'] = $this->request->data['Usuario']['carga_hora'];
      $dados['Disciplina']['curso_id'] = $this->request->data['Usuario']['curso_id'];


      if(($this->request->data['Usuario']['codigo'] != $disciplina[0]['Disciplina']['codigo']) || ($this->request->data['Usuario']['nome'] != $disciplina[0]['Disciplina']['nome'])){
        if(($this->request->data['Usuario']['codigo'] != $disciplina[0]['Disciplina']['codigo']) && ($Disciplinas->Disciplina->find('all', array('conditions'=> array('Disciplina.codigo' => $this->request->data['Usuario']['codigo']))))){
          echo "<script language='javascript'>window.alert('Código de disciplina já existente !!!')</script>";
          $this->set('disciplina', $Disciplinas->Disciplina->find('all', array('conditions'=> array('Disciplina.id' => $id))));
          $this->set('cursos', $Disciplinas->Disciplina->Curso->find('list', array('fields' => array('id', 'codigo'))));
        }
        elseif(($this->request->data['Usuario']['nome'] != $disciplina[0]['Disciplina']['nome']) && ($Disciplinas->Disciplina->find('all', array('conditions'=> array('Disciplina.nome' => $this->request->data['Usuario']['nome']))))){
           echo "<script language='javascript'>window.alert('Nome de disciplina já existente !!!')</script>";
           $this->set('disciplina', $Disciplinas->Disciplina->find('all', array('conditions'=> array('Disciplina.id' => $id))));
           $this->set('cursos', $Disciplinas->Disciplina->Curso->find('list', array('fields' => array('id', 'codigo'))));
         }
         else{
          if ($Disciplinas->Disciplina->save($dados)) {
              $this->Flash->set('Disciplina editada com sucesso !!!');
              $this->set('disciplina', $Disciplinas->Disciplina->find('all', array('conditions'=> array('Disciplina.id' => $id))));
              $this->set('cursos', $Disciplinas->Disciplina->Curso->find('list', array('fields' => array('id', 'codigo'))));
            }
        }
      }else{
        if ($Disciplinas->Disciplina->save($dados)) {
            $this->Flash->set('Disciplina editada com sucesso !!!');
            $this->set('disciplina', $Disciplinas->Disciplina->find('all', array('conditions'=> array('Disciplina.id' => $id))));
            $this->set('cursos', $Disciplinas->Disciplina->Curso->find('list', array('fields' => array('id', 'codigo'))));
          }
      }
    }
  }

  public function disciplinadelet($id){
    $Disciplinas = new DisciplinasController();

    $Disciplinas->Disciplina->delete($id);

    $this->Flash->set('Disciplina excluída com Sucesso !');
    $this->redirect(array('action' => 'adm_disciplina'));
  }

  public function adm_curso(){
    $Cursos = new CursosController();

    $this->set('curso', $Cursos->Curso->find('all', array('order' => array('Curso.nome ASC'))));

    if (!empty($this->request->data)) {
      $dados['Curso']['codigo'] = $this->request->data['Usuario']['codigo'];
      $dados['Curso']['nome'] = $this->request->data['Usuario']['nome'];
      $dados['Curso']['horas_atvs'] = $this->request->data['Usuario']['horas_atvs'];
      $dados['Curso']['horas_displ_eletv'] = $this->request->data['Usuario']['horas_displ_eletv'];
      $dados['Curso']['horas_displ_obrig'] = $this->request->data['Usuario']['horas_displ_obrig'];

      if(($Cursos->Curso->find('all', array('conditions'=> array('Curso.codigo' => $this->request->data['Usuario']['codigo']))))
      || ($Cursos->Curso->find('all', array('conditions'=> array('Curso.nome' => $this->request->data['Usuario']['nome']))))){
        echo "<script language='javascript'>window.alert('Código ou Nome de curso já existente !!!')</script>";
        $this->set('usuarios', $this->request->data);
      }else{
        if ($Cursos->Curso->save($dados)) {
            $this->set('curso', $Cursos->Curso->find('all', array('order' => array('Curso.nome ASC'))));
            $this->Flash->set('Curso adicionado com sucesso !!!');
            $this->redirect(array('action' => 'adm_curso'));
          }
      }
    }
  }

  public function adm_curso_edit($id){
    $Cursos = new CursosController();
    $curso = $Cursos->Curso->find('all', array('conditions'=> array('Curso.id' => $id)));

    if(empty($this->request->data)){

      $this->set('curso', $curso);

    }else{
      $dados['Curso']['id'] = $this->request->data['Usuario']['id'];
      $dados['Curso']['codigo'] = $this->request->data['Usuario']['codigo'];
      $dados['Curso']['nome'] = $this->request->data['Usuario']['nome'];
      $dados['Curso']['horas_atvs'] = $this->request->data['Usuario']['horas_atvs'];
      $dados['Curso']['horas_displ_eletv'] = $this->request->data['Usuario']['horas_displ_eletv'];
      $dados['Curso']['horas_displ_obrig'] = $this->request->data['Usuario']['horas_displ_obrig'];

      if(($this->request->data['Usuario']['codigo'] != $curso[0]['Curso']['codigo']) || ($this->request->data['Usuario']['nome'] != $curso[0]['Curso']['nome'])){
        if(($this->request->data['Usuario']['codigo'] != $curso[0]['Curso']['codigo']) && ($Cursos->Curso->find('all', array('conditions'=> array('Curso.codigo' => $this->request->data['Usuario']['codigo']))))){
          echo "<script language='javascript'>window.alert('Código de curso já existente !!!')</script>";
          $this->set('curso', $Cursos->Curso->find('all', array('conditions'=> array('Curso.id' => $id))));
        }
        elseif(($this->request->data['Usuario']['nome'] != $curso[0]['Curso']['nome']) && ($Cursos->Curso->find('all', array('conditions'=> array('Curso.nome' => $this->request->data['Usuario']['nome']))))){
           echo "<script language='javascript'>window.alert('Nome de curso já existente !!!')</script>";
           $this->set('curso', $Cursos->Curso->find('all', array('conditions'=> array('Curso.id' => $id))));
        }else{
           if ($Cursos->Curso->save($dados)) {
               $this->set('curso', $Cursos->Curso->find('all', array('conditions'=> array('Curso.id' => $id))));
               $this->Flash->set('Curso editado com sucesso !!!');
             }
        }
      }else{
        if ($Cursos->Curso->save($dados)) {
          $this->set('curso', $Cursos->Curso->find('all', array('conditions'=> array('Curso.id' => $id))));
          $this->Flash->set('Curso editado com sucesso !!!');
        }
      }
    }
  }

  public function cursodelet($id){
    $Cursos = new CursosController();

    $Cursos->Curso->delete($id);

    $this->Flash->set('Curso excluído com Sucesso !');
    $this->redirect(array('action' => 'adm_curso'));
  }

  public function logout() {
    $this->Session->destroy();
    $this->Flash->set('Atividades encerradas com sucesso!');
    $this->redirect(Router::url('http://localhost/sisdispl/usuarios/adm_login'));
    exit();
  }

  public function delet(){
    $id = $this->Session->read('Usuario');

    $this->Usuario->delete($id[0]['Usuario']['id']);

    $this->Flash->set('Usuário excluído com Sucesso !');
    $this->redirect(array('action' => 'logout'));
  }
}
?>
