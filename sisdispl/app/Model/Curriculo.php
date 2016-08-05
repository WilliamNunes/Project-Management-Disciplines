<?php
class Curriculo extends AppModel {
    public $belongsTo = array('Curso','Disciplina');
}
?>
