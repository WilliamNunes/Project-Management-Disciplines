<?php
class Requisito extends AppModel {
  public $belongsTo = array(
        'Disciplina' => array(
            'className' => 'Disciplina',
            'foreignKey' => 'disciplina_id'
        ),

         'Disciplina_requi' => array(
            'className' => 'Disciplina',
            'foreignKey' => 'requi_discipl_id',
        ),

        'Curso' => array(
            'className' => 'Curso',
            'foreignKey' => 'curso_id'
        ));
}
?>
